<x-app-layout>
    <x-card>
        <x-slot name='actions'>
            <a href="{{ route(config('theme.rprefix').'.index') }}" class="btn btn-success btn-sm"><i
                    class="fa fa-list"></i>&nbsp;{{ __('User List') }}</a>
        </x-slot>
        <div class="row" style="padding: 50px 0">
            <div class="col-sm-12">
                <form enctype="multipart/form-data"
                    action="{{ isset($item)?route(config('theme.rprefix').'.update',$item->id):route(config('theme.rprefix').'.store') }}"
                    method="POST" class="needs-validation" enctype="multipart/form-data">
                    @csrf
                    @isset($item)
                    @method('PUT')
                    @endisset
                    <hr>
                    <fieldset class="mb-5 py-3 px-4 ">
                        <legend>{{ __('Personal Info') }}:</legend>
                        <div class=" row">
                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="name" class="font-black">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="{{ __('Enter Name') }}"
                                        value="{{ isset($item)?$item->name:old('name') }}" required>
                                    @error('name')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="email" class="font-black">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="{{ __('Enter Email') }}"
                                        value="{{ isset($item)?$item->email:old('email') }}" required>
                                    @error('email')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="phone" class="font-black">{{ __('Phone') }}</label>
                                    <input type="number" class="form-control arrow-hidden" name="phone" id="phone"
                                        placeholder="{{ __('Enter phone') }}"
                                        value="{{ isset($item)?$item->phone:old('phone') }}" required>
                                    @error('phone')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="gender" class="font-black">{{ __('Gender') }}</label>
                                    <select class="form-control show-tick" name="gender" id="gender" required>
                                        <option selected disabled>--{{ __('Select Gender') }}--</option>
                                        @foreach (App\Models\User::genderList() as $gender)
                                        <option {{isset($item)?selected($item->gender,$gender):null}}>
                                            {{ $gender }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="age" class="font-black">{{ __('Age') }}</label>
                                    <input type="number" class="form-control arrow-hidden" name="age" id="age"
                                        placeholder="{{ __('Enter your age') }}"
                                        value="{{ isset($item)?$item->age:old('age') }}" required>
                                    @error('age')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 py-1">
                                <div class="form-group pt-1 pb-1">
                                    <label for="address" class="font-black">{{ __('Address') }}</label>
                                    <textarea name="address" id="address" class="form-control"
                                        placeholder="{{ __('Enter your address') }}" style="min-height: 100px;"
                                        required>{{ isset($item)?$item->address:old('address') }}</textarea>
                                    @error('address')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mb-5 py-3 px-4 ">
                        <legend>{{ __('Account Info') }}:</legend>
                        <div class="row">
                            <div class="col-md-6 pt-1 pb-1">
                                <div class="form-group">
                                    <label for="role" class="font-black">{{ __('User Role') }}</label>
                                    <select class="form-control show-tick" name="role" id="role" required>
                                        <option selected disabled>--{{ __('Select User Role') }}--</option>
                                        @foreach (Modules\Role\Entities\Role::all() as $role)
                                        <option @isset($item) @selected($item->roles()->pluck('id')->first()==$role->id)
                                            @endisset
                                            value="{{ $role->id }}" >
                                            {{ $role->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 pt-1 pb-1">
                                <div class="form-group">
                                    <label for="status" class="font-black">Account Status</label>
                                    <select class="form-control show-tick" name="status" id="status" required>
                                        <option selected disabled>--{{ __('Select Account Status') }}--</option>
                                        @foreach (App\Models\User::statusList() as $status)
                                        <option {{isset($item)?selected($item->status,$status):null}}>
                                            {{ $status }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('user_status_id')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 pt-1 pb-1">
                                <div class="form-group">
                                    <label for="password" class="font-black">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="{{ __('Enter Password') }}" {{ isset($item)?'':'required' }}
                                        autocomplete="new-password">
                                    @error('password')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 pt-1 pb-1">
                                <div class="form-group">
                                    <label for="password_confirmation" class="font-black">{{ __('Confirm Password')
                                        }}</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" placeholder="{{ __('Retype Password') }}" {{
                                        isset($item)?'':'required' }} autocomplete="new-password">
                                    @error('password_confirmation')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 pt-1 pb-1">
                                <div class="form-group">
                                    <label for="avatar" class="font-black">{{ __('Avatar') }}</label>
                                    <input type="file" class="form-control" name="avatar" id="avatar"
                                        onchange="get_img_url(this, '#avatar_image');"
                                        placeholder="{{ __('Select avatar image') }}">
                                    <img id="avatar_image" src="{{ isset($item)?$item->profile_photo_url:'' }}"
                                        width="120px" class="mt-1">
                                    @error('avatar')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-12 pt-1 pb-1">
                                <div>
                                    <h4 class="border-bottom  py-1 mx-1 mb-0 font-medium-2 font-black">
                                        <i class="feather icon-lock mr-50 "></i>
                                        {{ __('Permission') }}
                                    </h4>
                                    <div class="row mt-1">
                                        @forelse (Modules\Permission\Entities\Permission::groups() as $gName=>$g)
                                        <div class="col-md-12">
                                            <fieldset>
                                                <legend>
                                                    {{ $gName }}
                                                </legend>
                                                <div class="row py-3">
                                                    @forelse ($g as $p)
                                                    <div class="col-md-4 form-group">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="{{ $p->name }}"
                                                                name="permissions[{{ $p->id }}]"
                                                                {{config('theme.edit')?(permission_check($item->permissions,$p->id)?'checked':''):''}}
                                                            value="{{ $p->id }}">
                                                            <label class="form-check-label" for="{{ $p->name }}">
                                                                {{permission_key_to_name($p->name)}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @empty
                                                    <div class="col-md-12 text-center p-5">
                                                        <p class="text-danger">{{ __('No Permission Found') }}</p>
                                                    </div>
                                                    @endforelse
                                                </div>

                                            </fieldset>
                                        </div>
                                        @empty
                                        <div class="col-md-12 text-center p-5">
                                            <p class="text-danger">{{ __('No Permission Group') }}</p>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            {{-- --}}
                            <div class="col-md-12 ">
                                <div class="form-group pt-1 pb-1">
                                    <button type="submit" class="btn btn-success btn-round">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </x-card>
</x-app-layout>