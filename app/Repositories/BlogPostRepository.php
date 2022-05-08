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
            // For relations we need to get ids
            'user_id',
            'category_id',
        ];

        $result = $this->startConditions()
            ->select($column)
            ->orderBy('id', 'DESC')
//                ->with(['user', 'category']) // load all columns
                ->with([
                    'category' => function($query) {
                        $query->select(['id', 'title']); // Load also id to laravel can find it
                    },
                    'user:id,name'
                ])
            ->paginate(25);

        return $result;
    }

    /**
     * Get model for edit in admin
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
     */
    public function getEdit(int $id) {
        return $this->startConditions()->find($id);
    }
}
