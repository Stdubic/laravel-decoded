<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
	    'title',
	    'body',
	    'publish_at',
    ];

    protected $dates = ['publish_at'];

    public function scopePublished($query)
    {
        $query->where('publish_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        $query->where('publish_at', '>', Carbon::now());
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['publish_at'] = Carbon::parse($date);
}

	public function user(){

		return $this->belognsTo('App\User');
	}

    public function tags(){

        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function getTagListAttribute(){

        return $this->tags->lists('id')->all();
    }
}


