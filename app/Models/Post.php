<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected array $fillable = [ 'title', 'body', 'slug'];

    public $dates = ['published_at'];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function state(): HasOne
    {
        return $this->hasOne(State::class);
    }

    public function tags(): BelongsToMany
{
        return $this->belongsToMany(Tag::class);
    }

    public function getBodyPreview(): string
    {
        return Str::limit($this->body, 100);
    }

    public function publishedAtForHumans()
    {
        return $this->published_at->diffForHumans();
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
