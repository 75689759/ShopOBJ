<?php

namespace App\Http\Controllers\Admin\Products_List;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cates;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
	//后台产品类表模板
    public function index(){
    	return view('Admin.ProductsList.Products_List');
    }

    //后台品牌管理模板
    public function manage(){
    	return view('Admin.ProductsList.Products_Manage');
    }

    //后台分类管理模板
    public function category(){
        $data = DB::select("select *,concat(path,id) as paths from cates order by paths asc");
    	return view('Admin.ProductsList.Products_Category',['data'=>$data]);
    }

    //后台添加分类模板
    public function categoryAdd(){
        // $data = cates::raw("path,',',id as paths")->orderBy('paths','asc')->get();
        // $data = cates::raw("path,',',id as paths")->orderBy('paths','asc')->toSql();
        $data = DB::select("select *,concat(path,id) as paths from cates order by paths asc");

        // $data = cates::findOrFail("concat(path,',',id) as paths")->orderBy('paths','asc')->toSql();
        // $data = cates::select('*,concat(path,",",id) as paths')->orderBy('paths','asc')->get();
        // $data = cates::select('*,concat(path,",",id) as paths')->orderBy("paths","asc")->toSql();
        // $data = $data->toArray();
        // dd($data);


        // DB::select("select *,concat(path,',',id) as paths from cates order by paths asc");

        // dd($data);

    	return view('Admin.ProductsList.Products_Category_Add',['data'=>$data]);
    }

    //后台添加商品模板
    public function pictureAdd(){
        return view('Admin.ProductsList.Products_Picture_Add');
    }

    //后台添加品牌模板
    public function addBrand(){
        // dd(session('user'));
        
        return view('Admin.ProductsList.Products_Add_Brand');
    }

    public function manageadd(Request $request){

        dump($_SESSION);

        // var_dump($request->bname);

        dump($request->file('manage'));

        // if ($request->hasFile('manage')) {
        //     $path = $request->file('manage')->store(date('Ymd'));
        // }else{
        //     return back();
        // }

        dd($_POST);
        
    }

    //后台添加分类模板
    public function add(){

        // var_dump($_POST);

        $cates = $_POST['cates'];
        $cname = $_POST['cname'];

        if($cates == 0){
            return back()->with('error','请选择分类');
        }else if(empty($cname)){
            return back()->with('error','请填写分类名');
        }else if($cates == 0.5){
            cates::create([
                'cname' => $cname,
                'pid' => '0',
                'path' => '0,',
            ]);
            return back()->with('error','添加父分类成功');
        }else if($cates != 0 || $cates != 0.5){
            $dates = cates::find($cates);

            $path = $dates->path;

            cates::create([
                'cname' => $cname,
                'pid' => $cates,
                'path' => $path.$cates.',',
            ]);
            return back()->with('error','添加子分类成功');
        }
    }
}
