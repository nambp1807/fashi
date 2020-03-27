<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route for admin

Route::prefix("admin")->middleware("check_admin")->group(function (){
    include_once("admin.php");
});


//Route::METHOD(path_string,HANDLE_FUNCITON);
// Method : post get put delete ...  CRUD


/*
*Lưu ý
 * chạy URL trên trình duyệt --> method get
 */
Route ::get("/danh-sach-lop-hoc","WebController@classRoom");

// Route::METHOD(path_string,Controller@function_in_controller);
Route::get("/form-news",function (){
    return view('form_news');
});
Route::get("/form-list-user",function (){
    return view('list_user');
});


//Route ::get("/form-list-user","UserController@listName");
Route ::get("/form-edit","UserController@listName");

Route ::get("/","WebController@home");
Route ::get("/search","WebController@search");
Route ::get("/product/{id}","WebController@product");
Route ::get("/listing/{id}","WebController@listing");
Route ::get("/shopping/{id}","WebController@shopping")->middleware("auth");
Route ::get("/cart","WebController@cart")->middleware("auth");
Route::get("/clear-cart","WebController@clearCart");
Route::get("/clear-one-cart/{id}","WebController@clearOneCart");
Route::get("/login","WebController@login");
Route::get("/register","WebController@register");


Route::get("/checkout",'WebController@checkout')->middleware("auth");
Route::post("checkout",'WebController@placeOrder')->middleware("auth");
Route::get("checkout-success",'WebController@checkoutSuccess')->middleware("auth");
Route::get("/order-history/{id}",'WebController@historyOrder')->middleware("auth");
Route::get("/viewOrder/{id}",'WebController@viewOrder')->middleware("auth");
Route::get("/add-order/{id}",'WebController@addOrder')->middleware("auth");

Route::get("/deleteOrder/{id}",'WebController@deleteOrder')->middleware("auth");
Route::get("/blog",'WebController@blog');
Route::get("/blog-details",'WebController@blogDetail');
Route::get("/contact",'WebController@contact');



Auth::routes();

Route::get('/logout',function(){
    \Illuminate\Support\Facades\Auth::logout();

    return redirect()->to("/login");
});
// pratical


Route::get('/user', function () {
    $user = Student::all();
    return view('user', ["user" => $user]);
});
Route::get('user/create', function () {
    return view('userCreate');
});
Route::post('user/store', function (Request $request) {
    $request->validate([
        "name" => "required|string",
        "age" => "required|numeric",
        "address" => "required|string",
        "tel" => "required|string"
    ]);
    try {
        Student::create([
            "name" => $request->get("name"),
            "age" => $request->get("age"),
            "address" => $request->get("address"),
            "telephone" => $request->get("tel")
        ]);
    } catch (\Exception $e) {
        return redirect()->back();
    }
    return redirect()->to("/user");
});