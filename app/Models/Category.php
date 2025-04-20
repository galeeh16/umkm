<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = true;
}
