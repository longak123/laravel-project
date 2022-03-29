<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Str;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Session;

class MenuService{

    public function getParent(){
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(20);
    }
    public function create($request){
       try {
         Menu::create([
             'name'=>(string)$request->input('name'),
             'parent_id'=>(int)$request->input('parent_id'),
             'decription'=>(string)$request->input('description'),
             'content'=>(string)$request->input('content'),
             'active'=>(string)$request->input('active'),
            

         ]);
            Session::flash('success','Tạo danh mục thành công');
        
       } catch (\Exception $err) {
           Session::flash('error',$err->getMessage());
           return false;
       }


       return true;
    }

    public function destroy( $request){
        $id = (int) $request->input('id');
      $menu = Menu::where('id', $id)->first();
      if ($menu) {
         return Menu::where('id', $id)->orwhere('parent_id',$id)->delete();
      }
      return false;
    }

    public function update($request, $menu):bool
    {
      $menu->name =(string) $request->input('name');
      $menu->parent_id =(int) $request->input('parent_id');
      $menu->decription =(string) $request->input('decription');
      $menu->content =(string) $request->input('content');
      $menu->active =(string) $request->input('active');
        $menu->save();

        Session::flash('success','Cập nhật thành công danh mục');
        return true;


    }



}



?>