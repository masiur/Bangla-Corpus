<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
// 	return Redirect::route('dashboard');
// });
Route::get('/admin', function () {
	return Redirect::route('dashboard');
});
Route::get('/', ['as'=>'index','uses' => 'FrontendController@index']);
Route::get('home', ['as'=>'home','uses' => 'FrontendController@home']);
// Route::get('about', ['as'=>'about','uses' => 'FrontendController@about']);

Route::group(['middleware' => 'guest'], function(){

	Route::get('login', ['as'=>'login','uses' => 'Auth\AuthController@login']);
	Route::post('login', ['as'=> 'postlogin','uses' => 'Auth\AuthController@doLogin']);

	Route::get('register', ['as'=>'register','uses' => 'UserController@create']);
	Route::post('register', ['as'=>'postRegister','uses' => 'UserController@store']);
	
	// Password reset link request routes...
	Route::get('password/email', ['as' => 'passwordRequest','uses' => 'Auth\PasswordController@getEmail']);
	Route::post('password/email', ['as' => 'postPasswordRequest', 'uses' => 'Auth\PasswordController@postEmail']);
	// Password reset routes...
	Route::get('password/reset/{token}', ['as' => 'getReset', 'uses' =>'Auth\PasswordController@getReset']);
	Route::post('password/reset', ['as' => 'postReset', 'uses' => 'Auth\PasswordController@postReset']);

	// social login route
	Route::get('login/fb', ['as'=>'login/fb','uses' => 'SocialController@loginWithFacebook']);
	Route::get('login/gp', ['as'=>'login/gp','uses' => 'SocialController@loginWithGoogle']);

});

Route::group(array('middleware' => 'auth'), function()
{
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
	Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
	// Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'Auth\AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'Auth\AuthController@doChangePassword'));

	// Category CRUD
	Route::get('contribute',['as' => 'contribute.index', 'uses' => 'FrontendController@contributeIndex']);
	Route::get('contribute/text',['as' => 'contribute.text', 'uses' => 'FrontendController@corpusDataEntryForm']);
	Route::get('contribute/info',['as' => 'contribute.info', 'uses' => 'UserController@createUserData']);
	Route::post('contribute/info/store',['as' => 'contribute.store.info', 'uses' => 'UserController@storeUserData']);
	Route::get('corpus/create',['as' => 'corpus.create', 'uses' => 'CorpusController@create']);
	Route::post('corpus',['as' => 'corpus.store', 'uses' => 'CorpusController@store']);
	Route::get('corpus/{id}/edit',['as' => 'corpus.edit', 'uses' => 'CorpusController@edit']);
	Route::get('corpus/{id}/show',['as' => 'corpus.show', 'uses' => 'CorpusController@show']);
	Route::put('corpus/{id}',['as' => 'corpus.update', 'uses' => 'CorpusController@update']);
	Route::delete('corpus/{id}',['as' => 'corpus.delete', 'uses' => 'CorpusController@destroy']);

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function()
{
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));

	// Demo CRUD
	Route::get('demo',['as' => 'demo.index', 'uses' => 'DemoController@index']);
	Route::get('demo/create',['as' => 'demo.create', 'uses' => 'DemoController@create']);
	Route::post('demo',['as' => 'demo.store', 'uses' => 'DemoController@store']);
	Route::get('demo/{id}/edit',['as' => 'demo.edit', 'uses' => 'DemoController@edit']);
	Route::get('demo/{id}/show',['as' => 'demo.show', 'uses' => 'DemoController@show']);
	Route::put('demo/{id}',['as' => 'demo.update', 'uses' => 'DemoController@update']);
	Route::get('demo/delete/{id}',['as' => 'demo.delete', 'uses' => 'DemoController@destroy']);

	// Category CRUD
	Route::get('category',['as' => 'category.index', 'uses' => 'CategoryController@index']);
	Route::get('category/create',['as' => 'category.create', 'uses' => 'CategoryController@create']);
	Route::post('category',['as' => 'category.store', 'uses' => 'CategoryController@store']);
	Route::get('category/{id}/edit',['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
	Route::get('category/{id}/show',['as' => 'category.show', 'uses' => 'CategoryController@show']);
	Route::put('category/{id}',['as' => 'category.update', 'uses' => 'CategoryController@update']);
	Route::delete('category/{id}',['as' => 'category.delete', 'uses' => 'CategoryController@destroy']);

	Route::get('corpus',['as' => 'corpus.index', 'uses' => 'CorpusController@index']);
	Route::get('corpus/{id}/analysis',['as' => 'corpus.analysis', 'uses' => 'CorpusController@analysis']);

	Route::get('download',['as' => 'download', 'uses' => 'CategoryController@download']);


});

	Route::get('corpus/create',['as' => 'corpus.create', 'uses' => 'CorpusController@create']);
	Route::post('corpus',['as' => 'corpus.store', 'uses' => 'CorpusController@store']);
	Route::get('corpus/{id}/edit',['as' => 'corpus.edit', 'uses' => 'CorpusController@edit']);
	Route::get('corpus/{id}/show',['as' => 'corpus.show', 'uses' => 'CorpusController@show']);
	Route::put('corpus/{id}',['as' => 'corpus.update', 'uses' => 'CorpusController@update']);
	Route::delete('corpus/{id}',['as' => 'corpus.delete', 'uses' => 'CorpusController@destroy']);




	// Route::get('contribute/{id}/edit',['as' => 'contribute.edit', 'uses' => 'CategoryController@edit']);
	// Route::get('contribute/{id}/show',['as' => 'contribute.show', 'uses' => 'CategoryController@show']);


	Route::get('leaderboard',['as' => 'leaderboard', 'uses' => 'FrontendController@leaderboard']);
	Route::get('about',['as' => 'about', 'uses' => 'FrontendController@about']);
	Route::get('contact',['as' => 'contact.index', 'uses' => 'FrontendController@contact']);
//Download section

// Route::get('download', function () {

//  	set_time_limit(0);
//  	ini_set('memory_limit', '-1');
//  	$time_start = microtime(true); 
//    //mysqli_set_charset($dblink, "utf8"); 

//    $mysqli = new mysqli("localhost", "root", "","corpus");
//    mysqli_set_charset($mysqli, "utf8");    
// // /* check connection */
//    if ($mysqli->connect_errno) {
//        printf("Connect failed: %s\n", $mysqli->connect_error);
//        exit();
//    }

// /*
//      $files = glob('G:\category\education/*.txt');
//  	while(list($i, $filename) = each($files)){
//     // echo "$filename size " . filesize($filename) . "\n";
//  	   $contents = file_get_contents($filename);

//  	    // filter  data 
//  	    $analyzableString = preg_replace('/\s\s+/', ' ', $contents); // remove more than one whitespace

//  	        $analyzableString = preg_replace("/[A-Za-z0-9@#$^&*.]/u", "", $analyzableString);
//  	        $analyzableString = preg_replace("/[^\s\x{0980}-\x{09FB}]+/u", "", $analyzableString); //
// */ 	         
//  	    //$sql = "INSERT INTO education (text, contributor) VALUES ('$contents', 'RatulCorpus')";
//  	    $sql = "SELECT id,text,contributor from sports";
//  	    $result_set = mysqli_query($mysqli,$sql);
//  	    $i=0;
//  	    $zip = new ZipArchive();
//  	    $zipname = "sports.zip";
//  	    $zip->open($zipname, ZipArchive::CREATE);
//  	    while($res = mysqli_fetch_assoc($result_set)){
//             //echo $res['id'].$res['text'].$res['contributor'];
//             //echo "\n";
//             $i=$i+1;
//             $path="sports/sports".(string)$i.".txt";
//             $myfile = fopen($path, "a") or die("Unable to open file!");
//             //$myfile = fopen("sports/sports".(string)$i.".txt", "x") or die("Unable to open file!");
//             $zip->addFile($path);
// 			fwrite($myfile,$res['text']);
// 			fclose($myfile);
//         }
//         $zip->close(); 
//         /* 
//  		if ($mysqli->query($sql)  === TRUE) {

//  		} else {
//  	    	echo "Error: " .$sql. "<br>" . $mysqli->error;
//  		}
//  		*/
//  	$mysqli->close();

//  	$time_end = microtime(true);
//  	//dividing with 60 will give the execution time in minutes other wise seconds
//  	$execution_time = ($time_end - $time_start)/60;
//  	//echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
	
 // });
	//------------------

/* this is only for developer 
// strongly recommend not to use on production
*/

// // data insertion code
// Route::get('/insert', function () {
// 	set_time_limit(0);
// $files = glob('G:\category\education/*.txt');
// while(list($i, $filename) = each($files)){
//    // echo "$filename size " . filesize($filename) . "\n";
//    $contents = file_get_contents($filename);
//    // echo  $contents."<br>";

//    App\RawData::create([
//    			'category' => 'education',
//    			'text' => $contents,
//    			'contributor' => 'RatulCorpus'
//    			]);
// }




// });

// Route::get('/insert1', function () {
// 	set_time_limit(0);
// $files = glob('G:\category\art/*.txt');
// while(list($i, $filename) = each($files)){
//    // echo "$filename size " . filesize($filename) . "\n";
//    $contents = file_get_contents($filename);
//    // echo  $contents."<br>";

//    App\RawData::create([
//    			'category' => 'art',
//    			'text' => $contents,
//    			'contributor' => 'RatulCorpus'
//    			]);
// }

// 		// $analyzableString = str_replace('।', '', $corpusText); // removing bangla full stop (daRi ) from the string
//         // $analyzableString = str_replace(',', '', $analyzableString); // removing all commas
//         // $analyzableString = preg_replace('/(০|১|২|৩|৪|৫|৬|৭|৮|৯)/', '', $analyzableString); // remove bangla numeric value
//         $analyzableString = preg_replace('/\s\s+/', ' ', $contents); // remove more than one whitespace

//         $analyzableString = preg_replace("/[A-Za-z0-9@#$^&*.]/u", "", $analyzableString);
//         $analyzableString = preg_replace("/[^\s\x{0980}-\x{09FB}]+/u", "", $analyzableString); // remove any character excluding bangla 
        
//         $totalWords = explode(" ",$analyzableString); // return an array
//         return $totalWords;



// });


// Route::get('/education', function () {

// 	set_time_limit(0);
// 	ini_set('memory_limit', '-1');
// 	$time_start = microtime(true); 
// 	// mysqli_set_charset($dblink, "utf8"); 

// $mysqli = new mysqli("localhost", "root", "sust","corpus");
// mysqli_set_charset($mysqli, "utf8");    
// /* check connection */
// if ($mysqli->connect_errno) {
//     printf("Connect failed: %s\n", $mysqli->connect_error);
//     exit();
// }


//     $files = glob('G:\category\education/*.txt');
// 	while(list($i, $filename) = each($files)){
//    // echo "$filename size " . filesize($filename) . "\n";
// 	   $contents = file_get_contents($filename);

// 	    // filter  data 
// 	    $analyzableString = preg_replace('/\s\s+/', ' ', $contents); // remove more than one whitespace

// 	        $analyzableString = preg_replace("/[A-Za-z0-9@#$^&*.]/u", "", $analyzableString);
// 	        $analyzableString = preg_replace("/[^\s\x{0980}-\x{09FB}]+/u", "", $analyzableString); // remove any character excluding bangla 
// 		// insert
// 	        $sql = "INSERT INTO education (text, contributor) VALUES ('$contents', 'RatulCorpus')";
// 		if ($mysqli->query($sql)  === TRUE) {

// 		} else {
// 	    	echo "Error: " .$sql. "<br>" . $mysqli->error;
// 		}
// 	}

// 	$mysqli->close();

// 	$time_end = microtime(true);
// 	//dividing with 60 will give the execution time in minutes other wise seconds
// 	$execution_time = ($time_end - $time_start)/60;
// 	echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
	
// });

// Route::get('/opinion', function () {

// 	set_time_limit(0);
// 	ini_set('memory_limit', '-1');
// 	$time_start = microtime(true); 
// 	// mysqli_set_charset($dblink, "utf8"); 

// $mysqli = new mysqli("localhost", "root", "sust","corpus");
// mysqli_set_charset($mysqli, "utf8");    
// /* check connection */
// if ($mysqli->connect_errno) {
//     printf("Connect failed: %s\n", $mysqli->connect_error);
//     exit();
// }


//     $files = glob('G:\category\opinion/*.txt');
// 	while(list($i, $filename) = each($files)){
//    // echo "$filename size " . filesize($filename) . "\n";
// 	   $contents = file_get_contents($filename);

// 	    // filter  data 
// 	    $analyzableString = preg_replace('/\s\s+/', ' ', $contents); // remove more than one whitespace

// 	        $analyzableString = preg_replace("/[A-Za-z0-9@#$^&*.]/u", "", $analyzableString);
// 	        $analyzableString = preg_replace("/[^\s\x{0980}-\x{09FB}]+/u", "", $analyzableString); // remove any character excluding bangla 
// 		// insert
// 	        $sql = "INSERT INTO opinion (text,  contributor) VALUES ('$contents', 'RatulCorpus')";
// 		if ($mysqli->query($sql)  === TRUE) {

// 		} else {
// 	    	echo "Error: " .$sql. "<br>" . $mysqli->error;
// 		}
// 	}

// 	$mysqli->close();

// 	$time_end = microtime(true);
// 	//dividing with 60 will give the execution time in minutes other wise seconds
// 	$execution_time = ($time_end - $time_start)/60;
// 	echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
	
// });

// Route::get('/economics', function () {

// 	set_time_limit(0);
// 	ini_set('memory_limit', '-1');
// 	$time_start = microtime(true); 
// 	// mysqli_set_charset($dblink, "utf8"); 

// $mysqli = new mysqli("localhost", "root", "sust","corpus");
// mysqli_set_charset($mysqli, "utf8");    
// /* check connection */
// if ($mysqli->connect_errno) {
//     printf("Connect failed: %s\n", $mysqli->connect_error);
//     exit();
// }


//     $files = glob('G:\category\economics/*.txt');
// 	while(list($i, $filename) = each($files)){
//    // echo "$filename size " . filesize($filename) . "\n";
// 	   $contents = file_get_contents($filename);

// 	    // filter  data 
// 	    $analyzableString = preg_replace('/\s\s+/', ' ', $contents); // remove more than one whitespace

// 	        $analyzableString = preg_replace("/[A-Za-z0-9@#$^&*.]/u", "", $analyzableString);
// 	        $analyzableString = preg_replace("/[^\s\x{0980}-\x{09FB}]+/u", "", $analyzableString); // remove any character excluding bangla 
// 		// insert
// 	        $sql = "INSERT INTO economics (text,  contributor) VALUES ('$contents', 'RatulCorpus')";
// 		if ($mysqli->query($sql)  === TRUE) {

// 		} else {
// 	    	echo "Error: " .$sql. "<br>" . $mysqli->error;
// 		}
// 	}

// 	$mysqli->close();

// 	$time_end = microtime(true);
// 	//dividing with 60 will give the execution time in minutes other wise seconds
// 	$execution_time = ($time_end - $time_start)/60;
// 	echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
	
// });




// Route::get('/environment', function () {

// 	set_time_limit(0);
// 	ini_set('memory_limit', '-1');
// 	$time_start = microtime(true); 
// 	// mysqli_set_charset($dblink, "utf8"); 

// $mysqli = new mysqli("localhost", "root", "sust","corpus");
// mysqli_set_charset($mysqli, "utf8");    
// /* check connection */
// if ($mysqli->connect_errno) {
//     printf("Connect failed: %s\n", $mysqli->connect_error);
//     exit();
// }


//     $files = glob('G:\category\environment/*.txt');
// 	while(list($i, $filename) = each($files)){
//    // echo "$filename size " . filesize($filename) . "\n";
// 	   $contents = file_get_contents($filename);

// 	    // filter  data 
// 	    $analyzableString = preg_replace('/\s\s+/', ' ', $contents); // remove more than one whitespace

// 	        $analyzableString = preg_replace("/[A-Za-z0-9@#$^&*.]/u", "", $analyzableString);
// 	        $analyzableString = preg_replace("/[^\s\x{0980}-\x{09FB}]+/u", "", $analyzableString); // remove any character excluding bangla 
// 		// insert
// 	        $sql = "INSERT INTO environment (text, contributor) VALUES ('$contents', 'RatulCorpus')";
// 		if ($mysqli->query($sql)  === TRUE) {

// 		} else {
// 	    	echo "Error: " .$sql. "<br>" . $mysqli->error;
// 		}
// 	}

// 	$mysqli->close();

	
// 	// return App\RawData::all();
// 	$time_end = microtime(true);
// 	//dividing with 60 will give the execution time in minutes other wise seconds
// 	$execution_time = ($time_end - $time_start)/60;
// 	echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
	
// });


// Route::get('/art', function () {

// 	set_time_limit(0);
// 	ini_set('memory_limit', '-1');
// 	$time_start = microtime(true); 
// 	// mysqli_set_charset($dblink, "utf8"); 

// $mysqli = new mysqli("localhost", "root", "sust","corpus");
// mysqli_set_charset($mysqli, "utf8");    
// /* check connection */
// if ($mysqli->connect_errno) {
//     printf("Connect failed: %s\n", $mysqli->connect_error);
//     exit();
// }


//     $files = glob('G:\category\art/*.txt');
// 	while(list($i, $filename) = each($files)){
//    // echo "$filename size " . filesize($filename) . "\n";
// 	   $contents = file_get_contents($filename);

// 	    // filter  data 
// 	    $analyzableString = preg_replace('/\s\s+/', ' ', $contents); // remove more than one whitespace

// 	        $analyzableString = preg_replace("/[A-Za-z0-9@#$^&*.]/u", "", $analyzableString);
// 	        $analyzableString = preg_replace("/[^\s\x{0980}-\x{09FB}]+/u", "", $analyzableString); // remove any character excluding bangla 
// 		// insert
// 	        $sql = "INSERT INTO art (text, contributor) VALUES ('$contents',  'RatulCorpus')";
// 		if ($mysqli->query($sql)  === TRUE) {

// 		} else {
// 	    	echo "Error: " .$sql. "<br>" . $mysqli->error;
// 		}
// 	}

// 	$mysqli->close();

	
// 	// return App\RawData::all();
// 	$time_end = microtime(true);
// 	//dividing with 60 will give the execution time in minutes other wise seconds
// 	$execution_time = ($time_end - $time_start)/60;
// 	echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
	
// });