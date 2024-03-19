<?php

namespace Modules\AvnWebsite\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AvnWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('avnwebsite::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('avnwebsite::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insert(Request $request): RedirectResponse
    {
        $request->validate([
            'price' => 'required|int',
        ]);

        $AvnWebsite = new $AvnWebsite();
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
        return view('avnwebsite::edit');
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
