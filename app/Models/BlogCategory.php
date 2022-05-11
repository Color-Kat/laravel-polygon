<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string $parentTitle
 *
 * @package App\Models
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    /**
     * Id of root of categories
     */
    const ROOT = 1;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description'
    ];

    /**
     * Parent of category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * It's Accessor
     *
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title ??
            ($this->isRoot() ? 'Корень' : 'Нет родителя');

        return $title;
    }

    /**
     * Is current category root
     *
     * @return bool
     */
    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }
}
