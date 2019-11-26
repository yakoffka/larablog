<?php

namespace App\Observers;

use App\Category;

class CategoryObserver
{
    /**
     * Handle the category "creating" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        info(__METHOD__);
        $category->setAuthor();
    }
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        info(__METHOD__);
        $category->setFlashMess('created');
    }

    /**
     * Handle the category "updating" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function updating(Category $category)
    {
        info(__METHOD__);
        $category->setEditor();
    }
    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        info(__METHOD__);
        $category->setFlashMess('updated');
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        info(__METHOD__);
        $category->setFlashMess('deleted');
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        info(__METHOD__);
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        info(__METHOD__);
    }
}
