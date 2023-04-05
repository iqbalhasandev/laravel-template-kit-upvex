<?php

namespace Modules\Backup\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class CreateBackupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $option;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($option = '')
    {
        $this->option = $option;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->option === 'only-db') {
            Artisan::call('backup:run', ['--only-db' => true]);
        } elseif ($this->option === 'only-files') {
            Artisan::call('backup:run', ['--only-files' => true]);
        } else {
            Artisan::call('backup:run');
        }
    }
}
