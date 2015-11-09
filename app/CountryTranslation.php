<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model {

    /**
     * Tells that this model doesn't have the automagic timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["code", "name"];
}
