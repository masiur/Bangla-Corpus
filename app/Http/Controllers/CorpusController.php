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
use Auth;
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
                    ->with('corpuses' , Corpus::take(100)->get());
    }

     public function analysis($id)
    {
        // return $id;
        $corpus = Corpus::findOrfail($id);
        $corpusText = $corpus->text;
        // return $corpusText;
        // cleaning data 
        $totalWords = $this->filterRawString($corpusText); // invoking the function
        //return count($totalWords);
        //$totalWordsOccur = array_fill_keys($totalWords,0);
        //return $totalWordsOccur;        
        $totalWordCount = count($totalWords);
        $uniqueWords = array_unique($totalWords); // store uniqu words to an array 
        $totalUniWordsCount = array_fill_keys($uniqueWords,0);
        //return array_keys($totalUniWordsCount);
        //return count($totalUniWordsCount);
        //return count($totalWords);


        $a = array_count_values($totalWords);
        $price = array();
        foreach($a as $key => $row)
        {
            $price[$key] = $row;
        }
        array_multisort($price, SORT_DESC, $a);
        // return $price;

        //return arsort($a,SORT_NUMERIC);
        //return uasort($a,SORT_NUMERIC);

//return $assoc;
        //$words = "আমি ভাল আছি আমি  A string with certain words occuring more often than other words. string A a with";
        //return array_count_values(str_word_count($words, 1));
        
        $uniqueWordCount =  count($uniqueWords);
        $uniqueString = implode(', ', $uniqueWords);
        $firstElement = head($totalWords);
        $lastElement = last($totalWords);
        $result = [ 'totalWords' => $totalWordCount,
                'uniqueWordCount' => $uniqueWordCount,
                'firstElement' => $firstElement,
                'lastElement' => $lastElement,
                'uniqueWords' => $uniqueString,
                'mainText' => $corpusText,
                'countEachWords' => $price
                ];
        // return Response::json($result);
        return view('admin.corpus.analysis')
                    ->with('title', 'Corpus Analysis')
                    ->with('result' , $result);
    }

    public function filterRawString($corpusText)
    {
        $analyzableString = str_replace('।', '', $corpusText); // removing bangla full stop (daRi ) from the string
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

        $target = new \App\TargetTable();
        // $tableName = null;
        $target->setTable($categoryName);
       
        
        
        $corpus = new Corpus();
        // Category::tableName($$data['category_id']);
        $corpus->category = $categoryName;
        $corpus->text = $data['corpusdata'];
        if($corpus->save()) {
            $user = Auth::user();
            $user->points = $user->points + 10;
            $user->save();

            $target->text = $data['corpusdata'];
            $target->contributor = auth()->user()->name;
            $target->save();

            return redirect()->route('contribute.text')->with('success','Text  Added Successfully');
        } else {
            return redirect()->route('contribute.text')->with('error','Something went wrong');
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







