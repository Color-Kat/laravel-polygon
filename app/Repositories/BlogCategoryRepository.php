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

    public function getForComboBox()
    {
        return $this->startConditions()->all();
    }
}
