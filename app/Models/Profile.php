<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $table = 'user_profile';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = true;

    // satu profile dimiliki oleh satu user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}