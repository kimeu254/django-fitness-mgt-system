@extends('layouts.base')

@section('header-content')

    <!-- Sidebar Start -->
    @include('sections.sidebar')
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include('sections.navbar')
        <!-- Navbar End -->

        <main class="container-fluid px-4 py-5">
            @yield('content')
        </main>

        <!-- Footer Start -->
        @include('sections.footer')
        <!-- Footer End -->
    </div>
    <!-- Content End -->

@endsection

