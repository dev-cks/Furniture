@extends('layouts.app')
@section('nav')
    <div class="rd-navbar-wrap" style="height: 77px">
        <nav class="rd-navbar rd-navbar-top-panel rd-navbar-light rd-navbar-static rd-navbar--is-stuck"
             data-lg-stick-up-offset="79px" data-md-device-layout="rd-navbar-fixed"
             data-lg-device-layout="rd-navbar-static" data-lg-auto-height="true" data-md-layout="rd-navbar-fixed"
             data-lg-layout="rd-navbar-static" data-lg-stick-up="true">
            <div class="container">
                <div class="rd-navbar-inner">

                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">

                        <!--Navbar Brand-->
                        <div class="rd-navbar-brand"><h2>Furniture</h2></div>
                    </div>
                    <div class="rd-navbar-menu-wrap">
                        <div class="rd-navbar-nav-wrap">
                            <div class="rd-navbar-mobile-scroll">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </div>

@endsection
@section('content')

    <section>
        <div class="swiper-bg-wrap swiper-style-1 swiper-jumbotron-outside">
            <div class="swiper-container swiper-slider swiper-bg swiper-height-1 swiper-container-horizontal swiper-container-fade"
                 data-autoplay="6500" data-slide-effect="fade" style="background-size: cover;">
                <img class="img-fluid" src="<?=asset('login.jpg');?>" alt="">

            </div>
            <div class="jumbotron-custom jumbotron-custom-variant-1 jumbotron-custom-outside">
                <div class="shell">
                    <div class="range range-sm-center range-sm-middle range-xl-justify spacing-55">
                        <div class="cell-sm-5 cell-md-5 context-dark">

                        </div>
                        <div class="cell-sm-6 cell-lg-5">
                            <div class="form-register-wrap">
                                <h4>Login Admin Account</h4>
                                <!-- RD Mailform-->
                                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact"
                                      method="post" action="bat/rd-mailform.php" novalidate="novalidate">
                                    <div class="form-group">
                                        <label class="form-label-outside" for="register-name">UserName</label>
                                        <input class="form-control form-control-has-validation form-control-last-child"
                                               id="login-name" type="text" name="name"
                                               data-constraints="@Required"><span class="form-validation"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label-outside" for="register-password">Password</label>
                                        <input class="form-control form-control-has-validation form-control-last-child"
                                               id="login-password" type="password" name="pass"
                                               data-constraints="@Required"><span class="form-validation"></span>
                                    </div>

                                    <button class="btn btn-primary btn-block btn-square" type="button" id="id-btn-submit">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js4event')



    <script language="javascript" type="text/javascript">
        $("#id-btn-submit").on("click", function (event) {
            event.preventDefault();
            var url;
            var name = $("#login-name").val();
            var password = $("#login-password").val();


            if(name == '') {
                toastr.error("Required user name");
                return;
            }

            if(password == '') {
                toastr.error("Required password");
                return ;
            }

            var url = '<?=url('/sign-in')?>';

            $.ajax({
                url:url,
                type:'get',
                data: {
                    name: name,
                    password: password
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if(response.status == false) {
                        toastr.error("Failed to login");
                    } else {
                        window.location.href = "{{url('/home')}}";
                    }
                },
                error: function () {
                    toastr.error("Failed to login");
                }
            });
//var image_change = $("#id-image-changed").val();


        });
    </script>
@endsection
