<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{mix('css/app.css')}}">
@yield('styles')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LaraBBS') - {{ setting('site_name', 'Laravel 进阶教程') }}</title>
    <meta name="description" content="@yield('description', setting('seo_description', 'LaraBBS 爱好者社区。'))" />
    <meta name="keyword" content="@yield('keyword', setting('seo_keyword', 'LaraBBS,社区,论坛,开发者论坛'))" />

    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>

<body>
    @if (config('app.debug'))
    @include('sudosu::user-selector')
    @endif
    <div id="app" class="{{route_class() }}-page">
        @include('layouts._header')
        <div class="container">
            @include('shared._messages')
            @yield('content')
        </div>
        @include('layouts._footer')
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    @yield('scripts')
</body>

</html>