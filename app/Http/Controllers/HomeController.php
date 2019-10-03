<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard')
            ->with('clients',Client::all())
            ->with('products', Product::all());
    }
    public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    }
}
