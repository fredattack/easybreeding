@extends('frontend.layouts.adminPressHorizontalAuth')

@section('title', app_name() . ' | '.(__('navs.general.login')))

@section('content')
    <section id="wrapper">
        @php( $x=DIRECTORY_SEPARATOR)
        <div class="login-register" style="background-image:url({{URL::asset('/images/background/login-bg.jpg')}}">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" method="post" action="{{route('frontend.auth.login.post')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{--<h3 class="box-title m-b-20">@lang('labels.frontend.auth.signIn')</h3>--}}
                        <div class="form-group ">
                            <div class="col-xs-12">
                                {{ html()  ->email('email')
                                           ->class('form-control')
                                           ->placeholder(__('validation.attributes.frontend.email'))
                                           ->attribute('maxlength', 191)
                                           ->required() }}
                                {{--<input class="form-control" type="text" required="" placeholder="Username"> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
                                {{--<input class="form-control" type="password" required="" placeholder="Password"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 font-14">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    {{--<div class="checkbox">--}}
                                        {{--{{ html()->label(html()->checkbox('remember', true, 1) . ' ' . __('labels.frontend.auth.remember_me'))->for('remember') }}--}}
                                    {{--</div>--}}

                                    <input id="checkbox-signup" type="checkbox" name="remember" id="remember">
                                    <label for="checkbox-signup">{{__('labels.frontend.auth.remember_me')}} </label>
                                </div>
                                <br/>
                                <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i>{{ __('labels.frontend.passwords.forgot_password') }}</a>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">@lang('labels.frontend.auth.signIn')</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social">
                                    <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                    <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>@lang('labels.frontend.auth.noAccount') <a href="pages-register.html" class="text-info m-l-5"><b>@lang('labels.frontend.auth.signUp')</b></a></div>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" method="post" action="{{route('frontend.auth.password.email.post') }}">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>{{ __('labels.frontend.passwords.reset_password_button') }}</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                {{ html()->email('email')
                                       ->class('form-control')
                                       ->placeholder(__('validation.attributes.frontend.email'))
                                       ->attribute('maxlength', 191)
                                       ->required()
                                       ->autofocus() }}
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
