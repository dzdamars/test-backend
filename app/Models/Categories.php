<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Categories extends Model
{
    protected $fillable = [
        'name'
    ];

    public function rules() {
        return [
            'name' => 'required|unique:categories'
        ];
    }

    public function starryMovies() {
        return $this->belongsToMany(Movie::class, 'casts');
    }
}
