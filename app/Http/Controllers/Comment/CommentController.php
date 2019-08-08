<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class CommentController extends Controller
{
    /**
     * 发送邮件
     * @param  $blade   模板地址
     * @param  $argument    要给模板转递的参数（数组)
     * @param  $email    要发送的邮箱地址
     * @param  $title    邮件的标题
     * @return 
     */
    public static function email($blade, $argument, $email, $title)
    {
        Mail::send($blade, $argument, function ($m) use ($email, $title) {

            $m->to($email)->subject($title);
        });
    }

    /**
     * 发送短信验证码
     * 
     * @param $key  您申请的APPKEY
     * @param $mobile  接受短信的用户手机号码
     * @param $tpl_id  您申请的短信模板ID，根据实际情况修改 
     * @param $tpl_value  您设置的模板变量，根据实际情况修改
     * 模板id
     *      178000 	【悦桔拉拉】您正在修改密码，您的验证码是#code#，如非本人操作，请忽略本短信。
     *      177999 	【悦桔拉拉】您正在绑定手机，您的验证码是#code#，如非本人操作，请忽略本短信。
     *      177997 	【悦桔拉拉】您正在找回密码，您的验证码是#code#
     *      177996 	【悦桔拉拉】您正在注册，您的验证码是#code#。如非本人操作，请忽略本短信
     * 
     */
    public static function phone($mobile, $tpl_id, $tpl_value, $key = '8d6fc9db5673ea77c069781e423f3289')
    {
        $url = "http://v.juhe.cn/sms/send";
        $params = array(
            'key'   => $key, //您申请的APPKEY
            'mobile'    => $mobile, //接受短信的用户手机号码
            'tpl_id'    => $tpl_id, //您申请的短信模板ID，根据实际情况修改
            'tpl_value' => '#code#=' . $tpl_value, //您设置的模板变量，根据实际情况修改
            'dtype' => 'json'
        );

        $paramstring = http_build_query($params);
        $content = self::juheCurl($url, $paramstring);
        return $content;
        // $result = json_decode($content, true);
        // if ($result) {
        //     return $result;
        // } else {
        //     return false;
        // }
    }

    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    public static function juheCurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }


    public static function pv($addr)
    {
        //添加pv量
        $date = date('Y-m-d', time());
        if (!Redis::exists(':' . $addr . ':pv:' . $date)) {
            Redis::set(':' . $addr . ':pv:' . $date, 0);
        }
        Redis::incrBy(':' . $addr . ':pv:' . $date, 1);
    }
}
