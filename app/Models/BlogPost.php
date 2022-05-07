<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes; // If in migration we have softDeletes

    /**
     * Category of post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * User (Author) of the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
