<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected array $fillable = ['likes', 'views', 'post_id'];

    public bool $timestamps = false;
}
