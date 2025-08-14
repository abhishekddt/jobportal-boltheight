<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Backend\Job;
use carbon\Carbon;

class ExpireJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expire-jobs';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark jobs as expired if the job_expiry date has passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();
        $expiredJobs = Job::whereDate('job_expiry', '<', $today)
            ->where('status', true)
            ->get();

        foreach ($expiredJobs as $job) {
            $job->status = false;
            $job->save();
            $job->delete();
        }

        $this->info($expiredJobs->count() . ' job(s) marked inactive and soft deleted.');

    }
}
