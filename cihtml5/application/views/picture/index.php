
<div class="container">
         <div class="row">
                <div class="col-md-10">
<form class="col-xs-5" action="/picture/uplode" method="post" enctype="multipart/form-data" name="theForm">
		<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
		<div class="form-group">
		
	</div>
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">用户名字</span>
			<input type="text" name="name" value="" class="form-control"  require>
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">用户密码</span>
			<input type="text" name="password" value="" class="form-control"  require>
		</div>
	</div>
	<div class="form-group">
		<select class="form-control select" name="roleid">
			<option value="0">选择角色</option>
			
			<?php foreach($role as $val):?>
			<option value="<?php echo $val->id;?>"><?php echo $val->name; ?></option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="form-group">
      <label for="inputfile">上传图像</label>
      <input type="file" name="file" id="file0" multiple="multiple" />
   </div>
  <div class="row"  style="width:25%">
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img id="img0" src="..." alt="...">
      <div class="caption">
        <p></p>

      </div>
    </div>
  </div>
</div>
<button type="submit" class="btn btn-default">下一步</button>
</div>
</div>
</div>

	
</form>
<script>
$(function()
{

	$("#file0").change(function(){
	var objUrl = getObjectURL(this.files[0]) ;
	console.log("objUrl = "+objUrl) ;
	if (objUrl) {
		$("#img0").attr("src", objUrl);
		var s = $(this).val();
		$("#img0").next().children('p').html(s);
	}
	}) ;
	//建立一個可存取到該file的url
	function getObjectURL(file) {
		var url = null ; 
		if (window.createObjectURL!=undefined) { // basic
			url = window.createObjectURL(file) ;
		} else if (window.URL!=undefined) { // mozilla(firefox)
			url = window.URL.createObjectURL(file) ;
		} else if (window.webkitURL!=undefined) { // webkit or chrome
			url = window.webkitURL.createObjectURL(file) ;
		}
		return url ;
	}
})	

</script>
