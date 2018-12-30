<?php

namespace App\Http\Controllers;

use AlexGodbehere\LaravelFeatures\Feature;
use App\Categories;
use App\Inventories;
use App\InventorySkus;
use App\InventoryStocks;
use App\Item;
use App\Metric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Inventory\Models\Inventory;
use Stevebauman\Inventory\Models\InventorySku;
use Stevebauman\Inventory\Models\InventoryStock;
use Stevebauman\Inventory\Models\Location;

class InventoryController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('layouts.inventory.index', ['title' => 'Inventory']);
    }

    public function metricsCreate()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $metrics = Metric::where('user_id',Auth::user()->id)->get();

        return view('layouts.inventory.metrics.create', ['title' => 'Create Inventory', 'metrics'=>$metrics]);
    }

    public function metricsStore(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'symbol' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $metric = new Metric();
        $metric->name = $request->name;
        $metric->symbol = $request->symbol;
        $metric->user_id = $user_id;
        $metric->save();

        if($metric){
            return redirect()->back()->with('success', 'Metric Added');
        }
        else{
            return redirect()->back()->with('error', 'Please check the form and try again.');
        }
    }

    public function inventoryCreate()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $inventories = Inventories::where('user_id',Auth::user()->id)->get();
        $metrics = Metric::where('user_id',Auth::user()->id)->pluck('name','id');
        $categories = Categories::where('user_id',Auth::user()->id)->pluck('name','id');

        return view('layouts.inventory.create', ['title' => 'Create Inventory', 'metrics'=>$metrics, 'inventories'=>$inventories, 'categories'=>$categories]);
    }

    public function inventoryStore(Request $request)
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'metric' => 'required',
            'category' => 'required',
            'description' => 'required|max:255',
        ]);

        $item = new Inventory;

        $item->metric_id = $request->metric;
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->save();

        if($item){
            return redirect()->back()->with('success', 'Inventory Added');
        }
        else{
            return redirect()->back()->with('error', 'Please check the form and try again.');
        }
    }

    public function locationCreate(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $locations = \App\Location::where('user_id', Auth::user()->id)->get();

        return view('layouts.inventory.locations.create', ['title' => 'Create Inventory', 'locations'=>$locations]);
    }

    public function locationStore(Request $request)
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        $location = new Location;
        $location->name = $request->name;
        $location->user_id = Auth::user()->id;
        $location->save();

        if($location){
            return redirect()->back()->with('success', 'Location Added');
        }
        else{
            return redirect()->back()->with('error', 'Please check the form and try again.');
        }
    }

    public function manage()
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $inventories = Inventories::select('inventory_stocks.id AS isid','inventories.*','inventory_stocks.*', 'locations.*')
            ->where('inventories.user_id',Auth::user()->id)
            ->join('inventory_stocks', 'inventory_stocks.inventory_id', '=','inventories.id')
            ->join('locations', 'inventory_stocks.location_id', '=','locations.id')
            ->get();

        $inventories2 = Inventories::where('user_id',Auth::user()->id)->pluck('name','id');

        $locations = \App\Location::where('user_id', Auth::user()->id)->pluck('name','id');


        return view('layouts.inventory.manage.index', ['title' => 'Manage Inventory', 'inventories'=>$inventories, 'inventories2'=>$inventories2,'locations'=>$locations]);

    }

    public function manageStore(Request $request)
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $validatedData = $request->validate([
            'location' => 'required',
            'inventory' => 'required',
            'cost' => 'required',
            'quantity' => 'required',
            'reason' => 'required'
        ]);

        $check = InventoryStocks::where('location_id',$request->location)->where('inventory_id',$request->inventory)->count();

        if($check)
        {
            return redirect()->back()->with('error', 'This item already exists at this location.');
        }

        $stock = new InventoryStock;
        $stock->inventory_id = $request->inventory;
        $stock->location_id = $request->location;
        $stock->quantity = $request->quantity;
        $stock->cost = $request->cost;
        $stock->reason = $request->reason;
        $stock->save();

        // add sku to item
        $inventory = InventorySkus::where('inventory_id',$request->inventory)->first();
        $stock= InventoryStock::find($stock->id);
        $stock->sku = $inventory->code.'-'.$stock->id;
        $stock->save();


        if($stock){
            return redirect()->back()->with('success', 'Stock Updated');
        }
        else{
            return redirect()->back()->with('error', 'Please check the form and try again.');
        }
    }

    public function category()
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $categories = Categories::where('user_id',Auth::user()->id)->get();

        return view('layouts.inventory.categories.create', ['title' => 'Manage Categories', 'categories'=>$categories]);

    }

    public function categoryStore(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $category = new Categories();
        $category->name = $request->name;
        $category->user_id = Auth::user()->id;
        $category->save();

        if($category){
            return redirect()->back()->with('success', 'Categories Updated');
        }
        else{
            return redirect()->back()->with('error', 'Please check the form and try again.');
        }
    }

    public function item()
    {

        if (!Auth::check()) {
            return redirect('login');
        }


        return view('layouts.inventory.categories.create', ['title' => 'Manage Categories']);

    }

    public function itemsStore(Request $request)
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $category = new Categories();
        $category->name = $request->name;
        $category->user_id = Auth::user()->id;
        $category->save();

        if($category){
            return redirect()->back()->with('success', 'Items Updated');
        }
        else{
            return redirect()->back()->with('error', 'Please check the form and try again.');
        }

    }

    public function addQuantity($inventoryStocksId, Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $validatedData = $request->validate([
            'quantity' => 'required',
            'cost' => 'required',
            'adjust' => 'required',
        ]);


        $location = Location::find(6);

        $item = Inventory::find(11);

        $stock = $item->getStockFromLocation($location);

        /*
        * Reason and cost are always optional
        */
        $reason = 'I bought some';
        $cost = '5.20';








        if($request->adjust)
        {
            /*
         * Remember, you're adding the amount of your metric, in this case Litres
         */
            $stock->put($request->quantity, 'Added from interface', $cost);
        }
        else{
            $stock->take($request->quantity, 'Subtracted from interface');
        }

        return redirect()->back()->with('success', 'Stock Updated');






    }
}
