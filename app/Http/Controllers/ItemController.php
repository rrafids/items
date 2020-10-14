<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getItems()
    {
        if (!empty(Item::all())) {
            $items = Item::all();
            $status = 1;
        } else {
            $items = "Item not found";
            $status = 0;
        }

        return response()->json([
            "status" => $status,
            "data" => [
                "items" => $items
            ]
        ], 201);
    }

    public function getItemsByCodeOrName($codeOrName)
    {
        if (!empty($codeOrName)) {
            if (!empty(Item::where('code', $codeOrName)->get())) {
                $items = Item::where('code', $codeOrName)->get();
                $status = 1;
            } else if(!empty(Item::where('name', $codeOrName)->get())) {
                $items = Item::where('name', $codeOrName)->get();
                $status = 1;
            } else {
                $items = "Item not found";
                $status = 0;
            }
        } else {
            $items = "Item not found";
            $status = 0;
        }

        return response()->json([
            "status" => $status,
            "data" => [
                "items" => $items
            ]
        ], 201);
    }

    public function getItemByCode(Request $request)
    {
        if (!empty($item = Item::where('code', $request->code)->first())) {
            $item = Item::where('code', $request->code)->first();
        } else {
            $item = "Item not found";
        }

        return response()->json([
            "data" => [
                "item" => $item
            ]
        ], 201);
    }

    public function createItem(Request $request)
    {
        if (empty(Item::where('name', $request->name)->first())) {
            Item::create([
                'code' => $this->generateCode(),
                'name' => $request->name,
                'description' => $request->description
            ]);

            return response()->json([
                "result" => "Success: Item created"
            ], 201);
        } else {

            return response()->json([
                "result" => "Failed: Item named " . $request->name . " already exist"
            ], 201);
        }
    }

    public function updateItem(Request $request)
    {
        if (!empty(Item::where('code', $request->code)->first())) {
            Item::where('code', $request->code)->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            return response()->json([
                "result" => "Success: Item updated"
            ], 201);
        } else {

            return response()->json([
                "result" => "Failed: Item with code " . $request->code . " doesn't exist"
            ], 201);
        }
    }

    public function deleteItem($code)
    {
        if (!empty(Item::where('code', $code)->first())) {
            $item = Item::where('code', $code)->first();
            $item->delete();

            return response()->json([
                "result" => "Success: Item deleted"
            ], 201);
        } else {

            return response()->json([
                "result" => "Failed: Item with code " . $code . " doesn't exist"
            ], 201);
        }

        return response()->json([
            "result" => "Success: Item deleted"
        ], 201);
    }

    public function generateCode()
    {
        $code = Str::random(12);

        if (!empty(Item::where('code', $code)->first())) {
            return $this->generateCode();
        } else {
            return $code;
        }
    }
}
