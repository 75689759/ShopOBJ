<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<li><a href="">手机号注册</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">
									<form action="{{ route('ToRegister') }}" method="post">									
										{{ csrf_field() }}
										<div class="user-pass">
											<label for="uname"><i class="am-icon-user"></i></label>
											<input type="text" name="uname" id="uname" placeholder="请输入用户名">
										</div>		
										<div class="user-email">
											<label for="email"><i class="am-icon-envelope-o"></i></label>
											<input type="email" name="email" id="email" placeholder="请输入邮箱账号">
										</div>										
										<div class="user-pass">
											<label for="password"><i class="am-icon-lock"></i></label>
											<input type="password" name="pwd" id="password" placeholder="设置密码">
										</div>										
										<div class="user-pass">
											<label for="passwordRepeat"><i class="am-icon-lock"></i></label>
											<input type="password" name="repwd" id="passwordRepeat" placeholder="确认密码">
										</div>	
											{{-- <div class=" links">
											<label for="reader-me"></label>
												<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
											</div> --}}
											<div class="am-cf">
												<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
											</div>
									</form>
									
										
								
								</div>
							

								<div class="am-tab-panel">

									<form action="{{ route('PhoneToRegister') }}" method="post">
										{{ csrf_field() }}
										<div class="user-pass">
											<label for="uname"><i class="am-icon-user"></i></label>
											<input type="text" name="uname" id="uname" placeholder="请输入用户名">
										</div>
                 						<div class="user-phone">
											<label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
											<input type="tel" name="phone" id="phone" placeholder="请输入手机号">
                 						</div>																			
										<div class="verification">
											<label for="code"><i class="am-icon-code-fork"></i></label>
											<input type="tel" name="code" id="code" placeholder="请输入验证码">
											<a class="btn" href="javascript:void(0);" onClick="sendMobileCode(this);" id="sendMobileCode">
											<span id="dyMobileButton">获取</span></a>
										</div>
                 						<div class="user-pass">
											<label for="password"><i class="am-icon-lock"></i></label>
											<input type="password" name="pwd" id="password" placeholder="设置密码">
										</div>										
										<div class="user-pass">
											<label for="passwordRepeat"><i class="am-icon-lock"></i></label>
											<input type="password" name="repwd" id="passwordRepeat" placeholder="确认密码">
										</div>	
										<div class="am-cf">
											<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
									</form>
										
								
									<hr>
								</div>

								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>

							</div>
						</div>

				</div>
			</div>
			
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>
	</body>

	<script>
		function sendMobileCode(obj){
			//获取用户验证码
			let phone = $('#phone').val();
			//验证格式
			let phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;

			if(!phone_preg.test(phone)){
				return false;
			}

			$(obj).attr('disabled',true);
			$(obj).css('color','#ccc');
			$(obj).css('cursor','no-drop');
			$('#dyMobileButton').css('color','#ccc');
			let time = null;
			if($('#dyMobileButton').html() == '获取'){
				let i = 60;
				time = setInterval(function(){
					i--;
					$('#dyMobileButton').html('('+i+')s');
					if(i<1){
						$(obj).attr('disabled',false);
						$(obj).css('color','#333');
						$(obj).css('cursor','pointer');
						$('#dyMobileButton').css('color','#333');
						$('#dyMobileButton').html('获取');
						clearInterval(time);
					}
				},1000);
			}


			//发送ajax 
			$.get('/Home/Register/sendphone',{phone},function(res){
				if(res.error_code == 0){
					alert('发送成功，验证码10分钟内有效');
				}else{
					alert('发送失败');
				}
			},'json')

		}
	</script>
</html>