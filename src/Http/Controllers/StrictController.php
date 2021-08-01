<?php

namespace CryptaEve\Seat\Strict\Http\Controllers;

use CryptaEve\Seat\Strict\Validation\ValidateSettings;
use Seat\Web\Http\Controllers\Controller;

class StrictController extends Controller
{
    public function getConfigureView()
    {
        return view('strict::configure');
    }

    public function saveSettings(ValidateSettings $request)
    {
        // Enable
        setting(['crypta_strict_enable', $request->globalenable], true);

        // What to remove
        setting(['crypta_strict_remove_squads', $request->removesquads], true);
        setting(['crypta_strict_remove_mods', $request->removemods], true);
        setting(['crypta_strict_remove_perms', $request->removeperms], true);

        // Reasons for removal
        setting(['crypta_strict_reasons_token', $request->tokeninvalid], true);

        return redirect()->back()->with('success', 'Settings have successfully been updated.');
    }

    public function getAboutView()
    {
        return view('strict::about');
    }
}
