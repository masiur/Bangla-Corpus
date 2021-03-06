<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\User;
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

     public function leaderboard()
    {
        $users = User::orderby('points', 'desc')->get();
        return view('frontPages.leaderboard')
                    ->with('title','Leaderboard')
                    ->with('users', $users);
    }
    public function contact()
    {
        return view('frontPages.contact')->with('title','Home');
    }

    public function contributeIndex()
    {
        return view('frontPages.contribute')->with('title', 'Contribute');
    }

    public function corpusDataEntryForm()
    {
        $categories[''] = 'Please, Select a Category';
        $categories = Category::lists('name', 'id');
        // $categories = array($categories);
        // $categories = array_merge(['' => 'Please, Select a Category'], $categories);
        // $categories[''] = 'Please, Select a Category';
        // return $categories;     
        return view('frontPages.corpusDataEntryForm')->with('title', 'Contribute text')
                    ->with('categories', $categories);
    }
   
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
