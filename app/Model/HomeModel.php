<?php


namespace App\Model;
use DB;
use Hash;
use Illuminate\Support\Facades\Log;

class HomeModel
{
    public function saveJSON($json_content, $email, $title, $comment, $hash, $create_date) {
        $id = DB::table('t_save')->insertGetId([
            'hash'          => $hash,
            'email'         => $email,
            'title'         => $title,
            'comment'       => $comment,
            'json'          => $json_content,
            'create_date'   => $create_date
        ]);
        return $id;
    }

    public function getJSON($hash) {
        $jsonInfo = DB::table('t_save')
            ->where('hash', '=', $hash)
            ->first();
        return $jsonInfo;
    }

    public function getUser($name, $password) {
        $user = DB::table('t_user')
            ->where([
                ['name', '=', $name],
                ['password', '=', $password]
            ])
            ->first();
        return $user;
    }

    public function getPrice() {
        return DB::table('t_price')
            ->first();
    }

    public function getPriceTemp() {
        return DB::table('t_price_temp')
            ->first();
    }

    public function savePrice($left, $right, $drawer, $empty) {
        DB::table('t_price')
            ->where('id', 1)
            ->update([
                'price_left'    =>  $left,
                'price_right'    =>  $right,
                'price_drawer'    =>  $drawer,
                'price_empty'    =>  $empty
            ]);
    }

    public function savePriceTemp($left, $right, $drawer, $empty) {
        DB::table('t_price_temp')
            ->where('id', 1)
            ->update([
                'price_left'    =>  $left,
                'price_right'    =>  $right,
                'price_drawer'    =>  $drawer,
                'price_empty'    =>  $empty
            ]);
    }

    public function getMaterialCount() {
        $materials = DB::select(
            "SELECT COUNT(t_material.id) AS total
                FROM t_material
                WHERE status = 1
            "
        );
        return $materials[0]->total;
    }

    public function getMaterialTempCount() {
        $materials = DB::select(
            "SELECT COUNT(t_material_temp.material_id) AS total
                FROM t_material_temp
                WHERE status = 1
            "
        );
        return $materials[0]->total;
    }


    public function getMaterials($st, $en) {
        $materials = DB::select(
            "SELECT
                *
                FROM t_material
                WHERE status = 1
                ORDER BY id
                LIMIT $st , $en
            "
        );
        return $materials;
    }

    public function getMaterialsTemp($st, $en) {
        $materials = DB::select(
            "SELECT
                *
                FROM t_material_temp
                WHERE status = 1
                ORDER BY material_id
                LIMIT $st , $en
            "
        );
        return $materials;
    }

    public function getSpecialMaterial($status, $id) {
        $materials = DB::select(
            "SELECT
                t_material.*
                FROM t_material_usage
                LEFT JOIN t_material ON t_material_usage.material_id = t_material.id
                WHERE t_material_usage.door_status = $status AND t_material_usage.material_id <> $id AND t_material_usage.status = 1 AND t_material.status = 1
            "
        );
        return $materials;
    }

    public function getSpecialMaterialTemp($status, $id) {
        $materials = DB::select(
            "SELECT
                t_material_temp.*
                FROM t_material_usage_temp
                LEFT JOIN t_material_temp ON t_material_usage_temp.material_id = t_material_temp.material_id
                WHERE t_material_usage_temp.door_status = $status AND t_material_usage_temp.material_id <> $id AND t_material_usage_temp.status = 1 AND t_material_temp.status = 1
            "
        );
        return $materials;
    }
    public function getAllMaterial() {
        $materials = DB::select(
            "SELECT
                *
                FROM t_material
                WHERE status = 1
            "
        );
        return $materials;
    }

    public function getAllMaterialTemp() {
        $materials = DB::select(
            "SELECT
                *
                FROM t_material_temp
                WHERE status = 1
            "
        );
        return $materials;
    }

    public function getDoorInfo($id) {
        $materials = DB::select(
            "SELECT
                t_usage.default_name, t_usage.door_status, t_usage.default_img, t_usage.default_id
                FROM t_material
                LEFT JOIN (
                    SELECT t_material_usage.*, t_material.display_name as default_name, t_material.img as default_img
                    FROM t_material_usage
                    LEFT JOIN t_material ON t_material_usage.default_id = t_material.id
                    WHERE t_material.status = 1 AND t_material_usage.status = 1
                ) as t_usage ON t_usage.material_id = t_material.id 

                WHERE t_material.id = $id
            "
        );
        return $materials;
    }

    public function getDoorTempInfo($id) {
        $materials = DB::select(
            "SELECT
                t_usage.default_name, t_usage.door_status, t_usage.default_img, t_usage.default_id, t_usage.status
                FROM t_material_temp
                LEFT JOIN (
                    SELECT t_material_usage_temp.*, t_material_temp.display_name as default_name, t_material_temp.img as default_img
                    FROM t_material_usage_temp
                    LEFT JOIN t_material_temp ON t_material_usage_temp.default_id = t_material_temp.material_id
                ) as t_usage ON t_usage.material_id = t_material_temp.material_id 

                WHERE t_material_temp.material_id = $id
                ORDER BY door_status ASC
            "
        );
        return $materials;
    }

    public function usedDefault($id, $status) {
        $result = DB::select(
            "SELECT COUNT(t_material_usage.id) AS total
                FROM t_material_usage
                WHERE default_id = $id AND door_status = $status
            "
        );
        if($result[0] -> total > 0) {
            return true;
        }
        return false;
    }

    public function usedDefaultTemp($id, $status) {
        $result = DB::select(
            "SELECT COUNT(t_material_usage_temp.id) AS total
                FROM t_material_usage_temp
                WHERE default_id = $id AND door_status = $status
            "
        );
        if($result[0] -> total > 0) {
            return true;
        }
        return false;
    }

    public function usedDefaultMaterial($id) {
        $result = DB::select(
            "SELECT COUNT(t_material_usage.id) AS total
                FROM t_material_usage
                WHERE default_id = $id
            "
        );
        if($result[0] -> total > 0) {
            return true;
        }
        return false;
    }

    public function usedDefaultMaterialTemp($id) {
        $result = DB::select(
            "SELECT COUNT(t_material_usage_temp.id) AS total
                FROM t_material_usage_temp
                WHERE default_id = $id
            "
        );
        if($result[0] -> total > 0) {
            return true;
        }
        return false;
    }

    public function getMaterialInfo($id) {
        return DB::table('t_material')
            ->where('id', '=', $id)
            ->first();
    }

    public function getMaterialTempInfo($id) {
        return DB::table('t_material_temp')
            ->where('material_id', '=', $id)
            ->first();
    }
    public function addMaterial($internal, $display, $fileName, $thickness, $price, $mxheight, $expriceheight, $lmheight, $mxwidth, $expricewidth, $lmwidth) {
        $id = DB::table('t_material')->insertGetId([
            'internal_name'         => $internal,
            'display_name'          => $display,
            'img'                   => $fileName,
            'thickness'             => $thickness,
            'basic_price'           => $price,
            'basic_height'          => $mxheight,
            'price_exceed_height'   => $expriceheight,
            'possible_height'       => $lmheight,
            'basic_width'           => $mxwidth,
            'price_exceed_width'    => $expricewidth,
            'possible_width'        => $lmwidth,
            'status'                => 1
        ]);
        return $id;
    }

    public function addMaterialTemp($material_id, $internal, $display, $fileName, $thickness, $price, $mxheight, $expriceheight, $lmheight, $mxwidth, $expricewidth, $lmwidth) {
        $id = DB::table('t_material_temp')->insertGetId([
            'material_id'           => $material_id,
            'internal_name'         => $internal,
            'display_name'          => $display,
            'img'                   => $fileName,
            'thickness'             => $thickness,
            'basic_price'           => $price,
            'basic_height'          => $mxheight,
            'price_exceed_height'   => $expriceheight,
            'possible_height'       => $lmheight,
            'basic_width'           => $mxwidth,
            'price_exceed_width'    => $expricewidth,
            'possible_width'        => $lmwidth,
        ]);
        return $id;
    }

    public function editMaterial($id, $internal, $display, $fileName, $thickness, $price, $mxheight, $expriceheight, $lmheight, $mxwidth, $expricewidth, $lmwidth) {
        DB::table('t_material')
            ->where('id', $id)
            ->update([
                'internal_name'         => $internal,
                'display_name'          => $display,
                'img'                   => $fileName,
                'thickness'             => $thickness,
                'basic_price'           => $price,
                'basic_height'          => $mxheight,
                'basic_height'          => $mxheight,
                'price_exceed_height'   => $expriceheight,
                'possible_height'       => $lmheight,
                'basic_width'           => $mxwidth,
                'price_exceed_width'    => $expricewidth,
                'possible_width'        => $lmwidth,
            ]);
    }

    public function editMaterialTemp($id, $internal, $display, $fileName, $thickness, $price, $mxheight, $expriceheight, $lmheight, $mxwidth, $expricewidth, $lmwidth, $status = 1) {
        DB::table('t_material_temp')
            ->where('material_id', $id)
            ->update([
                'internal_name'         => $internal,
                'display_name'          => $display,
                'img'                   => $fileName,
                'thickness'             => $thickness,
                'basic_price'           => $price,
                'basic_height'          => $mxheight,
                'basic_height'          => $mxheight,
                'price_exceed_height'   => $expriceheight,
                'possible_height'       => $lmheight,
                'basic_width'           => $mxwidth,
                'price_exceed_width'    => $expricewidth,
                'possible_width'        => $lmwidth,
                'status'                => $status
            ]);
    }

    public function removeMaterial($id) {
        DB::table('t_material')->where('id', '=', $id)->update(['status'   => 0]);
    }

    public function removeMaterialTemp($id) {
        DB::table('t_material_temp')->where('material_id', '=', $id)->update(['status'   => 0]);
    }

    public function removeDoors($id) {
        DB::table('t_material_usage')->where('material_id', '=', $id)->delete();
    }

    public function removeDoorsTemp($id) {
        DB::table('t_material_usage_temp')->where('material_id', '=', $id)->delete();
    }

    public function addDoorstatus($id, $door_status, $status,  $default_id) {
        DB::table('t_material_usage')->insertGetId([
            'material_id'       => $id,
            'door_status'       => $door_status,
            'default_id'        => $default_id,
            'status'            => $status
        ]);

    }

    public function addDoorstatusTemp($id, $door_status, $status, $default_id) {

        DB::table('t_material_usage_temp')->insertGetId([
            'material_id'       => $id,
            'door_status'       => $door_status,
            'default_id'        => $default_id,
            'status'            => $status
        ]);

    }

    public function getMaterialByType($status) {
        return DB::select(
            "SELECT t_material.*
                FROM t_material_usage
                LEFT JOIN t_material ON t_material_usage.material_id = t_material.id
                WHERE door_status = $status AND t_material.status = 1 AND t_material_usage.status = 1
                ORDER BY t_material_usage.default_id DESC,  t_material.id ASC
            "
        );
    }

    public function getMaterialTempByType($status) {
        return DB::select(
            "SELECT t_material_temp.*
                FROM t_material_usage_temp
                LEFT JOIN t_material_temp ON t_material_usage_temp.material_id = t_material_temp.material_id
                WHERE door_status = $status AND t_material_temp.status = 1 AND t_material_usage_temp.status = 1
                ORDER BY t_material_usage_temp.default_id DESC,  t_material_temp.material_id ASC
            "
        );
    }

    public function getShippingCount() {
        $locations = DB::select(
            "SELECT COUNT(t_location.id) AS total
                FROM t_location
            "
        );
        return $locations[0]->total;
    }

    public function getShippingTemp($st, $en) {
        $locations = DB::select(
            "SELECT
                *
                FROM t_location
                ORDER BY id
                LIMIT $st , $en
            "
        );
        return $locations;
    }

    public function getShipping() {
        $locations = DB::select(
            "SELECT
                *
                FROM t_location
                ORDER BY id
            "
        );
        return $locations;
    }


    public function getLocationPriceTempInfo($id) {
        $locations = DB::select(
            "SELECT
                *
                FROM t_location_ship_temp
                WHERE t_location_ship_temp.location_id = $id
                ORDER BY location_id ASC, status ASC
            "
        );
        return $locations;
    }

    public function getLocationPriceInfo($id) {
        $locations = DB::select(
            "SELECT
                *
                FROM t_location_ship
                WHERE t_location_ship.location_id = $id
                ORDER BY location_id ASC, status ASC
            "
        );
        return $locations;
    }

    public function editLocationTemp($id, $status, $default, $active, $basic, $volume) {
        DB::table('t_location_ship_temp')
            ->where('location_id', $id)
            ->where('status', $status)
            ->update([
                'active'                    => $active,
                'default'                   => $default,
                'basic_price'               => $basic,
                'volume_price'              => $volume,

            ]);
    }

    public function editLocation($id, $status, $default, $active, $basic, $volume) {
        DB::table('t_location_ship')
            ->where('location_id', $id)
            ->where('status', $status)
            ->update([
                'active'                    => $active,
                'default'                   => $default,
                'basic_price'               => $basic,
                'volume_price'              => $volume,

            ]);
    }

    public function getDoorStatus($id, $status) {
        $result = DB::select(
            "SELECT t_material_usage.*, t_material.status as material_status
                FROM t_material_usage
                LEFT JOIN t_material ON t_material_usage.material_id = t_material.id
                WHERE door_status = $status AND material_id = $id
            "
        );
        if($result[0] -> material_status == 0) {
            $result[0] -> status = 0;
        }
        return $result[0];
    }

    public function getDoorContent($id, $status) {
        $result = DB::select(
            "SELECT t_material_usage.*
                FROM t_material_usage
                WHERE door_status = $status AND material_id = $id
            "
        );
        return $result[0];
    }

    public function getDoorContentTemp($id, $status) {
        $result = DB::select(
            "SELECT *
                FROM t_material_usage_temp
                WHERE door_status = $status AND material_id = $id
            "
        );
        return $result[0];
    }


}
