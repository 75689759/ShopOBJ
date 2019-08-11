<?php

namespace App\Http\Controllers\Admin\PhotoList;

use App\users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\wangcai;

class PhotoController extends Controller
{
    //后台广告管理模板
    public function index(){
//        //判断是否为POST提交
//        if($request->isMethod('post')){
//            //排除不需要的post数据
//            // $request->except(['_token','_method']);
//            //接受并且上传图片
//            $file = $request->file('img')->store(date('Y-m-d'));
//            //接受所有数据
//            $data = $request->all();
//            //更改图片url
//            $data['img'] = $file;
//            //实例化model
//            $banner = new Banner();
//            //添加数据
//            $list = $banner->create($data);
//            if($list != false && $list != null){
//                return redirect('admin/base_banner_add')->with('status','保存成功');
//            }else{
//                return redirect('admin/base_banner_add')->with('status','保存失败');
//            }
//        }else{
//            //view显示
//            return view('Admin/banner/base_banner_add');
//        };
//    	return view('Admin.PhotoList.Advertising');
    }

    //后台分类管理
    public function sort(){
    	return view('Admin.PhotoList.Sort_Ads');
    }

    //添加广告分类
    public function addwangcai(Request $request)
    {
        //接收数据
        $arr = $request->toArray();
        $name = $arr['name'];
        $explain = $arr['explain'];
        $astatus = $arr['astatus'];
        //数据库插入数据
        $res = wangcai::create([
            'name' => $name,
            '$explain' => $explain,
            '$astatus' => $astatus,
        ]);
        //判断是否为空
        if($res){
            return "1";
        }else{
            return "2";
        }

//        dd($request->toArray());
    }
}
