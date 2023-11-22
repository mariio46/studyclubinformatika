<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrantBiodataUpdateRequest;
use App\Http\Requests\RegistrantPictureUpdateRequest;
use App\Http\Requests\RegistrantProfileUpdateRequest;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BiodataController extends Controller
{
    public $open;

    public function __construct()
    {
        $this->open = Registration::getRegistrationStatus();
    }

    public function index(): View
    {
        return view('biodata.edit', [
            'biodata' => auth()->user()->biodata,
            'user' => auth()->user(),
            'religions' => $this->getReligions(),
            'genders' => $this->getGenders(),
            'vehicleStatus' => $this->getVehicles(),
            'open' => $this->open,
        ]);
    }

    public function pictureUpdate(RegistrantPictureUpdateRequest $request): RedirectResponse
    {
        $attributes = $request->except('oldPicture');

        $request->hasFile('picture') && $request->user()->hasPicture() ? Storage::delete($request->user()->picture) : true;

        $attributes['picture'] = $request->hasFile('picture')
            ? $request->file('picture')->storeAs('image/profile-picture', 'photo-by' . '-' . $request->user()->username . '-' . mt_rand(0, 99999) . '.' . $request->file('picture')->extension())
            : $request->user()->picture;

        $request->user()->update($attributes);

        return back()->with('status-success', 'Foto profil berhasil diperbarui');
    }

    public function profileUpdate(RegistrantProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->name != auth()->user()->name) {
            $result = $this->getCode($request->name);
            $request->user()->update(['username' => $result]);
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return back()->with('status-success', 'Profil pribadi berhasil diperbarui');
    }

    public function biodataUpdate(RegistrantBiodataUpdateRequest $request): RedirectResponse
    {
        if ($this->open) {
            if (! auth()->user()->timeline->update_biodata) {
                $request->user()->timeline()->update([
                    'update_biodata' => 1,
                    'update_biodata_time' => now(),
                ]);
            }

            $request->user()->biodata()->update($request->validated());

            return back()->with('status-success', 'Biodata berhasil diperbarui, silahkan download biodata anda.');
        }

        return back()->with('status-failed', 'Maaf, saat ini tidak bisa memperbarui, mengunduh, atau melihat preview biodata');
    }

    protected function getCode($request): string
    {
        // Take registration code from old username
        preg_match_all('!\d+!', auth()->user()->username, $matches);
        $code = implode(' ', $matches[0]);

        // Take first name from new input name
        $name = Str::of($request)->explode(' ')->get(0);

        // Change to lowercase and merge
        $result = strtolower($name) . $code;

        // Result
        return (string) $result;
    }

    protected function getReligions()
    {
        return collect([
            ['name' => 'Islam'],
            ['name' => 'Kristen'],
            ['name' => 'Katholik'],
            ['name' => 'Hindu'],
            ['name' => 'Budha'],
            ['name' => 'Konghucu'],
        ]);
    }

    protected function getGenders()
    {
        return collect([
            ['name' => 'Laki-laki'],
            ['name' => 'Perempuan'],
        ]);
    }

    protected function getVehicles()
    {
        return collect([
            ['name' => 'Punya (Mobil)'],
            ['name' => 'Punya (Motor)'],
            ['name' => 'Tidak Punya'],
        ]);
    }
}
