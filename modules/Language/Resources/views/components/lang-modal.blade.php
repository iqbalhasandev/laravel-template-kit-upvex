<!-- Modal -->
<div class="modal fade" id="langModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__("Add")}} {{__("Language")}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route(config('theme.rprefix').'.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-start">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>{{__('Short')}} {{__('Name')}}<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-1">
                                    :
                                </div>
                                <div class="col-md-7 ">
                                    <input type="text" name="title" class="form-control"
                                        placeholder="{{__('Language')}} {{__('Short')}} Code(Ex: en)">
                                    @if ($errors->has('title'))
                                    <div class="error text-danger">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-start mt-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>{{__('Language')}} {{__('Name')}}<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-1">
                                    :
                                </div>
                                <div class="col-md-7 ">
                                    <input type="text" name="lang_name" class="form-control"
                                        placeholder="{{__('Language')}} {{__('Name')}}(Ex: English)">
                                    @if ($errors->has('lang_name'))
                                    <div class="error text-danger">{{ $errors->first('lang_name') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-12 text-start mt-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>{{__('Status')}}</label>
                                </div>
                                <div class="col-md-1">
                                    :
                                </div>
                                <div class="col-md-7 ">
                                    <input type="radio" name="status" value="1">&nbsp;{{__('Active')}}&nbsp;
                                    <input type="radio" name="status" value="0">&nbsp;{{__('Inactive')}}
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>