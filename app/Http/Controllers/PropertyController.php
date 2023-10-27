<?php

namespace App\Http\Controllers;

use App\Service\BrevoAPIService;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PropertyController extends Controller {

    public function index(Request $request) {
        return Inertia::render('Property/Index', [
            'brevo_key' => $request->user()->brevo_key,
            'maxLeads' => $request->get('maxLeads'),
            'currentLeads' => $request->get('currentLeads'),
            'stop_loop' => $request->get('stop_loop')
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

    public function sync_leads(Request $request) {
        $request->user()->update([
            'has_first_sync_leads' => true
        ]);
        
        Artisan::call('app:sync-leads', [
            'user' => $request->user()->id
        ]);
    }

    public function get_sync_leads(Request $request) {
        $maxLeads = $request->get('maxLeads');

        if ($maxLeads == 0)
            $maxLeads = BrevoAPIService::getMaxLeads($request->user()->brevo_key);

        $currentLeads = $request->user()->leads()->count();

        return redirect()->route('property.index', [
            'maxLeads' => $maxLeads,
            'currentLeads' => $currentLeads,
            'stop_loop' => $currentLeads == $maxLeads
        ]);
    }
}