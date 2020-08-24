<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SyncUserActivedAt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larabbs1:sync-user-actived-at';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync user\'s last connexion data to mysql';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(User $user)
    {
        $user->SyncUserActivedAt();
        $this->info('Sync success!');
    }
}
