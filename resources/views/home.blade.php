@extends('layouts.app')
@section('nav')
    @include('layouts.admin_navbar')

@endsection
@section('content')

    <section>
        <div class="swiper-bg-wrap swiper-style-1 swiper-jumbotron-outside">
            <div class="swiper-container swiper-slider swiper-bg swiper-height-1 swiper-container-horizontal swiper-container-fade"
                 data-autoplay="6500" data-slide-effect="fade" style=" background-size: cover;">
                <img class="img-fluid" src="<?=asset('home.jpg');?>" alt="">

            </div>
            <div class="jumbotron-custom jumbotron-custom-variant-1 jumbotron-custom-outside">
                <div class="shell">
                    <div class="range range-sm-center range-sm-middle range-xl-justify spacing-55">
                        <div class="cell-sm-5 cell-md-5 context-dark">
                            <h2 style="color: crimson">Back Office Ready</h2>
                            <p style="color: aqua;">We have included all you may need to build an backoffice dooors settings. Start your successful business now!</p>

                        </div>
                        <div class="cell-sm-6 cell-lg-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
