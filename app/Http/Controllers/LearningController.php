<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function collections() {
        $result = [];

        /** @var \Illuminate\Database\Eloquent\Collection $eloquentCollection */
        $eloquentCollection = BlogPost::withTrashed()->get();
        $collection = collect($eloquentCollection->toArray());



//        dd(__METHOD__, get_class($eloquentCollection), get_class($collection));
//        dd(__METHOD__, ($eloquentCollection->count()), ($collection->count()));

        $result['first'] = $collection->first();
        $result['last'] = $collection->last();

        $result['where']['data'] = $collection
            ->where('category_id', 10)
//            ->values() // The array will be numbered from 0. By default it numbered like id-1
            ->keyBy('id') // Array index is id
        ;

        $result['where']['count'] = $result['where']['data']->count();
        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
        $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();

        dd(__METHOD__, 'result', $result);


        return '123';
    }
}
