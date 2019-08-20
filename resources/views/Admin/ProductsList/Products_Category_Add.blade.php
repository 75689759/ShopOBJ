<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>       
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link href="Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	    <script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
<title>添加产品分类</title>
<style type="text/css">
  li {
      font-size: 13px;
      display: list-item;
      text-align: -webkit-match-parent;
      list-style-position: inside;
      list-style-type: inherit;
      margin: 0;
      line-height: 20px;
    } 
    
    .mws-form-message.error {
    
    background-color: #ffcbca;
    border-color: #eb979b;
    color: #9b4449;
    margin:0 auto;
    width:auto;
    height:auto;
    }

</style>
</head>
<body>
<div class="type_style">
 <div class="type_title">产品类型信息</div>
  <div class="type_content">
  <div class="Operate_btn">
  <a href="javascript:ovid()" class="btn  btn-danger"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a>
  </div>
  @if(session('error'))
  <div class="mws-form-message error">
    <ul class="alert alert-danger">
      <li>{{ session('error') }}</li>
    </ul>
  </div>
  @endif
  <form action="{{route('Products_add')}}" method="post" class="form form-horizontal" id="form-user-add">
    {{ csrf_field() }}
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>分类：</label>
      <div class="formControls">
        <select name="cates" style="margin-left: 10px;">
          <option value="0">请选择</option>
          <option value="0.5">添加父分类</option>
          @foreach($data as $k=>$v)
            @if(substr_count($v->path,",") == 2)
              {{$v->cname = '|---'.$v->cname}}
            @endif
            @if(substr_count($v->path,",") == 3)
              {{$v->cname = '|---|---'.$v->cname}}
            @endif
              <option value="{{$v->id}}">{{$v->cname}}</option>
            
          @endforeach
        </select>
      </div>
    </div>
        <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>分类名称：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="" id="user-name" name="cname">
      </div>
    </div>
    <div class="">
     <div class="" style=" text-align:center">
      <input class="btn btn-primary radius" type="submit" value="提交">
      </div>
    </div>
  </form>
  </div>
</div> 
</div>
<script type="text/javascript" src="Widget/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="Widget/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="assets/layer/layer.js"></script>
<script type="text/javascript" src="js/H-ui.js"></script> 
<script type="text/javascript" src="js/H-ui.admin.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-user-add").Validform({
		tiptype:2,
		callback:function(form){
			form[0].submit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});

  $('.error').click(function(){
          $(this).css('display','none');
      })
  });
</script>
</body>
</html>