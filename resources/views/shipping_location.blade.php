@foreach($locations as $index => $location)
    <div class="offset-top-66">
        <!-- Product-->
        <div class="product product-list product-list-wide unit flex-md-row align-items-sm-start">
            <!-- Product Image-->

            <div class="unit-body text-left">
                <input type="hidden" name="shipping_id" value="<?=$location->id;?>"/>
                <h2><?=$location->name;?></h2>
                <hr class="divider bg-mantis">
                <div class="unit flex-xl-row align-items-xl-start">

                    <div class="unit-body">

                            <div class="row justify-content-sm-center text-lg-left">
                                @foreach($location -> price_info as $index_price => $price_info)
                                    <div class="col-md-9 col-lg-4 offset-xl-0">
                                        <!-- Icon Box Type 3-->
                                        <div class="unit align-items-center unit-spacing-xs unit-xs flex-sm-row text-center text-sm-left">
                                            <div class="unit-left"></div>
                                            <div class="unit-body">
                                                @if($price_info -> status == 0)
                                                    <h4 class="text-spacing-60 text-uppercase font-weight-bold">SHIPPING FOR SHELF ASSEMBLY</h4>
                                                @elseif($price_info -> status == 1)
                                                    <h4 class="text-spacing-60 text-uppercase font-weight-bold">SHIPPING ASSEMBLED</h4>
                                                @else
                                                    <h4 class="text-spacing-60 text-uppercase font-weight-bold">SHIPPING WITH ON THE ASSEMBLY</h4>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="main-content">
                                            <div class="custom-control custom-radio ">
                                                @if($price_info -> default == 1)
                                                    <input class="custom-control-input door-content-data" id="<?='ship_default'.$location->id.$price_info -> status;?>" name="<?='ship_default'.$location->id;?>" value="<?=$price_info -> status;?>" type="radio" checked="checked">
                                                @else
                                                    <input class="custom-control-input door-content-data" id="<?='ship_default'.$location->id.$price_info -> status;?>" name="<?='ship_default'.$location->id;?>" value="<?=$price_info -> status;?>" type="radio">
                                                @endif
                                                <label class="custom-control-label" for="<?='ship_default'.$location->id.$price_info -> status;?>">Default</label>
                                            </div>

                                            <div class="custom-control custom-checkbox ">
                                                @if($price_info -> active == 1)
                                                    <input class="custom-control-input" id="<?='ship_active'.$location->id.$price_info -> status;?>" name="<?='ship_active'.$location->id.$price_info -> status;?>"  type="checkbox" checked>
                                                @else
                                                    <input class="custom-control-input" id="<?='ship_active'.$location->id.$price_info -> status;?>" name="<?='ship_active'.$location->id.$price_info -> status;?>" type="checkbox">
                                                @endif
                                                <label class="custom-control-label" for="<?='ship_active'.$location->id.$price_info -> status;?>">Active</label>
                                            </div>
                                            <div class="row" style="margin-top: 10px">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label form-label-outside rd-input-label" for="<?='basic'.$location->id.$price_info -> status;?>">Basic Price</label>
                                                        <input class="form-control form-control-rect" type="number" value="<?=$price_info -> basic_price;?>" id="<?='basic'.$location->id.$price_info -> status;?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label form-label-outside rd-input-label" for="<?='volume'.$location->id.$price_info -> status;?>">Volume Price</label>
                                                        <input class="form-control form-control-rect" id="<?='volume'.$location->id.$price_info -> status;?>" type="number" value="<?=$price_info -> volume_price;?>">
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        <!-- Product Brand-->

                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
