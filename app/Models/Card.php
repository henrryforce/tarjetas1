<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'color',
        'img',
        'texto',
        'cargo',
        'localidad',
        'selected',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function socialNetworks()
    {
        return $this->hasMany(SocialNetwork::class, 'id');
    }
}
