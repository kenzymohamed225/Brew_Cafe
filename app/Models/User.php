<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Disable automatic created_at and updated_at handling
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    
    // Whether the user has uploaded a real profile photo.
     
    public function getHasImageAttribute(): bool
    {
        return $this->image && \Illuminate\Support\Facades\Storage::disk('public')->exists('users/' . $this->image);
    }

    
    //  Full URL to the user's profile photo, or null if they don't have one.
    //   The view falls back to a default "person" avatar (like Facebook's)
    //   whenever this is null.
     
    public function getImageUrlAttribute(): ?string
    {
        return $this->has_image ? \Illuminate\Support\Facades\Storage::url('users/' . $this->image) : null;
    }
}