<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoodsModel;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function goods_index()
    {
        $g_name = request()->g_name??'';
        $where=[];
        if($g_name){
            $where[]=['g_name','like',"%$g_name%"];
        }
        $pageSize = config("app.pageSize");
        $res1 = GoodsModel::where($where)->leftjoin('cate','goods.c_id','=','cate.c_id')->leftjoin('brand','goods.b_id','=','brand.b_id')->paginate($pageSize);
        return view("goods.goods_index",['res1'=>$res1,'g_name'=>$g_name,'pageSize'=>$pageSize]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function goods_create()
    {
        $brand_res = \DB::table('brand')->get();
        $data = \DB::table('cate')->get();
        $cate_res = CreateTree($data);
        return view("goods.goods_create",['brand_res'=>$brand_res,'cate_res'=>$cate_res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function goods_store(Request $request)
    {
        $data = $request->except("_token");
        if($request->hasFile('g_img')){
            $data['g_img'] = upload('g_img');
        }
        if($data['g_imgs']){
            $info = Moreupload('g_imgs');
            $data['g_imgs'] = implode('|',$info);
        }
        $data['g_mail'] = time().rand(10000,99999);
        $res = GoodsModel::create($data);
        if($res){
            return redirect("/goods_index");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goods_edit($g_id)
    {
        $brand_res = \DB::table('brand')->get();
        $data = \DB::table('cate')->get();
        $cate_res = CreateTree($data);
        $res = GoodsModel::find($g_id);
        return view("goods.goods_edit",['res'=>$res,'brand_res'=>$brand_res,'cate_res'=>$cate_res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goods_update(Request $request, $g_id)
    {
        $data = $request->except("_token");
        if($request->hasFile('g_img')){
            $data['g_img'] = upload('g_img');
        }
        if($data['g_imgs']){
            $info = Moreupload('g_imgs');
            $data['g_imgs'] = implode('|',$info);
        }
        $data['g_mail'] = time().rand(10000,99999);

        $res = GoodsModel::where('g_id',$g_id)->update($data);
        if($res){
            return redirect("/goods_index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goods_destroy($g_id)
    {
        $res = GoodsModel::destroy($g_id);
        if($res){
            echo json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }
}
