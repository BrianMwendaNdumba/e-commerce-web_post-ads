<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class CreateStorageLinkListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FileUploaded $event): void
    {
        if (file_exists(public_path('storage'))) {
            File::delete(public_path('storage'));
            Artisan::call('storage:link');
        } else {
            Artisan::call('storage:link');
        }
    }
}
