<?php

namespace App\Http\Controllers\Admin\Products_List;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cates;
use App\users;
use App\brand;
use App\goods;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
	//后台产品类表模板
    public function index(){
    	return view('Admin.ProductsList.Products_List');
    }

    //后台产品添加模板
    public function addshop(Request $request){
        // dd($request->hasFile('shoplogo'));
        if ($request->hasFile('shoplogo')) {
            $path = $request->file('shoplogo')->store(date('Ymd'));
        }else{
            return back();
        }

        if(empty($_POST['goods'] || $_POST['gnum'] || $_POST['store'] || $_POST['brand_id'] || $_POST['antistop'] || $_POST['unit'] || $_POST['original'])){
            return back();
            // return back()->with('error','请填写完整产品信息'); 
        }else{
            $res = goods::create([
                'goods' => $_POST['goods'],
                'gnum' => $_POST['gnum'],
                'picname' => $path,
                'unit' => $_POST['unit'],
                'antistop' => $_POST['antistop'],
                'brand_id' => $_POST['brand_id'],
                'original' => $_POST['original'],
                'store' => $_POST['store']
            ]);
            // dd($request->input());
            return view('Admin.ProductsList.Products_List');
        }

    }

    //后台品牌管理模板
    public function manage(){
        $res1 = brand::get()->toArray();

        // $data = DB::select("select * from cates where ");

        $count = count($res1);

    	return view('Admin.ProductsList.Products_Manage',['res1'=>$res1,'count'=>$count]);
    }

    //后台分类管理模板
    public function category(){
        $data = DB::select("select *,concat(path,id) as paths from cates order by paths asc");
    	return view('Admin.ProductsList.Products_Category',['data'=>$data]);
    }

    //后台添加分类模板
    public function categoryAdd(){

        $data = DB::select("select *,concat(path,id) as paths from cates order by paths asc");

    	return view('Admin.ProductsList.Products_Category_Add',['data'=>$data]);
    }

    //后台添加商品模板
    public function pictureAdd(){
        $res1 = brand::get()->toArray();

        return view('Admin.ProductsList.Products_Picture_Add',['res1'=>$res1]);
    }

    //后台添加品牌模板
    public function addBrand(){
        // dump(session());
        
        return view('Admin.ProductsList.Products_Add_Brand');
    }

    public function manageadd(Request $request){

        // dd(session('user')['id']);

        $uid = session('user')['id'];

        $res = DB::select("select id from shop where users_id=$uid");

        foreach ($res as $key => $value) {
            foreach ($value as $a => $b) {
                $shopid = $b;
            }
        }

        if ($request->hasFile('manage')) {
            $path = $request->file('manage')->store(date('Ymd'));
        }else{
            return back();
        }

        if(empty($_POST['bname'] || $_POST['number'] || $_POST['Country'] || $_POST['describe'])){
            return back()->with('error','请填写完整品牌信息'); 
        }else{
            $res = brand::create([
                'shop_id' => $shopid,
                'bname' => $_POST['bname'],
                'number' => $_POST['number'],
                'blogo' => $path,
                'Country' => $_POST['Country'],
                'describe' => $_POST['describe']
            ]);
            
            return back();
        }
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

    //后台品牌启用禁用
    public function state(Request $request){
        $id = $request->input('id');
        $state = $request->input('state');

        if($state == '1'){
            $arr = brand::find($id);
            $res = $arr->update([
                'state' => '2'
            ]);

            return back();
        }elseif($state == '2'){
            $arr = brand::find($id);
            $res = $arr->update([
                'state' => '1'
            ]);

            return back();
        }
    }

    //后台品牌删除
    public function del(Request $request){
        // dump($request->input('id'));

        $id = $request->input('id');

        $res = brand::where('id',$id)->delete();

        return back();
    }
}
