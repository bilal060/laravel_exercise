<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use App\Client;
use App\Product;use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Auth::user()->admin) {
            \LogActivity::addToLog('You are not allwed to perform this action. Please contact to admin');
            Session::flash('error', 'You are not allwed to perform this action. Please contact to admin');
            return redirect()->back();
        }
        else {
            $clients = Client::all();
            if($clients->count() == 0)
            {
                Session::flash('info', 'You Must have Choose At least One clients');
                return redirect()->back();
            }
            return view('admin.products.create')->with('clients',$clients);
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
            'title' => 'required',
            'body' => 'required',
            'client_id'=> 'required',
        ]);
        $post = Product::create([
                'title' => $request->title,
                'body' => $request->body,
                'client_id' => $request->client_id,
                'slug'=> str_slug($request->title),
                'user_id'=>Auth::id()
        ]);
        \LogActivity::addToLog('Your post Created Successfully');

       Session::flash('success','Your post Created Successfully');

        return redirect()->route('products');
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
            Session::flash('error', 'You are not allwed to perform this action. Please contact to admin');

            return redirect()->back();
        } else {
            $products = Product::find($id);

            return view('admin.products.edit')
                ->with('products', $products)
                ->with('clients', Client::all());
        }
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
         $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'client_id'=> 'required'
        ]);

        $products = Product::find($id);

        $products->title = $request->title;
        $products->body = $request->body;
        $products->client_id = $request->client_id;
        \LogActivity::addToLog('You successfully updated a Product.');

        $products->save();Session::flash('success', 'You successfully updated a Product.');
        return redirect()->route('products');
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
            \LogActivity::addToLog('You do not permit that make it');

            Session::flash('error', 'You are not allwed to perform this action. Please contact to admin');
            return redirect()->back();
        } else {
            $products = Product::find($id);
            $products->delete();
            \LogActivity::addToLog('You successfully deleted a Product');

            Session::flash('success', 'You successfully deleted a Product.');
            return redirect()->back();
        }
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.products.trashed')->with('products', $products);
    }

    public function kill($id)
    {
        if (!Auth::user()->admin) {
            \LogActivity::addToLog('You do not permit that make it');
            Session::flash('error', 'You are not allwed to perform this action. Please contact to admin');
            return redirect()->back();
        } else {
            $products = Product::withTrashed()->where('id', $id)->first();
            $products->forceDelete();
            \LogActivity::addToLog('You successfully deleted a Product Permanently.');
            Session::flash('success', 'You successfully deleted a Product Permanently.');
            return redirect()->back();
        }

    }

    public function restore($id)

    {
        $products = Product::withTrashed()->where('id',$id)->first();
        $products->restore();
        \LogActivity::addToLog('You successfully Restore a Product.');
        Session::flash('success', 'You successfully Restore a Product.');
        return redirect()->route('products');
    }
}
