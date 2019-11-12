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

        .custom-radio {
            margin-left: 20px;
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
                    <li class="list-inline-item"><a class="offset-top-10 btn btn-default"  id="btn_add">Add Material</a></li>


                </ul>
            </div>


            <div id="mainBody">
                @include('material_page')
            </div>
            <!-- Shop Grid View-->

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
                                    <input type="hidden" id="change_texture" value="0">
                                    <div class="user-image-buttons">
                                        <span class="btn btn-azure btn-file btn-sm">
                                            <input type="file" id="id-upload" name="materialModalImg" style="display: none;"  accept="image/*"/>
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


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-info" id="id-btn-submit" style="margin-top: 0px !important;">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade in" id="id-modal-material" tabindex="-1" role="dialog" aria-labelledby="Material" aria-hidden="true">
        <form method="post" enctype="multipart/form-data" id="id-user-form" >
            {{csrf_field()}}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="id-modal-material-title">Select Material</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="radio-parent">
                                <label class="title-slider" >
                                    Material:
                                </label>
                                <div class="radio-sub" id="default_material">
                                    @include('material_modal')

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-info" id="id-btn-material-submit" style="margin-top: 0px !important;">
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
        var material_id;
        var change_image;
        var total;
        var current_page = 0;




        jQuery(document).ready(function() {


            var select_id;
            var select_modal_id;

            $('#id-upload').change(function(){
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $("#change_texture").val(1);
                        $('#id-texture').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else
                {
                    //$('#img').attr('src', '/assets/no_preview.png');
                }
            });


            $("#btn_add").click(function(event) {
                $("#id-internal").val('');
                $("#id-display").val('');
                $("#id-thickness").val('0');
                $("#id-price").val('0');
                $("#id-mxheight").val('0');
                $("#id-expriceheight").val('0');
                $("#id-lmheight").val('0');
                $("#id-mxwidth").val('0');
                $("#id-expricewidth").val('0');
                $("#id-lmwidth").val('0');
                $('#id-texture').attr('src', '<?=asset('dummy.png');?>');
                $("#id-btn-submit").text('Add');
                $("#id-modal").modal("show");
                change_image = false;
            });

            $("#btn_restore").click(function() {

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
                            url: '<?=url('ajax/material/restore')?>',
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

            $("[name=materialImg]").change(function(){
                var input = this;
                var url = $(this).val();
                var material_id = $(this).attr('material-id');
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        change_image = true;
                        $("#change_texture" + material_id).val(1);
                        $('#id_texture' + material_id).attr('src', e.target.result);
                        $('#material_modal_img' + material_id).attr('src', e.target.result);
                        $(".material-image").each(function(index){
                           var default_id = $(this).attr('default-id');
                           if(default_id == material_id) {
                               $(this).attr('src', e.target.result);
                           }
                        });
                    };
                    reader.readAsDataURL(input.files[0]);
                }
                else
                {
                    //$('#img').attr('src', '/assets/no_preview.png');
                }
            });

            $(".material-image-modal").on('click', function(event){
                select_modal_id = $(this).attr('material-id');
                $('.round-border').each(function() {
                    $(this).removeClass('round-border');

                });
                $(this).addClass('round-border');
            });

            $(".material-image").click(function (event) {
                select_id = this.id;
                var default_id = $(this).attr('default-id');
                $('.round-border').each(function() {
                    $(this).removeClass('round-border');

                });
                $(".material-image-modal").each(function() {
                    var material_id = $(this).attr('material-id');
                    if(material_id == default_id) {
                        $(this).addClass('round-border');
                    }

                });
                $("#id-modal-material").modal("show");
            });

            $("#id-btn-material-submit").click(function() {
                $("#" + select_id).attr('default-id', select_modal_id);
                $("#" + select_id).attr('src', $('#id_texture' + select_modal_id).attr('src'));
                $("#id-modal-material").modal("hide");
            });

            function getAllMaterialInfo() {
                var materialInfo = [];
                $("[name=material-id]").each(function() {
                    var id = $(this).val();
                    var internal = $("#id_internal" + id).val();
                    var display = $("#id_display" + id).val();
                    var thickness = $("#id_thickness" + id).val();

                    var inner = $("#id_inner" + id).prop('checked');
                    if(inner == true) {
                        inner = 1;
                    } else {
                        inner = 0;
                    }
                    var inner_default = $("#id_inner_default" + id).prop('checked');
                    var outer = $("#id_outer" + id).prop('checked');
                    if(outer == true) {
                        outer = 1;
                    } else {
                        outer = 0;
                    }
                    var outer_default = $("#id_outer_default" + id).prop('checked');
                    var door = $("#id_door" + id).prop('checked');
                    if(door == true) {
                        door = 1;
                    } else {
                        door = 0;
                    }
                    var door_default = $("#id_door_default" + id).prop('checked');
                    var draw = $("#id_drawer" + id).prop('checked');
                    if(draw == true) {
                        draw = 1;
                    } else {
                        draw = 0;
                    }
                    var draw_default = $("#id_drawer_default" + id).prop('checked');
                    var price = $("#id_price" + id).val();
                    var mxheight = $("#id_mxheight" + id).val();
                    var expriceheight = $("#id_expriceheight" + id).val();
                    var lmheight = $("#id_lmheight" + id).val();
                    var mxwidth = $("#id_mxwidth" + id).val();
                    var expricewidth = $("#id_expricewidth" + id).val();
                    var lmwidth = $("#id_lmwidth" + id).val();
                    var change_texture = Number($("#change_texture" + id).val());
                    var jsonObj = {
                        id: id,
                        internal: internal,
                        display: display,
                        thickness: Number(thickness),
                        inner: inner,
                        inner_default: Number(inner_default),
                        outer: outer,
                        outer_default: Number(outer_default),
                        door: door,
                        door_default: Number(door_default),
                        draw: draw,
                        draw_default: Number(draw_default),
                        price: Number(price),
                        mxheight: Number(mxheight),
                        expriceheight: Number(expriceheight),
                        lmheight: Number(lmheight),
                        mxwidth: Number(mxwidth),
                        expricewidth: Number(expricewidth),
                        lmwidth: Number(lmwidth),
                        change: change_texture,
                    }
                    materialInfo.push(jsonObj);
                });
                return materialInfo;
            }

            $("#btn_save").click(function() {
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
                        var materialInfo = getAllMaterialInfo();
                        var formData = new FormData();
                        var isInner = false;
                        var isOuter = false;
                        var isDoor = false;
                        var isDrawer = false;
                        for(var i = 0; i < materialInfo.length; i ++) {
                            var detailInfo = materialInfo[i];
                            console.log(detailInfo);
                            if(detailInfo.internal == '' || detailInfo.display == '') {
                                toastr.error("Required name");
                                return;
                            }

                            if(detailInfo.thickness <= 0 || detailInfo.price <= 0 || detailInfo.mxheight <= 0 || detailInfo.expriceheight <= 0 || detailInfo.lmheight <= 0 ||
                                detailInfo.mxwidth <= 0 || detailInfo.expericewidth <= 0 || detailInfo.lmwidth <= 0) {
                                toastr.error("Required value bigger than 0 for material " + detailInfo.display);
                                return;
                            }
                            if(detailInfo.lmheight < detailInfo.mxheight) {
                                toastr.error("Required limit height bigger than normal height for material " + detailInfo.display);
                                return;
                            }

                            if(detailInfo.lmwidth < detailInfo.mxwidth) {
                                toastr.error("Required limit width bigger than normal width for material " + detailInfo.display);
                                return;
                            }

                            if(detailInfo.inner == 0 && detailInfo.inner_default == 1) {
                                toastr.error("Required inner property for " + detailInfo.display + " must be active");
                                return;
                            }
                            if(detailInfo.inner_default == 1) {
                                isInner = true;
                            }

                            if(detailInfo.outer == 0 && detailInfo.outer_default == 1) {
                                toastr.error("Required outer property for " + detailInfo.display + " must be active");
                                return;
                            }

                            if(detailInfo.outer_default == 1) {
                                isOuter = true;
                            }
                            if(detailInfo.door == 0 && detailInfo.door_default == 1) {
                                toastr.error("Required door property for " + detailInfo.display + " must be active");
                                return;
                            }

                            if(detailInfo.door_default == 1) {
                                isDoor = true;
                            }
                            if(detailInfo.draw == 0 && detailInfo.draw_default == 1) {
                                toastr.error("Required drawer property for " + detailInfo.display + " must be active");
                                return;
                            }


                            if(detailInfo.draw_default == 1) {
                                isDrawer = true;
                            }

                            var id = detailInfo.id;
                            if(detailInfo.change == 1) {
                                var name="material_image_src" + id;
                                var files = document.getElementById("id_upload" + id).files;
                                console.log("Length is " + files.length);
                                formData.append(name, files[0]);
                            }
                        }
                        if(isInner == false) {
                            toastr.error("Required at least one inner default material");
                            return ;
                        }
                        if(isOuter == false) {
                            toastr.error("Required at least one outer default material");
                            return ;
                        }
                        if(isDoor == false) {
                            toastr.error("Required at least one door default material");
                            return ;
                        }
                        if(isDrawer == false) {
                            toastr.error("Required at least one drawer default material");
                            return ;
                        }
                        var jsonObj = new Object();
                        jsonObj.materialInfo = materialInfo;
                        var url = '<?=url('ajax/material/edit')?>';
                        formData.append('json',  JSON.stringify(jsonObj));
                        $.ajax({
                            url: url,
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function (resp) {
                                if(resp.status){
                                    toastr.success("Successfully completed");
                                    window.location.reload();
                                    //total = total + 1;
                                    //showPage(current_page);
                                } else {
                                    toastr.error("Failed to upload");
                                }
                            },
                            error: function (err) {
                                toastr.error("Failed to upload");
                                console.log(err);
                            }
                        });
                    });

            });

            $("#id-btn-submit").click(function (event) {
                var internal = $("#id-internal").val();
                var display = $("#id-display").val();
                var thickness = Number($("#id-thickness").val());
                var price = Number($("#id-price").val());
                var mxheight = Number($("#id-mxheight").val());
                var expriceheight = Number($("#id-expriceheight").val());
                var lmheight = Number($("#id-lmheight").val());
                var mxwidth = Number($("#id-mxwidth").val());
                var expericewidth = Number($("#id-expricewidth").val());
                var lmwidth = Number($("#id-lmwidth").val());
                var status = $("#id-btn-submit").text();
                if(internal == '' || display == '') {
                    toastr.error("Required name");
                    return;
                }

                var change_texture = $("#change_texture").val();

                if(Number(change_texture) == 0) {
                    toastr.error("Required texture image");
                    return;
                }
                if(thickness <= 0 || price <= 0 || mxheight <= 0 || expriceheight <= 0 || lmheight <= 0 || mxwidth <= 0 || expericewidth <= 0 || lmwidth <= 0) {
                    toastr.error("Required value bigger than 0");
                    return;
                }
                if(lmheight < mxheight) {
                    toastr.error("Required limit height bigger than normal height");
                    return;
                }

                if(lmwidth < mxwidth) {
                    toastr.error("Required limit width bigger than normal width");
                    return;
                }

                var url = '<?=url('ajax/material/add')?>';
                var data = new FormData($("form[id='id-user-form']")[0]);
                $.ajax({
                    url: url,
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function (resp) {
                        if(resp.status){
                            toastr.success("Successfully completed");
                            $("#id-modal").modal("hide");
                            window.location.reload();
                            //total = total + 1;
                            //showPage(current_page);
                        } else {
                            toastr.error("Failed to upload");
                        }
                    },
                    error: function (err) {
                        toastr.error("Failed to upload");
                        console.log(err);
                    }
                });
            });
        });




    </script>
@endsection
