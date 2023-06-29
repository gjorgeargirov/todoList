<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;
use function Sodium\add;

class TodoListController extends Controller
{
    private $show = false;

    //
    public function index()
    {
        return view('welcome',
            ['listItems' => ListItem::all()], ['listItemsCompleted' => ListItem::all()->where('is_complete', 1)]);
    }

    public function saveItem(Request $request)
    {
        //\Log::info(json_encode($request->all()));
        $newListItem = new ListItem;
        if ($request->listItem != null) {
            $newListItem->name = $request->listItem;
            $newListItem->is_complete = 0;
            $newListItem->due_date = $request->dueDate;
            $newListItem->save();
        }
        return redirect('/');
    }

    public function markComplete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
//        \Log::info(json_encode(ListItem::all()));
        return redirect('/');
    }

    public function deleteItem($id)
    {
        $listItem = ListItem::find($id);
        $listItem->delete();
        \Log::info(json_encode($id));
        return redirect('/');
    }

}
