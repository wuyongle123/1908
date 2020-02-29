<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use App\RegisterModel;
class RegisterController extends Controller
{
    //前台注册视图
    public function register(){
        return view("index.reg");

    }
    //前台注册数据
    public function reg_index(){
        $data = request()->except("_token");
        $data['reg_pwd'] = encrypt($data['reg_pwd']);
        $data['reg_pwds'] = encrypt($data['reg_pwds']);
        $res = RegisterModel::create($data);
        if($res){
            return redirect('/login');
        }
    }
    public function ajaxSms(){
        $reg_tel = request()->reg_tel_email;
        $reg_code = rand(1000,9999);
        $res = $this->sendSms($reg_tel,$reg_code);

        if($res['Code']=="ok") {
            session(['Code' => $reg_code]);
            request()->session()->save();
            echo json_encode(['code'=>"00000",'msg'=>"ok"]);
        }else{
            echo json_encode(['code'=>"00000",'msg'=>"no"]);
        }
    }
    //短信验证码
    public function sendSms($reg_tel,$reg_code){
            AlibabaCloud::accessKeyClient('LTAI4Fvbj22wAEiGebUfJqfr', 'Sq6p7q3fUtUBAj8Nso9dcOdQn4ETd5')
                ->regionId('cn-hangzhou')
                ->asDefaultClient();
                        try {
                            $result = AlibabaCloud::rpc()
                                ->product('Dysmsapi')
                                ->version('2017-05-25')
                                ->action('sendSms')
                                ->method('POST')
                                ->host('dysmsapi.aliyuncs.com')
                                ->options([
                                    'query' => [
                                        'RegionId' => "cn-hangzhou",
                                        'PhoneNumbers' => $reg_tel,
                                        'SignName' => "二品学糖",
                                        'TemplateCode' => "SMS_181200374",
                                        'TemplateParam' => "{code:$reg_code}",
                                    ],
                                ])
                                ->request();
                            return($result->toArray());
                        } catch (ClientException $e) {
                            return $e->getErrorMessage();
                        } catch (ServerException $e) {
                            return $e->getErrorMessage();
                        }
                }



//    public function qwe(){
//        AccessKeyID:
//                     LTAI4Fvbj22wAEiGebUfJqfr
//        AccessKeySecret:
//                Sq6p7q3fUtUBAj8Nso9dcOdQn4ETd5
//    }
}
