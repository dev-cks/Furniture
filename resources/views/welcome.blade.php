@extends('layouts.app')

@section('nav')
    @if($preview == false)
        <div class="rd-navbar-wrap" style="height: 90px;">
            @include('layouts.navbar')
        </div>
    @else
        @include('layouts.admin_navbar')
    @endif

@endsection

@section('css4page')
    <style>
        body {
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        button {
            margin-left: 10px;
            margin-bottom: 10px;
        }

        .slider {
            writing-mode: horizontal-tb; /* IE */
            -webkit-appearance: slider-horizontal; /* WebKit */
            position: static;
        }

        .custom-control-label {
        }


        #ex1Slider .slider-selection {
            background: #BABABA;
        }

        .slidecontainer {
            width: 100%;
        }


        #webgl-container {
            height: 800px;
        }

        .slider-parent {
            position: relative;
            text-align: left;
            margin-top: 45px;
            margin-left: 20px;
            display: flex;
            align-items: center;
        }

        .radio-parent {
            position: relative;
            width: fit-content;
            text-align: left;
            margin-top: 15px;
            margin-left: 20px;
            display: flex;
            align-items: center;
        }

        .radio-sub {
            white-space: nowrap;
            max-width: 100%;
            overflow: auto;
            display: flex;
        }

        .container {
            width: 1500px;
            max-width: 1500px;
        }

        .rounded-circle {
            width: 40px;
            height: 40px;
        }

        input[type='radio'] {
            margin-left: 10px;
        }

        .d-inline-block {
            margin-right: 20px;
        }

        .title-slider {
            width: 130px;
        }

        .modal {
            margin-top: 200px;
        }

        .door {
            margin-left: 20px;
        }

        .round-border {
            border: solid 2px blue;
        }

        .round-border1 {
            border: solid 2px blue;
        }

        .radio-thick {
            margin-left: 5px;
        }

        .btn {
            margin-top: 0px !important;
        }


        output {
            position: absolute;
            padding-top: 3px !important;
            background-image: linear-gradient(#444444, #999999);
            width: 60px;
            height: 30px;
            text-align: center;
            color: white;
            border-radius: 10px;
            display: inline-block;
            font: bold 15px/30px Georgia;
            bottom: 125%;
            left: 0;
            margin-left: -1%;
        }

        output:after {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border-top: 10px solid #999999;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            margin-top: -1px;
        }

        span.custom-radio {
            width: 40px;
        }


        .slider::-ms-track {
            /*example */
            -webkit-appearance: none;
            writing-mode: horizontal-tb;
            width: 150px !important;
            height: 20px;
            border-radius: 10px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-ms-fill-upper {
            background: #d3d3d3;
            border-radius: 10px;
        }

        .slider::-ms-fill-lower {
            background: #d3d3d3;
            border-radius: 10px;
        }

        .slider {
            -webkit-appearance: none;
            width: 150px !important;
            height: 20px;
            border-radius: 10px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

        span.custom-radio {
            line-height: 40px;
        }

        .select-filter {
            border: 1px solid #999999 !important;
        }

        .shipping-location {
            margin-top: 15px;
        }

        .shipping-assembly {
            margin-top: 15px;
        }

        .display_none {
            display: none !important;
        }


    </style>
@endsection

@section('content')
    <main class="page-content">
        <div class="section-relative">
            <section class="section-bottom-98 section-top-34 section-lg-bottom-110 section-lg-top-66">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div id="webgl-container">
                            </div>
                        </div>
                        <div class="col-md-4" style="height: 800px; overflow: scroll">
                            <div class="setting-container" style="height: 1200px; margin-top: 50px">
                                <div class="slider-parent">
                                    <label class="title-slider" for="slider1">
                                        Length:
                                    </label>
                                    <input class="slider original door-content-data" id="slider1" name="length">
                                    <output for="length" onforminput="value = length.valueAsNumber;"></output>

                                </div>
                                <div class="slider-parent">
                                    <label class="title-slider" for="slider2">
                                        Height:
                                    </label>
                                    <input class="slider original door-content-data" id="slider2" name="height">
                                    <output for="height" onforminput="value = height.valueAsNumber;"></output>
                                </div>
                                <div class="slider-parent">
                                    <label class="title-slider" for="slider4">
                                        Density-Length:
                                    </label>
                                    <input class="slider density door-content-data" id="slider4" name="destiny_length">
                                    <output for="destiny_length"
                                            onforminput="value = destiny_length.valueAsNumber;"></output>
                                </div>
                                <div class="slider-parent">
                                    <label class="title-slider" for="slider3">
                                        Destiny-Height:
                                    </label>
                                    <input class="slider density door-content-data" id="slider3" name="destiny_height">
                                    <output for="destiny_height"
                                            onforminput="value = destiny_height.valueAsNumber;"></output>
                                </div>
                                <div class="slider-parent">
                                    <label class="title-slider" for="slider5">
                                        Shelf-Depth:
                                    </label>
                                    <input class="slider depth door-content-data" id="slider5" name="shelf_depth">
                                    <output for="shelf_depth" onforminput="value = shelf_depth.valueAsNumber;"></output>
                                </div>
                                <div class="radio-parent">
                                    <label class="title-slider">
                                        Door-Space:
                                    </label>
                                    <div class="radio-sub">
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input class="custom-control-input door-content-data" id="customRadioSpace1"
                                                   name="input-space-radio" value="0" type="radio">
                                            <label class="custom-control-label" for="customRadioSpace1">0 mm</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input class="custom-control-input door-content-data" id="customRadioSpace2"
                                                   name="input-space-radio" value="0.02" type="radio">
                                            <label class="custom-control-label" for="customRadioSpace2">2 mm</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input class="custom-control-input door-content-data" id="customRadioSpace3"
                                                   name="input-space-radio" value="0.05" type="radio">
                                            <label class="custom-control-label" for="customRadioSpace3">5 mm</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="radio-parent" style="display: flex">
                                    <label class="title-slider ">
                                        Inside-Thick:
                                    </label>
                                    <div class="radio-sub" style="display: contents;">

                                        <div class="custom-radio d-inline-block">
                                            <img id="inside-image" class="rounded-circle  d-block mx-auto"
                                                 src="<?=asset('image') . '/' . $inner[0]->img;?>" alt="">
                                        </div>
                                        <span class="custom-radio d-inline-block" id="inside-thickness">
                                <?=$inner[0]->thickness;?> mm
                            </span>
                                        <div class="custom-radio d-inline-block">
                                            <button type="button" class="btn btn-primary btn-sm" id="btn-change-inside">
                                                Change
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <div class="radio-parent" style="display: flex">
                                    <label class="title-slider ">
                                        Outside-Thick:
                                    </label>
                                    <div class="radio-sub" style="display: contents;">

                                        <div class="custom-radio d-inline-block">
                                            <img id="outside-image" class="rounded-circle  d-block mx-auto"
                                                 src="<?=asset('image') . '/' . $outer[0]->img;?>" alt="">
                                        </div>
                                        <span class="custom-radio d-inline-block" id="outside-thickness">
                                <?=$outer[0]->thickness;?> mm
                            </span>
                                        <div class="custom-radio d-inline-block">
                                            <button type="button" class="btn btn-primary btn-sm" id="btn-change-outside">
                                                Change
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <div class="radio-parent" style="display: flex">
                                    <label class="title-slider ">
                                        Door-Thick:
                                    </label>
                                    <div class="radio-sub" style="display: contents;">

                                        <div class="custom-radio d-inline-block">
                                            <img id="door-image" class="rounded-circle  d-block mx-auto"
                                                 src="<?=asset('image') . '/' . $door[0]->img;?>" alt="">
                                        </div>
                                        <span class="custom-radio d-inline-block" id="door-thickness">
                                <?=$door[0]->thickness;?> mm
                            </span>
                                        <div class="custom-radio d-inline-block">
                                            <button type="button" class="btn btn-primary btn-sm" id="btn-change-door">
                                                Change
                                            </button>
                                        </div>

                                    </div>
                                </div>

                                <div class="radio-parent" style="display: flex">
                                    <label class="title-slider">
                                        Drawer-Thick:
                                    </label>
                                    <div class="radio-sub" style="display: contents;">

                                        <div class="custom-radio d-inline-block">
                                            <img id="drawer-image" class="rounded-circle  d-block mx-auto"
                                                 src="<?=asset('image') . '/' . $drawer[0]->img;?>" alt="">
                                        </div>
                                        <span class="custom-radio d-inline-block" id="drawer-thickness">
                                <?=$drawer[0]->thickness;?> mm
                            </span>
                                        <div class="custom-radio d-inline-block">
                                            <button type="button" class="btn btn-primary btn-sm" id="btn-change-drawer">
                                                Change
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <div class="radio-parent" style="display: flex">
                                    <label class="title-slider ">
                                        Compartment Width:
                                    </label>
                                    <h6 id="compart_width">0</h6>

                                </div>
                                <div class="radio-parent" style="display: flex">
                                    <label class="title-slider ">
                                        Compartment Height:
                                    </label>
                                    <h6 id="compart_height">0</h6>

                                </div>
                                <div class="radio-parent" style="display: flex">
                                    <label class="title-slider ">
                                        Price:
                                    </label>
                                    <h6 id="total_price">0</h6>

                                </div>

                                <div class="shipping-location">
                                    <div class="radio-parent" style="display: flex">
                                        <label class="title-slider ">
                                            Shipping Location:
                                        </label>
                                        <div class="radio-sub" style="display: contents;">
                                            <div class="custom-radio d-inline-block">
                                                <div class="form-group">
                                                    <select class="form-control select-filter "
                                                            data-placeholder="Select an option"
                                                            data-minimum-results-for-search="Infinity" tabindex="-1" id="shpping_location_select"
                                                            aria-hidden="true">
                                                        <option value="0">Select Location</option>
                                                        @foreach($locations as $index_location => $location)
                                                            <option value="<?=$location->id;?>"><?=$location->name;?></option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="shipping-assembly display_none" id="shipping_assembly">
                                        <div class="radio-parent" style="display: flex">
                                            <label class="title-slider ">
                                                Assembly:
                                            </label>
                                            <div class="radio-sub">
                                                <div class="custom-control custom-radio d-inline-block" id="ship_default_parent0">
                                                    <input class="custom-control-input door-content-data" id="ship_default0"
                                                           name="input-ship-default-radio" value="0" type="radio">
                                                    <label class="custom-control-label" for="ship_default0"><div>SHIPPING FOR</div> <div>SHELF ASSEMBLY</div></label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block" id="ship_default_parent1">
                                                    <input class="custom-control-input door-content-data" id="ship_default1"
                                                           name="input-ship-default-radio" value="1" type="radio">
                                                    <label class="custom-control-label" for="ship_default1"><div>SHIPPING </div><div>ASSEMBLED</div></label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block" id="ship_default_parent2">
                                                    <input class="custom-control-input door-content-data" id="ship_default2"
                                                           name="input-ship-default-radio" value="2" type="radio">
                                                    <label class="custom-control-label" for="ship_default2"><div>SHIPPING WITH </div><div>ON THE ASSEMBLY</div></label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="radio-parent" style="display: flex">
                                            <label class="title-slider ">
                                                Shipping Assembly Price:
                                            </label>
                                            <h6 id="shipping_price">0</h6>

                                        </div>
                                        <div class="radio-parent" style="display: flex">
                                            <label class="title-slider ">
                                                Total Price:
                                            </label>
                                            <h6 id="shipping_total_price">0</h6>
                                            <button type="button" class="btn btn-primary btn-sm"
                                                    id="btn-order" style="margin-left: 40px">Order Now
                                            </button>

                                        </div>
                                    </div>


                                </div>
                            </div>



                        </div>
                    </div>


                </div>


            </section>
        </div>
    </main>



    <input type="hidden" value="{{$json_content}}" id="id-store-content">
    <input type="hidden" id="shipping_basic_price" value="0">
    <input type="hidden" id="shipping_volume_price" value="0">








@endsection

@section('modal')
    <div class="modal fade in" id="id-modal" tabindex="-1" role="dialog" aria-labelledby="Quiz" aria-hidden="true">
        <form method="post" enctype="multipart/form-data" id="id-user-form">
            {{csrf_field()}}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="id-modal-title">Detail information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label" for="id-email"> Email: </label>
                            <input type="email" class="form-control" id="id-email" name="email">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-title"> Title: </label>
                            <input type="text" class="form-control" name="title" id="id-title">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="id-comment"> Comment: </label>
                            <textarea type="text" class="form-control" name="comment" id="id-comment"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-info" id="id-btn-submit">
                            Send
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <div class="modal fade in" id="id-modal-type" tabindex="-1" role="dialog" aria-labelledby="Quiz" aria-hidden="true">
        <form method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="">Select type of door</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" id="customRadio1" name="type_door" value="1"
                                       type="radio">
                                <label class="custom-control-label" for="customRadio1"><strong
                                        class="door">Left</strong></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" id="customRadio2" name="type_door" value="2"
                                       type="radio">
                                <label class="custom-control-label" for="customRadio2"><strong
                                        class="door">Right</strong></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" id="customRadio3" name="type_door" value="3"
                                       type="radio">
                                <label class="custom-control-label" for="customRadio3"><strong
                                        class="door">Draw</strong></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" id="customRadio4" name="type_door" value="0"
                                       type="radio">
                                <label class="custom-control-label" for="customRadio4"><strong
                                        class="door">None</strong></label>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-info" id="id-btn-type-submit">
                            Select
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade in" id="id-modal-material" tabindex="-1" role="dialog" aria-labelledby="Material"
         aria-hidden="true">
        <form method="post" enctype="multipart/form-data" id="id-user-form">
            {{csrf_field()}}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="id-modal-material-title">Door Material and Thickness</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="radio-parent">
                                <label class="title-slider">
                                    Material:
                                </label>
                                <div class="radio-sub" id="inner_material_modal">
                                    @foreach($inner as $index => $material)
                                        <div class="custom-radio d-inline-block">
                                            <img class="rounded-circle img-fluid d-block mx-auto material-image"
                                                 material-thickness="<?=$material->thickness;?>"
                                                 src="<?=asset('image') . '/' . $material->img;?>" alt=""
                                                 material-id="<?=$material->id;?>">
                                            <p class="center" style="text-align: center"><?=$material->thickness;?>
                                                mm</p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="radio-sub" id="outer_material_modal">
                                    @foreach($outer as $index => $material)
                                        <div class="custom-radio d-inline-block">
                                            <img class="rounded-circle img-fluid d-block mx-auto material-image"
                                                 material-thickness="<?=$material->thickness;?>"
                                                 src="<?=asset('image') . '/' . $material->img;?>" alt=""
                                                 material-id="<?=$material->id;?>">
                                            <p class="center" style="text-align: center"><?=$material->thickness;?>
                                                mm</p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="radio-sub" id="door_material_modal">
                                    @foreach($door as $index => $material)
                                        <div class="custom-radio d-inline-block">
                                            <img class="rounded-circle img-fluid d-block mx-auto material-image"
                                                 material-thickness="<?=$material->thickness;?>"
                                                 src="<?=asset('image') . '/' . $material->img;?>" alt=""
                                                 material-id="<?=$material->id;?>">
                                            <p class="center" style="text-align: center"><?=$material->thickness;?>
                                                mm</p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="radio-sub" id="drawer_material_modal">
                                    @foreach($drawer as $index => $material)
                                        <div class="custom-radio d-inline-block">
                                            <img class="rounded-circle img-fluid d-block mx-auto material-image"
                                                 material-thickness="<?=$material->thickness;?>"
                                                 src="<?=asset('image') . '/' . $material->img;?>" alt=""
                                                 material-id="<?=$material->id;?>">
                                            <p class="center" style="text-align: center"><?=$material->thickness;?>
                                                mm</p>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-info" id="id-btn-material-submit">
                            Change
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection



@section('js4event')



    <script language="javascript" type="text/javascript">


        var elements_legnths = document.getElementsByClassName("original");
        const length_min = 2;
        const default_length = 9;
        const default_height = 15;
        const default_step = 0.1;
        const max_height = 18;
        const max_length = 12;
        const max_width = 10;
        const min_percent = 0;
        const max_percent = 100;
        const default_percent = 50;
        const step_percent = 1;

        for (var i = 0; i < elements_legnths.length; i++) {
            var elements_legnth = elements_legnths[i];
            elements_legnth.setAttribute('type', 'range');
            elements_legnth.min = length_min;
            elements_legnth.max = max_length;
            elements_legnth.orientation = "horizontal";
            elements_legnth.step = default_step;
            if (elements_legnth.id == "slider1") {
                elements_legnth.value = default_length;
            } else {
                elements_legnth.max = max_height;
                elements_legnth.value = default_height;
            }
        }


        elements_legnths = document.getElementsByClassName("density");
        for (var i = 0; i < elements_legnths.length; i++) {
            var elements_legnth = elements_legnths[i];
            elements_legnth.setAttribute('type', 'range');
            elements_legnth.min = min_percent;
            elements_legnth.max = max_percent;
            elements_legnth.value = default_percent;
            elements_legnth.orientation = "horizontal";
            elements_legnth.step = step_percent;
        }

        elements_legnths = document.getElementsByClassName("depth");
        for (var i = 0; i < elements_legnths.length; i++) {
            var elements_legnth = elements_legnths[i];
            elements_legnth.setAttribute('type', 'range');
            elements_legnth.min = "1";
            elements_legnth.max = "3";
            elements_legnth.value = "1";
            elements_legnth.orientation = "horizontal";
            elements_legnth.step = "0.2";
        }

        function changeOutput(el) {
            var id = el.attr('id');
            var width = el.width() - length_min * 10;
            console.log("IWdth is " + width);
            console.log(el.val());

            // Figure out placement percentage between left and right of input
            var newPoint = (el.val() - el.attr("min")) / (el.attr("max") - el.attr("min"));
            console.log(newPoint);

            var offset = -1;
            var newPlace;

            // Prevent bubble from going beyond left or right (unsupported browsers)
            if (newPoint < 0) {
                newPlace = 0;
            } else if (newPoint > 1) {
                newPlace = width;
            } else {
                newPlace = width * newPoint;
                offset -= newPoint;
            }

            var val = el.val();
            if (id == "slider1" || id == "slider2" || id == "slider5") {
                val = Number(val) * 10;
                val = parseInt(val);
                val = val + " cm";
            } else if (id == "slider3" || id == "slider4") {
                val = val + " %";
            }

            // Move bubble
            el
                .next("output")
                .css({
                    left: newPlace + 113
                })
                .text(val);
        }







        $("input[type='range']").on('input', function () {

            // Cache this for efficiency
            var el = $(this);
            changeOutput(el);
            // Measure width of range input

        })
        // Fake a change to position bubble at page load
            .trigger('input');

        function createHoverState(myobject) {
            myobject.hover(function () {
                $(this).prev().toggleClass('hilite');
            });
            myobject.mousedown(function () {
                $(this).prev().addClass('dragging');
                $("*").mouseup(function () {
                    $(myobject).prev().removeClass('dragging');
                });
            });
        }

        createHoverState($(".slider a.ui-slider-handle"));


        const box_dimention_info = {
            width: 1,
            height: 1,
            depth: 1
        };

        const minVerticalDistance = 0.2;
        const maxVerticalDistance = 3;
        const camera_fov = 60;
        const camera_near = 1;
        const camera_far = 100;
        const camera_x = 0;
        const camera_y = 20;
        const camera_z = 30;
        const light_x = 0;
        const light_y = 0;
        const light_z = 50;
        const helper_size = 20;
        const helper_division = 20;

        const minHorizontalDistance = 0.2;
        const maxHorizontalDistance = 3;
        const space_vertical = 0.01;
        const timeLimit = 300;
        const mx_mesh_length = 20;


        const door_scale_x = 3.0;
        const vector_z = 0.5;
        const degree_open = 60;

        var thickness = Number(<?=$inner[0]->thickness;?>) / 100;
        var outThickness = Number(<?=$outer[0]->thickness;?>) / 100;
        var door_space = 0;
        var door_position_z = 1.1;
        var door_handler_position_z = 1.3;
        var scale_z = Number(<?=$door[0]->thickness;?>) / 100;
        var scale_z_drawer = Number(<?=$drawer[0]->thickness;?>) / 100;
        var img_src_door;
        var img_src_outside;
        var img_src_inside;
        var img_src_drawer;
        var inner_material_id = <?=$inner[0]->id;?>;
        var outter_material_id = <?=$outer[0]->id;?>;
        var door_material_id = <?=$door[0]->id;?>;
        var drawer_material_id = <?=$drawer[0]->id;?>;
        var type_modal;
        var select_img;
        var select_value;
        var startTime;
        var hander_material;
        var isLocation = true;
        var location_id = 0;
        var location_status = 0;


        $("input[name=input-space-radio]").val([door_space]);

        var width_webgl = $("#webgl-container").width();
        var height_webgl = $("#webgl-container").height();


        var camera = new THREE.PerspectiveCamera(camera_fov, width_webgl / height_webgl, camera_near, camera_far);
        camera.position.set(camera_x, camera_y, camera_z);

        var scene = new THREE.Scene();

        var light = new THREE.PointLight();
        light.position.set(light_x, light_y, light_z);
        scene.add(light);

        //var opened = [];
        // Material

        var img_path = $("#default_image_path").val();
        img_src_door = $("#door-image").attr('src');
        img_src_inside = $("#inside-image").attr('src');
        img_src_outside = $("#outside-image").attr('src');
        img_src_drawer = $("#drawer-image").attr('src');
        var texture_door = new THREE.TextureLoader().load(img_src_door);

        var material_plane = new THREE.MeshBasicMaterial({map: texture_door});
        var material_transparent = new THREE.MeshBasicMaterial({
            transparent: true,
            opacity: 0,
            wireframe: true,
            side: THREE.DoubleSide
        });
        var material = [material_plane, material_plane, material_transparent, material_plane, material_plane, material_plane];
        hander_material = material_plane;

        var texture_inside = new THREE.TextureLoader().load(img_src_inside);
        var material_inside = new THREE.MeshBasicMaterial({map: texture_inside});

        var texture_outside = new THREE.TextureLoader().load(img_src_outside);
        var material_outside = new THREE.MeshBasicMaterial({map: texture_outside});


        var renderer = new THREE.WebGLRenderer({
            antialias: true
        });

        renderer.setSize(width_webgl, height_webgl);
        document.getElementById("webgl-container").appendChild(renderer.domElement);
        //$("#webgl-container").appendChild();

        //document.body.appendChild(renderer.domElement);

        var controls = new THREE.OrbitControls(camera, renderer.domElement); // comment this line and uncomment the next one to see the difference in the behaviour of the slider

        renderer.domElement.addEventListener("mousemove", mousemove);
        renderer.domElement.addEventListener("mouseup", mouseUp);
        renderer.domElement.addEventListener("mousedown", mouseDown);
        renderer.domElement.addEventListener("mouseleave", mouseleave);

        var input_values = document.getElementsByClassName("door-content-data");
        for (var i = 0; i < input_values.length; i++) {
            var obj = input_values[i];
            obj.addEventListener("input", calcModel);
        }


        var mtop = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
        var mesh_top = new THREE.Mesh(mtop, new THREE.MeshNormalMaterial());

        var bottom = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
        var mesh_bottom = new THREE.Mesh(bottom, new THREE.MeshNormalMaterial());

        var left = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
        var mesh_left = new THREE.Mesh(left, new THREE.MeshNormalMaterial());

        var right = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
        var mesh_right = new THREE.Mesh(right, new THREE.MeshNormalMaterial());


        scene.add(mesh_top);
        scene.add(mesh_bottom);
        scene.add(mesh_left);
        scene.add(mesh_right);

        var plane = new THREE.GridHelper(helper_size, helper_division);
        scene.add(plane);


        var verticalElements = [];
        var mesh_verticalElements = [];

        var horizontalElements = [];
        var mesh_horizontalElements = [];

        var horizontalDoors = [];
        var mesh_horizontalDoors = [];

        var mesh_DoorsHandles = [];
        var DoorsHandles = [];

        var mesh_Doors = [[]];
        var mesh_Doors_Position = [[]];
        var door_info = [[]];
        var pre_door_info = [[]];
        var Doors = [[]];

        // Globals for function mousemove
        var opened = false;
        var openedNr = -1;
        var oldName = -1;

        var horizontalPositions = [];
        var verticalPositions = [];
        var width;
        var height;
        var depth = 1.0;
        var horizontals;
        var verticals;
        var mouseClickVector = new THREE.Vector2();
        var select_row;
        var select_column;
        var isMaterial = true;
        var select_thickness;
        var select_material_id;
        var total_price = 0;
        var ship_price = 0;
        var total_ship_price = 0;
        var price_left = <?=$price->price_left;?>;
        var price_right = <?=$price->price_right;?>;
        var price_drawer = <?=$price->price_drawer;?>;
        var price_empty = <?=$price->price_empty;?>;

        changeMaxSize();

        initializeMesh();
        calcModel();
        //initialize();

        var load_json_content = $("#id-store-content").val();
        if (load_json_content != '') {
            isMaterial = true;
            drawFromJSON(load_json_content);
        }
        animate();

        function getMaterialInfo(id) {
            var result;
            @foreach($materials as $index=>$material)
            if ({{$material -> id}} == id)
            {

                result = ({!! json_encode($material) !!});
            }
            @endforeach
                return result
        }

        function getShippingInfo(id) {
            var result;
            @foreach($locations as $index=>$location)
            if ({{$location -> id}} == id)
            {

                result = ({!! json_encode($location) !!});
            }
            @endforeach
                return result
        }


        function changeTotalPrice() {
            $("#total_price").html(Math.round(total_price * 100) / 100);
            $("#shipping_price").html(Math.round(ship_price * 100) / 100);
            $("#shipping_total_price").html(Math.round(total_ship_price * 100) / 100);
        }

        function setLocationShow() {
            if(isLocation == true) {
                $('#shpping_location_select').prop('disabled', false);
                $("#shipping_assembly").removeClass("display_none");
            } else {
                $('#shpping_location_select').prop('disabled', 'disabled');
                $("#shipping_assembly").addClass("display_none");
            }
        }

        $("#btn-change-location").click(function() {
            if(isLocation == false) {
                isLocation = true;
            } else {
                isLocation = false;
                location_id = 0;
                $("#shpping_location_select").val(0);
            }
            setLocationShow();
            if(location_id == 0) {
                $("#shipping_assembly").addClass("display_none");
            }
        });

        $( "#shpping_location_select" ).change(function() {
            var id = $("#shpping_location_select").val();
            selectLocation(id);
            draw();
        });

        $('input[type=radio][name=input-ship-default-radio]').change(function() {
            selectStatus(this.value);
            draw();

        });

        $( "#shpping_location_select" ).change(function() {
            var id = $("#shpping_location_select").val();
            selectLocation(id);
            draw();
        });

        function selectStatus(id) {
            location_status = id;
            var priceInfo = getShippingInfo(location_id).price_info;
            var info = priceInfo[id];
            var basic_price = info.basic_price;
            var volume_price = info.volume_price;
            $("#shipping_basic_price").val(basic_price);
            $("#shipping_volume_price").val(volume_price);
        }

        function selectLocation(id) {
            location_id = id;
            if(id == 0 || isLocation == false) {
                $("#shipping_assembly").addClass("display_none");
                return ;
            } else {
                $("#shipping_assembly").removeClass("display_none");
            }
            var priceInfo = getShippingInfo(id).price_info;
            console.log(priceInfo);
            for(var i = 0; i < 3; i ++) {
                if(priceInfo[i].active == 1) {

                    $("#ship_default_parent" + i).removeClass('display_none');
                } else {
                    $("#ship_default_parent" + i).addClass('display_none');
                }
                if(priceInfo[i].default == 1) {
                    $("#ship_default" + i).prop("checked", true);
                    selectStatus(i);
                } else {
                    $("#ship_default" + i).prop("checked", false);
                }


            }


        }

        function initializeMesh() {
            var horizontalCounter, verticalCounter;
            for (horizontalCounter = 0; horizontalCounter < mx_mesh_length; horizontalCounter++) {
                horizontalElements[horizontalCounter] = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
                mesh_horizontalElements[horizontalCounter] = new THREE.Mesh(horizontalElements[horizontalCounter], new THREE.MeshNormalMaterial());
                scene.add(mesh_horizontalElements[horizontalCounter]);
                mesh_horizontalElements[horizontalCounter].material = material_inside;
                mesh_horizontalElements[horizontalCounter].visible = false;
            }

            for (verticalCounter = 0; verticalCounter < mx_mesh_length; verticalCounter++) {
                verticalElements[verticalCounter] = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
                mesh_verticalElements[verticalCounter] = new THREE.Mesh(verticalElements[verticalCounter],
                    new THREE.MeshNormalMaterial());
                scene.add(mesh_verticalElements[verticalCounter]);
                mesh_verticalElements[verticalCounter].material = material_inside;
                mesh_verticalElements[verticalCounter].visible = false;
            }

            for (horizontalCounter = 0; horizontalCounter < mx_mesh_length; horizontalCounter++) {
                mesh_Doors[horizontalCounter] = new Array();
                mesh_Doors_Position[horizontalCounter] = new Array();
                door_info[horizontalCounter] = new Array();
                pre_door_info[horizontalCounter] = new Array();
                Doors[horizontalCounter] = new Array();

                for (verticalCounter = 0; verticalCounter < mx_mesh_length; verticalCounter++) {
                    Doors[horizontalCounter][verticalCounter] = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
                    mesh_Doors[horizontalCounter][verticalCounter] = new THREE.Mesh(Doors[horizontalCounter][verticalCounter], material_plane);
                    mesh_Doors[horizontalCounter][verticalCounter].name = verticalCounter;
                    mesh_Doors[horizontalCounter][verticalCounter].visible = false;
                    scene.add(mesh_Doors[horizontalCounter][verticalCounter]);
                }
            }
        }

        function setValueModalMaterial(src_material, val_thickness, material_id) {
            var elements_img = document.getElementsByClassName("material-image");
            for (var i = 0; i < elements_img.length; i++) {
                var img = elements_img[i];
                var el = $(img);

                el.removeClass('round-border');
                var src = el.attr('src');
                var thickness = el.attr('material-thickness');
                var id = el.attr("material-id");
                if (id == material_id) {
                    el.addClass('round-border');
                }
            }
            select_material_id = material_id;
            select_img = src_material;
            select_thickness = val_thickness;

            $("#id-modal-material").modal("show");
        }

        function hiddenMaterial() {
            $("#inner_material_modal").css('display', 'none');
            $("#outer_material_modal").css('display', 'none');
            $("#door_material_modal").css('display', 'none');
            $("#drawer_material_modal").css('display', 'none');
        }

        $("#id-btn-material-submit").on("click", function (event) {
            $("#id-modal-material").modal("hide");
            if (type_modal == "door") {
                scale_z = select_thickness;
                img_src_door = select_img;
                door_material_id = select_material_id;
                setDoorValue();
            } else if (type_modal == "inside") {
                thickness = select_thickness;
                img_src_inside = select_img;
                inner_material_id = select_material_id;
                setInsideValue();
            } else if (type_modal == 'outside') {
                outThickness = select_thickness;
                img_src_outside = select_img;
                outter_material_id = select_material_id;
                setOutsideValue();
            } else {
                img_src_drawer = select_img;
                scale_z_drawer = select_thickness;
                drawer_material_id = select_material_id;
                setDrawerValue();
            }
            isMaterial = true;
            changeMaxSize();
            calcModel();
        });

        function min(a, b) {
            if (Number(a) < Number(b)) {
                return a;
            }
            return b;
        }

        function changeMaxSize() {
            var inner_material_info = getMaterialInfo(inner_material_id);
            var outer_material_info = getMaterialInfo(outter_material_id);
            var cur_max_length = max_length;
            var cur_max_height = max_height;
            var cur_max_depth = max_width;
            var max_inner_height = Number(inner_material_info.possible_height) / 10;
            var max_outer_height = Number(outer_material_info.possible_height) / 10;
            var max_inner_width = Number(inner_material_info.possible_width) / 10;
            var max_outer_width = Number(outer_material_info.possible_width) / 10;
            cur_max_length = min(cur_max_length, min(max_outer_height, max_inner_height + 2 * outThickness));
            cur_max_height = min(cur_max_height, min(max_outer_height + 2 * outThickness, max_inner_height + 2 * outThickness));
            cur_max_depth = min(cur_max_depth, min(max_inner_width, max_outer_width));
            document.getElementById("slider1").max = cur_max_length;
            document.getElementById("slider2").max = cur_max_height;
            document.getElementById("slider5").max = cur_max_depth;
            width = document.getElementById("slider1").value;
            height = document.getElementById("slider2").value;
            depth = document.getElementById("slider5").value;

            if (width >= cur_max_length) {
                document.getElementById("slider1").value = cur_max_length;
                width = cur_max_length;
            }
            if (height >= cur_max_height) {
                document.getElementById("slider2").value = cur_max_height;
                height = cur_max_height;
            }
            if (depth >= cur_max_depth) {
                document.getElementById("slider5").value = cur_max_depth;
                depth = cur_max_depth;
            }
            changeOutput($("#slider1"));
            changeOutput($("#slider2"));
            changeOutput($("#slider3"));
            changeOutput($("#slider4"));
            changeOutput($("#slider5"));
        }

        $("#btn-change-door").on("click", function (event) {
            hiddenMaterial();
            $("#door_material_modal").css('display', '');
            type_modal = "door";
            setValueModalMaterial(img_src_door, scale_z, door_material_id);
        });

        $("#btn-change-drawer").on("click", function (event) {
            hiddenMaterial();
            $("#drawer_material_modal").css('display', '');
            type_modal = "drawer";
            setValueModalMaterial(img_src_drawer, scale_z_drawer, drawer_material_id);
        });

        $("#btn-change-inside").on("click", function (event) {
            hiddenMaterial();
            $("#inner_material_modal").css('display', '');
            type_modal = "inside";
            setValueModalMaterial(img_src_inside, thickness, inner_material_id);
        });

        $("#btn-change-outside").on("click", function (event) {
            hiddenMaterial();
            $("#outer_material_modal").css('display', '');
            type_modal = "outside";
            setValueModalMaterial(img_src_outside, outThickness, outter_material_id);
        });

        $(".material-image").on('click', function (event) {
            var el = $(this);
            $('.round-border').removeClass('round-border');
            $(this).addClass('round-border');
            select_img = el.attr('src');
            select_thickness = Number(el.attr('material-thickness')) / 100;
            select_material_id = el.attr('material-id');
            // img_src_door =
            // console.log(img_src_door);
            // texture_door = new THREE.TextureLoader().load(img_src_door);
            //
            // material_plane = new THREE.MeshBasicMaterial({map: texture_door});
            // material_transparent =  new THREE.MeshBasicMaterial( { transparent: true, opacity: 0, wireframe: true, side: THREE.DoubleSide} );
            // material = [material_plane, material_plane, material_plane, material_plane, material_plane, material_plane];
            // texture_inside = new THREE.TextureLoader().load(img_src_inside);
            // material_inside = new THREE.MeshBasicMaterial({map: texture_inside});
            //
            // texture_outside = new THREE.TextureLoader().load(img_src_outside);
            // material_outside = new THREE.MeshBasicMaterial({map: texture_outside});
            // draw();
            //(... rest of your JS code)
        });

        // function initialize() {
        //     width = 5;
        //     height = 5;
        //     horizontalDensity = 50;
        //     verticalDensity = 50;
        //     $("#slider1").val(width);
        //     $("#slider2").val(height);
        //     $("#slider3").val(horizontalDensity);
        //     $("#slider4").val(verticalDensity);
        //     $("#slider5").val(depth);
        //     changeOutput($("#slider1"));
        //     changeOutput($("#slider2"));
        //     changeOutput($("#slider3"));
        //     changeOutput($("#slider4"));
        //     changeOutput($("#slider5"));
        //     calcModel();
        // }

        function changeDrawer(row, column) {
            mesh_Doors[row][column].scale.z = mesh_Doors[row][column].scale.x / 2;
            mesh_Doors[row][column].position.z = door_position_z - mesh_Doors[row][column].scale.z / 2;
            mesh_Doors_Position[row][column].z = mesh_Doors[row][column].position.z;
            mesh_Doors[row][column].side = THREE.DoubleSide;
            mesh_Doors[row][column].material = material;
        }

        function changeLeftDoor(row, column) {
            mesh_Doors[row][column].scale.z = scale_z;
            mesh_Doors[row][column].position.z = door_position_z - mesh_Doors[row][column].scale.z / 2;
            mesh_Doors_Position[row][column].z = mesh_Doors[row][column].position.z;
            mesh_Doors[row][column].material = material_plane;

        }

        function changeRightDoor(row, column) {
            mesh_Doors[row][column].scale.z = scale_z;
            mesh_Doors[row][column].position.z = door_position_z - mesh_Doors[row][column].scale.z / 2;
            mesh_Doors_Position[row][column].z = mesh_Doors[row][column].position.z;
            mesh_Doors[row][column].material = material_plane;
        }

        function changeNoneDoor(row, column) {
            mesh_Doors[row][column].scale.z = scale_z;
            mesh_Doors[row][column].position.z = door_position_z - mesh_Doors[row][column].scale.z / 2;
            mesh_Doors_Position[row][column].z = mesh_Doors[row][column].position.z;
            mesh_Doors[row][column].material = material_transparent;
        }

        function setDoorValue() {
            $("#door-thickness").text(parseInt(scale_z * 100) + " mm");
            $("#door-image").attr('src', img_src_door);
        }

        function setInsideValue() {
            $("#inside-thickness").text(parseInt(thickness * 100) + " mm");
            $("#inside-image").attr('src', img_src_inside);
        }

        function setOutsideValue() {
            $("#outside-thickness").text(parseInt(outThickness * 100) + " mm");
            $("#outside-image").attr('src', img_src_outside);
        }

        function setDrawerValue() {
            $("#drawer-thickness").text(parseInt(scale_z_drawer * 100) + " mm");
            $("#drawer-image").attr('src', img_src_drawer);
        }

        function setCompartment() {
            var horizontalSize = ((height - outThickness) / (Number(horizontals) + 1)) - thickness;
            var verticalSize = ((width - outThickness) / (Number(verticals) + 1)) - thickness;
            $("#compart_width").html(Math.floor(verticalSize * 100) / 10 + ' cm');
            $("#compart_height").html(Math.floor(horizontalSize * 100) / 10 + ' cm');
        }


        function drawFromJSON(json) {
            var jsonObj = JSON.parse(json);
            var sliderInfo = jsonObj.sliderInfo;
            var horizontalInfo = jsonObj.horizontalInfo;
            var verticalInfo = jsonObj.verticalInfo;
            width = sliderInfo.width;
            height = sliderInfo.height;
            depth = sliderInfo.depth;
            isLocation = sliderInfo.isLocation;
            location_id = sliderInfo.location_id;

            console.log(sliderInfo);
            setLocationShow();
            $("#shpping_location_select").val(location_id);
            selectLocation(location_id);
            location_status = sliderInfo.location_status;
            console.log("location status is " + location_status);
            $("#ship_default" + location_status).prop("checked", true);
            if(location_id > 0) {
                selectStatus(location_status);
            }



            inner_material_id = sliderInfo.inner_material_id;
            outter_material_id = sliderInfo.outter_material_id;
            door_material_id = sliderInfo.door_material_id;
            drawer_material_id = sliderInfo.drawer_material_id;
            thickness = Number(sliderInfo.thickness);
            outThickness = Number(sliderInfo.outThickness);
            scale_z = Number(sliderInfo.scale_z);
            scale_z_drawer = Number(sliderInfo.scale_z_drawer);
            img_src_door = sliderInfo.img_src_door;
            img_src_drawer = sliderInfo.img_src_drawer;
            img_src_outside = sliderInfo.img_src_outside;
            img_src_inside = sliderInfo.img_src_inside;
            door_space = sliderInfo.door_space;
            texture_door = new THREE.TextureLoader().load(img_src_door);
            material_plane = new THREE.MeshBasicMaterial({map: texture_door});
            material_transparent = new THREE.MeshBasicMaterial({
                transparent: true,
                opacity: 0,
                wireframe: true,
                side: THREE.DoubleSide
            });
            var text_drawer = new THREE.TextureLoader().load(img_src_drawer);
            var material_drawer = new THREE.MeshBasicMaterial({map: text_drawer});
            material = [material_drawer, material_drawer, material_transparent, material_drawer, material_drawer, material_drawer];
            texture_inside = new THREE.TextureLoader().load(img_src_inside);
            material_inside = new THREE.MeshBasicMaterial({map: texture_inside});

            texture_outside = new THREE.TextureLoader().load(img_src_outside);
            material_outside = new THREE.MeshBasicMaterial({map: texture_outside});

            var horizontalDensity = sliderInfo.horizontalDensity;
            var verticalDensity = sliderInfo.verticalDensity;
            $("#slider1").val(width);
            $("#slider2").val(height);
            $("#slider3").val(horizontalDensity);
            $("#slider4").val(verticalDensity);
            $("#slider5").val(depth);
            changeMaxSize();


            $("input[name=input-space-radio]").val([door_space]);


            setDoorValue();
            setDrawerValue();
            setInsideValue();
            setOutsideValue();


            //$('.round-border').removeClass('round-border');


            horizontals = horizontalInfo.length;
            verticals = verticalInfo.length;
            horizontalPositions = horizontalInfo;
            verticalPositions = verticalInfo;
            setCompartment();


            var doorInfo = jsonObj.doorInfo;
            door_info = [[]];
            pre_door_info = [[]];
            for (var horizontalCounter = 0; horizontalCounter < horizontalPositions.length + 1; horizontalCounter++) {
                door_info[horizontalCounter] = new Array();
                pre_door_info[horizontalCounter] = new Array();
                for (var verticalCounter = 0; verticalCounter < verticalPositions.length + 1; verticalCounter++) {
                    door_info[horizontalCounter][verticalCounter] = doorInfo[horizontalCounter][verticalCounter];
                    pre_door_info[horizontalCounter][verticalCounter] = -1;
                }
            }
            door_position_z = Number(depth);
            door_handler_position_z = Number(depth) + 0.3;
            calcModel();
        }

        function changeDoorInfo(horizontalCounter, verticalCounter) {
            var isChanged = true;
            if (pre_door_info[horizontalCounter][verticalCounter] == door_info[horizontalCounter][verticalCounter]) {
                isChanged = false;
            }
            if (door_info[horizontalCounter][verticalCounter] == 3) {
                total_price = total_price + price_drawer;
                if (isChanged == true) changeDrawer(horizontalCounter, verticalCounter);
                total_price = total_price + getPrice(drawer_material_id, mesh_Doors[horizontalCounter][verticalCounter].scale.x, mesh_Doors[horizontalCounter][verticalCounter].scale.y);
            } else if (door_info[horizontalCounter][verticalCounter] == 2) {
                total_price = total_price + price_right;
                if (isChanged == true) changeRightDoor(horizontalCounter, verticalCounter);
                total_price = total_price + getPrice(door_material_id, mesh_Doors[horizontalCounter][verticalCounter].scale.x, mesh_Doors[horizontalCounter][verticalCounter].scale.y);
            } else if (door_info[horizontalCounter][verticalCounter] == 1) {
                total_price = total_price + price_left;
                if (isChanged == true) changeLeftDoor(horizontalCounter, verticalCounter);
                total_price = total_price + getPrice(door_material_id, mesh_Doors[horizontalCounter][verticalCounter].scale.x, mesh_Doors[horizontalCounter][verticalCounter].scale.y);
            } else {
                total_price = total_price + price_empty;
                if (isChanged == true) changeNoneDoor(horizontalCounter, verticalCounter);
            }
            pre_door_info[horizontalCounter][verticalCounter] = door_info[horizontalCounter][verticalCounter]
        }


        function setFromCamera(event) {
            var rect = renderer.domElement.getBoundingClientRect();
            mouseClickVector = new THREE.Vector3(((event.clientX - rect.left) / width_webgl) * 2 - 1,
                -((event.clientY - rect.top) / height_webgl) * 2 + 1, vector_z);


            var raycaster = new THREE.Raycaster();
            raycaster.setFromCamera(mouseClickVector, camera);
            return raycaster;
        }

        function mouseUp(event) {
            var endTime = new Date();
            var seconds = endTime - startTime;
            if (seconds < timeLimit) {
                var raycaster = setFromCamera(event);
                for (var i = 0; i < horizontalPositions.length + 1; i++) {
                    var intersects = raycaster.intersectObjects(mesh_Doors[i], true);
                    if (intersects.length > 0) {
                        var name = intersects[0].object.name;
                        select_row = i;
                        select_column = name;
                        var value = door_info[i][name];
                        $("input[name=type_door]").val([value]);
                        //$("input[name=type_door]").val(value);
                        $("#id-modal-type").modal("show");
                    }
                }
            }
        }

        function mouseDown(event) {
            startTime = new Date();
        }

        $("#id-btn-type-submit").on("click", function (event) {
            event.preventDefault();
            var value = $("input[name=type_door]:checked").val();
            switch (door_info[select_row][select_column]) {
                case 0:
                    total_price = total_price - price_empty;
                    break;
                case 1:
                    total_price = total_price - price_left;
                    total_price = total_price - getPrice(door_material_id, mesh_Doors[select_row][select_column].scale.x, mesh_Doors[select_row][select_column].scale.y);
                    break;
                case 2:
                    total_price = total_price - price_right;
                    total_price = total_price - getPrice(door_material_id, mesh_Doors[select_row][select_column].scale.x, mesh_Doors[select_row][select_column].scale.y);
                    break;
                case 3:
                    total_price = total_price - price_drawer;
                    total_price = total_price - getPrice(drawer_material_id, mesh_Doors[select_row][select_column].scale.x, mesh_Doors[select_row][select_column].scale.y);
                    break;
            }
            //pre_door_info[select_row][select_column] = door_info[select_row][select_column];
            door_info[select_row][select_column] = Number(value);
            changeDoorInfo(select_row, select_column);
            $("#id-modal-type").modal("hide");
            changeTotalPrice();
        });

        function moveMeshDoor(name, isRotation) {
            for (var i = 0; i < 1; i++) {
                //for (i = 0; i < verticalElements.length + 1; i++) {
                if (isRotation == true) {
                    var targetAngle = Math.PI / 180 * degree_open;
                    var current = {percentage: 0}
                    var tween = new TWEEN.Tween(current)
                        .to(
                            {
                                percentage: 1
                            },

                            500)
                        .easing(TWEEN.Easing.Linear.None)
                        .onUpdate(function () {
                            for (i = 0; i < verticalElements.length + 1; i++) {
                                if (door_info[name][i] == 1) {
                                    mesh_Doors[name][i].rotation.y = -targetAngle * current.percentage;
                                    var scale_x = mesh_Doors[name][i].scale.x;
                                    var alpha = targetAngle * current.percentage;
                                    mesh_Doors[name][i].position.x = mesh_Doors_Position[name][i].x - scale_x / 2 + (scale_z * Math.sin(alpha) + scale_x * Math.cos(alpha)) / 2;
                                    mesh_Doors[name][i].position.z = mesh_Doors_Position[name][i].z + scale_z / 2 + (-scale_z * Math.cos(alpha) + scale_x * Math.sin(alpha)) / 2;
                                } else if (door_info[name][i] == 2) {
                                    mesh_Doors[name][i].rotation.y = targetAngle * current.percentage;
                                    var scale_x = mesh_Doors[name][i].scale.x;
                                    var alpha = -targetAngle * current.percentage;
                                    mesh_Doors[name][i].position.x = mesh_Doors_Position[name][i].x + scale_x / 2 + (scale_z * Math.sin(alpha) - scale_x * Math.cos(alpha)) / 2;
                                    mesh_Doors[name][i].position.z = mesh_Doors_Position[name][i].z + scale_z / 2 + (-scale_z * Math.cos(alpha) - scale_x * Math.sin(alpha)) / 2;
                                } else if (door_info[name][i] == 3) {
                                    mesh_Doors[name][i].position.z = mesh_Doors_Position[name][i].z + mesh_Doors[name][i].scale.z / 2 * current.percentage
                                }

                            }
                        })
                        .onComplete(function () {
                        });
                    tween.start();
                } else {
                    var targetAngle = Math.PI / 180 * degree_open;
                    var current = {percentage: 1}
                    var tween = new TWEEN.Tween(current)
                        .to(
                            {
                                percentage: 0
                            },

                            500)
                        .easing(TWEEN.Easing.Linear.None)
                        .onUpdate(function () {
                            for (i = 0; i < verticalElements.length + 1; i++) {
                                if (door_info[name][i] == 1) {
                                    mesh_Doors[name][i].rotation.y = -targetAngle * current.percentage;
                                    var scale_x = mesh_Doors[name][i].scale.x;
                                    var alpha = targetAngle * current.percentage;
                                    mesh_Doors[name][i].position.x = mesh_Doors_Position[name][i].x - scale_x / 2 + (scale_z * Math.sin(alpha) + scale_x * Math.cos(alpha)) / 2;
                                    mesh_Doors[name][i].position.z = mesh_Doors_Position[name][i].z + scale_z / 2 + (-scale_z * Math.cos(alpha) + scale_x * Math.sin(alpha)) / 2;
                                } else if (door_info[name][i] == 2) {
                                    mesh_Doors[name][i].rotation.y = targetAngle * current.percentage;
                                    var scale_x = mesh_Doors[name][i].scale.x;
                                    var alpha = -targetAngle * current.percentage;
                                    mesh_Doors[name][i].position.x = mesh_Doors_Position[name][i].x + scale_x / 2 + (scale_z * Math.sin(alpha) - scale_x * Math.cos(alpha)) / 2;
                                    mesh_Doors[name][i].position.z = mesh_Doors_Position[name][i].z + scale_z / 2 + (-scale_z * Math.cos(alpha) - scale_x * Math.sin(alpha)) / 2;
                                } else if (door_info[name][i] == 3) {
                                    mesh_Doors[name][i].position.z = mesh_Doors_Position[name][i].z + mesh_Doors[name][i].scale.z * Math.sin(Math.PI / 2) / 2 * current.percentage
                                }
                            }
                        })
                        .onComplete(function () {
                        });
                    tween.start();
                    // var targetAngle = 0;
                    //
                    // new TWEEN.Tween( mesh_Doors[name][i].rotation)
                    //     .easing(TWEEN.Easing.Circular.Out)
                    //     .to(
                    //         {
                    //             y: targetAngle
                    //         },
                    //         500
                    //     )
                    //     .start();
                    // mesh_Doors[name][i].rotation.y = 0;
                    // mesh_Doors[name][i].position.x -= mesh_Doors[name][i].scale.x * Math.sin(Math.PI / 2) / 2;
                    // mesh_Doors[name][i].position.z -= mesh_Doors[name][i].scale.x * Math.sin(Math.PI / 2) / 2;
                }

            }
        }


        function mousemove(event) {
            var raycaster = setFromCamera(event);


            var intersects = raycaster.intersectObjects(mesh_DoorsHandles, true);
            if (intersects.length > 0) {
                var name = intersects[0].object.name;
                if (name != oldName) {
                    if (opened == false) {
                        opened = true;
                        moveMeshDoor(name, true);
                        openedNr = intersects[0].object.name;
                    } else {
                        if (openedNr >= 0) {
                            moveMeshDoor(openedNr, false);
                            openedNr = -1;
                        }
                    }
                }
                oldName = name;
            } else {
                if (opened == true) {
                    opened = false;
                    if (openedNr >= 0) {
                        moveMeshDoor(openedNr, false);
                        openedNr = -1;
                    }
                }
                oldName = -1;
            }
        }

        function touchDoors(open, row, individual) {
            // open=1 -> open; open=0 -> close
            // row=-1 if an individual door should be opened, otherwise the row
            // individual= row and column value of the door to open or to close.
            // using global doorConfiguration which is an 2D array indicating if the door is handle left right or drawer #implemented later

            if (row >= 0) {
                if (open == 1) {

                } else {

                }
            }
        }

        function mouseleave(event) {
            //console.log("Maustaste wurde gedrückt.");
            //drawDoors2();
            //calcModel();
            //elem.innerHTML = 'Maustaste wurde gedrückt.';
            //var projector = new THREE.projector();

            var raycaster = setFromCamera(event);
            var intersects = raycaster.intersectObjects(mesh_Doors[0], true);

            if (intersects.length > 0) {
                intersects[0].object.material.visible = (1);
            }
        }


        function drawDoorsHandles(horizontalPositions) {
            var horizontalCounter;
            for (horizontalCounter = 0; horizontalCounter < (horizontalPositions.length + 1); horizontalCounter++) {
                if (mesh_DoorsHandles.length < horizontalCounter + 1) {
                    DoorsHandles[horizontalCounter] = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
                    mesh_DoorsHandles[horizontalCounter] = new THREE.Mesh(DoorsHandles[horizontalCounter], material_plane);
                    mesh_DoorsHandles[horizontalCounter].name = horizontalCounter;
                    scene.add(mesh_DoorsHandles[horizontalCounter]);
                    mesh_DoorsHandles[horizontalCounter].material = hander_material;
                }
                if (isMaterial == true) {
                    mesh_DoorsHandles[horizontalCounter].material = hander_material;
                }

                var positionX;
                var positionY;
                var scaleX = door_scale_x;
                var scaleY;
                //sizeX = verticalPositions[verticalCounter]-mesh_left.position.x;
                //positionX = mesh_left.position.x - (verticalPositions[verticalCounter]-mesh_left.position.x)/2+10;
                positionX = mesh_left.position.x - door_scale_x / 2;

                //console.log (sizeX, positionX);
                if (horizontalCounter == 0) {
                    scaleY = horizontalPositions[horizontalCounter] - mesh_bottom.position.y;
                    positionY = mesh_bottom.position.y + (horizontalPositions[horizontalCounter] - mesh_bottom.position.y) / 2;
                } else if (horizontalCounter == horizontals) {
                    scaleY = mesh_top.position.y - horizontalPositions[horizontalCounter - 1];
                    positionY = mesh_top.position.y + (horizontalPositions[horizontalCounter - 1] - mesh_top.position.y) / 2;
                } else {
                    scaleY = horizontalPositions[horizontalCounter] - horizontalPositions[horizontalCounter - 1];
                    positionY = horizontalPositions[horizontalCounter] +
                        (horizontalPositions[horizontalCounter - 1] - horizontalPositions[horizontalCounter]) / 2;
                }
                mesh_DoorsHandles[horizontalCounter].scale.x = scaleX - outThickness;
                mesh_DoorsHandles[horizontalCounter].scale.y = scaleY - thickness;
                mesh_DoorsHandles[horizontalCounter].scale.z = scale_z;
                mesh_DoorsHandles[horizontalCounter].position.x = positionX;
                mesh_DoorsHandles[horizontalCounter].position.y = positionY;
                mesh_DoorsHandles[horizontalCounter].position.z = door_handler_position_z;
            }
            for (; horizontalCounter < mesh_DoorsHandles.length; horizontalCounter++) {
                scene.remove(mesh_DoorsHandles[horizontalCounter]);

            }
            mesh_DoorsHandles.length = horizontals + 1;
            // mesh_Doors.length = horizontals + 1;
            // if (mesh_DoorsHandles.length > horizontals + 1) {
            //     scene.remove(mesh_DoorsHandles[horizontals + 1]);
            //     mesh_DoorsHandles.length = horizontals + 1;
            // }

        }

        function drawDoors2(horizontalPositions) {
            var horizontalCounter;
            var verticalCounter;
            for (horizontalCounter = 0; horizontalCounter < horizontalPositions.length + 1; horizontalCounter++) {
                if (mesh_Doors.length < horizontalCounter + 1) {
                    mesh_Doors[horizontalCounter] = new Array();
                    mesh_Doors_Position[horizontalCounter] = new Array();
                    if (door_info[horizontalCounter] == null) {
                        door_info[horizontalCounter] = new Array();
                        pre_door_info[horizontalCounter] = new Array();
                    }

                    Doors[horizontalCounter] = new Array();
                }
                for (verticalCounter = 0; verticalCounter < verticalPositions.length + 1; verticalCounter++) {
                    if (mesh_Doors[horizontalCounter].length < verticalCounter + 1) {
                        Doors[horizontalCounter][verticalCounter] = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
                        mesh_Doors[horizontalCounter][verticalCounter] = new THREE.Mesh(Doors[horizontalCounter][verticalCounter], material_plane);
                        mesh_Doors[horizontalCounter][verticalCounter].name = verticalCounter;
                        scene.add(mesh_Doors[horizontalCounter][verticalCounter]);
                    }
                    mesh_Doors[horizontalCounter][verticalCounter].visible = true;
                    var positionX;
                    var positionY;
                    var sizeX;
                    var sizeY;
                    // The left column
                    if (verticalCounter == 0) {
                        sizeX = verticalPositions[verticalCounter] - mesh_left.position.x + (thickness - outThickness) / 2;
                        positionX = mesh_left.position.x + (verticalPositions[verticalCounter] - mesh_left.position.x) / 2 - (thickness - outThickness) / 4;
                    } else if (verticalCounter == verticals) {
                        sizeX = mesh_right.position.x - verticalPositions[verticalCounter - 1] + (thickness - outThickness) / 2;
                        positionX = mesh_right.position.x + (verticalPositions[verticalCounter - 1] - mesh_right.position.x) / 2 + (thickness - outThickness) / 4;
                    } else {
                        sizeX = verticalPositions[verticalCounter] - verticalPositions[verticalCounter - 1];
                        positionX = verticalPositions[verticalCounter] + (verticalPositions[verticalCounter - 1]
                            - verticalPositions[verticalCounter]) / 2;
                    }
                    if (horizontalCounter == 0) {
                        sizeY = horizontalPositions[horizontalCounter] - mesh_bottom.position.y + (thickness - outThickness) / 2;
                        positionY = mesh_bottom.position.y + sizeY / 2 - (thickness - outThickness) / 2;
                    } else if (horizontalCounter == horizontals) {
                        sizeY = mesh_top.position.y - horizontalPositions[horizontalCounter - 1] + (thickness - outThickness) / 2;
                        positionY = mesh_top.position.y + (horizontalPositions[horizontalCounter - 1] - mesh_top.position.y) / 2 + (thickness - outThickness) / 4;
                    } else {
                        sizeY = horizontalPositions[horizontalCounter] - horizontalPositions[horizontalCounter - 1];
                        positionY = horizontalPositions[horizontalCounter] + (horizontalPositions[horizontalCounter - 1]
                            - horizontalPositions[horizontalCounter]) / 2;
                    }
                    mesh_Doors[horizontalCounter][verticalCounter].scale.x = sizeX - thickness - door_space;
                    mesh_Doors[horizontalCounter][verticalCounter].scale.y = sizeY - thickness - door_space;
                    mesh_Doors[horizontalCounter][verticalCounter].scale.z = scale_z;
                    mesh_Doors[horizontalCounter][verticalCounter].position.x = positionX;
                    mesh_Doors[horizontalCounter][verticalCounter].position.y = positionY;
                    var positionZ = door_position_z - scale_z / 2;
                    mesh_Doors[horizontalCounter][verticalCounter].position.z = positionZ;
                    mesh_Doors_Position[horizontalCounter][verticalCounter] = {
                        x: positionX,
                        y: positionY,
                        z: positionZ
                    };
                    if (!door_info[horizontalCounter][verticalCounter]) {
                        door_info[horizontalCounter][verticalCounter] = 0;
                        pre_door_info[horizontalCounter][verticalCounter] = -1;
                    }
                    changeDoorInfo(horizontalCounter, verticalCounter);
                }
                for (; verticalCounter < mesh_Doors[horizontalCounter].length; verticalCounter++) {
                    mesh_Doors[horizontalCounter][verticalCounter].visible = false;
                    //scene.remove( mesh_Doors[horizontalCounter][verticalCounter]);

                }
                //mesh_Doors[horizontalCounter].length = verticalPositions.length + 1;
            }
            for (; horizontalCounter < mesh_Doors.length; horizontalCounter++) {
                for (var i = 0; i < mesh_Doors[horizontalCounter].length; i++) {
                    mesh_Doors[horizontalCounter][i].visible = false;
                    //scene.remove(mesh_Doors[horizontalCounter][i]);
                }
            }
            //mesh_Doors.length = horizontals + 1;
            // mesh_Doors[horizontalCounter].length = verticalPositions.length + 1;
            //
            // if (mesh_Doors.length > horizontals + 1) {
            //     for (var i = 0; i < mesh_Doors[horizontals + 1].length; i++) {
            //         scene.remove(mesh_Doors[horizontals + 1][i]);
            //     }
            //     mesh_Doors.length = horizontals + 1;
            //     mesh_Doors_Position.length = horizontals + 1;
            // }
            // if (mesh_Doors[horizontals].length > verticals + 1) {
            //     for (var i = 0; i < mesh_Doors.length; i++) {
            //         scene.remove(mesh_Doors[i][verticals + 1]);
            //         mesh_Doors[i].length = verticals + 1;
            //         mesh_Doors_Position[i].length = verticals + 1;
            //     }
            // }
        }

        function drawHorizontals(horizontalPositions) {
            var horizontalCounter;
            for (horizontalCounter = 0; horizontalCounter < horizontalPositions.length; horizontalCounter++) {
                if (mesh_horizontalElements.length < horizontalCounter + 1) {
                    horizontalElements[horizontalCounter] = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
                    mesh_horizontalElements[horizontalCounter] = new THREE.Mesh(horizontalElements[horizontalCounter], new THREE.MeshNormalMaterial());
                    scene.add(mesh_horizontalElements[horizontalCounter]);
                    mesh_horizontalElements[horizontalCounter].material = material_inside;
                } else if (isMaterial == true) {
                    mesh_horizontalElements[horizontalCounter].material = material_inside;
                }
                mesh_horizontalElements[horizontalCounter].visible = true;

                mesh_horizontalElements[horizontalCounter].scale.z = Number(depth);
                mesh_horizontalElements[horizontalCounter].scale.x = width - outThickness / 2;
                mesh_horizontalElements[horizontalCounter].scale.y = thickness;
                //console.log("Horizontal: " + horizontalCounter + ":" + mesh_horizontalElements[horizontalCounter].scale.x + ":" + mesh_horizontalElements[horizontalCounter].scale.y + ":" + mesh_horizontalElements[horizontalCounter].scale.z);
                mesh_horizontalElements[horizontalCounter].position.x = 0;
                mesh_horizontalElements[horizontalCounter].position.y = 0 + outThickness / 2 + ((height - outThickness)
                    / (Number(horizontals) + 1) * (horizontalCounter + 1));
                mesh_horizontalElements[horizontalCounter].position.z = depth / 2;
                total_price += getPrice(inner_material_id, Number(depth), width - outThickness / 2);
                // horizontalPositions[horizontalCounter] = 0 + thickness/2 + ((height-thickness)/(Number(horizontals)+1)*(horizontalCounter+1));
            }
            for (; horizontalCounter < mesh_horizontalElements.length; horizontalCounter++) {
                mesh_horizontalElements[horizontalCounter].visible = false;

            }
            //mesh_horizontalElements.length = horizontals;

        }


        function drawVerticals(verticalPositions) {
            var verticalCounter;
            for (verticalCounter = 0; verticalCounter < verticalPositions.length; verticalCounter++) {
                if (mesh_verticalElements.length < verticalCounter + 1) {
                    verticalElements[verticalCounter] = new THREE.BoxGeometry(box_dimention_info.width, box_dimention_info.height, box_dimention_info.depth);
                    mesh_verticalElements[verticalCounter] = new THREE.Mesh(verticalElements[verticalCounter],
                        new THREE.MeshNormalMaterial());
                    scene.add(mesh_verticalElements[verticalCounter]);
                    mesh_verticalElements[verticalCounter].material = material_inside;
                } else if (isMaterial == true) {
                    mesh_verticalElements[verticalCounter].material = material_inside;
                }
                mesh_verticalElements[verticalCounter].visible = true;

                mesh_verticalElements[verticalCounter].scale.z = Number(depth) + Number(space_vertical);
                mesh_verticalElements[verticalCounter].scale.x = thickness;
                mesh_verticalElements[verticalCounter].scale.y = height - outThickness / 2;
                //console.log("Vertical: " + verticalCounter + ":" + mesh_verticalElements[verticalCounter].scale.x + ":" + mesh_verticalElements[verticalCounter].scale.y + ":" + mesh_verticalElements[verticalCounter].scale.z);
                mesh_verticalElements[verticalCounter].position.x = 0 - width / 2 + outThickness / 2 +
                    (width - outThickness) / (Number(verticals) + 1) * (verticalCounter + 1);
                mesh_verticalElements[verticalCounter].position.y = height / 2;
                mesh_verticalElements[verticalCounter].position.z = depth / 2;
                total_price += getPrice(inner_material_id, Number(depth) + Number(space_vertical), height - outThickness / 2);
            }
            for (; verticalCounter < mesh_verticalElements.length; verticalCounter++) {
                mesh_verticalElements[verticalCounter].visible = false;
                //scene.remove(mesh_verticalElements[verticalCounter]);

            }
            //mesh_verticalElements.length = verticals;
            //verticalElements.length = verticals;
        }

        function getPrice(material_id, width, height) {
            var material_info = getMaterialInfo(material_id);
            var price = Number(material_info.basic_price);
            var price_width = price + price * material_info.price_exceed_width / 100;
            var price_height = price + price * material_info.price_exceed_height / 100;
            var max_price = price_height;
            if (max_price < price_width) {
                max_price = price_width;
            }
            var basic_width = Number(material_info.basic_width);
            var basic_height = Number(material_info.basic_height);
            const price_rate = 100;
            if (width <= basic_width && height <= basic_height) {
                return price * width * height / price_rate;
            } else if (width <= basic_width) {
                return price_height * width * height / price_rate;
            } else if (height <= basic_height) {
                return price_width * width * height / price_rate;
            } else {
                return max_price * width * height / price_rate;
            }
        }

        function draw() {
            total_price = 0;

            mesh_top.scale.z = Number(depth) + space_vertical * 2;
            mesh_top.scale.x = width;
            mesh_top.scale.y = outThickness;
            mesh_bottom.scale.z = Number(depth) + space_vertical * 2;
            mesh_bottom.scale.x = width;
            mesh_bottom.scale.y = outThickness;
            mesh_left.scale.z = Number(depth) + space_vertical * 2;
            mesh_left.scale.x = outThickness;
            mesh_left.scale.y = height - outThickness * 2;
            mesh_right.scale.z = Number(depth) + space_vertical * 2;
            mesh_right.scale.x = outThickness;
            mesh_right.scale.y = height - outThickness * 2;

            var basic_price = $("#shipping_basic_price").val();
            var volume_price = $("#shipping_volume_price").val();

            total_price += getPrice(outter_material_id, Number(depth) + space_vertical * 2, width) * 2 + getPrice(outter_material_id, Number(depth) + space_vertical * 2, height - outThickness * 2) * 2;

            ship_price = Number(basic_price) + Number(volume_price) * depth * width * height / 1000;


            mesh_top.position.x = 0;
            mesh_top.position.y = height - outThickness / 2;
            mesh_top.position.z = depth / 2;

            if (isMaterial == true) {
                mesh_top.material = material_outside;
            }


            mesh_bottom.position.x = 0;
            mesh_bottom.position.y = outThickness / 2;
            mesh_bottom.position.z = depth / 2;
            if (isMaterial == true) {
                mesh_bottom.material = material_outside;
            }


            mesh_left.position.x = -width / 2 + outThickness / 2;
            mesh_left.position.y = height / 2;
            mesh_left.position.z = depth / 2;
            if (isMaterial == true) {
                mesh_left.material = material_outside;
            }


            mesh_right.position.x = width / 2 - outThickness / 2;
            mesh_right.position.y = height / 2;
            mesh_right.position.z = depth / 2;
            if (isMaterial == true) {
                mesh_right.material = material_outside;
            }


            drawHorizontals(horizontalPositions);
            drawVerticals(verticalPositions);

            drawDoors2(horizontalPositions);
            drawDoorsHandles(horizontalPositions);
            isMaterial = false;
            total_ship_price = total_price + ship_price;
            changeTotalPrice();
        }

        function calcModel() {

            // Synconizing Textfields and sliders
            width = document.getElementById("slider1").value;
            height = document.getElementById("slider2").value;
            depth = document.getElementById("slider5").value;

            door_space = $("input[name=input-space-radio]:checked").val();
            //box_dimention_info.depth = depth;
            door_position_z = Number(depth);
            door_handler_position_z = Number(depth) + 0.3;
            var horizontalDensity = document.getElementById("slider3").value;
            var verticalDensity = document.getElementById("slider4").value;
            var range_horizontal_max = document.getElementById("slider3").max;
            var range_vertical_max = document.getElementById("slider4").max;

            texture_door = new THREE.TextureLoader().load(img_src_door);
            material_plane = new THREE.MeshBasicMaterial({map: texture_door});
            material_transparent = new THREE.MeshBasicMaterial({
                transparent: true,
                opacity: 0,
                wireframe: true,
                side: THREE.DoubleSide
            });
            var text_drawer = new THREE.TextureLoader().load(img_src_drawer);
            var material_drawer = new THREE.MeshBasicMaterial({map: text_drawer});
            material = [material_drawer, material_drawer, material_transparent, material_drawer, material_drawer, material_drawer];
            texture_inside = new THREE.TextureLoader().load(img_src_inside);
            material_inside = new THREE.MeshBasicMaterial({map: texture_inside});

            texture_outside = new THREE.TextureLoader().load(img_src_outside);
            material_outside = new THREE.MeshBasicMaterial({map: texture_outside});

            // Settings for min and max density


            var minHorizontal = Math.ceil(height / (maxHorizontalDistance + 1));
            var maxHorizontal = Math.floor(height / (minHorizontalDistance + 1));

            horizontals = Math.floor(minHorizontal + (maxHorizontal - minHorizontal) * horizontalDensity / range_horizontal_max);


            var minVerticals = Math.ceil(width / (maxVerticalDistance + 1));
            var maxVerticals = Math.floor(width / (minVerticalDistance + 1));

            verticals = Math.floor(minVerticals + (maxVerticals - minVerticals) * verticalDensity / range_vertical_max);


            horizontalPositions = new Array(horizontals);
            var horizontalCounter;
            for (horizontalCounter = 0; horizontalCounter < horizontals; horizontalCounter++) {
                horizontalPositions[horizontalCounter] = 0 + outThickness / 2 + ((height - outThickness) / (Number(horizontals) + 1)
                    * (horizontalCounter + 1));
            }

            verticalPositions = new Array(verticals);
            var verticalCounter;
            for (verticalCounter = 0; verticalCounter < verticals; verticalCounter++) {
                verticalPositions[verticalCounter] = 0 - width / 2 + outThickness / 2 + ((width - outThickness) / (Number(verticals) + 1)
                    * (verticalCounter + 1));
            }
            setCompartment();
            draw();


            /*var jsonStr = JSON.stringify(scene.toJSON());
            const fs = require('fs')



			// Write data in 'Output.txt' .
			fs.writeFile('Output.txt', jsonStr, (err) => {

			    // In case of a error throw err.
			    if (err) throw err;
			}) */

        }

        function exportData() {
            // var width = document.getElementById("slider1").value;
            // var height = document.getElementById("slider2").value;
            var horizontalDensity = document.getElementById("slider3").value;
            var verticalDensity = document.getElementById("slider4").value;
            // var depth = document.getElementById("slider5").value;
            // var thickness = $("input[name=input-thick-radio]:checked").val();
            // var scale_z = $("input[name=input-door-radio]:checked").val();
            var jsonObj = new Object();
            var sliderInfo = {
                width: width,
                height: height,
                horizontalDensity: horizontalDensity,
                verticalDensity: verticalDensity,
                depth: depth,
                isLocation: isLocation,
                location_id: location_id,
                location_status: location_status,
                door_space: door_space,
                inner_material_id: inner_material_id,
                outter_material_id: outter_material_id,
                door_material_id: door_material_id,
                drawer_material_id: drawer_material_id,
                thickness: thickness,
                outThickness: outThickness,
                scale_z: scale_z,
                img_src_door: img_src_door,
                img_src_outside: img_src_outside,
                img_src_inside: img_src_inside,

                scale_z_drawer: scale_z_drawer,
                img_src_drawer: img_src_drawer
            };


            jsonObj.sliderInfo = sliderInfo;
            jsonObj.horizontalInfo = horizontalPositions;
            jsonObj.verticalInfo = verticalPositions;

            var doorInfomation = [];
            for (var horizontalCounter = 0; horizontalCounter < horizontalPositions.length + 1; horizontalCounter++) {
                var horizontalDoorInfo = [];
                for (var verticalCounter = 0; verticalCounter < verticalPositions.length + 1; verticalCounter++) {
                    horizontalDoorInfo.push(door_info[horizontalCounter][verticalCounter]);
                }
                doorInfomation.push(horizontalDoorInfo);
            }
            jsonObj.doorInfo = doorInfomation;

            var jsonStr = JSON.stringify(jsonObj);
            return jsonStr;
        }

        $("#btn_save").on("click", function (event) {
            $("#id-email").val('');
            $("#id-title").val('');
            $("#id-comment").val('');
            $("#id-modal").modal("show");
            /*event.preventDefault();
            */
        });

        function validateEmail(mail) {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (mail.match(mailformat)) {
                return true;
            }
            return false;
        }

        $("#id-btn-submit").on("click", function (event) {
            event.preventDefault();
            var url;
            var email = $("#id-email").val();
            var title = $("#id-title").val();
            var comment = $("#id-comment").val();


            if (email == '' || validateEmail(email) == false) {
                toastr.error("Required valid email");
                return;
            }
            if (title == '') {
                toastr.error("Required title");
                return;
            }

            if (comment == '') {
                toastr.error("Required comment");
                return;
            }
            //var image_change = $("#id-image-changed").val();

            var json = exportData();
            var url = '<?=url('/save')?>';
            $("#id-modal").modal("hide");
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    json_content: json,
                    email: email,
                    title: title,
                    comment: comment
                },
                dataType: "json",
                success: function (response) {
                    toastr.success("Success to send email");
                },
                error: function () {
                    toastr.error("Failed to send email");
                }
            });
        });


        function download(text, name, type) {
            var file = new Blob([text], {type: type});
            if (window.navigator.msSaveOrOpenBlob) // IE10+
                window.navigator.msSaveOrOpenBlob(file, name);
            else { // Others
                var a = document.createElement("a"),
                    url = URL.createObjectURL(file);
                a.href = url;
                a.download = name;
                document.body.appendChild(a);
                a.click();
                setTimeout(function () {
                    document.body.removeChild(a);
                    window.URL.revokeObjectURL(url);
                }, 0);
            }
        }


        function animate(time) {
            // let Tween engine know it is time to animate stuff
            TWEEN.update(time);
            controls.update();
            renderer.render(scene, camera);

            // request the next frame to draw in a few milliseconds
            requestAnimationFrame(animate);
            //setTimeout(animate, 250);
        }


    </script>
@endsection
