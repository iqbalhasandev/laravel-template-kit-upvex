<?php

namespace Modules\Backup\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Backup\Facades\Backup;

class BackupController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'permission:backup_management']);
        $this->middleware('request:ajax', ['only' => ['createBackup', 'destroy', 'destroyAll']]);

        cs_set('theme', [
            'title' => 'Backup',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Backup',
                    'link' => false,
                ],
            ],
            'rprefix' => 'admin.backup',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $disks = Backup::getFiles();

        return view('backup::index', compact('disks'));
    }

    /**
     * Create Backup
     *
     * @return mixed
     */
    public function createBackup(Request $request)
    {
        Backup::create($request->option ?? '');

        return response()->success([], 'Backup created successfully', 200);
    }

    /**
     * Download Backup
     *
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download(Request $request)
    {
        if ($request->url && $request->disk) {
            return Backup::download($request->disk, $request->url);
        }

        return abort(404);
    }

    /**
     * Delete Backup
     *
     * @return mixed
     */
    public function destroy(Request $request)
    {
        if ($request->url && $request->disk) {
            Backup::delete($request->disk, $request->url);
        }

        return response()->success([], 'Backup deleted successfully', 200);
    }

    /**
     * Delete All Backup
     *
     * @return mixed
     */
    public function destroyAll()
    {
        Backup::clean();

        return response()->success([], 'Old Backup deleted successfully', 200);
    }
}
