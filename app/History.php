<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    /*
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'result'];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userHistory(){
        return $this->hasMany(User::class , 'id' , 'user_id');
    }
}
