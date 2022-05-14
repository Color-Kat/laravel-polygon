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

        $result['where']['firstWhere'] = $collection->firstWhere('user_id', '=', '1');
        $result['where']['where->first'] = $collection->where('user_id', '=', '1')->first();

        // $collection isn't changed, just return new collection
        $result['map']['all'] = $collection->map(function (array $item) {
           $newItem = new \stdClass();
           $newItem->item_id = $item['id'];
           $newItem->item_name = $item['title'];
           $newItem->item_exists = is_null($item['deleted_at']);

           return $newItem;
        });
        $result['map']['not_exists'] = $result['map']['all']
            ->where('item_exists', '=', false)
            ->keyBy('item_id');

        // transform is like map but it change $collection instead create new collection
        // $collection->transform(function (array $item) {return '123';});

        dd(__METHOD__, 'result', $collection);


        return '123';
    }
}
