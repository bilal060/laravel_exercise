<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

       protected $fillable =[
           'title','body','client_id','user_id', 'slug'
       ];

    public function getFeaturedAttribute($featured)
    {
          return asset($featured);
    }

    protected $dates = ['deleted_at'];

    public function client()
    {
       return $this->belongsTo('App\Client');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
