<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    
    // Scope to only return active gallery items.
     
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    
    //  Accessor for full image URL.
     
    public function getImageUrlAttribute(): string
    {
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        if (file_exists(public_path('assets/images/gallery/' . $this->image))) {
            return asset('assets/images/gallery/' . $this->image);
        }

        if (file_exists(public_path('assets/images/' . $this->image))) {
            return asset('assets/images/' . $this->image);
        }

        return asset('assets/images/cafe-logo.png');
    }
}