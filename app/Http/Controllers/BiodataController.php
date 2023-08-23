<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrantBiodataUpdateRequest;
use App\Http\Requests\RegistrantPictureUpdateRequest;
use App\Http\Requests\RegistrantProfileUpdateRequest;
use App\Models\Biodata;
use App\Models\RegistrantActivity;
use App\Models\RegistrationStatus;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public $open;

    public function __construct()
    {
        $data = RegistrationStatus::query()->where('id', 1)->select('status')->first()->status;
        $this->open = $data == 1 ? true : false;
    }

    public function index()
    {
        $religions = collect([
            ['name' => 'Islam'],
            ['name' => 'Kristen'],
            ['name' => 'Katholik'],
            ['name' => 'Hindu'],
            ['name' => 'Budha'],
            ['name' => 'Konghucu'],
        ]);
        $genders = collect([
            ['name' => 'Laki-laki'],
            ['name' => 'Perempuan'],
        ]);
        $vehicleStatus = collect([
            ['name' => 'Punya (Mobil)'],
            ['name' => 'Punya (Motor)'],
            ['name' => 'Tidak Punya'],
        ]);

        return view('biodata.edit', [
            'biodata' => auth()->user()->biodata,
            'user' => auth()->user(),
            'religions' => $religions,
            'genders' => $genders,
            'vehicleStatus' => $vehicleStatus,
            'open' => $this->open,
        ]);
    }

    public function pictureUpdate(RegistrantPictureUpdateRequest $request): RedirectResponse
    {
        if ($request->file('picture')) {
            if ($request->oldPicture) {
                Storage::delete($request->oldPicture);
            }
            // Custom Name File Store
            $file = $request->file('picture');
            $orginalExtension = $file->getClientOriginalExtension();
        }
        $picture = $file->storeAs('image/profile-picture', 'photo-by'.'-'.Auth::user()->username.'-'.mt_rand(0, 99999).'.'.$orginalExtension);
        User::where('id', Auth::user()->id)->update(['picture' => $picture]);

        return back()->with('status-success', 'Picture updated');
    }

    public function profileUpdate(RegistrantProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->userId == 1) {
            return back()->with('status-failed', 'Mario cant be edited, nice try buddy!');
        }
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return back()->with('status-success', 'Profile updated');
    }

    public function biodataUpdate(RegistrantBiodataUpdateRequest $request): RedirectResponse
    {
        if ($this->open) {
            $user = auth()->user()->registrantActivity;
            if (! $user->update_biodata) {
                RegistrantActivity::where('user_id', auth()->user()->id)->update([
                    'update_biodata' => 1,
                    'update_biodata_time' => now(),
                ]);
            }
            $validated = $request->validated();
            Biodata::where('user_id', auth()->user()->id)->update($validated);

            return back()->with('status-success', 'Biodata Updated');
        }

        return back()->with('status-failed', 'Sorry, registrtion is closed. Comeback anytime!');
    }

    public function store(Request $request)
    {
        if ($this->open) {
            Biodata::create([
                'user_id' => $request->userId,
            ]);
            RegistrantActivity::create([
                'user_id' => $request->userId,
                'account_registration' => 1,
                'account_registration_time' => now(),
                'create_biodata' => 1,
                'create_biodata_time' => now(),
            ]);

            return back()->with('status-success', 'Biodata has been created');
        }

        return back()->with('status-failed', 'Sorry, registrtion is closed. Comeback anytime!');
    }
}
