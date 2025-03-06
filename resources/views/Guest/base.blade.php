<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>HOPE</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300&display=swap" rel="stylesheet">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">

    <link href="{{asset('css/magnific-popup.css')}}" rel="stylesheet">

    <link href="{{asset('css/tooplate-tween-agency.css')}}" rel="stylesheet">

    @livewireStyles

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/aos/aos.css')}}">

</head>



<body>



@include('Guest.header')


@yield('content')

<footer class="site-footer">

    <div class="container">
        <div class="row">

            {{--<div class="col-lg-5 col-12 me-auto mb-4">
                <h5 class="text-white mb-3">Newsletter</h5>

                <form class="custom-form subscribe-form mt-4" role="form">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-7">
                            <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Your email address" required="">
                        </div>

                        <div class="col-lg-4 col-md-4 col-5">
                            <button type="submit" class="form-control" id="subscribe">Subscribe</button>
                        </div>

                    </div>
                </form>
            </div>--}}


            <div class="site-footer-bottom mt-5">
                <div class="row pt-4">
                    <div class="col-lg-6 col-12">
                        <p class="copyright-text tooplate-link">Copyright © {{date('Y')}} HOPE</p>

                        <p class="large-paragraph">
                            <br><a  href="https://www.linkedin.com/in/marc-aur%C3%A9lien-djiepmo-642051336" >Plateforme réalisée par : Djiepmo Marc</a>

                        </p>
                    </div>

                    <div class="col-lg-3 col-12 ms-auto">
                        <ul class="social-icon">
                            <li><a href="https://www.facebook.com/share/15uBaaEqe8/?mibextid=wwXIfr" class="social-icon-link bi-facebook"></a></li>

                          {{--  <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-linkedin"></a></li>--}}

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

</footer>

</body>


<!-- JAVASCRIPT FILES -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.backstretch.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/magnific-popup-options.js')}}"></script>
<script src="{{asset('js/click-scroll.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
@livewireScripts
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/aos/aos.js')}}"></script>
<script>

    AOS.init();
</script>
</html>
