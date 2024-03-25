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
                // $cost->date = $request->date_hosting;
                // $cost->title = $request->title_hosting;
                // $cost->price = $request->price_hosting;
                $cost->type = $request->cost['type'][$key];
                $cost->website_id = $avnwebsite->id;
                $cost->save();
            }
        }
        return redirect('/');
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
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
