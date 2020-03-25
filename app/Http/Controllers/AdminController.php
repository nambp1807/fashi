<?php

namespace App\Http\Controllers;


use App\Brand;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function category(){
        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }
    public function categoryCreate(){
        return view('admin.category.create');
    }

    public function categoryStore(Request $request){
        $request->validate([
            "category_name"=> "required|string|unique:category"
        ]);
        try{
            Category::create([
                "category_name"=> $request->get("category_name")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }


    public function categoryEdit($id){
        $categories = Category::find($id);
        return view("admin.category.edit",['categories'=>$categories]);
    }
    public function categoryUpdate($id,Request $request){
        $categories = Category::find($id);
        $request->validate([ // truyen vao rules de validate
            "category_name"=> "required|string|unique:category,category_name,".$id
        ]);
        try {
            $categories->update([
                "category_name"=> $request->get('category_name')
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }



    public function categoryDestroy($id){
        $categories = Category::find($id);
        try {
            $categories->delete(); // xoa cung // CRUD
            // xoa mem
            // them 1 truong status : 0: Inactive; 1: active
            // chuyen status tu 1 -> 0
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }


    // ham admin brand
    public function brand(){
        $brands = Brand::all();
        return view('admin.brand.index',['brands'=>$brands]);
    }

    public function brandCreate(){
        return view('admin.brand.create');
    }

    public function brandStore(Request $request){
        $request->validate([
            "brand_name"=> "required|string|unique:brand,brand_name"
        ]);
        try{
            Brand::create([
                "brand_name"=> $request->get("brand_name")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brand");
    }


    public function brandEdit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit',['brands'=>$brands]);
    }
    public function brandUpdate($id,Request $request){
        $brands = Brand::find($id);
        $request->validate([
            "brand_name"=> "required|string|unique:brand,brand_name,".$id
        ]);

        try{
            $brands->update([
                "brand_name"=> $request->get("brand_name")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brand");
    }


    public function brandDestroy($id){
        $brands = Brand::find($id);
        try {
            $brands->delete(); // xoa cung // CRUD
            // xoa mem
            // them 1 truong status : 0: Inactive; 1: active
            // chuyen status tu 1 -> 0
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brand");
    }

    //product start
    public function product(){
        //kiem tra co phai admin hay khong
        $product = Product::all();
        return view('admin.product.index',['product'=>$product]);
    }

    public function productCreate(){
        //kiem tra co phai admin hay khong
        return view("admin.product.create");
    }

    public function productStore(Request $request){
        //kiem tra co phai admin hay khong
        $request->validate([
            "product_name" =>
                "required|string|unique:product,product_name,",
            "product_desc" => "required|string",
            "thumbnail" => "required|string",
            "gallery" => "required|string",
            "category_id" => "required|integer",
            "brand_id" => "required|integer",
            "price" => "required|numeric",
            "quantity" => "required|integer"
        ]);

        try {
            Product::create([
                "product_name" => $request->get("product_name"),
                "product_desc" => $request->get("product_desc"),
                "thumbnail" => $request->get("thumbnail"),
                "gallery" => $request->get("gallery"),
                "category_id" => $request->get("category_id"),
                "brand_id" => $request->get("brand_id"),
                "price" => $request->get("price"),
                "quantity" => $request->get("quantity")

            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/product");
    }

    public function productEdit($id){
        //kiem tra co phai admin hay khong
        $product = Product::find($id);
        return view("admin.product.edit",['product'=>$product]);
    }

    public function productUpdate($id,Request $request){
        //kiem tra co phai admin hay khong
        $product = Product::find($id);
        $request->validate([
            "product_name" =>
                "required|string|unique:product". $id,
            "product_desc" => "required|string",
            "thumbnail" => "required|string",
            "gallery" => "required|string",
            "category_id" => "required|numeric",
            "brand_id" => "required|numeric",
            "price" => "required|numeric",
            "quantity" => "required|numeric"
        ]);
        try {
            $product->update([
                "product_name" => $request->get("product_name"),
                "product_desc" => $request->get("product_desc"),
                "thumbnail" => $request->get("thumbnail"),
                "gallery" => $request->get("gallery"),
                "category_id" => $request->get("category_id"),
                "brand_id" => $request->get("brand_id"),
                "price" => $request->get("price"),
                "quantity" => $request->get("quantity")
            ]);
        } catch (Exception $e) {
            return redirect()->back();
        }
        return redirect()->to("admin/product");
    }

    public function productDestroy($id){
        //kiem tra co phai admin hay khong
        $product = Product::find($id);
        try {
            $product->delete(); // xoa cung // CRUD
            // xoa mem
            // them 1 truong status : 0: Inactive; 1: active
            // chuyen status tu 1 -> 0
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/product");
    }
    //product end

    // ham user
    public function user(){
        $user = User::all();
        return view('admin.user.index',['user'=>$user]);
    }

    public function userCreate(){
        return view('admin.user.create');
    }

    public function userStore(Request $request){
        $request->validate([
            "name"=> "required|string|max:255:users,name,",
            "email"=> "required|string|email|max:255|unique:users,email,",
            "password"=> "required|string|min:8:users,password,",
            "role"=> "required|Integer:users,role,",
        ]);
        try{
            User::create([
                "name"=> $request->get("name"),
                "email"=> $request->get("email"),
                "password"=> $request->get("password"),
                "role"=> $request->get("role")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/user");
    }


    public function userEdit($id){
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }
    public function userUpdate($id,Request $request){
        $user = User::find($id);
        $request->validate([
            "name"=> "required|string|max:255:users,name,".$id,
            "email"=> "required|string|email|max:255|unique:users,email,".$id,
            "password"=> "required|string|min:8:users,password,".$id,
            "role"=> "required|Integer:users,role,".$id,
        ]);

        try{
            $user->update([
                "name"=> $request->get("name"),
                "email"=> $request->get("email"),
                "password" => $request->get("password"),
                "role"=> $request->get("role")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/user");
    }


    public function userDestroy($id){
        //kiem tra co phai admin hay khong
        $user = User::find($id);
        try {
            $user->delete(); // xoa cung // CRUD
            // xoa mem
            // them 1 truong status : 0: Inactive; 1: active
            // chuyen status tu 1 -> 0
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/user");
    }

}