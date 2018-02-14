@extends('frontend.layouts.adminPressHorizontalAuth')

@section('title', app_name() . ' | '.__('labels.frontend.passwords.reset_password_box_title'))

@section('content')
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{URL::asset('storage/images/recoverPass.jpg')}}">
            <div class="login-box card">
                <div class="card-body">
                    {{ html()->form('POST', route('frontend.auth.password.reset'))->class('form-horizontal')->open() }}
                    {{ html()->hidden('token', $token) }}
                        <h3 class="box-title m-b-20">{{ __('labels.frontend.passwords.reset_password_box_title') }}</h3>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="form-group">
                            <div class="col-xs-12">
                                {{ html()->email('email')
                                          ->class('form-control')
                                          ->placeholder(__('validation.attributes.frontend.email'))
                                          ->attribute('maxlength', 191)
                                          ->required() }}
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            {{ html()->password('password')
                                         ->class('form-control')
                                         ->placeholder(__('validation.attributes.frontend.password'))
                                         ->required() }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            {{ html()->password('password_confirmation')
                                       ->class('form-control')
                                       ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                       ->required() }}
                        </div>
                    </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{__('labels.frontend.passwords.reset_password_button')}}</button>
                            </div>
                        </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>

    </section>




    {{--<div class="row justify-content-center align-items-center">--}}
        {{--<div class="col col-sm-6 align-self-center">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">--}}
                    {{--<strong>--}}
                        {{--{{ __('labels.frontend.passwords.reset_password_box_title') }}--}}
                    {{--</strong>--}}
                {{--</div><!--card-header-->--}}

                {{--<div class="card-body">--}}

                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--{{ html()->form('POST', route('frontend.auth.password.reset'))->class('form-horizontal')->open() }}--}}
                        {{--{{ html()->hidden('token', $token) }}--}}

                        {{--<div class="row">--}}
                            {{--<div class="col">--}}
                                {{--<div class="form-group">--}}
                                    {{--{{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}--}}

                                    {{--{{ html()->email('email')--}}
                                        {{--->class('form-control')--}}
                                        {{--->placeholder(__('validation.attributes.frontend.email'))--}}
                                        {{--->attribute('maxlength', 191)--}}
                                        {{--->required() }}--}}
                                {{--</div><!--form-group-->--}}
                            {{--</div><!--col-->--}}
                        {{--</div><!--row-->--}}

                        {{--<div class="row">--}}
                            {{--<div class="col">--}}
                                {{--<div class="form-group">--}}
                                    {{--{{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}--}}

                                    {{--{{ html()->password('password')--}}
                                        {{--->class('form-control')--}}
                                        {{--->placeholder(__('validation.attributes.frontend.password'))--}}
                                        {{--->required() }}--}}
                                {{--</div><!--form-group-->--}}
                            {{--</div><!--col-->--}}
                        {{--</div><!--row-->--}}

                        {{--<div class="row">--}}
                            {{--<div class="col">--}}
                                {{--<div class="form-group">--}}
                                    {{--{{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}--}}

                                    {{--{{ html()->password('password_confirmation')--}}
                                        {{--->class('form-control')--}}
                                        {{--->placeholder(__('validation.attributes.frontend.password_confirmation'))--}}
                                        {{--->required() }}--}}
                                {{--</div><!--form-group-->--}}
                            {{--</div><!--col-->--}}
                        {{--</div><!--row-->--}}

                        {{--<div class="row">--}}
                            {{--<div class="col">--}}
                                {{--<div class="form-group mb-0 clearfix">--}}
                                    {{--{{ form_submit(__('labels.frontend.passwords.reset_password_button')) }}--}}
                                {{--</div><!--form-group-->--}}
                            {{--</div><!--col-->--}}
                        {{--</div><!--row-->--}}
                    {{--{{ html()->form()->close() }}--}}
                {{--</div><!-- card-body -->--}}
            {{--</div><!-- card -->--}}
        {{--</div><!-- col-6 -->--}}
    {{--</div><!-- row -->--}}
@endsection
