<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class OpenAiSettingController extends Controller
{
    /**
     * Constructor for the controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'permission:openai_setting_management']);
        \cs_set('theme', [
            'title' => 'Open Ai Setting',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Open Ai Setting',
                    'link' => false,
                ],
            ],
            'rprefix' => 'admin.setting.openai',
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
            'OPENAI_API_KEY' => $env['OPENAI_API_KEY'] ?? null,
            'OPENAI_ORGANIZATION' => $env['OPENAI_ORGANIZATION'] ?? null,
            'OPENAI_MAX_NUMBER_OF_RESULT' => $env['OPENAI_MAX_NUMBER_OF_RESULT'] ?? null,
            'OPENAI_MAX_TOKENS' => $env['OPENAI_MAX_TOKENS'] ?? null,
        ];

        return \view('setting::openai.index', [
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
            'OPENAI_API_KEY' => 'required|string',
            'OPENAI_ORGANIZATION' => 'required|string',
            'OPENAI_MAX_NUMBER_OF_RESULT' => 'required|numeric|min:1|max:10',
            'OPENAI_MAX_TOKENS' => 'required|numeric|min:1',
        ]);
        // update the env file
        writeEnvFile($data);
        Session::flash('success', 'Open Ai Setting Successfully Saved');

        return \redirect()->back();
    }
}
