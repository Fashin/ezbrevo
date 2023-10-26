<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class PropertyController extends Controller {

    public function index(Request $request) {
        return Inertia::render('Property/Index', [
            'brevo_key' => $request->user()->brevo_key
        ]);
    }

    public function update_brevo_key(Request $request) {
        $data = $request->validate([
            'brevo_key' => 'required|string'
        ]);

        $user = $request->user();

        $user->update([
            'brevo_key' => $data['brevo_key']
        ]);

        return redirect()->route('property.index');
    }
}