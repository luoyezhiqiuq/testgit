<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>正在处理</title>
		<style>
			.modalss {
				  position: fixed;
				  left: 0;
				  right: 0;
				  top: 0;
				  bottom: 0;
				  background: #F7F7F7;
				  z-index: 999;
				}
				.modal-dialog {
				  width: 350px;
				  margin: 50px auto 0 auto;
				}
				.modal-content {
				  background:  #fff;
				  border: 1px solid #aaa;
				  border-radius: 4px;
				  box-shadow: 0 0 6px #aaa;
				  padding: 0px;
				}
			/*	.modal  form input {
				  box-sizing: border-box;
				  display: block;
				  width: 100%;
				  border: 1px solid #aaa;
				  border-radius: 2px;
				  padding: 10px;
				  outline: none;
				  margin-bottom: 12px;
				  border-radius:4px;
				}*/
				.modal-content-p{
					 width: 100%;
					 height:50px;
					 border-bottom:1px solid lightblue;
				}
				.modal-content h2{text-align: center;color:#73879c;}
				.modal-content button{background: #269fd5;color:#fff;margin-left:260px;}
		
				#hidden{display:none;}
		</style>
	</head>
	<body>
		<div class="modalss">		<!--半透明遮罩层-->
	<div class="modal-dialog">		<!--宽度/定位-->
		<div class="modal-content">  <!--背景色/边框/倒角/阴影-->
			<div class="modal-content-p">
				<h2><?php echo $data['message'];?></h2>
			</div>
			<!-- <h2>请耐心等待</h2> -->
			<h2>还有<span id="pos"><?php echo $data['pos'];?></span>秒页面将要跳转</h2>
			<button onclick="(ccc())">立即跳转</button>
	
			<div id="hidden"><?php echo $data['path'];?></div>
		</div>
	</div>
 </div>
	</body>
		<script language="javascript" type="text/javascript">
			var hidden = document.getElementById('hidden');
			var pos = document.getElementById('pos');
			var poss = pos.innerHTML;
			if(pos.innerHTML)
			{
				poss = pos.innerHTML+'000';
			}else{
				poss  =3000;
			}
			var path = hidden.innerHTML;
			if(path)
			{
				setTimeout(function(){
				window.location.href=path;
				},poss);
			}else{
				setTimeout(function(){
				window.history.back(-1); 
				},poss);
			}
			function ccc()
			{
				if(path)
				{
					window.location.href=path;
				}else{
					window.history.back(-1); 
				}
			}
			
		</script> 
</html>
