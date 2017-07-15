<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index')
                        ->with('title', 'List of all Categories')
                        ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create')
                        ->with('title', 'Add Category');
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
            'name' => 'required'
            ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $category = new Category();
        $category->name = $data['name'];
        if($category->save()) {
            return redirect()->route('category.index')->with('success','Category Successfully Added');
        } else {
            return redirect()->route('category.index')->with('error','Something went wrong');
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
        /*
        $category = Category::findOrFail($id);
        return view('admin.category.edit')
                        ->with('title', 'Edit Categories')
                        ->with('category', $category);
    */
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit')
                        ->with('title', 'Edit Categories')
                        ->with('category', $category);
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
        $rules = [
            'name' => 'required'
            ];

        $data = $request->all();
        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $category = Category::findOrFail($id);
        $category->name = $data['name'];
        if($category->save()){
            return redirect()->route('category.index')->with('success','Category Successfully Updated');
        } else {
            return redirect()->route('category.index')->with('error','Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Category::destroy($id);

            return redirect()->route('category.index')->with('success','Category Deleted Successfully.');

        }catch(Exception $ex){
            return redirect()->route('category.index')->with('error','Something went wrong.Try Again.');
        }
    }

    public function download()
    {
        $categoryName = Input::get('name');
        if($categoryName == null) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }

        set_time_limit(0);
    ini_set('memory_limit', '-1');
    $time_start = microtime(true); 
   //mysqli_set_charset($dblink, "utf8"); 

   $mysqli = new \mysqli("localhost", "root", "","corpus");
   mysqli_set_charset($mysqli, "utf8");    
// /* check connection */
   if ($mysqli->connect_errno) {
       printf("Connect failed: %s\n", $mysqli->connect_error);
       exit();
   }

/*
     $files = glob('G:\category\education/*.txt');
    while(list($i, $filename) = each($files)){
    // echo "$filename size " . filesize($filename) . "\n";
       $contents = file_get_contents($filename);

        // filter  data 
        $analyzableString = preg_replace('/\s\s+/', ' ', $contents); // remove more than one whitespace

            $analyzableString = preg_replace("/[A-Za-z0-9@#$^&*.]/u", "", $analyzableString);
            $analyzableString = preg_replace("/[^\s\x{0980}-\x{09FB}]+/u", "", $analyzableString); //
*/           
        //$sql = "INSERT INTO education (text, contributor) VALUES ('$contents', 'RatulCorpus')";
        $sql = "SELECT id,text,contributor from $categoryName";
        $result_set = mysqli_query($mysqli,$sql);
        $i=0;
        $zip = new \ZipArchive();
        $zipname = $categoryName.'.zip';
        $zip->open($zipname, \ZipArchive::CREATE);
        while($res = mysqli_fetch_assoc($result_set)){
            //echo $res['id'].$res['text'].$res['contributor'];
            //echo "\n";
            $i=$i+1;
            if (is_dir(public_path($categoryName))) {
                // rmdir(public_path($categoryName));
            }
            
            // mkdir(public_path($categoryName));
            $path="$categoryName/$categoryName".(string)$i.".txt";
            $myfile = fopen($path, "a+") or die("Unable to open file!");
            //$myfile = fopen("sports/sports".(string)$i.".txt", "x") or die("Unable to open file!");
            $zip->addFile($path);
            fwrite($myfile,$res['text']);
            fclose($myfile);
        }
        $zip->close(); 
        /* 
        if ($mysqli->query($sql)  === TRUE) {

        } else {
            echo "Error: " .$sql. "<br>" . $mysqli->error;
        }
        */
    $mysqli->close();

    $time_end = microtime(true);
    //dividing with 60 will give the execution time in minutes other wise seconds
    $execution_time = ($time_end - $time_start)/60;
    //echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
    
    return response()->download(public_path($categoryName.".zip"));

    }


}
