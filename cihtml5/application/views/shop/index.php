
<div class="container">
    <div class="row">
        <div class="col-md-10">
        <p class="text-info">添加分类</p>
         <form role="form" action="/shop/index" method="post">
           
            <div class="form-group">
               <select class="form-control" name='did'>
               <option value="0">请选择类别</option>
                  <?php foreach($data as $val):?>
                  <option value="<?php echo $val->id.'v'.$val->path;?>" <?php if($rest){if($rest[0]->did==$val->id){?>selected<?php }}?> ><?php echo $val->name;?></option>
               <?php endforeach;?>
               </select>
            </div>
             <div class="form-group">
               <input class="form-control input-lg" type="text" name="name" placeholder="请输入分类名称" value="<?php if($rest){echo $rest[0]->name;}?>">
               <input type="hidden" name="id"  value="<?php if($rest){echo $rest[0]->id;}?>">
            </div>
             <button type="submit" class="btn btn-default">提交</button>
         </form>
         </div>
      </div>
   </div>
</body>
</html>