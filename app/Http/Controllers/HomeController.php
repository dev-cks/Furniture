<?php

namespace App\Http\Controllers;

use App\Model\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function welcome() {
        $homeModel = new HomeModel();
        $materials = $homeModel -> getAllMaterial();
        $innerMaterial = $homeModel -> getMaterialByType(0);
        $outerMaterial = $homeModel -> getMaterialByType(1);
        $doorMaterial = $homeModel -> getMaterialByType(2);
        $drawerMaterial = $homeModel -> getMaterialByType(3);
        $total = $homeModel -> getShippingCount();
        $locations = $homeModel -> getShipping();
        foreach($locations as $location) {
            $id = $location -> id;
            $price_info = $homeModel-> getLocationPriceInfo($id);
            $location -> price_info = $price_info;
        }
        $price = $homeModel -> getPrice();
        return view('welcome', [
            'json_content' => '',
            'materials' => $materials,
            'inner' => $innerMaterial,
            'outer' => $outerMaterial,
            'door' => $doorMaterial,
            'price' => $price,
            'drawer' => $drawerMaterial,
            'locations' => $locations,
            'preview' => false
        ]);
    }

    public function preview() {
        $homeModel = new HomeModel();
        $materials = $homeModel -> getAllMaterialTemp();
        $innerMaterial = $homeModel -> getMaterialTempByType(0);
        $outerMaterial = $homeModel -> getMaterialTempByType(1);
        $doorMaterial = $homeModel -> getMaterialTempByType(2);
        $drawerMaterial = $homeModel -> getMaterialTempByType(3);
        $price = $homeModel -> getPriceTemp();
        $total = $homeModel -> getShippingCount();
        $locations = $homeModel -> getShippingTemp(0, $total);
        foreach($locations as $location) {
            $id = $location -> id;
            $price_info = $homeModel-> getLocationPriceTempInfo($id);
            $location -> price_info = $price_info;
        }
        return view('welcome', [
            'json_content' => '',
            'materials' => $materials,
            'inner' => $innerMaterial,
            'outer' => $outerMaterial,
            'door' => $doorMaterial,
            'price' => $price,
            'drawer' => $drawerMaterial,
            'locations' => $locations,
            'preview' => true
        ]);
    }

    public function load() {
        $hash = \request('hash');
        $homeModel = new HomeModel();
        $jsonInfo = $homeModel ->getJSON($hash);
        $materials = $homeModel -> getAllMaterial();
        $locations = $homeModel -> getShipping();
        foreach($locations as $location) {
            $id = $location -> id;
            $price_info = $homeModel-> getLocationPriceInfo($id);
            $location -> price_info = $price_info;
        }

        if($jsonInfo == null) {
            return view('error');
        } else {
            $innerMaterial = $homeModel -> getMaterialByType(0);
            $outerMaterial = $homeModel -> getMaterialByType(1);
            $doorMaterial = $homeModel -> getMaterialByType(2);
            $drawerMaterial = $homeModel -> getMaterialByType(3);
            $json = $jsonInfo -> json;
            $jsonContent = json_decode($json, true);
            $json = $jsonContent['sliderInfo'];

            $inner_material_id = $json['inner_material_id'];
            $inner_material = $homeModel -> getDoorStatus($inner_material_id, 0);
            if($inner_material -> status == 0) {
                $json['inner_material_id'] = $innerMaterial[0] -> id;
                $json['thickness'] = $innerMaterial[0] -> thickness / 100;
                $json['img_src_inside'] = asset('image').'/'.$innerMaterial[0] -> img;
            }
            $outter_material_id = $json['outter_material_id'];
            $outer_material = $homeModel -> getDoorStatus($outter_material_id, 1);
            if($outer_material -> status == 0) {
                $json['outter_material_id'] = $outerMaterial[0] -> id;
                $json['outThickness'] = $outerMaterial[0] -> thickness / 100;
                $json['img_src_outside'] = asset('image').'/'.$outerMaterial[0] -> img;
            }
            $door_material_id = $json['door_material_id'];
            $door_material = $homeModel -> getDoorStatus($door_material_id, 2);
            if($door_material -> status == 0) {
                $json['door_material_id'] = $doorMaterial[0] -> id;
                $json['scale_z'] = $doorMaterial[0] -> thickness / 100;
                $json['img_src_door'] = asset('image').'/'.$doorMaterial[0] -> img;
            }
            $drawer_material_id = $json['drawer_material_id'];
            $drawer_material = $homeModel -> getDoorStatus($drawer_material_id, 3);
            if($drawer_material -> status == 0) {
                $json['drawer_material_id'] = $drawerMaterial[0] -> id;
                $json['scale_z_drawer'] =  $drawerMaterial[0] -> thickness / 100;
                $json['img_src_drawer'] = asset('image').'/'. $drawerMaterial[0] -> img;
            }

            $jsonContent['sliderInfo'] = $json;


            $price = $homeModel -> getPrice();

            //Log::info($jsonInfo -> json);
            return view('welcome', [
                'json_content' => json_encode($jsonContent),
                'materials' => $materials,
                'inner' => $innerMaterial,
                'outer' => $outerMaterial,
                'door' => $doorMaterial,
                'price' => $price,
                'drawer' => $drawerMaterial,
                'locations' => $locations,
                'preview' => false
            ]);
        }

    }

    public function save() {
        $content = \request("json_content");
        $email = \request('email');
        $title = \request('title');
        $comment = \request('comment');
        $cur = date('Y-m-d');
        $hash = Hash::make($content.$email.$title.$comment.$cur);
        $homeModel = new HomeModel();
        $homeModel -> saveJSON($content, $email, $title, $comment, $hash, $cur);
        $url = url('/load?hash='.$hash);
        $data = array('url'=> $url, 'comment'=> $comment);
        Mail::send('mail', $data, function($message) use ($comment, $title, $email) {
            $message->from(env("MAIL_USERNAME"), 'Furniture Admin');
            $message->to($email);
            $message->subject($title);
        });
        return json_encode('');
    }

    public function signIn() {
        $name = \request('name');
        $password = \request('password');
        $homeModel = new HomeModel();
        $user = $homeModel -> getUser($name, $password);
        if($user == null) {
            return response()->json([
                'status' => false,
                'msg' => 'Not exist user.'
            ]);
        }
        session()->put(SESS_UID,        $user->id);
        session()->put(SESS_USERNAME,   $user->name);
        return response()->json([
            'status' => true,
            'msg' => 'Success.'
        ]);


    }

    public function login() {
        return view('login');
    }

    public function material() {
        $homeModel = new HomeModel();
        $total = $homeModel -> getMaterialTempCount();

        $materials = $homeModel -> getMaterialsTemp(0, $total);
        foreach($materials as $material) {
            $id = $material -> material_id;
            Log::info($id);
            $door_info = $homeModel-> getDoorTempInfo($id);
            $material -> door_info = $door_info;
            Log::info($door_info);
        }
        Log::infO("Total is ".$total);
        Log::info($materials);

        return view('material', [
            'total' => $total,
            'materials' => $materials
        ]);
    }

    public function specialMaterial() {
        $status = \request('status');
        $id  = \request('id');
        $homeModel = new HomeModel();
        $materials = $homeModel -> getSpecialMaterialTemp($status, $id);
        if($materials == null) {
            $materials = [];
        }
        $materialInfo = $homeModel -> getMaterialTempInfo($id);
        array_push($materials, $materialInfo);

        return view('material_modal', [
            'whole_materials' => $materials
        ]);

    }

    public function getMaterial() {
        $page = \request('page');
        $page_count = 6;
        $st = $page * $page_count;
        $en = $page * $page_count + $page_count;
        Log::info("Index is ".$st.":".$en);
        $homeModel = new HomeModel();
        $materials = $homeModel -> getMaterialsTemp($st, $en);
        foreach($materials as $material) {
            $id = $material -> id;
            $door_info = $homeModel-> getDoorTempInfo($id);
            $material -> door_info = $door_info;
            Log::info($door_info);
        }
        return view('material_page', [
            'materials' => $materials
        ]);

    }

    public function price() {
        $homeModel = new HomeModel();
        $price = $homeModel -> getPriceTemp();
        return view('price', [
            'price' => $price
        ]);
    }

    public function savePrice() {
        $left = \request('left');
        $right = \request('right');
        $drawer = \request('drawer');
        $empty = \request('empty');


        $homeModel = new HomeModel();
        $homeModel -> savePriceTemp($left, $right, $drawer, $empty);



        return response()->json([
            'status' => true,
            'msg' => 'Success.'
        ]);
    }

    public function restorePrice() {
        $homeModel = new HomeModel();
        $price = $homeModel -> getPrice();
        $homeModel -> savePriceTemp($price -> price_left, $price -> price_right, $price -> price_drawer, $price -> price_empty);
        return response()->json([
            'status' => true,
            'price' => $price
        ]);
    }

    public function getMaterialInfo() {
        $id = \request('id');
        $homeModel = new HomeModel();
        $materialInfo = $homeModel -> getMaterialTempInfo($id);
        if ($materialInfo == null) {
            return response()->json([
                'status' => 'fail',
                'msg' => 'Material not exist.'
            ]);
        }

        $doorInfo = $homeModel -> getDoorTempInfo($id);
        $materialInfo -> innerstatus = 0;
        $materialInfo -> outerstatus = 0;
        $materialInfo -> doorstatus = 0;
        $materialInfo -> drawerstatus = 0;
        $materialInfo -> innerDefault = $homeModel -> usedDefaultTemp($id, 0);
        $materialInfo -> outerDefault = $homeModel -> usedDefaultTemp($id, 1);
        $materialInfo -> drawerDefault = $homeModel -> usedDefaultTemp($id, 2);
        $materialInfo -> doorDefault = $homeModel -> usedDefaultTemp($id, 3);
        if($doorInfo != null) {
            foreach ($doorInfo as $info) {
                if(isset($info -> door_status)) {
                    switch ($info -> door_status) {
                        case 0:
                            $materialInfo -> innerstatus = 1;
                            $materialInfo -> innerid = $info -> default_id;
                            $materialInfo -> innerimg = $info -> default_img;
                            break;
                        case 1:
                            $materialInfo -> outerstatus = 1;
                            $materialInfo -> outerid = $info -> default_id;
                            $materialInfo -> outerimg = $info -> default_img;
                            break;
                        case 2:
                            $materialInfo -> doorstatus = 1;
                            $materialInfo -> doorid = $info -> default_id;
                            $materialInfo -> doorimg = $info -> default_img;
                            break;
                        case 3:
                            $materialInfo -> drawerstatus = 1;
                            $materialInfo -> drawerid = $info -> default_id;
                            $materialInfo -> drawerimg = $info -> default_img;
                            break;
                        default:

                    }
                }


            }
        }
        //Log::info($materialInfo);
        return response()->json([
            'status' => 'ok',
            'data' => $materialInfo
        ]);
    }

    public function saveImage(Request $request, $name) {
        $fileName = "";
        if ($request->hasFile($name)) {
            $image_storage = config("filesystems.disks.image_storage");
            $ext = $request->file($name)->getClientOriginalExtension();
            $fileName =  "1_" . time() . "." . $ext;
            $request->file($name)->move($image_storage, $fileName);
        }
        return $fileName;
    }

    private function changeDoor($id, $inner, $innerdefault, $outer, $outerdefault, $door, $doordefault, $drawer, $drawerdefault) {
        $homeModel = new HomeModel();
        $homeModel -> removeDoors($id);
        $homeModel -> addDoorstatus($id, 0, $inner, $innerdefault);
        $homeModel -> addDoorstatus($id, 1, $outer, $outerdefault);
        $homeModel -> addDoorstatus($id, 2, $door, $doordefault);
        $homeModel -> addDoorstatus($id, 3, $drawer, $drawerdefault);

    }

    private function changeDoorTemp($id, $inner, $innerdefault, $outer, $outerdefault, $door, $doordefault, $drawer, $drawerdefault) {
        $homeModel = new HomeModel();
        $homeModel -> removeDoorsTemp($id);
        $homeModel -> addDoorstatusTemp($id, 0, $inner, $innerdefault);
        $homeModel -> addDoorstatusTemp($id, 1, $outer, $outerdefault);
        $homeModel -> addDoorstatusTemp($id, 2, $door, $doordefault);
        $homeModel -> addDoorstatusTemp($id, 3, $drawer, $drawerdefault);

    }

    public function addMaterial(Request $request) {

        $fileName = $this->saveImage($request, 'materialModalImg');
        $internal = \request('internal');
        $display = \request('display');
        $thickness = \request('thickness');
        $price = \request('price');
        $mxheight = \request('mxheight');
        $expriceheight = \request('expriceheight');
        $lmheight = \request('lmheight');
        $mxwidth = \request('mxwidth');
        $expricewidth = \request('expricewidth');
        $lmwidth = \request('lmwidth');
        $homeModel = new HomeModel();
        $id = $homeModel -> addMaterial($internal, $display, $fileName, $thickness, $price, $mxheight, $expriceheight, $lmheight, $mxwidth, $expricewidth, $lmwidth);
        $homeModel -> addMaterialTemp($id, $internal, $display, $fileName, $thickness, $price, $mxheight, $expriceheight, $lmheight, $mxwidth, $expricewidth, $lmwidth);
        $this->changeDoor($id, 0, 0, 0, 0, 0, 0, 0, 0);
        $this->changeDoorTemp($id, 0, 0, 0, 0, 0, 0, 0, 0);
        return response()->json([
            'status' => true
        ]);

    }

    public function editMaterial(Request $request) {
        $json = \request('json');
        $jsonContent = json_decode($json, true);
        $materialInfo = $jsonContent["materialInfo"];
        $homeModel = new HomeModel();
        for($i = 0; $i < count($materialInfo); $i ++) {
            $detailinfo = $materialInfo[$i];
            $id = $detailinfo["id"];
            $internal = $detailinfo["internal"];
            $display = $detailinfo["display"];
            $thickness = $detailinfo["thickness"];
            $price = $detailinfo["price"];
            $mxheight = $detailinfo["mxheight"];
            $expriceheight = $detailinfo["expriceheight"];
            $lmheight = $detailinfo["lmheight"];
            $mxwidth = $detailinfo["mxwidth"];
            $expricewidth = $detailinfo["expricewidth"];
            $lmwidth = $detailinfo["lmwidth"];
            $change = $detailinfo["change"];
            $inner = $detailinfo["inner"];
            $inner_default = $detailinfo["inner_default"];
            $outer = $detailinfo["outer"];
            $outer_default = $detailinfo["outer_default"];
            $door = $detailinfo["door"];
            $door_default = $detailinfo["door_default"];
            $draw = $detailinfo["draw"];
            $draw_default = $detailinfo["draw_default"];
            $fileName = "";

            if((int)$change == 1) {
                $fileName = $this->saveImage($request, 'material_image_src'.$id);
            }

            if($fileName == '') {
                Log::info($id);
                $material = $homeModel -> getMaterialTempInfo($id);
                $fileName = $material -> img;
            }
            $homeModel -> editMaterialTemp($id, $internal, $display, $fileName, $thickness, $price, $mxheight, $expriceheight, $lmheight, $mxwidth, $expricewidth, $lmwidth);
            $this->changeDoorTemp($id, $inner, $inner_default, $outer, $outer_default, $door, $door_default, $draw, $draw_default);

        }

        return response()->json([
            'status' => true
        ]);
    }

    public function removeMaterial() {
        $id = \request('id');
        $homeModel = new HomeModel();
        Log::info($id);
        if($homeModel -> usedDefaultMaterialTemp($id) == true) {
            return response()->json([
                'status' => false,
                'msg' => 'This material is default material of some material'
            ]);
        }
        $homeModel -> removeMaterialTemp($id);
        $homeModel -> removeDoorsTemp($id);
        return response()->json([
            'status' => true
        ]);
    }

    public function restoreMaterial() {
        $homeModel = new HomeModel();
        $allMaterial = $homeModel -> getAllMaterial();
        foreach ($allMaterial as $material) {
            $id = $material -> id;
            $materialInfo = $homeModel -> getMaterialInfo($id);
            $homeModel -> editMaterialTemp($id, $materialInfo -> internal_name, $materialInfo -> display_name, $materialInfo -> img, $materialInfo -> thickness,
                $materialInfo -> basic_price, $materialInfo -> basic_height, $materialInfo -> price_exceed_height, $materialInfo -> possible_height, $materialInfo -> basic_width,
                $materialInfo -> price_exceed_width, $materialInfo -> possible_width, $materialInfo -> status);
            $innerInfo = $homeModel -> getDoorContent($id, 0);
            $innerId =  $innerInfo -> default_id;
            $inner = $innerInfo -> status;

            $outerInfo = $homeModel -> getDoorContent($id, 1);
            $outerId =  $outerInfo -> default_id;
            $outer = $outerInfo -> status;

            $doorInfo = $homeModel -> getDoorContent($id, 2);
            $doorId =  $doorInfo -> default_id;
            $door = $doorInfo -> status;

            $drawInfo = $homeModel -> getDoorContent($id, 3);
            $drawId =  $drawInfo -> default_id;
            $draw = $drawInfo -> status;

            $this -> changeDoorTemp($id, $inner, $innerId, $outer, $outerId, $door, $doorId, $draw, $drawId);
        }

        return response()->json([
            'status' => true
        ]);
    }

    public function shipping() {
        $homeModel = new HomeModel();
        $total = $homeModel -> getShippingCount();
        $locations = $homeModel -> getShippingTemp(0, $total);
        foreach($locations as $location) {
            $id = $location -> id;
            $price_info = $homeModel-> getLocationPriceTempInfo($id);
            $location -> price_info = $price_info;
        }


        return view('shipping', [
            'locations' => $locations

        ]);
    }

    public function getShipping() {
        $page = \request('page');
        $page_count = 6;
        $st = $page * $page_count;
        $en = $page * $page_count + $page_count;
        Log::info("Index is ".$st.":".$en);
        $homeModel = new HomeModel();
        $locations = $homeModel -> getShippingTemp($st, $en);
        foreach($locations as $location) {
            $id = $location -> id;
            $price_info = $homeModel-> getLocationPriceTempInfo($id);
            $location -> price_info = $price_info;
        }
        return view('shipping_location', [
            'locations' => $locations
        ]);

    }

    public function shippingRestore() {
        $homeModel = new HomeModel();
        $locations = $homeModel -> getShipping();
        foreach($locations as $location) {
            $id = $location -> id;
            $prices = $homeModel-> getLocationPriceInfo($id);
            foreach($prices as $price) {
                $homeModel -> editLocationTemp($price->location_id, $price->status, $price->default, $price->active, $price->basic_price, $price->volume_price);
            }
        }
        return response()->json([
            'status' => true
        ]);
    }

    public function shippingSave() {
        $json = \request('json');
        $jsonContent = json_decode($json, true);
        $shipping_info = $jsonContent["shipping_information"];
        $homeModel = new HomeModel();

        for($i = 0; $i < count($shipping_info); $i ++) {
            $id = $shipping_info[$i]["id"];
            $prices = $shipping_info[$i]["price_info"];
            for($j = 0; $j < count($prices); $j ++) {
                $default = $prices[$j]["default"];
                $active = $prices[$j]["active"];
                $basic_price = $prices[$j]["basic_price"];
                $volume_price = $prices[$j]["volume_price"];
                $homeModel -> editLocationTemp($id, $j, $default, $active, $basic_price, $volume_price);
            }
        }

        return response()->json([
            'status' => true
        ]);
    }

    public function publish() {
        $homeModel = new HomeModel();
        $allMaterial = $homeModel -> getAllMaterialTemp();
        foreach ($allMaterial as $material) {
            $id = $material -> material_id;
            $materialInfo = $homeModel -> getMaterialTempInfo($id);
            $homeModel -> editMaterial($id, $materialInfo -> internal_name, $materialInfo -> display_name, $materialInfo -> img, $materialInfo -> thickness,
                $materialInfo -> basic_price, $materialInfo -> basic_height, $materialInfo -> price_exceed_height, $materialInfo -> possible_height, $materialInfo -> basic_width,
                $materialInfo -> price_exceed_width, $materialInfo -> possible_width, $materialInfo -> status);

            $innerInfo = $homeModel -> getDoorContentTemp($id, 0);
            $innerId =  $innerInfo -> default_id;
            $inner = $innerInfo -> status;

            $outerInfo = $homeModel -> getDoorContentTemp($id, 1);
            $outerId =  $outerInfo -> default_id;
            $outer = $outerInfo -> status;

            $doorInfo = $homeModel -> getDoorContentTemp($id, 2);
            $doorId =  $doorInfo -> default_id;
            $door = $doorInfo -> status;

            $drawInfo = $homeModel -> getDoorContentTemp($id, 3);
            $drawId =  $drawInfo -> default_id;
            $draw = $drawInfo -> status;

            $this -> changeDoor($id, $inner, $innerId, $outer, $outerId, $door, $doorId, $draw, $drawId);
        }

        $locations = $homeModel -> getShipping();
        foreach($locations as $location) {
            $id = $location -> id;
            $prices = $homeModel-> getLocationPriceTempInfo($id);
            foreach($prices as $price) {
                $homeModel -> editLocation($price->location_id, $price->status, $price->default, $price->active, $price->basic_price, $price->volume_price);
            }
        }
        $price = $homeModel -> getPriceTemp();
        $homeModel -> savePrice($price -> price_left, $price -> price_right, $price -> price_drawer, $price -> price_empty);
        return view('home');

    }

}
