<?php

namespace App\Http\Controllers\Index_Goods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProlistModel;
class GoodsController extends Controller
{
    //商品详情
    public function proinfo(){
        $g_id = request()->g_id;
        $res = ProlistModel::where('g_id',$g_id)->first();
        return view("index_goods.proinfo",['res'=>$res]);
    }
    //商品列表展示
    public function prolist(){
        $res = ProlistModel::get();
        return view("index_goods.prolist",['res'=>$res]);
    }
}
