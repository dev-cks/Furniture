@extends('layouts.app')
@section('nav')
    @include('layouts.admin_navbar')

@endsection
@section('content')

    <section>
        <div class="swiper-bg-wrap swiper-style-1 swiper-jumbotron-outside">
            <div class="swiper-container swiper-slider swiper-bg swiper-height-1 swiper-container-horizontal swiper-container-fade"
                 data-autoplay="6500" data-slide-effect="fade" style="background-color:#f1f1f1; background-size: cover;">

            </div>
            <div class="jumbotron-custom jumbotron-custom-variant-1 jumbotron-custom-outside">
                <div class="shell">
                    <div class="range range-sm-center range-sm-middle range-xl-justify spacing-55">
                        <div class="cell-sm-1 cell-md-1 context-dark">

                        </div>
                        <div class="cell-sm-6 cell-lg-5">
                            <div class="form-register-wrap">
                                <h4>Price Settings</h4>
                                <!-- RD Mailform-->
                                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact"
                                      method="post" action="price/change" novalidate="novalidate">
                                    <div class="form-group">
                                        <label class="form-label-outside" for="register-name">Door Left</label>
                                        <input class="form-control form-control-has-validation form-control-last-child"
                                               id="left" type="number" name="left" value="{{$price->price_left}}"
                                               data-constraints="@Required"><span class="form-validation"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label-outside" for="register-password">Door Right</label>
                                        <input class="form-control form-control-has-validation form-control-last-child"
                                               id="right" type="number" name="right" value="{{$price->price_right}}"
                                               data-constraints="@Required"><span class="form-validation"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label-outside" for="register-password">Drawer</label>
                                        <input class="form-control form-control-has-validation form-control-last-child"
                                               id="drawer" type="number" name="drawer" value="{{$price->price_drawer}}"
                                               data-constraints="@Required"><span class="form-validation"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label-outside" for="register-password">Empty Compartment</label>
                                        <input class="form-control form-control-has-validation form-control-last-child"
                                               id="empty" type="number" name="empty" value="{{$price->price_empty}}"
                                               data-constraints="@Required"><span class="form-validation"></span>
                                    </div>


                                    <button class="btn  btn-block btn-square" type="button" id="id-btn-restore">Restore Active</button>
                                    <button class="btn  btn-block btn-square" type="button" id="id-btn-temp">Save to temp</button>
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

        $("#id-btn-restore").on("click", function (event) {
            var url = '<?=url('ajax/price/restore')?>';
            $.ajax({
                url:url,
                type:'post',
                data: {
                },
                dataType: "json",
                success: function (response) {
                    if(response.status == false) {
                        toastr.error("Failed to save");
                    } else {
                        var price = response.price;
                        console.log(price);
                        console.log(price.price_left);
                        $("#left").val(price.price_left);
                        $("#right").val(price.price_right);
                        $("#drawer").val(price.price_drawer);
                        $("#empty").val(price.price_empty);
                        toastr.success("Successfully to save");
                    }
                },
                error: function (err) {
                    console.log(err);
                    toastr.error("Failed to save");
                }
            });
        });

        $("#id-btn-temp").on("click", function (event) {
            temp_left = $("#left").val();
            temp_right = $("#right").val();
            temp_drawer = $("#drawer").val();
            temp_empty = $("#empty").val();

            event.preventDefault();
            var url;
            var left = temp_left;
            var right = temp_right;
            var drawer = temp_drawer;
            var empty = temp_empty;

            var url = '<?=url('ajax/price/save')?>';

            $.ajax({
                url:url,
                type:'post',
                data: {
                    left: left,
                    right: right,
                    drawer: drawer,
                    empty: empty
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if(response.status == false) {
                        toastr.error("Failed to save");
                    } else {
                        active_left = temp_left;
                        active_right = temp_right;
                        active_drawer = temp_drawer;
                        active_empty = temp_empty;
                        toastr.success("Successfully to save");
                    }
                },
                error: function (err) {
                    console.log(err);
                    toastr.error("Failed to save");
                }
            });
        });

    </script>
@endsection
