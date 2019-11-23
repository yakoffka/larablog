<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }
}
