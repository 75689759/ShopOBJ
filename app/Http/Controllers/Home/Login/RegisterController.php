<?php

namespace App\Http\Controllers\Home\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\users;
use App\Http\Requests\UsersStore;
use App\Http\Controllers\Comment\CommentController;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\PhoneUsersStore;
use App\users_info;

class RegisterController extends Controller
{
    //注册页面渲染
    public function index()
    {
        return view('Home.Login.Register');
    }

    //发送邮箱验证
    public function ToRegister(UsersStore $request)
    {
        //数据库插入数据。
        $arr =  $request->toArray();
        $token = str_random(30);
        $email = $arr['email'];
        $res = users::create([
            'uname' => $arr['uname'],
            'pwd' => bcrypt($arr['pwd']),
            'remember_token' => $token,
            'email' => $email,
        ]);

        if ($res) {
            //创建users_info关联表信息
            users_info::create([
                'users_id' => $res->id,
                'profile' => 'default.jpg',
                'sex' => '1',
                'jf' => '0',
                'browse' => '0'
            ]);
            // 发送邮件
            CommentController::email('blade.email', ['id' => $res->id, 'token' => $res->remember_token], $email, '【悦桔拉拉】注册激活邮件！');
        }
        return "<script>alert('请前往邮箱进行验证');location.href='/Home/Login';</script>";
    }

    //邮箱验证成功激活账号
    public function ChangeEmail($id, $token)
    {
        //修改emailste字段值，来激活账号
        $res = users::where(['id' => $id, 'remember_token' => $token])->first();
        $res->emailsta = "1";
        $res->save();
        return "<script>alert('恭喜您验证成功');location.href='/Home/Login';</script>";
    }

    //发送验证码
    public function sendPhone(Request $request)
    {
        //手机号
        $mobile = $request->toArray()['phone'];
        //模板id
        $tpl_id = '177996';
        //手机号验证码
        $tpl_value = rand(1234, 4321);
        //验证码存入redis
        Redis::set($mobile, $tpl_value);
        $expireTime = time() + 600;
        //给redis设置有效时间为10分钟
        Redis::expireAt($mobile, $expireTime);
        return CommentController::phone($mobile, $tpl_id, $tpl_value);
        // $values = Redis::get($phone);
    }

    //手机号注册
    public function PhoneToRegister(PhoneUsersStore $request)
    {
        //随机token值
        $token = str_random(30);
        $arr = $request->toArray();
        //判断Redis中是否有phone
        if (Redis::exists($arr['phone'])) {
            //判断验证码是否正确
            if (Redis::get($arr['phone']) == $arr['code']) {
                //向users表插入数据
                $res = users::create([
                    'uname' => $arr['uname'],
                    'pwd' => bcrypt($arr['pwd']),
                    'remember_token' => $token,
                    'phone' => $arr['phone'],
                ]);
                if ($res) {
                    return "<script>alert('恭喜你注册成功！');location.href='/Home/Login';</script>";
                } else {
                    return "<script>alert('注册失败！');location.href='/Home/Register';</script>";
                }
            } else {
                return "<script>alert('请输入正确的验证码！');location.href='/Home/Register';</script>";
            }
        } else {
            return "<script>alert('请输入正确的验证码！');location.href='/Home/Register';</script>";
        }
    }
}
