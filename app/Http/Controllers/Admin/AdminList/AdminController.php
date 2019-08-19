<?php

namespace App\Http\Controllers\Admin\AdminList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\nodeType;
use App\node;
use App\nodefu;
use App\roles;
use App\roles_node;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //后台权限管理模板
    public function index()
    {
        $roles = roles::get()->toArray();
        return view('Admin.AdminList.Admin_Competence')->with(['roles' => $roles]);
    }

    //后台管理员列表模板
    public function administrator()
    {
        return view('Admin.AdminList.Admin_Administrator');
    }

    //后台个人信息模板
    public function info()
    {
        return view('Admin.AdminList.Admin_Info');
    }

    //后台编辑权限模板
    public function compet($id)
    {
        // dump($id);
        $res = nodeType::with('tag')->get()->toArray();
        $a = nodefu::with('node')->get()->toArray();
        $roles_node = roles_node::where(['roles_id' => $id])->get('node_id')->toArray();
        $arr = [];
        foreach ($roles_node as $k => $v) {
            array_push($arr, $v['node_id']);
        };
        $direction = roles::find($id)->toArray();
        return view('Admin.AdminList.Admin_Compet')->with(['res' => $res, 'a' => $a, 'arr' => $arr, 'direction' => $direction, 'id' => $id]);
    }

    //权限分类
    public function RouteList()
    {
        $res = nodeType::with('tag')->get()->toArray();
        $a = nodefu::with('node')->get()->toArray();
        return view('Admin.AdminList.Admin_Route')->with(['res' => $res, 'a' => $a]);
    }

    //添加权限分类
    public function AddNodeType(Request $request)
    {
        $arr = $request->toArray();
        nodeType::create([
            'nodetype' => $arr['nodetype']
        ]);
        return back();
    }

    //添加权限
    public function node(Request $request)
    {
        $arr = $request->toArray();
        $res = nodefu::create([
            'nodefu_name' => $arr['node_name']
        ])->id;
        $nodefu = nodefu::find($res);
        //创建nodefu和nodetype的关联关系
        $nodeType = nodeType::find($arr['node_type_id']);
        $nodeType->tag()->attach([
            $res
        ]);
        //添加node
        //查看权限
        if (in_array('查看', $arr['function'])) {

            $cid = node::create([
                'node_name' => '查看',
                'controller' => $arr['c_controller'],
                'method' => $arr['c_method']
            ])->id;
            $nodefu->node()->attach([$cid]);
        }

        //添加权限
        if (in_array('添加', $arr['function'])) {
            $tid = node::create([
                'node_name' => '添加',
                'controller' => $arr['t_controller'],
                'method' => $arr['t_method']
            ]);
            $nodefu->node()->attach([$tid]);
        }

        //修改权限
        if (in_array('修改', $arr['function'])) {
            $xid = node::create([
                'node_name' => '修改',
                'nodefu_id' => $res->toArray()['id'],
                'controller' => $arr['x_controller'],
                'method' => $arr['x_method']
            ]);
            $nodefu->node()->attach([$xid]);
        }

        //删除权限
        if (in_array('shan', $arr['function'])) {
            $sid = node::create([
                'node_name' => '删除',
                'nodefu_id' => $res->toArray()['id'],
                'controller' => $arr['s_controller'],
                'method' => $arr['s_method']
            ]);
            $nodefu->node()->attach([$sid]);
        }

        return back();
    }

    //添加职位页面
    public function AddPower()
    {
        $res = nodeType::with('tag')->get()->toArray();
        $a = nodefu::with('node')->get()->toArray();
        return view('Admin.AdminList.AddPower')->with(['res' => $res, 'a' => $a]);
    }

    //添加职位页面
    public function AddPowers(Request $request)
    {
        $arr = $request->toArray();
        $res = roles::create([
            'roles' => $arr['roles'],
            'deriction' => $arr['deriction']
        ]);
        $roles = roles::find($res->id);
        $roles->node()->attach($arr['id']);
    }

    //修改权限
    public function Update_Compet(Request $request)
    {
        $arr = $request->toArray();
        $roles = roles::find($arr['node_id']);
        $roles->node()->detach();
        $roles->node()->attach($arr['id']);
        // $roles->roles = $arr['roles'];
        $res = $roles->update([
            'roles' => $arr['roles'],
            'deriction' => $arr['deriction']
        ]);

        // return back(route('Admin_Competence'));
    }
}
