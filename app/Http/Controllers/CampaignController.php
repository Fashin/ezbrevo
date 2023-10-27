<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CampaignController extends Controller {

    public function index(Request $request) {
        return Inertia::render('Campaign/Index', [
            'campaigns' => [],
            'leads' => Lead::where('user_id', $request->user()->id)->get()
        ]);
    }
}