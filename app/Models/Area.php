<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = ['name'];

    public function consumers()
    {
        return $this->hasMany(Consumer::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($Area) {
            $Area->consumers()->delete();
        });
    }
}
