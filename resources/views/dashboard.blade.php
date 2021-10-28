<!DOCTYPE html>
<html lang="en">
@section('title')
{{trans('main_trans.Main_title')}}
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">


    <!-- https://ashallendesign.co.uk/blog/setting-up-tailwind-css-in-laravel -->
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <!-- https://tailwindcss.com/docs/guides/laravel -->
    <!-- https://stackoverflow.com/questions/60357186/how-can-i-fix-error-npm-run-dev-in-laravel-6 -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->


    <!-- https://css.gg/
    <link href='https://css.gg/alarm.css' rel='stylesheet'> -->


    @include('layouts.head')
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

 <div id="pre-loader">
     <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
 </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title" >
                <div class="row">
                    <div class="col-sm-6" >
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">{{trans('main_trans.Dashboard_page')}}</h4>


                        <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Button With Tailwind
                        </button> -->

                        <!-- <i class="gg-alarm"></i> -->


                       
                        {!! $chart1->renderHtml() !!}


                        <div class="col-sm-12 col-md-4 col-md-offset-4">    
                            <div class="progress progress-micro mb-10">
                            <div class="progress-bar bg-indigo-400" style="width: {{$diskuse}}">
                                <span class="sr-only">{{$diskuse}}</span>
                            </div>
                            </div>
                            <span class="pull-right">{{round($diskusedize,2)}} GB /
                            {{round($disktotalsize,2)}} GB ({{$diskuse}})</span>       
                        </div>


                        
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}


</body>

</html>
