<?php

namespace Modules\Backup;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Modules\Backup\Jobs\CleanBackupJob;
use Modules\Backup\Jobs\CreateBackupJob;

class Backup
{
    /**
     * Get All Backup Files
     *
     * @return array<\Illuminate\Support\Collection>
     */
    public function getFiles(string $disk = '')
    {
        $disks = [];
        foreach (config('backup.backup.destination.disks') as $disk) {
            $storageFiles = Storage::disk($disk)->files(config('backup.backup.name'));

            //   array map and filter by last modified Descending
            $disks[$disk] = collect($storageFiles)->map(function ($file) use ($disk) {
                return [
                    'disk' => $disk,
                    'name' => $file,
                    'size' => Storage::disk($disk)->size($file),
                    'last_modified' => date('Y-m-d H:i:s', Storage::disk($disk)->lastModified($file)),
                    // 'url'           => Storage::disk($disk)->url($file),
                    'url' => $file,
                ];
            })->sortByDesc('last_modified');
        }

        return $disks;
    }

    /**
     * Create Backup File
     *
     * @return bool
     */
    public function create(string $option = 'only-db')
    {
        CreateBackupJob::dispatch($option);
        Session::flash('success', 'Your request has been accepted by the server. Please wait for a few moments.');

        return true;
    }

    /**
     * Download Backup File
     *
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download(string $disk, string $file)
    {
        if (! Storage::disk($disk)->exists($file)) {
            return abort(404);
        }
        $file = Storage::disk($disk)->download($file);

        return $file;
    }

    /**
     * Delete Backup File
     *
     * @return bool
     */
    public function delete(string $disk, string $file)
    {
        if (! Storage::disk($disk)->exists($file)) {
            return abort(404);
        }
        $file = Storage::disk($disk)->delete($file);
        Session::flash('success', 'Backup file deleted successfully.');

        return $file;
    }

    /**
     * Delete All Backup Files
     *
     * @return bool
     */
    public function clean()
    {
        CleanBackupJob::dispatch();
        Session::flash('success', 'Your request has been accepted by the server. Please wait for a few moments.');

        return true;
    }
}
