<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Catalog;
use App\Product;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function catalog(Request $request)
    {
        $addT = new Catalog();
        if(!empty($request->name))
        {
            $addT->name=$request->name;
            $addT->save();
            return redirect('admin/catalog')->with('add','<span>Thêm thành công<span>');
        }else{
            return redirect('admin/catalog')->with('add','<span>Thêm thất bại<span>');
        }

    }
    public function catalogView()
    {
        $addT = new Catalog();
        $data= $addT::all();
        return view('catalog',['data'=>$data]);
    }
    public function catalogDelete($id)
    {
        $addT = new Catalog();
        $addT::find($id)->delete();
        return redirect('admin/catalog');
    }
    public function catalogEdit($id)
    {
        $addT = new Catalog();
        $data=$addT::find($id);
        return view('catalogedit',['data'=>$data]); 
    }
    public function catalogUpdate(Request $request)
    {
        $addT = new Catalog();
        $data = $addT::find($request->id);
        $data->name= $request->name;
        $data->save();
        return redirect('admin/catalog');
    }
    //**********catalog***********//
    public function productView()
    {
        $addT = new Product();
        $data= $addT::all();
        $add= new Catalog();
        $dataC= $add::all();
        return view('product',['data'=>$data,'dataCatalog'=>$dataC]);
    }

    public function product(Request $request)
    {
        if(empty($request->name)||empty($request->size)||empty($request->price)||empty($request->count)||empty($request->color)||empty($request->discount)){
            return redirect('admin/product')->with('add','<span>Thêm thất bại<span>');
        }
        $addT = new Product();
        $addT->name=$request->name;
        $addT->catalog_id=$request->catalog_id;
        $addT->size=$request->size;
        $addT->price=$request->price;
        $addT->discount=$request->discount;
        $addT->count=$request->count;
        $addT->color=$request->color;
        $addT->description=$request->description;
        $link=array();

        if($request->hasFile('image')){
            $folder=str_random(10);
            $check=false;
            foreach ($request->file('image') as $value) {
                if(substr($value->getClientMimeType(), 0,5)=='image'){
                    $name=str_random(20).$value->getClientOriginalName();
                    $value->move('images/'.$folder, $name);
                    $link[]=$name;
                    $check=true;
                }
            }
            if($check){
                $addT->folder=$folder;
                $json = json_encode($link);
                $addT->image_link =$link[0];
                $addT->image_list =$json;
            }
        }
        $addT->save();

        $addC= new Catalog();
        $dataC= $addC::find($request->catalog_id);
        $dataC->count=$dataC->count+1;
        $dataC->save();
        return redirect('admin/product')->with('add','<span>Thêm thành công<span>');
    }
    public function productEdit($id)
    {
        $addT = new Product();
        $data= $addT::find($id);
        $add= new Catalog();
        $dataC= $add::all();
        return view('productEdit',['data'=>$data,'dataCatalog'=>$dataC]);
    }
    public function productUpdate(Request $request)
    {
        $addT = new Product();
        $data = $addT::find($request->id);
        $data->name=$request->name;
        $data->catalog_id=$request->catalog_id;
        $data->size=$request->size;
        $data->price=$request->price;
        $data->discount=$request->discount;
        $data->count=$request->count;
        $data->color=$request->color;
        $data->description=$request->description;
        if($request->hasFile('image')){
            $folder=$request->folder;
            if(empty($folder)){
                $folder=str_random(10);
            }
            $check=false;
            foreach ($request->file('image') as $value) {
                if(substr($value->getClientMimeType(), 0,5)=='image'){
                    $name=str_random(20).$value->getClientOriginalName();
                    $value->move('images/'.$folder, $name);
                    $link[]=$name;
                    $check=true;
                }
            }
            if($check){
                $data->folder=$folder;
                $json = json_encode($link);
                $data->image_link =$link[0];
                $data->image_list =$json;
            }
        }
        $data->save();
        if($request->catalog_id!=$request->catalog_id_old){
            $addC= new Catalog();
            $dataC= $addC::find($request->catalog_id);
            $dataC->count=$dataC->count+1;
            $dataC->save();

            $dataC= $addC::find($request->catalog_id_old);
            $dataC->count=$dataC->count-1;
            $dataC->save();
        }
        return redirect('admin/product');
    }
    public function productDelete($id)
    {
        $addT = new Product();
        $addC= new Catalog();


        $data=$addT::find($id);
        $path='images/'.$data->folder;

        $dataC= $addC::find($data->catalog_id);
        $dataC->count=$dataC->count-1;
        $dataC->save();

        if(!empty($data->folder)){
            $fl=scandir($path);    
            if($fl){
                foreach ($fl as $key=> $value) {
                    if($key>1){
                        unlink($path.'/'.$value);
                    }
                }
                rmdir($path);
            }
        }
        $data->delete();
        return redirect('admin/product');
    }
    // Management users in local

    public function userManagement()
    {
        $addT = new User();
        $data= $addT::all();
        return view('userManagement',['data'=>$data]);
    }
}
