<?php

namespace Egolive\Aperturly\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_id', 'portfolio_id', 'name', 'description'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
