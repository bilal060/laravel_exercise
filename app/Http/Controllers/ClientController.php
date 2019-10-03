<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\Client;class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.clients.index')->with('clients',Client::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->admin) {
            Session::flash('error', 'You are not allwed to perform this action. Please contact to admin');
            return redirect()->back();
        } else {
            return view('admin.clients.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->save();
        \LogActivity::addToLog('Admin has created new client');
        Session::flash('success', 'You successfully created a client.');
        return redirect()->route('clients');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->admin) {
            \LogActivity::addToLog('Non admin user is not allowed to access this url.');
            Session::flash('error', 'You are not allwed to perform this action. Please contact to admin');
            return redirect()->back();
        } else {
            $clients = Client::find($id);
            \LogActivity::addToLog('Admin has edit the client info.');
            return view('admin.clients.edit')->with('client', $clients);
        }
    }

    public function view($id)
    {
        $clients = Client::find($id);
        return view('admin.clients.view')->with('client', $clients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->save();
        \LogActivity::addToLog('Admin has Successfully updated client');
        Session::flash('success', 'You successfully updated a client.');
        return redirect()->route('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->admin) {
            Session::flash('error', 'You are not allwed to perform this action. Please contact to admin');
            return redirect()->back();
        } else {
            $client = Client::find($id);
            if ($client->products) {
                foreach ($client->products as $product) {
                    $product->forceDelete();
                }
            }
            $client->delete();
            \LogActivity::addToLog('Client Deleted successfully');
            Session::flash('success', 'You successfully deleted a client.');
            return redirect()->back();
        }
    }
}
