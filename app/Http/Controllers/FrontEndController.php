<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Tag;
use App\Product;
use App\User;
use App\Client;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->get();
        return view('index')->with('title', "Bilal's Fxpro exercise")
            ->with('clients', Client::all())
            ->with('products', $products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function singleProduct($slug)
      {

          $post = Product::where('slug', $slug)->first();

          $next_id = Product::where('id', '>', $post->id)->min('id');
          $prev_id = Product::where('id', '<', $post->id)->max('id');return view('single')->with('product', $post)
                               ->with('title',$post->title)
                               ->with('clients',Client::take(7)->get())
                               ->with('next',Product::find($next_id))
                               ->with('prev',Product::find($prev_id));
      }
      public function client($id)
      {
          $client = Client::find($id);
          return view('client')->with('client', $client)
                              ->with('title',$client->name)
                              ->with('clients', Client::take(5)->get());
      }
      public function create() {

      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
