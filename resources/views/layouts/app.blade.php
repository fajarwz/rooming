<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    
  <title>@yield('title')</title>

  @stack('before-style')
  @include('includes.main.style')
  @stack('after-style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
        @yield('content')
    </div>
  </div>
</body>

@stack('before-script')
@include('includes.main.script')
@stack('after-script')

</html>