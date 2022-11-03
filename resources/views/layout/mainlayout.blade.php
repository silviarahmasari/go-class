<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
    @include('layout/css_global')
    @yield('custom_css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('layout/navbar')

      @include('layout/sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
          <div class="section-body">
          
            @yield('script')
          
        </section>
      </div>
      </div>
      @include('layout/footer')
    </div>
  </div>

@include('layout/js_global')
@yield('custom_script')
</body>



</html>
