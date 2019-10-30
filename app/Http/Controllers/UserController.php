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

     public function listProduct(Request $rq){
        $per_page = $rq->input('per_page');
        if($per_page){
            $products = Products::paginate($per_page);
        }else{
            $products = Products::all();
        }
        return $products;
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
