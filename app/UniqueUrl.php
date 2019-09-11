<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UniqueUrl extends Model
{
    /*
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'unique_url';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'url', 'status'];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userUniqueUrl(){
        return $this->hasMany(User::class , 'id' , 'user_id');
    }

}
