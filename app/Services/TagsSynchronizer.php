<?php

namespace App\Services;

use App\Models\Tag;
use App\Contracts\Synchronizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TagsSynchronizer implements Synchronizable
{
    public function sync(Collection $tags, Model $model)
    {
        $articleTags = $model->tags->keyBy('name');
        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($articleTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name'=>$tag]);
            $syncIds[] = $tag->id;
        }

        return $model->tags()->sync($syncIds);
    }
}
