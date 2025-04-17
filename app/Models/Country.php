<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * @var string - The database table used by the model.
     */
    protected $table = 'countries';

    /**
     * @var string - The database table used by the model.
     */
    public $timestamps = false;

    /**
     * @var array - The attributes that should be casted to native types.
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * @var array - The attributes that are mass assignable.
     */
    protected $fillable = [];

    /**
     * The generate UID or not
     *
     * @var string
     *----------------------------------------------------------------------- */
    protected $isGenerateUID = false;
}
