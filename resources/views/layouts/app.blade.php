<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- style--}}
    @include('includes.style')
    <title>Body Repair</title>
  </head>
  <body>
    {{-- btn scroll and snap chat whatsapp--}}
    @include('includes.scroll-chat')
    {{-- navbar --}}
    @include('includes.navbar')
    {{-- content --}}
    @yield('content')
    {{-- footer --}}
    @include('includes.footer')
    @include('includes.script')
    @stack('addon-script')
  </body>
</html>
