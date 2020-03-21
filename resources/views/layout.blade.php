<!DOCTYPE html>
<html lang="zxx">

@include('html.head')

<body>

@includeIf('html.header')

    <!-- Deal Of The Week Section Begin-->
    <section  >
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    <!-- Deal Of The Week Section End -->
   @includeFirst(['html.footer','footer'])

</body>

</html>
