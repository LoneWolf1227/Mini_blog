<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected array $fillable = [ 'title', 'body', 'slug'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getBodyPreview()
    {
        return Str::limit($this->body, 100);
    }

    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeLastLimit($query, $numbers)
    {
        return  $query->with('tags')->orderBy('created_at', 'desc')->take($numbers)->get();
    }

    public function scopeAllPaginate($query, $numbers)
    {
        return  $query->with('tags')->orderBy('created_at', 'desc')->paginate($numbers);
    }

    public function scopeFindByTag($query, $numbers)
    {
        return  $query->with('tags')->orderBy('created_at', 'desc')->paginate($numbers);
    }
}
