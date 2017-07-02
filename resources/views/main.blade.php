<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials/_head')
</head>


  <body>

      @include('partials/_nav')

    <!-- Default Bootstrap Navbar -->

    <div class="container">
      @include('partials/_messages')


      @yield('content')

    @include('partials/_footer')

    </div>
    <!-- end of .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    @include('partials/_javascript')
  </body>

</html>
