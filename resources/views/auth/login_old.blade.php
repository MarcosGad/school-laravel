<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">

</head>

<body>

@if (App::getLocale() == 'ar')

@else
 <style>
    body{
      direction: ltr;
    }
    .f-left{
      float: left;
    }
    .M-t-30{
       margin-top: 30px !important;
    }
    .remember-checkbox label:before{
        left: 0;
    }
    .remember-checkbox label{
        padding-left: 25px;
    }
 </style>
@endif

    <div class="wrapper">

            <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            
                <ul class="nav navbar-nav ml-auto" style="margin: auto;">
                    <div class="btn-group mb-1">
                        <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (App::getLocale() == 'ar')
                        {{ LaravelLocalization::getCurrentLocaleName() }}
                        <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                        @else
                        {{ LaravelLocalization::getCurrentLocaleName() }}
                        <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                        @endif
                        </button>
                        <div class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                            @endforeach
                        </div>
                    </div>
                </ul>
            </nav>


        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        <!--=================================
 login-->

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            style="background-image: url(assets/images/login-bg.jpg);">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                    <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                        style="background-image: url(images/login-inner-bg.jpg);">
                        <div class="login-fancy">
                            <h2 class="text-white mb-20"></h2>
                            <p class="mb-20 text-white"></p>
                            <ul class="list-unstyled  pos-bot pb-30">
                                <li class="list-inline-item"><a class="text-white" href="#"> </a> </li>
                                <li class="list-inline-item"><a class="text-white" href="#"> </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <!-- <h3 class="mb-30">{{ trans('auth.sign_in') }}</h3> -->

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <input type="hidden" name="timezone" id="timezone">

                                <div class="section-field mb-20">
                                    <label class="mb-10 f-left" for="name">{{ trans('auth.E_mail') }}*</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="section-field mb-20">
                                    <label class="mb-10 f-left" for="Password">{{ trans('auth.password') }}*</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="section-field">
                                    <div class="remember-checkbox mb-30">
                                        <input class="f-left" type="checkbox" class="form-control" name="two" id="two" />
                                        <label for="two" class="f-left"> {{ trans('auth.remember_me') }}</label>
                                    </div>
                                </div>
                                <div style="clear: both;"></div>
                                <button class="button f-left M-t-30"><span>{{ trans('auth.login') }}</span><i class="fa fa-check"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
 login-->

    </div>
    <!-- jquery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';

    </script>

    <!-- chart -->
    <script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
    <!-- calendar -->
    <script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
    <!-- charts sparkline -->
    <script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
    <!-- charts morris -->
    <script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
    <!-- sweetalert2 -->
    <script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
    <!-- toastr -->
    @yield('js')
    <script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
    <!-- validation -->
    <script src="{{ URL::asset('assets/js/validation.js') }}"></script>
    <!-- lobilist -->
    <script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
    <!-- custom --> 
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

    
<!-- https://5balloons.info/dealing-with-user-timezone-in-laravel/ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>
<script>
        $( document ).ready(function() {
            $('#timezone').val(moment.tz.guess());
            console.log($('#timezone').val(moment.tz.guess()));
        });        
</script>

</body>
</html>
