<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;


class UserController extends Controller
{
    /**
     * Combine firstname and lastname
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|string
     */
    public function create(Request $request)
    {
        $userData = $request->only([
            'firstname',
            'lastname',
        ]);
        if (empty($userData['firstname']) && empty($userData['lastname'])) {
            return new \Exception('Missing data', 404);
        }
        return $userData['firstname'] . ' ' . $userData['lastname'];
    }
     public function show(){
        $getAllProducts = Products::all();
        $products = Products::paginate(10);
        return $getAllProducts;
    }
    public function getById($id){
        if(!Products::find($id)){
            return "Could not find the id";
        }else{
            $getById = Products::find($id);
            return $getById;
        }
    }
    public function add(Request $rq){
        $name = $rq->input('name');
        $products = new Products();
        $products->name = $name;
        $rq->validate([
            'name'   =>  'required',
            'image'  =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if($rq->hasFile('image')){
            $file = $rq->image;
            $file->move('upload', $file->getClientOriginalName());
            $folder = '/upload/';
            $filePath = $folder . $file->getClientOriginalName();
            $products -> image = $filePath;
        }
        $products->save();
        return $products;
    }
    public function delete($id){
        if(!Products::find($id)){
            return "Could not find the id to delete";
        }else{
            $getProductById = Products::find($id);
            $getProductById -> delete();
        return "Delete success";
        }
    }
    public function update(Request $request,$id){
        if(!Products::find($id)){
            return "Could not find the id to update";
        }else{
            $products = Products::find($request->id);
            $request->validate([
                'name'   =>  'required',
                'image'  =>  'required|max:2048'
            ]);
            $products ->name =$request->input('name');
            $products ->image = $request->input('image');
            
            $products -> save();
            return "update success";
        }
    }
}
