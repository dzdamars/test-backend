<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Director;
use App\Models\Actor;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'release_year',
        'description',
        'rental_rate'
    ];

    public function rules() {
        return [
            'title' => 'required',
            'release_year' => 'required',
            'description' => 'required',
            'rental_rate' => 'required'
        ];
    }

    public function director() {
        return $this->belongsTo(Director::class);
    }

    public function movieCast() {
        return $this->belongsToMany(Actor::class, 'casts');
    }
}
