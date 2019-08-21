<?php

namespace App\Http\Controllers\Admin\Shop;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //后台店铺列表模板
    public function index(){
        $data = DB::table('shop')->where('audit','1')->orwhere('audit','2')->get();
    	// var_dump($data);
    	// dd($data);/
    	return view('Admin.Shop.Shop_List',['data'=>$data]);
    }

    //后台店铺审核模板
    public function audit(){
        $datas = DB::table('shop')->where('audit','3')->get();

        $count = count($datas);

    	return view('Admin.Shop.Shop_Audit',['datas'=>$datas,'count'=>$count]);
    }

    //后台店铺列表删除数据
    public function del($id){
        $datae = DB::table('shop')->where('id',"$id")->delete();

        if($datae){
            return '1';
        }else{
            return '2';
        }
    }

    //后台店铺审核详情模板
    public function detailed(){

        $id = $_GET['id'];

        $dataa = DB::table('shop')->where('id',"$id")->get();

        // dd($dataa);
        foreach ($dataa as $k => $v) {
            $datea = DB::table('users')->where('id',"$v->users_id")->get();
        }
 
        return view('Admin.Shop.Shop_Detailed',['dataa'=>$dataa,'datea'=>$datea]);
    }

    //后台店铺审核是否通过
    public function byes(Request $request){
        // dump($request->input('id'));
        $id = $request->input('id'); 

        $arr['audit'] = '1';

        $res = DB::table('shop')->where('id',"$id")->update($arr);

        return redirect(route('Shop_Audit'));
    }

        //后台店铺审核是否通过
    public function bno(Request $request){
        dump($request->input('liyou'));

        $id = $request->input('id'); 

        $arr['audit'] = '2';

        // $res = DB::table('shop')->where('id',"$id")->update($arr);

        // return redirect(route('Shop_Audit'));
    }
}
