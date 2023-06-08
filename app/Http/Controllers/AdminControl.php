<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminControl extends Controller
{
    public function loginFunction(Request $request)
    { 
        $input = $request->all();
        if($input['username'] == "Christian" && $input['password'] == "Password")
        {
            Session::put('adminUser', $input['username']);
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function dashboard()
    {
        if(Session::exists('adminUser'))
        {
            $totalRevenue = DB::select("SELECT CONCAT('Rp.', FORMAT(SUM(TRANS_TOTAL_PRICE), 'C')) AS 'TOTAL_REVENUE' FROM TRANSACTION;")[0]->TOTAL_REVENUE;
            $totalTransaction = DB::select("SELECT COUNT(TRANS_ID) AS 'TOTAL_TRANSACTION' FROM TRANSACTION;")[0]->TOTAL_TRANSACTION;
            $totalProduct = DB::select("SELECT COUNT(PROD_ID) AS 'TOTAL_PRODUCT' FROM PRODUCT;")[0]->TOTAL_PRODUCT;
            $totalCustomer = DB::select("SELECT COUNT(CUST_ID) AS 'TOTAL_CUST' FROM CUSTOMER;")[0]->TOTAL_CUST;

            $topCustomer = DB::select("SELECT C.CUST_NAME AS 'CUSTNAME', CONCAT('Rp.', FORMAT(SUM(T.TRANS_TOTAL_PRICE), 'C')), SUM(T.TRANS_TOTAL_PRICE) AS 'TOTAL' FROM TRANSACTION T LEFT JOIN CUSTOMER C ON T.CUST_ID = C.CUST_ID GROUP BY T.TRANS_ID, C.CUST_NAME ORDER BY 3 DESC LIMIT 5;");
            $topProduct = DB::select("SELECT P.PROD_NAME AS 'PRODNAME', SUM(TRANS_QTY) AS 'QTY' FROM TRANSACTION_PRODUCT TP LEFT JOIN PRODUCT P ON P.PROD_ID = TP.PROD_ID GROUP BY P.PROD_NAME ORDER BY 2 DESC LIMIT 5;");
            
            $user = Session::get('adminUser');
            return view('dashboard', compact('user', 'totalRevenue', 'totalTransaction', 'totalProduct', 'totalCustomer', 'topCustomer', 'topProduct'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function productMaster()
    {
        if(Session::exists('adminUser'))
        {
            $products = DB::select("SELECT PROD_ID AS 'ID', IF(LENGTH(PROD_NAME) > 20, CONCAT(LEFT(PROD_NAME, 17), '...'), PROD_NAME) AS 'NAME', IF(LENGTH(PROD_DESC) > 20, CONCAT(LEFT(PROD_DESC, 17), '...'), PROD_DESC) AS 'DESC', CATEGORY_NAME AS 'CATEGORY', IF(P.STATUS_DEL = '0', 'Available', 'Not Available') AS 'STATUS', FORMAT(PROD_PRICE, 'C') AS 'PRICE', PROD_STOCK AS 'QTY' FROM PRODUCT P LEFT JOIN CATEGORY C ON C.CATEGORY_ID = P.CATEGORY_ID;");
            return view('productmaster', compact('products'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function productMasterSearch(Request $request)
    {
        if(Session::exists('adminUser'))
        {
            $search = $request['SEARCH'];
            $products = DB::select("SELECT PROD_ID AS 'ID', IF(LENGTH(PROD_NAME) > 20, CONCAT(LEFT(PROD_NAME, 17), '...'), PROD_NAME) AS 'NAME', IF(LENGTH(PROD_DESC) > 20, CONCAT(LEFT(PROD_DESC, 17), '...'), PROD_DESC) AS 'DESC', CATEGORY_NAME AS 'CATEGORY', IF(P.STATUS_DEL = '0', 'Available', 'Not Available') AS 'STATUS', FORMAT(PROD_PRICE, 'C') AS 'PRICE', PROD_STOCK AS 'QTY' FROM PRODUCT P LEFT JOIN CATEGORY C ON C.CATEGORY_ID = P.CATEGORY_ID WHERE PROD_ID LIKE '%$search%' OR PROD_NAME LIKE '%$search%' OR CATEGORY_NAME LIKE '%$search%';");
            return view('productmaster', compact('products'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function transaction()
    {
        if(Session::exists('adminUser'))
        {
            $transactions = DB::select("SELECT TRANS_ID AS 'ID', CUST_ID AS 'CUSTID', TRANS_DATE AS 'DATE', IF(LENGTH(SHIPPING_ADDRESS) > 20, CONCAT(LEFT(SHIPPING_ADDRESS, 17), '...'), SHIPPING_ADDRESS) AS 'SHIP', PAYMENT_METHOD AS 'METHOD', IF(PAYMENT_STATUS = 'P', 'Paid', 'Not Paid') AS 'STATUS', FORMAT(TRANS_TOTAL_PRICE, 'C') AS 'TOTAL'  FROM TRANSACTION ORDER BY DATE DESC;");
            return view('transactions', compact('transactions'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function transactionSearch(Request $request)
    {
        if(Session::exists('adminUser'))
        {
            $search = $request['SEARCH'];
            $transactions = DB::select("SELECT TRANS_ID AS 'ID', CUST_ID AS 'CUSTID', TRANS_DATE AS 'DATE', IF(LENGTH(SHIPPING_ADDRESS) > 20, CONCAT(LEFT(SHIPPING_ADDRESS, 17), '...'), SHIPPING_ADDRESS) AS 'SHIP', PAYMENT_METHOD AS 'METHOD', IF(PAYMENT_STATUS = 'P', 'Paid', 'Not Paid') AS 'STATUS', FORMAT(TRANS_TOTAL_PRICE, 'C') AS 'TOTAL'  FROM transaction WHERE TRANS_ID LIKE '%$search%' OR CUST_ID LIKE '%$search%' OR TRANS_DATE LIKE '%$search%' ORDER BY DATE DESC;");
            return view('transactions', compact('transactions'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function transactionProduct()
    {
        if(Session::exists('adminUser'))
        {
            $transactionproduct = DB::select("SELECT TRANS_ID AS 'ID', PROD_ID AS 'PRODID', TRANS_QTY AS 'QTY', FORMAT(TRANS_PRICE, 'C') as 'PRICE' FROM TRANSACTION_PRODUCT ORDER BY 1 DESC");
            return view('transactionproduct', compact('transactionproduct'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function transactionDetail($transid)
    {
        if(Session::exists('adminUser'))
        {
            $header = DB::select("SELECT TRANS_ID AS 'ID', CUST_ID AS 'CUSTID', TRANS_DATE AS 'DATE', SHIPPING_ADDRESS AS 'SHIP', PAYMENT_METHOD AS 'METHOD', IF(PAYMENT_STATUS = 'P', 'Paid', 'Not Paid') AS 'STATUS', TRANS_TOTAL_PRICE AS 'TOTAL'  FROM TRANSACTION WHERE TRANS_ID = '$transid';");
            $detail = DB::select("SELECT TRANS_ID AS 'ID', PROD_ID AS 'PRODID', TRANS_QTY AS 'QTY', FORMAT(TRANS_PRICE, 'C') AS 'PRICE' FROM TRANSACTION_PRODUCT WHERE TRANS_ID = '$transid'");
            return view('transactiondetail', compact('header', 'detail'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function productInsert()
    {
        if(Session::exists('adminUser'))
        {
            $categories = DB::select("SELECT CATEGORY_ID, CATEGORY_NAME FROM CATEGORY");
            return view('productinsert', compact('categories'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public static function productUpdate($prodid)
    {
        if(Session::exists('adminUser'))
        {
            $products = DB::select("SELECT PROD_ID AS 'ID', PROD_NAME AS 'NAME', PROD_DESC AS 'DESC', C.CATEGORY_ID AS 'CAT_ID', CATEGORY_NAME AS 'CATEGORY', IF(P.STATUS_DEL = '0', 'Available', 'Not Available') AS 'STATUS', PROD_PRICE AS 'PRICE', PROD_STOCK AS 'QTY' FROM PRODUCT P LEFT JOIN CATEGORY C ON C.CATEGORY_ID = P.CATEGORY_ID WHERE PROD_ID = '$prodid';");
            $categories = DB::select("SELECT CATEGORY_ID, CATEGORY_NAME FROM CATEGORY");
            return view('productupdate', compact(['products','categories']));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public static function updateFunction(Request $request)
    {
        if(Session::exists('adminUser'))
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
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public static function insertFunction(Request $request)
    {
        if(Session::exists('adminUser'))
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
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public static function productDelete($prodid, $status)
    {
        if(Session::exists('adminUser'))
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
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function customerData()
    {
        if(Session::exists('adminUser'))
        {
            $customers = DB::select("SELECT CUST_ID AS 'ID', CUST_USERNAME AS 'USERNAME', CUST_NAME AS 'NAME', IF(CUST_GENDER = 'M', 'Male', 'Female') AS 'GENDER', CUST_EMAIL AS 'EMAIL', IF(LENGTH(CUST_ADDRESS) > 15, CONCAT(LEFT(CUST_ADDRESS, 12), '...'), CUST_ADDRESS) AS 'ADDRESS', CUST_PHONE AS 'PHONE', STATUS_DEL AS 'STATUS' FROM CUSTOMER ORDER BY CUST_ID;");
            return view('customerdata', compact('customers'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function customerDataSearch(Request $request)
    {
        if(Session::exists('adminUser'))
        {
            $search = $request['SEARCH'];
            $customers = DB::select("SELECT CUST_ID AS 'ID', CUST_USERNAME AS 'USERNAME', CUST_NAME AS 'NAME', IF(CUST_GENDER = 'M', 'Male', 'Female') AS 'GENDER', CUST_EMAIL AS 'EMAIL', IF(LENGTH(CUST_ADDRESS) > 15, CONCAT(LEFT(CUST_ADDRESS, 12), '...'), CUST_ADDRESS) AS 'ADDRESS', CUST_PHONE AS 'PHONE', STATUS_DEL AS 'STATUS' FROM CUSTOMER WHERE CUST_ID LIKE '%$search%' OR CUST_USERNAME LIKE '%$search%' OR CUST_NAME LIKE '%$search%' ORDER BY CUST_ID;");
            return view('customerdata', compact('customers'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function customerEdit($custid)
    {
        if(Session::exists('adminUser'))
        {
            $customer = DB::select("SELECT CUST_ID AS 'ID', CUST_USERNAME AS 'USERNAME', CUST_NAME AS 'NAME', IF(CUST_GENDER = 'M', 'Male', 'Female') AS 'GENDER', CUST_EMAIL AS 'EMAIL', CUST_ADDRESS AS 'ADDRESS', CUST_PHONE AS 'PHONE', STATUS_DEL AS 'STATUS' FROM CUSTOMER WHERE CUST_ID = '$custid' ORDER BY 1;");
            $customerTransaction = DB::select("SELECT TRANS_ID as 'ID', CUST_ID as 'CUSTID', TRANS_DATE as 'DATE', IF(LENGTH(SHIPPING_ADDRESS) > 20, CONCAT(LEFT(SHIPPING_ADDRESS, 17), '...'), SHIPPING_ADDRESS) as 'SHIP', PAYMENT_METHOD as 'METHOD', IF(PAYMENT_STATUS = 'P', 'Paid', 'Not Paid') as 'STATUS', FORMAT(TRANS_TOTAL_PRICE, 'C') as 'TOTAL'  FROM transaction WHERE CUST_ID = '$custid' ORDER BY DATE DESC;");
            return view('customeredit', compact('customer', 'customerTransaction'));
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function editFunction(Request $request)
    {
        if(Session::exists('adminUser'))
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
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function customerInsert()
    {
        if(Session::exists('adminUser'))
        {
            $ID = DB::select("SELECT CONCAT('CU-', LPAD(count(CUST_ID) + 1, 3, 0)) AS 'CUSTID' FROM CUSTOMER;");
            return view('customerinsert');
        } 
        else
        {
            return redirect()->route('loginPage');
        }
    }

    public function custInsertFunction(Request $request)
    {
        if(Session::exists('adminUser'))
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
        else
        {
            return redirect()->route('loginPage');
        }
    }
}
