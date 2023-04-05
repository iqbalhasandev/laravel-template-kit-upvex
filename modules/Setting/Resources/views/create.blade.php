<x-app-layout>
    <x-setting::setting-card>
        {{-- create new Settings --}}
        <div class="card-box">
            <form action="{{ route(config('theme.rprefix').'.store') }}" method="POST" class="needs-validation"
                novalidate>
                @csrf
                <h3 class="h3 mt-3">
                    {{ __('Create Setting New') }}
                </h3>
                <hr>

                <div class="row mt-2">
                    <div class="col-md-3 form-group ">
                        <label class="" for="display_name">{{ __('Name') }}</label>
                        <input id="display_name" class="form-control" type="text" name="display_name"
                            placeholder="{{ __('Setting name ex: Admin Title') }}" required focus />
                        @error('display_name')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="" for="key">{{ __('Key') }}</label>
                        <input id="key" class="form-control" type="text" name="key"
                            placeholder="{{ __('Setting key ex: admin_title') }}" required />
                        @error('key')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="" for="type">{{ __('Type') }}</label>
                        <select class="select2 form-control" name="type" id="type" required>
                            <option disabled selected>{{ __('Choose Type') }}</option>
                            @foreach ($S_TYPES as $key=>$item)
                            <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="" for="group">{{ __('Group') }}</label>
                        <select class="select2Tag form-control" name="group" id="group" required>
                            <option selected disabled>{{ __('Select Existing Group or Add New') }}</option>
                            @foreach ($groups as $group)
                            <option value="{{ $group }}">{{ $group }}</option>
                            @endforeach
                        </select>
                        @error('group')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        <a href="javaScript:void(0);" class="setting-extra-btn my-2 btn btn-outline-success"
                            id="extraOptionDocOpen">
                            {{ __('Extra Option Doc') }}
                        </a>
                        <a href="javaScript:void(0);" class="setting-extra-btn my-2 btn btn-outline-success mx-2 active"
                            id="extraOptionDocClose" style="display: none">
                            {{ __('Close Extra Option Doc') }}
                        </a>
                        <a href="javaScript:void(0);" class="setting-extra-btn my-2 btn btn-outline-success mx-2"
                            id="extraOptionOpen">
                            {{ __('Add Extra Option') }}
                        </a>
                        <a href="javaScript:void(0);" class="setting-extra-btn my-2 btn btn-outline-success mx-2 active"
                            id="extraOptionClose" style="display: none">
                            {{ __('Close Extra Option') }}
                        </a>
                        <a href="javaScript:void(0);" class="setting-extra-btn my-2 btn btn-outline-success mx-2"
                            id="addNoteOpen">
                            {{ __('Add Note') }}
                        </a>
                        <a href="javaScript:void(0);" class="setting-extra-btn my-2 btn btn-outline-success mx-2 active"
                            id="addNoteClose" style="display: none">
                            {{ __('Close Note') }}
                        </a>
                    </div>
                    <div class="col-md-12 form-group" id="extraOptionDetails" style="display: none">
                        <h5 class="">{{ __('Extra option ( JSON DATA ) Doc') }}</h5>
                        <div class="container-fluid mt-3">
                            <div class="">
                                <h6>{{ __('For Text-box Configuration:') }}</h6>
                                <hr>
                                <p>
                                    {{ __('You can set the minimum charset value and maximum charset value using the
                                    json.') }}
                                </p>
                                <code>
                                    {
                                        <br>
                                        "min":"0",
                                        <br>
                                        "max":"255"
                                        <br>
                                    }
                                </code>
                            </div>
                            <div class="">
                                <h6>{{ __('For Text-area Configuration:') }}</h6>
                                <hr>
                                <p>
                                    {{ __('You can set the minimum charset value and maximum charset value using the
                                    json.') }}
                                </p>
                                <code>
                                    {
                                        <br>
                                        "minlength":"0", <br>
                                        "maxlength":"255"<br>
                                    }
                                </code>
                            </div>
                            <div class="">
                                <h6>{{ __('For Code Editor Configuration:') }}</h6>
                                <hr>
                                <p>
                                    {{__('You can use HTML,CSS, PHP, JavaScript, Java, C#, C, C++, Clojure, Go,
                                    Groovy,JSON, Scala,Ruby, XML, and others as languages.')}}
                                </p>
                                <code>
                                    {
                                        <br>
                                        "theme":"dark",
                                        <br>
                                        "language":"html"
                                        <br>
                                    }
                                </code>
                            </div>
                            <div class="">
                                <h6>{{ __('For Checkbox Configuration:') }}</h6>
                                <hr>
                                <p>
                                    {{__('You can use Chekbox label and value using the json.')}}
                                </p>
                                <code>
                                    {
                                        <br>
                                        "label":"key/value",
                                        <br>
                                        "label2":"key2/value2"
                                        <br>
                                    }
                                </code>
                            </div>
                            <div class="">
                                <h6>{{ __('For Redio Configuration:') }}</h6>
                                <hr>
                                <p>
                                    {{ __('You can use redio label and value using the json.') }}
                                </p>
                                <code>
                                    {
                                        <br>
                                        "label":"key/value",
                                        <br>
                                        "label2":"key2/value2"
                                        <br>
                                    }
                                </code>
                            </div>
                            <div class="">
                                <h6>{{ __('For Select Dropdowm Configuration:') }}</h6>
                                <hr>
                                <p>
                                    {{ __('You can use Select Dropdowm label and value using the json.') }}
                                </p>
                                <code>
                                    {
                                        <br>
                                        "label":"key/value",
                                        <br>
                                        "label2":"key2/value2"
                                        <br>
                                    }
                                </code>
                            </div>
                            <div class="">
                                <h6>{{ __('For File Configuration:') }}</h6>
                                <hr>
                                <p>
                                    {{ __('You can use File accept using the json.') }}
                                </p>
                                <code>
                                    {
                                        <br>
                                        "accept":".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        <br>
                                    }
                                </code>
                            </div>
                            <div class="">
                                <h6>{{ __('For image Configuration:') }}</h6>
                                <hr>
                                <p>
                                    {{ __('You can use image accept using the json.') }}
                                </p>
                                <code>
                                    {
                                        <br>
                                        "accept":"image/*"
                                        <br>
                                    }
                                </code>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-12 form-group" id="extraOption" style="display: none">
                        <label class="" for="setting_details">{{ __('Extra option ( JSON DATA )') }}</label>
                        <div id="setting_details" data-theme="clouds" data-language="json"
                            class="ace_editor min_height_400" name="details">{{ $details ?? '' }}</div>
                        <textarea name="details" id="setting_details_textarea"
                            style="display: none">{{ $details ?? '' }}</textarea>
                        <hr>
                    </div>

                    <div class="col-md-12 form-group" id="addNote" style="display: none">
                        <label class="" for="setting_note">{{ __('Add Note') }}</label>
                        <div id="setting_note" data-theme="clouds" data-language="html"
                            class="ace_editor min_height_400" name="details">{{ $note ?? '' }}</div>
                        <textarea name="note" id="setting_note_textarea"
                            style="display: none">{{ $note ?? '' }}</textarea>
                    </div>


                </div>
                <div class="mt-5">
                    <button class="btn btn-success btn-lg" type="submit">{{ __('Create') }}</button>
                </div>
            </form>
        </div>
    </x-setting::setting-card>
    @push('lib-styles')
    <link rel="stylesheet" href="{{ nanopkg_asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ nanopkg_asset('css/setting/setting.css') }}">
    @endpush
    @push('lib-scripts')
    <script src="{{ nanopkg_asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ nanopkg_asset('vendor/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ nanopkg_asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/theme-clouds.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-json.min.js"></script>
    @endpush
    @push('js')
    <script src="{{ nanopkg_asset('js/settings/main.js') }}"></script>
    <script src="{{ nanopkg_asset('js/settings/tinymce-config.min.js') }}"></script>
    @endpush
</x-app-layout>
