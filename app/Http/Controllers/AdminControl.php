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
            return redirect()->route('dashboard');
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function productMaster()
    {
        $products = DB::select("SELECT PROD_ID AS 'ID', IF(LENGTH(PROD_NAME) > 20, CONCAT(LEFT(PROD_NAME, 17), '...'), PROD_NAME) AS 'NAME', IF(LENGTH(PROD_DESC) > 20, CONCAT(LEFT(PROD_DESC, 17), '...'), PROD_DESC) AS 'DESC', CATEGORY_NAME AS 'CATEGORY', IF(P.STATUS_DEL = '0', 'Available', 'Not Available') AS 'STATUS', FORMAT(PROD_PRICE, 'C') AS 'PRICE', PROD_STOCK AS 'QTY' FROM PRODUCT P LEFT JOIN CATEGORY C ON C.CATEGORY_ID = P.CATEGORY_ID;");
        return view('productmaster', compact('products'));
    }

    public function transaction()
    {
        $transactions = DB::select("SELECT TRANS_ID as 'ID', CUST_ID as 'CUSTID', TRANS_DATE as 'DATE', IF(LENGTH(SHIPPING_ADDRESS) > 20, CONCAT(LEFT(SHIPPING_ADDRESS, 17), '...'), SHIPPING_ADDRESS) as 'SHIP', PAYMENT_METHOD as 'METHOD', IF(PAYMENT_STATUS = 'P', 'Paid', 'Not Paid') as 'STATUS', FORMAT(TRANS_TOTAL_PRICE, 'C') as 'TOTAL'  FROM transaction ORDER BY DATE DESC;");
        return view('transactions', compact('transactions'));
    }

    public function transactionProduct()
    {
        $transactionproduct = DB::select("SELECT TRANS_ID as 'ID', PROD_ID as 'PRODID', TRANS_QTY as 'QTY', FORMAT(TRANS_PRICE, 'C') as 'PRICE' FROM TRANSACTION_PRODUCT ORDER BY 1 DESC");
        return view('transactionproduct', compact('transactionproduct'));
    }

    public function transactionDetail($transid)
    {
        $header = DB::select("SELECT TRANS_ID as 'ID', CUST_ID as 'CUSTID', TRANS_DATE as 'DATE', SHIPPING_ADDRESS as 'SHIP', PAYMENT_METHOD as 'METHOD', IF(PAYMENT_STATUS = 'P', 'Paid', 'Not Paid') as 'STATUS', TRANS_TOTAL_PRICE as 'TOTAL'  FROM transaction WHERE TRANS_ID = '$transid';");
        $detail = DB::select("SELECT TRANS_ID as 'ID', PROD_ID as 'PRODID', TRANS_QTY as 'QTY', FORMAT(TRANS_PRICE, 'C') as 'PRICE' FROM TRANSACTION_PRODUCT WHERE TRANS_ID = '$transid' ORDER BY DATE DESC");
        return view('transactiondetail', compact('header', 'detail'));
    }

    public function productInsert()
    {
        $categories = DB::select("SELECT CATEGORY_ID, CATEGORY_NAME FROM CATEGORY");
        return view('productinsert', compact('categories'));
    }

    public static function productUpdate($prodid)
    {
        $products = DB::select("SELECT PROD_ID AS 'ID', PROD_NAME AS 'NAME', PROD_DESC AS 'DESC', C.CATEGORY_ID AS 'CAT_ID', CATEGORY_NAME AS 'CATEGORY', IF(P.STATUS_DEL = '0', 'Available', 'Not Available') AS 'STATUS', PROD_PRICE AS 'PRICE', PROD_STOCK AS 'QTY' FROM PRODUCT P LEFT JOIN CATEGORY C ON C.CATEGORY_ID = P.CATEGORY_ID WHERE PROD_ID = '$prodid';");
        $categories = DB::select("SELECT CATEGORY_ID, CATEGORY_NAME FROM CATEGORY");
        return view('productupdate', compact(['products','categories']));
    }

    public static function updateFunction(Request $request)
    {
        $ID = $request['PRODID'];
        $NAME = $request['NAME'];
        $CATEGORY = $request['CATEGORY'];
        $PRICE = $request['PRICE'];
        $STOCK = $request['STOCK'];
        $DESC = $request['DESC'];
        
        DB::update("update product set prod_name = '$NAME', category_id = '$CATEGORY', prod_price = $PRICE, prod_stock = $STOCK, prod_desc = '$DESC' where prod_id = '$ID'");
        return redirect()->route('productMaster');
    }

    public static function insertFunction(Request $request)
    {
        $ID = DB::select("SELECT CONCAT('P-', LPAD(count(PROD_ID) + 1, 3, 0)) AS PRODID FROM product;");
        $NAME = $request['NAME'];
        $CATEGORY = $request['CATEGORY'];
        $PRICE = $request['PRICE'];
        $STOCK = $request['STOCK'];
        $DESC = $request['DESC'];
        
        DB::insert("INSERT INTO PRODUCT VALUES('{$ID[0]->PRODID}', '$CATEGORY', '$NAME', $PRICE, $STOCK, '$DESC', 0)");
        return redirect()->route('productInsert');
    }

    public static function productDelete($prodid, $status)
    {
        if($status == 'Available')
        {
            DB::update("update product set status_del = '1' where prod_id = '$prodid'");
        }
        else
        {
            DB::update("update product set status_del = '0' where prod_id = '$prodid'");
        }
        
        $products = DB::select("SELECT PROD_ID AS 'ID', IF(LENGTH(PROD_NAME) > 20, CONCAT(LEFT(PROD_NAME, 17), '...'), PROD_NAME) AS 'NAME', IF(LENGTH(PROD_DESC) > 20, CONCAT(LEFT(PROD_DESC, 17), '...'), PROD_DESC) AS 'DESC', CATEGORY_NAME AS 'CATEGORY', IF(P.STATUS_DEL = '0', 'Available', 'Not Available') AS 'STATUS', FORMAT(PROD_PRICE, 'C') AS 'PRICE', PROD_STOCK AS 'QTY' FROM PRODUCT P LEFT JOIN CATEGORY C ON C.CATEGORY_ID = P.CATEGORY_ID ORDER BY 1;");
        return redirect()->route('productMaster');
    }

    public function customerData()
    {
        $customers = DB::select("SELECT CUST_ID AS 'ID', CUST_USERNAME AS 'USERNAME', CUST_NAME AS 'NAME', IF(CUST_GENDER = 'M', 'Male', 'Female') AS 'GENDER', CUST_EMAIL AS 'EMAIL', IF(LENGTH(CUST_ADDRESS) > 15, CONCAT(LEFT(CUST_ADDRESS, 12), '...'), CUST_ADDRESS) AS 'ADDRESS', CUST_PHONE AS 'PHONE', STATUS_DEL AS 'STATUS' FROM CUSTOMER ORDER BY CUST_ID;");
        return view('customerdata', compact('customers'));
    }

    public function customerEdit($custid)
    {
        $customer = DB::select("SELECT CUST_ID AS 'ID', CUST_USERNAME AS 'USERNAME', CUST_NAME AS 'NAME', IF(CUST_GENDER = 'M', 'Male', 'Female') AS 'GENDER', CUST_EMAIL AS 'EMAIL', CUST_ADDRESS AS 'ADDRESS', CUST_PHONE AS 'PHONE', STATUS_DEL AS 'STATUS' FROM CUSTOMER WHERE CUST_ID = '$custid' ORDER BY 1;");
        $customerTransaction = DB::select("SELECT TRANS_ID as 'ID', CUST_ID as 'CUSTID', TRANS_DATE as 'DATE', IF(LENGTH(SHIPPING_ADDRESS) > 20, CONCAT(LEFT(SHIPPING_ADDRESS, 17), '...'), SHIPPING_ADDRESS) as 'SHIP', PAYMENT_METHOD as 'METHOD', IF(PAYMENT_STATUS = 'P', 'Paid', 'Not Paid') as 'STATUS', FORMAT(TRANS_TOTAL_PRICE, 'C') as 'TOTAL'  FROM transaction WHERE CUST_ID = '$custid' ORDER BY DATE DESC;");
        return view('customeredit', compact('customer', 'customerTransaction'));
    }

    public function editFunction(Request $request)
    {
        $ID = $request['ID'];
        $USERNAME = $request['USERNAME'];
        $NAME = $request['NAME'];
        $GENDER = $request['GENDER'];
        $EMAIL = $request['EMAIL'];
        $ADDRESS = $request['ADDRESS'];
        $PHONE = $request['PHONE'];
        DB::update("UPDATE CUSTOMER SET CUST_ID = '$ID', CUST_USERNAME = '$USERNAME', CUST_NAME = '$NAME', CUST_GENDER = '$GENDER', CUST_EMAIL = '$EMAIL', CUST_ADDRESS='$ADDRESS', CUST_PHONE = '$PHONE' WHERE CUST_ID = '$ID';");
        return redirect()->route('customerData');
    }

    public function customerInsert()
    {
        $ID = DB::select("SELECT CONCAT('CU-', LPAD(count(CUST_ID) + 1, 3, 0)) AS 'CUSTID' FROM CUSTOMER;");
        return view('customerinsert');
    }

    public function custInsertFunction(Request $request)
    {
        $ID = DB::select("SELECT CONCAT('CU-', LPAD(count(CUST_ID) + 1, 3, 0)) AS 'CUSTID' FROM CUSTOMER;");
        $USERNAME = $request['USERNAME'];
        $NAME = $request['NAME'];
        $GENDER = $request['GENDER'];
        $EMAIL = $request['EMAIL'];
        $ADDRESS = $request['ADDRESS'];
        $PHONE = $request['PHONE'];
        
        DB::insert("INSERT INTO CUSTOMER VALUES('{$ID[0]->CUSTID}', '$USERNAME', '$USERNAME', '$NAME', '$GENDER', '$EMAIL', '$ADDRESS', '$PHONE', 0)");
        return redirect()->route('customerInsert');
    }
}
