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

    /**
     * Get all post with paginator for admin panel
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $column = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this->startConditions()
            ->select($column)
            ->orderBy('id', 'DESC')
            ->paginate(25);

        return $result;
    }
}
