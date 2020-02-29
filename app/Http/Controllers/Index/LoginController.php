<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoginModel;
class LoginController extends Controller
{
    //前台登录
    public function login(){
        return view("index.login");
    }
    //前台登录数据
    public function login_do(Request $request){
        $data = $request->except("_token");
        $res = LoginModel::where(['reg_tel_email'=>$data['reg_tel_email']])->first();
        $reg_pwd = decrypt($res['reg_pwd']);
        if($data['reg_pwd']==$reg_pwd) {
            return redirect('/prolist');
        }else{
            return redirect('/login')->with(['msg'=>'您输入的密码有误']);
        }
    }
}
