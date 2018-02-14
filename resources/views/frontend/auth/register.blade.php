@extends('frontend.layouts.adminPressHorizontalAuth')

@section('title', app_name() . ' | '.(__('navs.general.register')))

@section('content')
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{URL::asset('storage/images/registerBackground.jpg')}}">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="{{route('frontend.auth.register.post')}}" method="post">
                        <h3 class="box-title m-b-20">Sign Up</h3>
                        <div class="form-group">
                            <div class="col-xs-12">
                                {{ html()->text('first_name')
                                         ->class('form-control')
                                         ->placeholder(__('validation.attributes.frontend.first_name'))
                                         ->attribute('maxlength', 191) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                {{ html()->text('last_name')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.last_name'))
                                        ->attribute('maxlength', 191) }}
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                            </div>
                        </div>
                        <div class="form-group ">
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

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-success">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                                </div>
                            </div>
                        </div>
                        @if (config('access.captcha.registration'))
                            <div class="row">
                                <div class="col">
                                    {!! Captcha::display() !!}
                                    {{ html()->hidden('captcha_status', 'true') }}
                                </div><!--col-->
                            </div><!--row-->
                        @endif
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{__('labels.frontend.auth.register_button')}}</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>Already have an account? <a href="pages-login.html" class="text-info m-l-5"><b>Sign In</b></a></div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                {!! $socialiteLinks !!}
                            </div>
                        </div><!--/ .col -->
                    </div><!-- / .row -->
                </div>
            </div>
        </div>
    </section>
@endsection
