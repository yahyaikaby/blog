<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body','cover_image','user_id'
    ];
    // can hange table name
    protected $table= 'posts';
    //can change primary key
    public $primarkey='id';
    //
	public $timestamps= true;


public function user()
{
	return $this->belongsTo('App\User');
}

}




