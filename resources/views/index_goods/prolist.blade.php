@extends('layouts.shop')
@section('title', '商品列表展示')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <form action="#" method="get" class="prosearch"><input type="text" /></form>
      </div>
     </header>
     <ul class="pro-select">
      <li class="pro-selCur"><a href="javascript:;">新品</a></li>
      <li><a href="javascript:;">销量</a></li>
      <li><a href="javascript:;">价格</a></li>
     </ul><!--pro-select/-->
     <div class="prolist">
      @foreach($res as $v)
      <dl>
       <dt><a href="{{url('/proinfo/'.$v->g_id)}}"><img src="{{env('UPLOAD_URL')}}{{$v->g_img}}" width="200"/></a></dt>
       <dd>
        <h3><a href="{{url('/proinfo/'.$v->g_id)}}">{{$v->g_name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->g_price}}</strong> <span>¥{{$v->g_price_old}}</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>库存：{{$v->g_num}}</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
       @endforeach
     </div><!--prolist/-->
@endsection
