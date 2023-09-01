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
use Illuminate\Support\Str;

class RegistrantBiodataController extends Controller
{
    public $open;

    public function __construct()
    {
        $this->open = RegistrationStatus::getRegistrationStatus();
    }

    public function index()
    {
        return view('biodata.edit', [
            'biodata' => auth()->user()->biodata,
            'user' => auth()->user(),
            'religions' => User::religions(),
            'genders' => User::genders(),
            'vehicleStatus' => User::vehicles(),
            'open' => $this->open,
        ]);
    }

    public function pictureUpdate(RegistrantPictureUpdateRequest $request): RedirectResponse
    {
        User::updatePicture($request->validated());

        return back()->with('status-success', 'Picture updated');
    }

    public function profileUpdate(RegistrantProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->userId == 1) {
            return back()->with('status-failed', 'Mario cant be edited, nice try buddy!');
        }

        if ($request->name != auth()->user()->name) {
            $result = $this->getCode($request->name);
            User::where('id', auth()->user()->id)->update([
                'username' => $result,
            ]);
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
            if (! auth()->user()->registrantActivity->update_biodata) {
                RegistrantActivity::updateBiodata(auth()->user()->id);
            }

            Biodata::where('user_id', auth()->user()->id)->update($request->validated());

            return back()->with('status-success', 'Biodata Updated');
        }

        return back()->with('status-failed', 'Sorry, registrtion is closed. Comeback anytime!');
    }

    protected function getCode($request)
    {
        // Take registration code from old username
        preg_match_all('!\d+!', auth()->user()->username, $matches);
        $code = implode(' ', $matches[0]);

        // Take first name from new input name
        $name = Str::of($request)->explode(' ')->get(0);

        // Change to lowercase and merge
        $result = strtolower($name).$code;

        // Result
        return (string) $result;
    }
}
