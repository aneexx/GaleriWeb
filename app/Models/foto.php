<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class foto extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'foto', 'user_id'];

    public function album()
    {
        return $this->hasMany(Album::class, 'album_id');
    }
    public function like()
    {
        return $this->hasMany(LikeFoto::class, 'foto_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function generateSlug()
    {
        return Str::slug($this->judul);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($foto) {
            $foto->slug = $foto->generateSlug();
        });
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
