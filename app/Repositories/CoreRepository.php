<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository
 *
 * @package App\Repositories
 *
 * Repository can get some data from model.
 * Can't to create or change data in model.
 */

abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * Define model class
     *
     * @return string
     */
    abstract protected function getModelClass(): string;

    protected function startConditions() {
        // Clone model to don't save model state
        return clone $this->model;
    }
}
