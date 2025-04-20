<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Product;
use App\Models\Profile;
use App\Traits\HasAuthenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model implements Authenticatable
{
    use HasAuthenticatable;
    
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = true;
    
    protected $hidden = [
        'password',
    ];

    // satu user dimiliki oleh satu role
    public function role(): BelongsTo 
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    // satu user memiliki satu profile
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    // satu user punya banyak produk
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
