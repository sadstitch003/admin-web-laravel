<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminControl extends Controller
{
    public function loginFunction(Request $request)
    { 
        $input = $request->all();
        if($input['username'] == $input['password'])
        {
            return view('dashboard');
        }
    }

    public function productMaster()
    {
        $products = DB::select("SELECT PROD_ID AS 'ID', IF(LENGTH(PROD_NAME) > 20, CONCAT(LEFT(PROD_NAME, 17), '...'), PROD_NAME) AS 'NAME', IF(LENGTH(PROD_DESC) > 20, CONCAT(LEFT(PROD_DESC, 17), '...'), PROD_DESC) AS 'DESC', CATEGORY_NAME AS 'CATEGORY', IF(P.STATUS_DEL = '0', 'Available', 'Not Available') AS 'STATUS', FORMAT(PROD_PRICE, 'C') AS 'PRICE', PROD_STOCK AS 'QTY' FROM PRODUCT P LEFT JOIN CATEGORY C ON C.CATEGORY_ID = P.CATEGORY_ID;");
        return view('productmaster', compact('products'));
    }

    public function productInsert()
    {
        return view('productinsert');
    }

    public static function productUpdate($prodid)
    {
        $products = DB::select("SELECT PROD_ID AS 'ID', IF(LENGTH(PROD_NAME) > 20, CONCAT(LEFT(PROD_NAME, 17), '...'), PROD_NAME) AS 'NAME', IF(LENGTH(PROD_DESC) > 20, CONCAT(LEFT(PROD_DESC, 17), '...'), PROD_DESC) AS 'DESC', CATEGORY_NAME AS 'CATEGORY', IF(P.STATUS_DEL = '0', 'Available', 'Not Available') AS 'STATUS', FORMAT(PROD_PRICE, 'C') AS 'PRICE', PROD_STOCK AS 'QTY' FROM PRODUCT P LEFT JOIN CATEGORY C ON C.CATEGORY_ID = P.CATEGORY_ID WHERE PROD_ID = '$prodid';");
        return view('productupdate', compact('products'));
    }
}
