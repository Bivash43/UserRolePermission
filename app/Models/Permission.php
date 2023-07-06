<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];



    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'permission_role');
    }
}
