<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $fillable = ['user_id','item_id'];

	protected $table = 'item_user';

    public function items()
    {
        return $this->belongsToMany('App\Item');
    }

}
