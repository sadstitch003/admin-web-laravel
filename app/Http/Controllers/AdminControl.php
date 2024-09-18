<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminControl extends Controller
{
    

    
    public function dashboard()
    {
        return view('dashboard');
    }

    public function productMaster()
    {
        return view('productmaster');
    }

    public function productMasterSearch()
    {
        return view('productmaster');
    }

    public function transaction()
    {
        return view('transactions');
    }

    public function transactionSearch()
    {
        return view('transactions');
    }

    public function transactionProduct()
    {
        return view('transactionproduct');
    }

    public function transactionDetail()
    {
        return view('transactiondetail');
    }

    public function productInsert()
    {
        return view('productinsert');
    }

    public static function productUpdate()
    {
        return view('productupdate');
    }

    public static function updateFunction()
    {
        return redirect()->route('productMaster');
    }

    public static function insertFunction()
    {
        return redirect()->route('productInsert');
    }

    public static function productDelete()
    {
        return redirect()->route('productMaster');
    }

    public function customerData()
    {
        return view('customerdata');
    }

    public function customerDataSearch()
    {
        return view('customerdata');
    }

    public function customerEdit()
    {
        return view('customeredit');
    }

    public function editFunction()
    {
        return redirect()->route('customerData');
    }

    public function customerInsert()
    {
        return view('customerinsert');
    }

    public function custInsertFunction()
    {
        return redirect()->route('customerInsert');
    }

}
