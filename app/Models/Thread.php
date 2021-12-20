<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Thread extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand',
        'size',
        'purchased',
        'style',
        'washed',
        'worn',
        'user_id',
        'category_id',
        'worn_today',
        'denim_weight',
        'web_link',
        'in_fit',
    ];

    protected $casts = ['worn_today' => 'datetime'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
