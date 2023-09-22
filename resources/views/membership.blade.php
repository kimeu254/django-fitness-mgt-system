@extends('layouts.main')

@section('title','Request Membership Today!')

@section('content')
    <!-- Page Title Section Start -->
    <div class="page-title-section section" data-overlay="0.7" data-bg-image="assets/images/bg/breadcrumb-about.jpg">
        <div class="page-title pt-lg-10 pt-10">
            <div class="container">
                <h1 class="title">Request Membership</h1>
            </div>
        </div>
    </div>
    <!-- Page Title Section End -->

    <!-- Calculate Section Start  -->
    @include('sections.membership-section')
    <!-- Calculate Section End  -->
@endsection
