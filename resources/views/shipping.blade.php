@extends('layouts.app')

@section('css4page')
    <style>
        .btn-picton-blue {
            margin-left: 30px !important;
            margin-top: 10px !important;
        }

        .product-image-area {
            width: 250px !important;
            height: 250px !important;
        }

        .user-image-buttons {
            margin-top: 15px;
        }


        .rounded-circle {

            width: 40px;
            height: 40px;
        }

        .round-border {
            border: solid 2px blue;
        }

        .check-box-title {
            display: flex;
            align-items: center;
        }

        .product-list-right {
            min-width: 20% !important;
        }

        .spacing-30 > * {
            margin-top: 30px !important;
        }

        h2 {
            text-align: center;
        }

        h4 {
            height: 56px;
        }

        .main-content {
            padding: 4px 16px;
        }

        .unit-body {
            width: 100%;
        }

        .col-lg-4 {
            border-left: 1px solid #d9d9d9;
        }
    </style>
@endsection
@section('nav')
    @include('layouts.admin_navbar')

@endsection
@section('content')


    <section class="section novi-background section-98 section-sm-124">

        <div class="container">

            <div class="offset-top-0 offset-md-top-10 col-xl-5 offset-xl-top-0 small text-xl-right" style="max-width: 100% !important;">
                <ul class="list-inline  p" style="text-align: right !important;">
                    <li class="list-inline-item"><a class="offset-top-10 btn btn-default" id="btn_restore">Restore</a></li>
                    <li class="list-inline-item"><a class="offset-top-10 btn btn-default"  id="btn_save">Save</a></li>

                </ul>
            </div>

            <div id="mainBody">
                @include('shipping_location')
            </div>
            <!-- Shop Grid View-->
            <div class="offset-top-66">
                <!-- Bootstrap Pagination-->
                <nav>

                </nav>
            </div>
        </div>
    </section>




@endsection

@section('modal')
    <div class="modal fade in" id="id-modal" tabindex="-1" role="dialog" aria-labelledby="Quiz" aria-hidden="true">
        <form method="post" enctype="multipart/form-data" id="id-user-form">
            {{csrf_field()}}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="id-modal-title">Material Property</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label" for="id-internal"> Internal Name: </label>
                            <input type="email" class="form-control" id="id-internal" name="internal"  >
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-display"> Display Name: </label>
                            <input type="text" class="form-control" name="display" id = "id-display" >
                        </div>

                        <div class="form-group">
                            <label class="control-label" > Texture: </label>
                            <div class="fileinput fileinput-new" data-provides="fileinput" >
                                <div class="user-image">
                                    <div class="img-fluid" >

                                        <img  alt=""  src="<?=asset('image').'/Holz.png';?>" id="id-texture"
                                             style="height: 150px;width: 150px" onerror = "this.src='<?=asset('dummy.png');?>'">

                                    </div>
                                    <div class="user-image-buttons">
                                        <span class="btn btn-azure btn-file btn-sm">
                                            <input type="file" id="id-upload" name="materialImg" style="display: none;"  accept="image/*"/>
                                            <input type="button" style="color: black;" value="Browse..." onclick="document.getElementById('id-upload').click();" />

                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="id-thickness"> Thickness(mm): </label>
                            <input type="number" class="form-control " min="0" name="thickness" id = "id-thickness" ></input>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-price"> Price: </label>
                            <input type="number" class="form-control" name="price" id = "id-price" ></input>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-mxheight"> Normal Max Height: </label>
                            <input type="number" class="form-control" name="mxheight" id = "id-mxheight" ></input>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-expriceheight"> Price factor for exceeding max Height: </label>
                            <input type="number" class="form-control" name="expriceheight" id = "id-expriceheight" ></input>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-lmheight"> Possible Max Height: </label>
                            <input type="number" class="form-control" name="lmheight" id = "id-lmheight" ></input>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-mxwidth"> Normal Max Width: </label>
                            <input type="number" class="form-control" name="mxwidth" id = "id-mxwidth" ></input>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-expricewidth"> Price factor for exceeding max Width: </label>
                            <input type="number" class="form-control" name="expricewidth" id = "id-expricewidth" ></input>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-lmwidth"> Possible Max Width: </label>
                            <input type="number" class="form-control" name="lmwidth" id = "id-lmwidth" ></input>
                        </div>
                        <div class="form-group check-box-title">
                            <div class="custom-control custom-checkbox d-inline-block">
                                <input class="custom-control-input" id="id-inner" name="inner" type="checkbox">
                                <label class="custom-control-label" for="id-inner">Inner</label>
                            </div>
                            <div class="custom-radio d-inline-block">
                                <img class="rounded-circle img-fluid d-block mx-auto material-image" id="inner-default" src="<?=asset('dummy.png');?>"  alt="">
                            </div>
                            <input type="text" name="innerdefault" id="id-innerdefault" style="display: none">
                        </div>

                        <div class="form-group check-box-title">
                            <div class="custom-control custom-checkbox d-inline-block">
                                <input class="custom-control-input" id="id-outer" name="outer" type="checkbox">
                                <label class="custom-control-label" for="id-outer">Outer</label>
                            </div>
                            <div class="custom-radio d-inline-block">
                                <img class="rounded-circle img-fluid d-block mx-auto material-image" id="outer-default" src="<?=asset('dummy.png');?>"  alt="">
                            </div>
                            <input type="text" name="outerdefault"  id="id-outerdefault" style="display: none">
                        </div>

                        <div class="form-group check-box-title">
                            <div class="custom-control custom-checkbox d-inline-block">
                                <input class="custom-control-input" id="id-door" name="door"  type="checkbox">
                                <label class="custom-control-label" for="id-door">Door</label>
                            </div>
                            <div class="custom-radio d-inline-block">
                                <img class="rounded-circle img-fluid d-block mx-auto material-image" id="door-default" src="<?=asset('dummy.png');?>"  alt="">
                            </div>
                            <input type="text" name="doordefault" id="id-doordefault" style="display: none">
                        </div>

                        <div class="form-group check-box-title">
                            <div class="custom-control custom-checkbox d-inline-block">
                                <input class="custom-control-input" id="id-drawer" name="drawer" type="checkbox">
                                <label class="custom-control-label" for="id-drawer">Drawer</label>
                            </div>
                            <div class="custom-radio d-inline-block">
                                <img class="rounded-circle img-fluid d-block mx-auto material-image" id="drawer-default" src="<?=asset('dummy.png');?>"  alt="">
                            </div>
                            <input type="text" name="drawerdefault" id="id-drawerdefault" style="display: none">
                        </div>


                        <input type="text" id="id-location" name="idlocation" style="display: none">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-info" id="id-btn-submit" style="margin-top: 0px !important;">
                            Modify
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js4event')



    <script language="javascript" type="text/javascript">
        jQuery(document).ready(function() {
            $("#btn_restore").click(function (event) {
                swal({
                        title: 'Restore',
                        text: "Are you sure able to restore?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    },
                    function(){
                        $.ajax({
                            type: 'post',
                            url: '<?=url('ajax/shipping/restore')?>',
                            data: {

                            },
                            dataType: "json",
                            success: function (response) {
                                window.location.reload();
                                //total = total - 1;
                                //showPage(current_page);
                            },
                            error: function () {
                                toastr.error('Server connection error');
                            }
                        });
                    });
            });

            $("#btn_save").click(function (event) {
                swal({
                        title: 'Save',
                        text: "Are you sure able to save?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    },
                    function(){
                        var json_value = new Object();
                        var shipping_information = [];
                        $("input[name=shipping_id]").each(function() {
                            var currentElement = $(this);

                            var id = currentElement.val();
                            var price_info = [];
                            var name_default = "ship_default" + id;
                            var default_value = $('input[name=' + name_default + ']:checked').val();
                            for(var i = 0; i < 3; i ++) {
                                var is_default = 0;
                                if(default_value == i) {
                                    is_default = 1;
                                }
                                var is_active = 0;
                                var name_active = "ship_active" + id + i;
                                if($("#" + name_active).is(":checked")) {
                                    is_active = 1;
                                }
                                var name_basic = "basic" + id + i;
                                var basic_price = $("#" + name_basic).val();
                                var name_volume = "volume" + id + i;
                                var volume_price = $("#" + name_volume).val();
                                var json_content = {
                                    default: is_default,
                                    active: is_active,
                                    basic_price: basic_price,
                                    volume_price: volume_price
                                }
                                price_info.push(json_content);
                            }

                            var location_info = {
                                id: id,
                                price_info: price_info
                            }

                            shipping_information.push(location_info);

                        });
                        json_value.shipping_information = shipping_information;
                        var jsonStr = JSON.stringify(json_value);
                        $.ajax({
                            type: 'post',
                            url: '<?=url('ajax/shipping/save')?>',
                            data: {
                                json: jsonStr
                            },
                            dataType: "json",
                            success: function (response) {
                                window.location.reload();
                                //total = total - 1;
                                //showPage(current_page);
                            },
                            error: function () {
                                toastr.error('Server connection error');
                            }
                        });
                    });


            });
        });

    </script>
@endsection
