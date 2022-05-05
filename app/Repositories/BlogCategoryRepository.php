<?php

namespace App\Repositories;

use App\Models\BlogCategory;

class BlogCategoryRepository extends CoreRepository
{
    /**
     * Define model class
     * @return string
     */

    protected function getModelClass(): string
    {
        return BlogCategory::class;
    }

    /**
     * Return data for edit category in admin
     * @param $id
     * @return mixed
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Get categories list for combo box (select)
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getForComboBox()
    {
        $columns = implode(', ', [
           'id',
           'CONCAT(id, ". ", title) as id_title'
        ]);

//        $result[] = $this
//            ->startConditions()
//            ->select(
//                'blog_categories.id',
//                \DB::raw('CONCAT(id, ". ", title) as id_title')
//            )
//            ->toBase()
//            ->get();

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();


//        dd($result);

        return $result;
    }

    public function getAllWithPaginate(int $perPage = 5) {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this->startConditions()
            ->select($columns)
            ->paginate($perPage);

        return $result;
    }
}
