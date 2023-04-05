<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class RecaptchaSettingController extends Controller
{
    /**
     * Constructor for the controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'permission:recaptcha_setting_management']);
        \cs_set('theme', [
            'title' => 'Recaptcha Setting',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Recaptcha Setting',
                    'link' => false,
                ],
            ],
            'rprefix' => 'admin.setting.recaptcha',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $env = readEnvFile();

        // get the value of the specific key
        $data = [
            'INVISIBLE_RECAPTCHA_SITEKEY' => $env['INVISIBLE_RECAPTCHA_SITEKEY'] ?? null,
            'INVISIBLE_RECAPTCHA_SECRETKEY' => $env['INVISIBLE_RECAPTCHA_SECRETKEY'] ?? null,
        ];

        return \view('setting::recaptcha.index', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource from settings table.
     *
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'INVISIBLE_RECAPTCHA_SITEKEY' => 'required|string',
            'INVISIBLE_RECAPTCHA_SECRETKEY' => 'nullable|string',
        ]);
        // update the env file
        writeEnvFile($data);
        Session::flash('success', 'Recaptcha Setting Successfully Saved');

        return \redirect()->back();
    }
}
