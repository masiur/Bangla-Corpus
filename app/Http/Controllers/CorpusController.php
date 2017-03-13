<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use App\Corpus;
use App\Category;
use Response;
class CorpusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.corpus.index')
                    ->with('title', 'Corpora Collections')
                    ->with('corpuses' , Corpus::all());
    }

     public function analysis($id)
    {
        // return $id;
        $corpus = Corpus::findOrfail($id);
        $corpusText = $corpus->text;
        // cleaning data 
        $totalWords = $this->filterRawString($corpusText); // invoking the function
        
        $totalWordCount = count($totalWords);
        $uniqueWords = array_unique($totalWords); // store uniqu words to an array 
        $uniqueWordCount =  count($uniqueWords);
        $uniqueString = implode(', ', $uniqueWords);
        $firstElement = head($totalWords);
        $lastElement = last($totalWords);
        $result = [ 'totalWords' => $totalWordCount,
                'uniqueWordCount' => $uniqueWordCount,
                'firstElement' => $firstElement,
                'lastElement' => $lastElement,
                'uniqueWords' => $uniqueString,
                'mainText' => $corpusText
                ];
        // return Response::json($result);
        return view('admin.corpus.analysis')
                    ->with('title', 'Corpus Analysis')
                    ->with('result' , $result);
    }

    protected function filterRawString($corpusText)
    {
        $analyzableString = str_replace('।', '', $corpusText); // dremoving bangla full stop (daRi ) from the string
        $analyzableString = str_replace(',', '', $analyzableString); // removing all commas
        $analyzableString = preg_replace('/(০|১|২|৩|৪|৫|৬|৭|৮|৯)/', '', $analyzableString); // remove bangla numeric value
        $analyzableString = preg_replace('/\s\s+/', ' ', $analyzableString); // remove more than one whitespace

        $analyzableString = preg_replace("/[A-Za-z0-9!@#$%^&*().]/u", "", $analyzableString);
        $analyzableString = preg_replace("/[^\s\x{0980}-\x{09FB}]+/u", "", $analyzableString); // remove any character excluding bangla 
        
        $totalWords = explode(" ",$analyzableString); // return an array
        return $totalWords;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required',
            'corpusdata' => 'required'
            ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }
        $categoryName = Category::where('id', $data['category_id'])->pluck('name');
        $corpus = new Corpus();
        $corpus->category = $categoryName;
        $corpus->text = $data['corpusdata'];
        if($corpus->save()) {
            return redirect()->route('index')->with('success','Text  Added Successfully');
        } else {
            return redirect()->route('index')->with('error','Something went wrong');
        }
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







