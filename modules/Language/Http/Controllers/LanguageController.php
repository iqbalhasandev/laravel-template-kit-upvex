<?php

namespace Modules\Language\Http\Controllers;

use App\Scopes\Asc;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Language\Entities\Language;
use Modules\Language\Http\Requests\LanguageRequest;

class LanguageController extends Controller
{
    /**
     * Constructor for the controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'permission:language_setting_management']);
        \cs_set('theme', [
            'title' => 'Setting',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Language Setting',
                    'link' => false,
                ],
            ],
            'rprefix' => 'admin.language',
        ]);
    }

    public function index()
    {
        return view('language::index', [
            'languages' => Language::withoutGlobalScopes([Asc::class])->get(),
        ]);
    }

    public function store(LanguageRequest $request)
    {
        $url = base_path().'/resources/lang/en.json';
        if (file_exists($url)) {
            $result = file_get_contents($url);
        } else {
            $result = '{}';
        }
        $result = json_decode($result);
        $result = json_encode($result, true);

        $lang = new Language();
        $lang->fill($request->all());
        $lang->slug = Str::slug($request->title, '-');
        $lang->lang_name = $request->lang_name;
        $file = $lang->slug.'.json';
        $destination = base_path().'/resources/lang/';

        if (! is_dir($destination)) {
            mkdir($destination, 0777, true);
        }

        File::put($destination.$file, $result);
        $lang->save();

        return redirect()
            ->back()
            ->with('success', 'Data Added Successfully');
    }

    public function build($slug)
    {
        $lang = Language::where('slug', $slug)->first();
        $url = base_path().'/resources/lang/'.$lang->slug.'.json';
        if (file_exists($url)) {
            $result = file_get_contents($url);
        } else {
            $result = '{}';
        }
        $results = json_decode($result);

        return view('language::build', [
            'results' => $results,
            'lang' => $lang,
        ]);
    }

    public function update(Request $request, $slug)
    {
        $lang = Language::where('slug', $slug)->first();
        $key = [];

        for ($i = 0; $i < count($request->key); $i++) {
            if ($request->key[$i] && $request->label[$i]) {
                $key[$request->key[$i]] = $request->label[$i];
            } elseif ($request->key[$i]) {
                $key[$request->key[$i]] = $request->key[$i];
            } elseif ($request->label[$i]) {
                $key[$request->label[$i]] = $request->label[$i];
            }
        }

        /**
         * Other Languages
         */
        $allLang = Language::whereNot('slug', $slug)->get();
        foreach ($allLang as $v_lang) {
            $url = base_path().'/resources/lang/'.$v_lang->slug.'.json';
            $v_result = json_decode(file_get_contents($url), true);

            /**
             * Check New Key
             */
            if ($newKeys = array_diff_key($key, $v_result)) {
                /**
                 * Iteration all key and set
                 */
                foreach ($newKeys as $langKey => $langValue) {
                    $v_result[$langKey] = '';
                }

                $v_result = json_encode($v_result, true);
                $file = base_path().'/resources/lang/'.$v_lang->slug.'.json';
                $this->deleteFile($file);
                $file = $v_lang->slug.'.json';
                $destination = base_path().'/resources/lang/';

                if (! is_dir($destination)) {
                    mkdir($destination, 0777, true);
                }
                File::put($destination.$file, $v_result);
            }
        }
        /**
         * Other Languages
         */
        $result = json_encode($key, true);
        $file = base_path().'/resources/lang/'.$lang->slug.'.json';
        $this->deleteFile($file);
        $file = $lang->slug.'.json';
        $destination = base_path().'/resources/lang/';

        if (! is_dir($destination)) {
            mkdir($destination, 0777, true);
        }

        File::put($destination.$file, $result);

        return redirect()
            ->back()
            ->with('success', 'Data updated successfully');
    }

    private function deleteFile($path)
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }

    public function setLang($locale)
    {
        App::setlocale($locale);
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
