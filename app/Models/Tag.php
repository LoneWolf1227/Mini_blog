<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected array $fillable = ['label'];

    public bool $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function scopeFindByLabelOrCreateNew($query, $label)
    {
        $tags = explode(', ', $label);

        foreach ($tags as $tag) {
            $id = $this->newModelQuery()->where('label', '=', $tag)->get();

            if (empty($id) || empty($id->toArray())) {
                $ids[] = Tag::newTag($tag);
            } else {
                $ids[] = $id->toArray()['0']['id'];
            }
        }

        return $ids ?? false;
    }

    public function scopeNewTag($query, $label)
    {
        $this->label = $label;
        $this->save();
        return $this->id;
    }
}
