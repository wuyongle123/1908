<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index()
    {
        $res = AdminModel::All();
        return view("admin.admin_index",['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_create()
    {
        return view("admin.admin_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_store(Request $request)
    {
        $data = $request->except("_token");
        if($data['admin_pwd']!=$data['admin_pwds']){
            return redirect("/admin_create");die;
        }
        $data['admin_pwd'] = encrypt($data['admin_pwd']);
        $data['admin_pwds'] = encrypt($data['admin_pwds']);
        if($request->hasFile('admin_img')){
            $data['admin_img'] = upload('admin_img');
        }
        $res = AdminModel::create($data);
        if($res){
            return redirect("/admin_index");
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
    public function admin_edit($admin_id)
    {
        $res = AdminModel::find($admin_id);
        return view("admin.admin_edit",['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_update(Request $request, $admin_id)
    {
        $data = $request->except("_token");
        if($request->hasFile('admin_img')){
            $data['admin_img'] = upload('admin_img');
        }
        $res = AdminModel::where('admin_id',$admin_id)->update($data);
        if($res){
            return redirect("/admin_index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_destroy($admin_id)
    {
       $res = AdminModel::destroy($admin_id);
        if($res){
            echo json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }
}
