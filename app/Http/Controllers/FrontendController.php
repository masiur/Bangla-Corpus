<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories[''] = 'Please, Select a Category';
        $categories = Category::lists('name', 'id');
        // $categories = array($categories);
        // $categories = array_merge(['' => 'Please, Select a Category'], $categories);
        // $categories[''] = 'Please, Select a Category';
        // return $categories;     
        return view('frontPages.index')->with('title', 'Home')
                    ->with('categories', $categories);
    }

    public function home()
    {
        $categories = Category::lists('name');
        return view('frontPages.index')->with('title', 'Home')
                    ->with('categories', $categories);
    }

    public function about()
    {
        return view('frontPages.about')->with('title','Home');
    }

    public function contact()
    {
        return view('frontPages.contact')->with('title','Home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contributeIndex()
    {
        return view('frontPages.contribute')->with('title', 'Contribute');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
