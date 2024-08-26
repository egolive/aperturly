<?php

namespace Egolive\Aperturly\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['portfolio_id', 'name', 'description'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function series()
    {
        return $this->hasMany(Series::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
