
<div class="container">
    <div class="row">
        <div class="col-md-10">
        <p class="text-info">添加商品</p>
         <form role="form" method="post" action="/shop/opadd" enctype="multipart/form-data">
      
            <div class="form-group">
               <select class="form-control" name='name'>
               <option value="">请选择类别</option>
                  <?php foreach($data as $val):?>
                  <option value="<?php echo $val->id;?>"><?php echo $val->name;?></option>
               <?php endforeach;?>
               </select>
            </div>
             <div class="form-group">
               <input class="form-control input-lg" type="text" name="shopname"
                  placeholder="请输入商品名称">
            </div>
            <div class="form-group">
               <input class="form-control input-lg" type="text" name="price"
                  placeholder="商品价格">
            </div>
            <div class="form-group">
               <input class="form-control input-lg" type="text" name="StockQuantity"
                  placeholder="库存量">
            </div>

            <div class="form-group">
               <textarea name="descript">商品详情</textarea>
            </div>
               <div class="form-group">
                  <label for="inputfile">添加商品图像</label>
                  <input type="file" name="file" id="file0" multiple="multiple" />
               </div>
              <div class="row"  style="width:25%">
              <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                  <img id="img0" src="" alt="...">
                  <div class="caption">
                    <p></p>

                  </div>
                </div>
              </div>
            </div>
           
           
         
           
         </form>
         </div>
      </div>
   </div>
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
</body>
</html>