<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
	    'title',
	    'body',
	    'publish_at',
    ];

	public function user(){

		return $this->belognsTo('App\User');
	}
}


