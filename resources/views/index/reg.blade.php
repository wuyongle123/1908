@extends('layouts.shop')
@section('title', '注册')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('/reg_index')}}" method="post" class="reg-login">
         @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{url('/login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList2">
           <input type="text" name="reg_tel_email" id="reg_tel_email" placeholder="输入手机号码或者邮箱号" />
           <b class="btn btn-primary btn-lg js_code">获取验证码</b>
       </div>
       <div class="lrList2">
           <input type="text" name="reg_code" id="reg_code" placeholder="输入短信验证码" />
       </div>
       <div class="lrList">
           <input type="password" name="reg_pwd" id="reg_pwd" placeholder="设置新密码（6-18位数字）" />
       </div>
       <div class="lrList"><input type="password" id="reg_pwds" name="reg_pwds" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     <script src="/static/index/js/jquery.min.js"></script>
     {{--<script>--}}
         {{--$(function(){--}}
             {{--$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});--}}
             {{--$(document).on('click',".js_code",function(){--}}
                 {{--var _this = $(this);--}}
                 {{--var reg_tel_email = $('input[name="reg_tel_email"]').val();--}}
{{--//                 console.log(reg_tel_email);--}}
                 {{--$.ajax({--}}
                     {{--url:"/ajaxSms",--}}
                     {{--data:{reg_tel_email:reg_tel_email},--}}
                     {{--type:"post",--}}
                     {{--dataType:'json',--}}
                     {{--success:function(res){--}}
{{--//                         console.log(res);--}}
                         {{--if(res.code=="00000"){--}}
                             {{--alert("获取成功！请等待您的验证码的到来");--}}
                         {{--}else{--}}
                             {{--alert("获取失败");--}}
                             {{--return false;--}}
                         {{--}--}}
                     {{--}--}}
                 {{--});--}}
             {{--});--}}
             {{--//验证码js验证--}}
             {{--$(document).on('blur','#reg_code',function(){--}}
                 {{--var reg_code = $(this).val();--}}
                 {{--var reg = /^\d{5}$/;--}}
                 {{--if(!reg.test(reg_code)){--}}
                     {{--alert("验证码不能为空 或 必须是5位数字");--}}
                     {{--return false;--}}
                 {{--}--}}
             {{--});--}}
             {{--//手机号验证--}}
             {{--$(document).on('blur','#reg_tel_email',function(){--}}
                 {{--var reg_tel_email = $(this).val();--}}
                 {{--var reg = /^1\d{10}$/;--}}
                 {{--if(!reg.test(reg_tel_email)){--}}
                     {{--alert("手机号不能为空  或  手机号不正确");--}}
                     {{--return false;--}}
                 {{--}--}}
             {{--});--}}
             {{--//验证密码--}}
             {{--$(document).on('blur',"#reg_pwd",function(){--}}
                 {{--var reg_pwd = $(this).val();--}}
                 {{--var reg = /^\w{6,18}$/;--}}
                 {{--if(!reg.test(reg_pwd)){--}}
                     {{--alert("您输入的密码不合规哦!!!密码是6-18位数字");--}}
                     {{--return false;--}}
                 {{--}--}}
             {{--});--}}
             {{--//验证密码s--}}
             {{--$(document).on('blur',"#reg_pwds",function(){--}}
                 {{--var reg_pwds = $(this).val();--}}
                 {{--var reg = /^\w{6,18}$/;--}}
                 {{--if(!reg.test(reg_pwds)){--}}
                     {{--alert("您输入的两次密码不一样");--}}
                     {{--return false;--}}
                 {{--}--}}
             {{--});--}}
         {{--});--}}
     {{--</script>--}}
@endsection

