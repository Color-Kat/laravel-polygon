<?php


namespace App\Repositories;


use App\Models\BlogPost;

/**
 * Class BlogPostRepository
 *
 * @package App\Repositories
 */

class BlogPostRepository extends CoreRepository
{
    /**
     * Define model class
     * @return string
     */
    protected function getModelClass(): string
    {
        return BlogPost::class;
    }
}
