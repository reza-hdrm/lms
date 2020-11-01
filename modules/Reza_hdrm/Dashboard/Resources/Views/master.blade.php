<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
@include('Dashboard::layout.head')
<body>
@include('Dashboard::layout.sidebar')
<div class="content">
    @include('Dashboard::layout.header')
    @include('Dashboard::layout.breadcrumb')
    <main class="main-content">
        @yield('content')
    </main>
</div>
</body>
@include('Dashboard::layout.footer')
</html>
