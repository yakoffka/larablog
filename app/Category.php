<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = [
        'name',
        'slug',
        'description',
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }


    /**
     * set author_id from auth user
     *
     * @param  Category  $category
     * @return  Category $category
     */
    public function setAuthor() {
        $this->author_id = auth()->user()->id;
        return $this;
    }

    /**
     * set editor_id from auth user
     *
     * @param  Category  $category
     * @return  Category $category
     */
    public function setEditor() {
        $this->editor_id = auth()->user()->id;
        return $this;
    }

    /**
     * sets message the variable for the next request only
     *
     * @return  Category $category
     */
    public function setFlashMess($event)
    {
        info(__METHOD__);
        session()->flash('message', __('success_category_' . $event));
        session()->flash('alert-class', 'success');
        return $this;
    }

}
