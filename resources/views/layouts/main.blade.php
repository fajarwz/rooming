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
      @include('includes.main.sidebar')
      <div class="main-panel">
          @include('includes.main.navbar')

          <div class="main-content">
            <section class="section">
              <div class="section-header">
                <h1>@yield('header-title')</h1>
                <div class="section-header-breadcrumb">

                  @yield('breadcrumbs')
                  
                </div>
              </div>
          
              <div class="section-body">
                @if(View::hasSection('section-title'))
                  <h2 class="section-title">@yield('section-title')</h2>
                @endif

                @if(View::hasSection('section-lead'))
                  <p class="section-lead">
                      @yield('section-lead')
                  </p>
                @endif
          
                @yield('content')
                
              </div>
            </section>
          </div>    

          @include('includes.main.footer')
      </div>
    </div>
  </div>
</body>

@stack('before-script')
@include('includes.main.script')
@stack('after-script')

</html>