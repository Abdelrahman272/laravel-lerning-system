<?php

namespace App\Console\Commands;

use App\Models\Code;
use Illuminate\Console\Command;

class DeleteExpiredCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'codes:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired codes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expiredDate = now()->subDays(7);
        Code::where('created_at', '<=', $expiredDate)->delete();

        $this->info('Expired codes deleted successfully.');
    }
}
