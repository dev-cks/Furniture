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
                            <ul class="rd-navbar-nav">
                                @if(isset($preview) && $preview == true)

                                    <li><a href="<?=url('/publish');?>" class="btn  btn-anis-effect fadeIn animated" id="btn_preview">Publish</a>
                                    </li>
                                @else
                                    <li><a href="<?=url('/preview');?>" class="btn  btn-anis-effect fadeIn animated" id="btn_price">Preview</a>
                                    </li>
                                @endif
                                <li><a href="<?=url('/price');?>" class="btn  btn-anis-effect fadeIn animated" id="btn_price">Price Setting</a>
                                </li>

                                <li><a href="<?=url('/shipping');?>" class="btn  btn-anis-effect fadeIn animated" id="btn_price">Shipping Setting</a>
                                </li>

                                <li><a href="<?=url('/material');?>" class="btn  btn-anis-effect fadeIn animated" id="btn_material">Material Setting</a>
                                </li>

                                <li><a href="<?=url('/');?>" class="btn  btn-primary btn-anis-effect fadeIn animated" id="btn_sign">Sign Out</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</div>
