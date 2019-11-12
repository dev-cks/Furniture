@foreach($materials as $index => $material)
    <div class="offset-top-66">
        <input type="hidden" name="material-id" value="<?=$material->material_id;?>">
        <!-- Product-->
        <div class="product product-list product-list-wide unit flex-md-row align-items-sm-start">
            <!-- Product Image-->

            <div class="unit-body text-left" style="width: 100%">
                <div class="row justify-content-sm-center text-lg-left">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="control-label" > Texture: </label>
                            <div class="fileinput fileinput-new" data-provides="fileinput" >
                                <div class="user-image">
                                    <div class="img-fluid" >

                                        <img  alt=""  src="<?=asset('image').'/'.$material->img;?>" id="<?='id_texture'.$material->material_id;?>" material-id="<?=$material->material_id;?>"
                                              style="height: 150px;width: 150px" onerror = "this.src='<?=asset('dummy.png');?>'">

                                    </div>
                                    <input type="hidden" id="<?='change_texture'.$material->material_id;?>" value="0">
                                    <div class="user-image-buttons">
                                                <span class="btn btn-azure btn-file btn-sm">
                                                    <input type="file" id="<?='id_upload'.$material->material_id;?>" name="materialImg" style="display: none;"  accept="image/*" material-id="<?=$material->material_id;?>"/>
                                                    <input type="button" style="color: black;" value="Browse..." onclick="document.getElementById('<?='id_upload'.$material->material_id;?>').click();" />

                                                </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="control-label" for="id-internal"> Internal Name: </label>
                            <input type="email" class="form-control" id="<?='id_internal'.$material->material_id;?>"  material-id="<?=$material->material_id;?>" value="<?=$material->internal_name;?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-display"> Display Name: </label>
                            <input type="text" class="form-control"  id = "<?='id_display'.$material->material_id;?>" material-id="<?=$material->material_id;?>" value="<?=$material->display_name;?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id-thickness"> Thickness(mm): </label>
                            <input type="number" class="form-control " min="0" name="thickness" material-id="<?=$material->material_id;?>" id = "<?='id_thickness'.$material->material_id;?>" value="<?=$material->thickness;?>">
                        </div>
                    </div>
                    <div class="col-lg-2" style="padding-top: 0px">
                        <label class="control-label" > Default </label>
                        <div class="custom-control custom-radio">
                            @if(($material->door_info)[0]->default_id == 1)
                                <input class="custom-control-input" id="<?='id_inner_default'.$material->material_id;?>" name="<?='name_inner_default';?>" value="0" type="radio" checked>
                            @else
                                <input class="custom-control-input" id="<?='id_inner_default'.$material->material_id;?>" name="<?='name_inner_default';?>" value="0" type="radio">
                            @endif
                            <label class="custom-control-label" for="<?='id_inner_default'.$material->material_id;?>">Inner</label>
                        </div>
                        <div class="custom-control custom-radio">
                            @if(($material->door_info)[1]->default_id == 1)
                                <input class="custom-control-input" id="<?='id_outer_default'.$material->material_id;?>" name="<?='name_outer_default';?>" value="1" type="radio" checked>
                            @else
                                <input class="custom-control-input" id="<?='id_outer_default'.$material->material_id;?>" name="<?='name_outer_default';?>" value="1" type="radio">
                            @endif
                            <label class="custom-control-label" for="<?='id_outer_default'.$material->material_id;?>">Outer</label>
                        </div>
                        <div class="custom-control custom-radio">
                            @if(($material->door_info)[2]->default_id == 1)
                                <input class="custom-control-input" id="<?='id_door_default'.$material->material_id;?>" name="<?='name_door_default';?>" value="2" type="radio" checked>
                            @else
                                <input class="custom-control-input" id="<?='id_door_default'.$material->material_id;?>" name="<?='name_door_default';?>" value="2" type="radio">
                            @endif
                            <label class="custom-control-label" for="<?='id_door_default'.$material->material_id;?>">Door</label>
                        </div>
                        <div class="custom-control custom-radio">
                            @if(($material->door_info)[3]->default_id == 1)
                                <input class="custom-control-input" id="<?='id_drawer_default'.$material->material_id;?>" name="<?='name_drawer_default';?>" value="3" type="radio" checked>
                            @else
                                <input class="custom-control-input" id="<?='id_drawer_default'.$material->material_id;?>" name="<?='name_drawer_default';?>" value="3" type="radio">
                            @endif
                            <label class="custom-control-label" for="<?='id_drawer_default'.$material->material_id;?>">Drawer</label>
                        </div>

                        <label class="control-label" style="margin-top: 16px;"> Can be used as </label>
                        <div class="check-box-title">

                            <div class="custom-control custom-checkbox d-inline-block" style="margin-left: 20px">
                                @if(($material->door_info)[0]->status == 1)
                                    <input class="custom-control-input" id="<?='id_inner'.$material->material_id;?>" name="inner" material-id="<?=$material->material_id;?>" type="checkbox" checked="true">
                                @else
                                    <input class="custom-control-input" id="<?='id_inner'.$material->material_id;?>" name="inner" material-id="<?=$material->material_id;?>" type="checkbox">
                                @endif
                                <label class="custom-control-label" for="<?='id_inner'.$material->material_id;?>">Inner</label>
                            </div>
                        </div>

                        <div class="check-box-title">
                            <div class="custom-control custom-checkbox d-inline-block" style="margin-left: 20px">
                                @if(($material->door_info)[1]->status == 1)
                                    <input class="custom-control-input" material-id="<?=$material->material_id;?>" id="<?='id_outer'.$material->material_id;?>" name="outer" type="checkbox" checked="true">
                                @else
                                    <input class="custom-control-input" material-id="<?=$material->material_id;?>" id="<?='id_outer'.$material->material_id;?>" name="outer" type="checkbox">
                                @endif
                                <label class="custom-control-label" for="<?='id_outer'.$material->material_id;?>">Outer</label>
                            </div>

                        </div>

                        <div class="check-box-title">
                            <div class="custom-control custom-checkbox d-inline-block"style="margin-left: 20px">
                                @if(($material->door_info)[2]->status == 1)
                                    <input class="custom-control-input" material-id="<?=$material->material_id;?>" id="<?='id_door'.$material->material_id;?>" name="door" type="checkbox" checked="true">
                                @else
                                    <input class="custom-control-input" material-id="<?=$material->material_id;?>" id="<?='id_door'.$material->material_id;?>" name="door" type="checkbox">
                                @endif
                                <label class="custom-control-label" for="<?='id_door'.$material->material_id;?>">Door</label>
                            </div>

                        </div>

                        <div class="check-box-title">
                            <div class="custom-control custom-checkbox d-inline-block" style="margin-left: 20px">
                                @if(($material->door_info)[3]->status == 1)
                                    <input class="custom-control-input" material-id="<?=$material->material_id;?>" id="<?='id_drawer'.$material->material_id;?>" name="drawer" type="checkbox" checked="true">
                                @else
                                    <input class="custom-control-input" material-id="<?=$material->material_id;?>" id="<?='id_drawer'.$material->material_id;?>" name="drawer" type="checkbox">
                                @endif
                                <label class="custom-control-label" for="<?='id_drawer'.$material->material_id;?>">Drawer</label>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="control-label" for="<?='id_price'.$material->material_id;?>"> Price: </label>
                            <input type="number" class="form-control" name="price" material-id="<?=$material->material_id;?>" id = "<?='id_price'.$material->material_id;?>" value="<?=$material->basic_price;?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="<?='id_mxheight'.$material->material_id;?>"> Normal Max Height: </label>
                            <input type="number" class="form-control" name="mxheight" material-id="<?=$material->material_id;?>" id = "<?='id_mxheight'.$material->material_id;?>" value="<?=$material->basic_height;?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="<?='id_expriceheight'.$material->material_id;?>"> Price factor for exceeding max Height: </label>
                            <input type="number" class="form-control" name="expriceheight" material-id="<?=$material->material_id;?>" id = "<?='id_expriceheight'.$material->material_id;?>" value="<?=$material->price_exceed_height;?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="<?='id_lmheight'.$material->material_id;?>"> Possible Max Height: </label>
                            <input type="number" class="form-control" name="lmheight" material-id="<?=$material->material_id;?>" id = "<?='id_lmheight'.$material->material_id;?>" value="<?=$material->possible_height;?>">
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="control-label" for="<?='id_mxwidth'.$material->material_id;?>"> Normal Max Width: </label>
                            <input type="number" class="form-control" name="mxwidth" material-id="<?=$material->material_id;?>" id = "<?='id_mxwidth'.$material->material_id;?>" value="<?=$material->basic_width;?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="<?='id_expricewidth'.$material->material_id;?>"> Price factor for exceeding max Width: </label>
                            <input type="number" class="form-control" name="expricewidth" material-id="<?=$material->material_id;?>" id = "<?='id_expricewidth'.$material->material_id;?>" value="<?=$material->price_exceed_width;?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="<?='id_lmwidth'.$material->material_id;?>"> Possible Max Width: </label>
                            <input type="number" class="form-control" name="lmwidth" material-id="<?=$material->material_id;?>" id = "<?='id_lmwidth'.$material->material_id;?>" value="<?=$material->possible_width;?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
