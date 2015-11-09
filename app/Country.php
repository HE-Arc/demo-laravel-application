<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Country extends Model {
    use Translatable;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ["name"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["code", "name"];

    public function users() {
        return $this->hasMany('App\User');
    }
}
