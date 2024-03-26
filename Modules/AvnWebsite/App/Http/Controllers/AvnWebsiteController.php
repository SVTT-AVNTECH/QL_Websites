<?php

namespace Modules\AvnWebsite\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AvnWebsite\App\Models\AvnWebsites;
use Modules\AvnWebsite\App\Models\AvnWebsiteCost;

class AvnWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('avnwebsite::index');
        $websites = AvnWebsites::get();
        return view('avnwebsite::index', ['websites' => $websites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('avnwebsite::insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insert(Request $request)
    {
        // $request->validate([
        //     'price' => 'required|numeric',
        // ]);

        $avnwebsite = new AvnWebsites();
        $avnwebsite->url = $request->url;
        $avnwebsite->domain_date_register = $request->domain_date_register;
        $avnwebsite->domain_date_expried = $request->domain_date_expried;
        $avnwebsite->hosting_date_register = $request->hosting_date_register;
        $avnwebsite->hosting_date_expried = $request->hosting_date_expried;
        $avnwebsite->hosting_info = $request->hosting_info;
        $avnwebsite->domain_info = $request->domain_info;
        $avnwebsite->note = $request->note;
        $avnwebsite->save();

        foreach ($request->cost['date'] ?? [] as $key => $date) {
            if (isset($request->cost['date'][$key])) {
                $cost = new AvnWebsiteCost();
                $cost->date = $request->cost['date'][$key];
                $cost->title = $request->cost['title'][$key];
                $cost->price = $request->cost['price'][$key];
                $cost->type = $request->cost['type'][$key];
                $cost->website_id = $avnwebsite->id;
                $cost->save();
            }
        }
        return redirect('/website');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('avnwebsite::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $website = AvnWebsites::findOrFail($id);
        return view('avnwebsite::edit', compact('website'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $avnwebsite = AvnWebsites::findOrFail($id);
        $avnwebsite->url =$request->url;
        $avnwebsite->domain_date_register =$request->domain_date_register;
        $avnwebsite->domain_date_expried =$request->domain_date_expried;
        $avnwebsite->domain_info =$request->domain_info;
        foreach ($avnwebsite->domain_costs as $index => $item) {
            $item->date = $request->input('ngay_'. ($index+1));
            $item->title = $request->input('noidung_'. ($index+1));
            $item->price = $request->input('chiphi_'. ($index+1));
            $item->save();
        }
        $avnwebsite->hosting_date_register =$request->hosting_date_register;
        $avnwebsite->hosting_date_expried =$request->hosting_date_expried;
        $avnwebsite->hosting_info =$request->hosting_info;
        $avnwebsite->note =$request->note;
        $avnwebsite->save();
        foreach ($avnwebsite->hosting_costs as $index => $item) {
            $item->date = $request->input('date_'. ($index+1));
            $item->title = $request->input('title_'. ($index+1));
            $item->price = $request->input('price_'. ($index+1));
            $item->save();
        }


        return redirect('/website');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $avnWebsite = AvnWebsites::findOrFail($id);
        $avnWebsite->delete();
        return redirect('/website');
    }

    public function view($id)
    {
        $website = AvnWebsites::findOrFail($id);
        return view('avnwebsite::view', compact('website'));
    }

    public function create_price($id)
    {
        $website = AvnWebsites::findOrFail($id);
        return view('avnwebsite::create_price', compact('website'));
    }

    public function insert_price(Request $request,$id)
    {

        // $avnwebsite = new AvnWebsites();
        $avnwebsite = AvnWebsites::findOrFail($id);
        foreach ($request->cost['date'] ?? [] as $key => $date) {
            if (isset($request->cost['date'][$key])) {
                $cost = new AvnWebsiteCost();
                $cost->date = $request->cost['date'][$key];
                $cost->title = $request->cost['title'][$key];
                $cost->price = $request->cost['price'][$key];
                $cost->type = $request->cost['type'][$key];
                $cost->website_id = $avnwebsite->id;
                $cost->save();
            }
        }

        return redirect('/website');
    }
}
