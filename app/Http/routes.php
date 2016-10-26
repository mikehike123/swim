
//swimmer Resources
/********************* swimmer ***********************************************/
Route::resource('swimmer','\App\Http\Controllers\SwimmerController');
Route::post('swimmer/{id}/update','\App\Http\Controllers\SwimmerController@update');
Route::get('swimmer/{id}/delete','\App\Http\Controllers\SwimmerController@destroy');
Route::get('swimmer/{id}/deleteMsg','\App\Http\Controllers\SwimmerController@DeleteMsg');
/********************* swimmer ***********************************************/

