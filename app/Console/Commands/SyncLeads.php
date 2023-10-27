<?php

namespace App\Console\Commands;

use App\Models\Lead;
use App\Models\User;
use App\Service\BrevoAPIService;
use Error;
use Illuminate\Console\Command;

class SyncLeads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-leads {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronize lead with brevo user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::findOrFail($this->argument('user'));

        if (is_null($user->brevo_key)) throw new \Exception("Configure Brevo key first");
        
        $maxLeads = BrevoAPIService::getMaxLeads($user->brevo_key);
        $actualLeads = array_map(fn ($lead) => ($lead['brevo_id']), Lead::all()->toArray());

        for ($i = 0; $i <= $maxLeads; $i += 100) {
            $leads = BrevoAPIService::retrieveBrevoLeads($user->brevo_key, 100, $i);

            if (is_string($leads)) throw new \Exception($leads);

            $formatLeads = array_map(fn ($lead) => ([
                'email' => $lead['email'],
                'brevo_id' => $lead['id'],
                'department' => $lead['attributes']->DEPARTEMENT ?? null,
                'user_id' => $user->id
            ]), $leads->getContacts());

            $formatLeads = array_filter($formatLeads, fn ($l) => (!in_array($l['brevo_id'], $actualLeads)));

            Lead::insert($formatLeads);
        }
        
    }
}
