<?php

namespace App\Http\Controllers\Home\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Comment\CommentController;
use App\users;
use App\ip;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Cookie;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //登录页面渲染
    public function index()
    {
        return view('Home.Login.login');
    }
    public function DoLogin(Request $request)
    {
        $arr = $request->toArray();
        $uname = $arr['uname'];
        $pwd = $arr['pwd'];
        // $reg = users::where(['uname' => $uname])->first();
        //判断是否使用 用户名登录
        $reg = users::where(['uname' => $uname])->first();
        if (!$reg) {
            //判断是否使用邮箱登录
            $reg = users::where(['email' => $uname])->first();
            if ($reg) {
                $reg = $reg->toArray();
                //判断密码是否正确
                if (Hash::check($pwd, $reg['pwd'])) {
                    //判断邮箱是否激活
                    if ($reg['emailsta'] == "1") {
                        //创建ip表
                        $ip = self::createIP($reg['id']);
                        //添加登录pv量
                        CommentController::pv('Home');
                        //session保存2小时
                        session(['user' => $reg]);

                        // if ($arr['md'] == "session") {
                        //     session(['user' => $reg]);
                        // } else {
                        //     session(['user' => $reg], 1);
                        // }
                        return "<script>alert('登录成功！');location.href='/'</script>";
                    } else {
                        CommentController::email('blade.email', ['id' => $reg['id'], 'token' => $reg['remember_token']], $reg['email'], '【悦桔拉拉】注册激活邮件！');
                        return "<script>alert('邮箱未激活，已重新给您发送邮件，请前往邮箱去激活！');location.href='/Home/Login';</script>";
                    }
                } else {
                    return "<script>alert('请检查用户名或者密码是否正确！');location.href='/Home/Login';</script>";
                }
            } else {
                //判断手机号是否正确
                $reg = users::where(['phone' => $uname])->first();
                if ($reg) {
                    $reg = $reg->toArray();
                    //判断密码是否正确
                    if (Hash::check($pwd, $reg['pwd'])) {
                        //创建ip表
                        $ip = self::createIP($reg['id']);
                        //添加登录pv量
                        CommentController::pv('Home');
                        //session保存2小时
                        session(['user' => $reg]);
                        return "<script>alert('登录成功！');location.href='/'</script>";
                    } else {
                        return "<script>alert('请检查用户名或者密码是否正确！');location.href='/Home/Login';</script>";
                    }
                } else {
                    return "<script>alert('请检查用户名或者密码是否正确！');location.href='/Home/Login';</script>";
                }
            }
        } else {
            $reg = $reg->toArray();
            //判断密码是否正确
            if (Hash::check($pwd, $reg['pwd'])) {
                //创建ip表
                $ip = self::createIP($reg['id']);
                //添加登录pv量
                CommentController::pv('Home');
                //session保存2小时
                session(['user' => $reg]);
                return "<script>alert('登录成功！');location.href='/'</script>";
            } else {
                return "<script>alert('请检查用户名或者密码是否正确！');location.href='/Home/Login';</script>";
            }
        }
    }

    public static function createIP($id)
    {
        $ip = ip::create([
            'users_id' => $id,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'vtime' => time(),
            'terrace' => '前台',
        ]);
    }
}
