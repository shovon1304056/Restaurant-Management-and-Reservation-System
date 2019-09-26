<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::all();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //json response
        //return $request;

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/items')) {
                mkdir('uploads/items', 0777, true);
            }
            $image->move('uploads/items', $imageName);
        } else {
            $imageName = 'default.png';
        }

        $item = new Item();
        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imageName;

        $item->save();

        if ($item) {
            return redirect()->route('item.index')->with('sucess', 'Item Added');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Item::findorFail($id);
        $categories = Category::all();
        return view('admin.item.edit', compact('item', 'categories', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);
        $item = Item::findorFail($id);

        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/items')) {
                mkdir('uploads/items', 0777, true);
            }
            if (file_exists('uploads/items/' . $item->image)) {
                unlink('uploads/items/' . $item->image);
            }

            $image->move('uploads/items', $imageName);
        } else {
            $imageName = $item->image;
        }
        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imageName;

        $item->save();
        //dd($item);
        if ($item) {
            return redirect()->route('item.index')->with('success', 'Item Edited');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = Item::findorFail($id);
        if (file_exists('uploads/items/' . $item->image)) {
            unlink('uploads/items/' . $item->image);
        }
        $item->delete();
        return redirect()->route('item.index')->with('success', "item Deleted");
    }
}
