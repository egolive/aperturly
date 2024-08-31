<?php

namespace Egolive\Aperturly\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_id', 'series_id', 'portfolio_id', 'title', 'description', 'file_path'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
