<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialNetwork extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'card_id',
        'nombre_red_social',
        'url_red_social',
    ];

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
}
