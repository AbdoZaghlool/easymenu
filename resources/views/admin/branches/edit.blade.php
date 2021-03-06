@extends('website.restaurants-layouts.master')


@section('title')
تعديل الفرع
@endsection

@section('styles')
<link rel="stylesheet" href="{{ URL::asset('admin/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('inner.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap-fileinput.css') }}">
@endsection

@section('page_header')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/home">لوحة التحكم</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="/admin/branches">الفروع</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>تعديل الفرع</span>
        </li>
    </ul>
</div>

<h1 class="page-title"> الفروع
    <small>تعديل الفرع</small>
</h1>
@endsection

@section('content')
@include('flash::message')

<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <form role="form" action="{{route('branches.update',$branch)}}" method="post">
                            <input type='hidden' name='_token' value='{{Session::token()}}'>
                            @method('put')
                            <div class="portlet-body">

                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        <div class="form-group">
                                            <label class="control-label"> هاتف الفرع </label>
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="هاتف الفرع" value="{{$branch->phone}}" />
                                            <strong> يجب ان يكون الهاتف بصيغة +96600000000</strong>
                                            @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> عنوان الفرع </label>
                                            <input type="text" name="address_ar" class="form-control"
                                                placeholder="أسم الفرع" value="{{$branch->address_ar}}" />
                                            @if ($errors->has('address_ar'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('address_ar') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"> عنوان الفرع بالانجليزية</label>
                                            <input type="text" name="address" class="form-control"
                                                placeholder="أسم الفرع" value="{{$branch->address}}" />
                                            @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                             <div class="form-group">
                                            <label>المدن</label>
                                            {!! Form::select('city_id',
                                            App\City::all()->pluck('name','id'),
                                            $branch->city_id,
                                            ['class'=> 'select2 form-control','placeholder'=>'']) !!}
                                            @if ($errors->has('city_id'))
                                            <span class="help-block">
                           <strong style="color: red;">{{ $errors->first('city_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                      <div class="form-group">
                                            <label for="password" class="control-label"> الرقم السري</label>
                                            <input type="passeord" id="password" name="password" class="form-control" />
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="margiv-top-10">
                                <div class="form-actions">
                                    <button type="submit" class="btn green" value="حفظ"
                                        onclick="this.disabled=true;this.value='تم الارسال, انتظر...';this.form.submit();">حفظ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ URL::asset('admin/js/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/components-select2.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/bootstrap-fileinput.js') }}"></script>

@endsection
