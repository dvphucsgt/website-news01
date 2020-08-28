@extends('admin.layouts.master')
@section('title', 'Profiles')
@section('content')
    <div class="vd_container" style="min-height: 860px;">
        <div class="vd_content clearfix">
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel widget light-widget">
                            <div class="panel-heading no-title"></div>
                            <form class="form-horizontal" action="{{route('admin.update_profiles')}}" role="form"
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @if(count($profiles) > 0)
                                    <div class="panel-body">
                                        @foreach($profiles as $key => $val)
                                            <h2 class="mgbt-xs-20"> Profile: <span class="font-semibold"></span></h2>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-3 mgbt-xs-20">
                                                    <div class="form-group">
                                                        <div class="col-xs-12">
                                                            <div
                                                                class="form-img text-center mgbt-xs-15 p-fileup__item">

                                                                <div class="img_preview">
                                                                    @if($val->avatar != '' && file_exists(\App\Enums\Property\Upload::UploadPath.$val->avatar))
                                                                        <img src="/upload/{{ $val->avatar }}"/>
                                                                    @endif
                                                                </div>
                                                                <button class="p-btn__inline" type="button"
                                                                        onclick="return clickUploadFile(this);">Upload
                                                                    Image
                                                                </button>
                                                                <input type="file" class="img_select"
                                                                       name="user_profiles_image" hidden>
                                                                <input class="img_tmp" type="hidden"
                                                                       name="user_profiles_image_tmp"
                                                                       value="{{ old('user_profiles_image_tmp') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h3 class="mgbt-xs-15">Profile Setting</h3>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Full Name</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-xs-9">
                                                                    <input type="text"
                                                                           name="full_name"
                                                                           placeholder="Full Name"
                                                                           value="{{ $val->full_name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-xs-9">
                                                                <span class="vd_radio radio-info">
                                                                    <input type="radio" checked="" value="option3"
                                                                           id="optionsRadios3" name="optionsRadios2">
                                                                    <label for="optionsRadios3"> Male </label>
                                                                  </span>
                                                                    <span class="vd_radio  radio-danger">
                                                                    <input type="radio" value="option4"
                                                                           id="optionsRadios4" name="optionsRadios2">
                                                                    <label for="optionsRadios4"> Female </label>
                                                                  </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Birthday</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-xs-9">
                                                                    <input type="text" id="datepicker-normal"
                                                                           class="hasDatepicker">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Marital Status</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-xs-9">
                                                                    <select class="select__statusMarital">
                                                                        <option>Single</option>
                                                                        <option>Married</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">About</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-xs-9">
                                                                    <textarea rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h3 class="mgbt-xs-15">Contact Setting</h3>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Mobile Phone</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-xs-9">
                                                                    <input type="text" placeholder="Phone"
                                                                           name="phone"
                                                                           value="{{ $val->phone }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Facebook</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-xs-9">
                                                                    <input type="text" placeholder="facebook"
                                                                           name="facebook"
                                                                           value="{{ $val->facebook }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Google</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-xs-9">
                                                                    <input type="text" placeholder="google"
                                                                           name="google"
                                                                           value="{{ $val->google }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Twitter</label>
                                                        <div class="col-sm-9 controls">
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-xs-9">
                                                                    <input type="text" placeholder="twitter"
                                                                           name="twitter"
                                                                           value="{{ $val->twitter }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="panel-body">
                                        <h2 class="mgbt-xs-20"> Profile: <span class="font-semibold"></span></h2>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-3 mgbt-xs-20">
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-img text-center mgbt-xs-15 p-fileup__item">
                                                            <input name="user_profiles_id" type="hidden" value="">
                                                            <div class="img_preview"></div>
                                                            <button class="p-btn__inline" type="button"
                                                                    onclick="return clickUploadFile(this);">Upload Image
                                                            </button>
                                                            <input type="file" class="img_select"
                                                                   name="user_profiles_image" hidden>
                                                            <input class="img_tmp" type="hidden"
                                                                   name="user_profiles_image_tmp" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <h3 class="mgbt-xs-15">Profile Setting</h3>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Full Name</label>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row mgbt-xs-0">
                                                            <div class="col-xs-9">
                                                                <input type="text" name="full_name"
                                                                       placeholder="Full Name"
                                                                       value="{{ old('full_name') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Gender</label>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row mgbt-xs-0">
                                                            <div class="col-xs-9">
                                                                <span class="vd_radio radio-info">
                                                                    <input type="radio" checked="" value="option3"
                                                                           id="optionsRadios3" name="optionsRadios2">
                                                                    <label for="optionsRadios3"> Male </label>
                                                                  </span>
                                                                <span class="vd_radio  radio-danger">
                                                                    <input type="radio" value="option4"
                                                                           id="optionsRadios4" name="optionsRadios2">
                                                                    <label for="optionsRadios4"> Female </label>
                                                                  </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Birthday</label>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row mgbt-xs-0">
                                                            <div class="col-xs-9">
                                                                <input type="text" id="datepicker-normal"
                                                                       class="hasDatepicker">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Marital Status</label>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row mgbt-xs-0">
                                                            <div class="col-xs-9">
                                                                <select class="select__statusMarital">
                                                                    <option>Single</option>
                                                                    <option>Married</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">About</label>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row mgbt-xs-0">
                                                            <div class="col-xs-9">
                                                                <textarea rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h3 class="mgbt-xs-15">Contact Setting</h3>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Mobile Phone</label>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row mgbt-xs-0">
                                                            <div class="col-xs-9">
                                                                <input type="text" placeholder="Phone"
                                                                       name="phone"
                                                                       value="{{ old('phone') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Facebook</label>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row mgbt-xs-0">
                                                            <div class="col-xs-9">
                                                                <input type="text" placeholder="facebook"
                                                                       name="facebook"
                                                                       value="{{ old('facebook') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Google</label>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row mgbt-xs-0">
                                                            <div class="col-xs-9">
                                                                <input type="text" placeholder="google"
                                                                       name="google"
                                                                       value="{{ old('google') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Twitter</label>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row mgbt-xs-0">
                                                            <div class="col-xs-9">
                                                                <input type="text" placeholder="twitter"
                                                                       name="twitter"
                                                                       value="{{ old('twitter') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="pd-20">
                                    <button class="btn vd_btn vd_bg-green col-md-offset-3" type="submit">
                                        <span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
