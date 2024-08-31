<?php

namespace Egolive\Aperturly\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
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
