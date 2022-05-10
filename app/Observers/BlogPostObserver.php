<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;

class BlogPostObserver
{
    /**
     * Handle the BlogPost "creating" event.
     * Runs before create
     *
     * @param BlogPost $blogPost
     */
    public function creating(BlogPost $blogPost) {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * Handle the BlogPost "updating" event.
     * Runs before update
     *
     * @param BlogPost $blogPost
     */
    public function updating(BlogPost $blogPost) {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * Set published_at if there is not published_at and it is_published
     *
     * @param BlogPost $blogPost
     */
    protected function setPublishedAt(BlogPost $blogPost) {
        if(empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     * Generate slug by title if it's empty
     *
     * @param BlogPost $blogPost
     */
    protected function setSlug(BlogPost $blogPost) {
        if(empty($blogPost->slug)) {
            $blogPost->slug = \Str::slug($blogPost->title);
        }
    }

    /**
     * Handle the BlogPost "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
