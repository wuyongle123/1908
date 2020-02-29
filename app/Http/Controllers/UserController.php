<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
class UserController extends Controller
{
    public function _user(){
        return view('user.user');
    }
    public function user_insert(){
        $data = request()->except("_token");
        $res = UserModel::where(['uname'=>$data['uname']])->first();
        $upwd = decrypt($res['upwd']);
        if($upwd==$data['upwd']){
            return redirect('/user_list');
        }
        return redirect('/_user');
    }
    public function user_list(){
        $res = UserModel::All();
        return view('user.user_list',['res'=>$res]);
    }
    public function user_list_(){
        $res = UserModel::All();
        return view("user.user_del",['res'=>$res]);
    }
    public function user_del($uid){
        $res = UserModel::destroy($uid);
        if($res){
            return redirect('/user_list');
        }
    }
}
