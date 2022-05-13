<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
     * @return Attribute
     */
    public function parentTitle(): Attribute
    {
        return new Attribute(
            get: fn($Value) =>
                $this->parentCategory->title ??
                ($this->isRoot() ? 'Корень' : 'Нет родителя')
        );
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

    // -------- Accessors and mutators before 9.x---------- //
    // !DEPRECATED
//    public function getTitleAttribute($valueFormObject) {
//        return mb_strtoupper($valueFormObject);
//    }
//    public function setTitleAttribute($incomingValue) {
//        $this->attributes['title'] = mb_strtolower($incomingValue);
//    }

    // ----- Laravel 9 way to mutators ----- /
    public function title(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => mb_strtolower($value)
        );

        // OR
        // return Attribute::get(fn($value) => mb_strtolower($value));
    }
}
