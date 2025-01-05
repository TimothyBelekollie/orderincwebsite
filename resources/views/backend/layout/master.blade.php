<!DOCTYPE html><!--
    Template Name: Midone - Admin Dashboard Template
    Author: Left4code
    Website: http://www.left4code.com/
    Contact: muhammadrizki@left4code.com
    Purchase: https://themeforest.net/user/left4code/portfolio
    Renew Support: https://themeforest.net/user/left4code/portfolio
    License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
    -->
    <html xmlns="http://www.w3.org/1999/xhtml" class="opacity-0" lang="en"><!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="ceKdwoQjZ4VuoGqoSQaSREwB7MD9sjwFnfhlp7MH">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Order, Inc.">
        <meta name="keywords" content="Order, Inc">
        <meta name="author" content="LEFT4CODE">
        <title>Dashboard - Order, Inc</title>
        <!-- BEGIN: CSS Assets-->

        <link rel="stylesheet" href="{{asset('backend/dist/css/vendors/tippy.css')}}">
        <link rel="stylesheet" href="{{asset('backend/dist/css/vendors/litepicker.css')}}">
        <link rel="stylesheet" href="{{asset('backend/dist/css/vendors/tiny-slider.css')}}">
        <link rel="stylesheet" href="{{asset('backend/dist/css/themes/rubick/side-nav.css')}}">
        <link rel="stylesheet" href="{{asset('backend/dist/css/vendors/leaflet.css')}}">
        <link rel="stylesheet" href="{{asset('backend/dist/css/vendors/simplebar.css')}}">
        <link rel="stylesheet" href="{{asset('backend/dist/css/components/mobile-menu.css')}}">
        <link rel="stylesheet" href="{{asset('backend/dist/css/app.css')}}">

        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body>


        <div class="rubick px-5 sm:px-8 py-5 before:content-[''] before:bg-gradient-to-b before:from-theme-1 before:to-theme-2 dark:before:from-darkmode-800 dark:before:to-darkmode-800 before:fixed before:inset-0 before:z-[-1]">
            <!-- BEGIN: Mobile Menu -->
           @include('backend.component.mobile_menu')
            <!-- END: Mobile Menu -->
            <div class="mt-[4.7rem] flex md:mt-0">
                <!-- BEGIN: Side Menu -->
               @include('backend.component.navigation')
                <!-- END: Side Menu -->
                <!-- BEGIN: Content -->
                <div class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-slate-100 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">
                    <!-- BEGIN: Top Bar -->
                  @include('backend.component.top-bar')
                    <!-- END: Top Bar -->



                    @yield('backend')
                </div>
                <!-- END: Content -->
            </div>
        </div>
        <!-- BEGIN: Vendor JS Assets-->
@include('backend.component.script')
        <!-- END: Vendor JS Assets-->
        <!-- BEGIN: Pages, layouts, components JS Assets-->
        <!-- END: Pages, layouts, components JS Assets-->
    </body>
    </html>
