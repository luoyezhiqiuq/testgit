<form class="form-horizontal" role="form">
   <div class="form-group">
      <label class="col-sm-2 control-label">聚焦</label>
      <div class="col-sm-10">
         <input class="form-control" id="focusedInput" type="text" 
            value="该输入框获得焦点...">
      </div>
   </div>
   <div class="form-group">
      <label for="inputPassword" class="col-sm-2 control-label">
         禁用
      </label>
      <div class="col-sm-10">
         <input class="form-control" id="disabledInput" type="text" 
            placeholder="该输入框禁止输入..." disabled>
      </div>
   </div>
   <fieldset disabled>
      <div class="form-group">
         <label for="disabledTextInput"  class="col-sm-2 control-label">
            禁用输入（Fieldset disabled）
         </label>
         <div class="col-sm-10">
            <input type="text" id="disabledTextInput" class="form-control" 
               placeholder="禁止输入">
         </div>
      </div>
      <div class="form-group">
         <label for="disabledSelect"  class="col-sm-2 control-label">
            禁用选择菜单（Fieldset disabled）
         </label>
         <div class="col-sm-10">
            <select id="disabledSelect" class="form-control">
               <option>禁止选择</option>
            </select>
         </div>
      </div>
   </fieldset>
   <div class="form-group has-success">
      <label class="col-sm-2 control-label" for="inputSuccess">
         输入成功
      </label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="inputSuccess">
      </div>
   </div>
   <div class="form-group has-warning">
      <label class="col-sm-2 control-label" for="inputWarning">
         输入警告
      </label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="inputWarning">
      </div>
   </div>
   <div class="form-group has-error">
      <label class="col-sm-2 control-label" for="inputError">
         输入错误
      </label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="inputError">
      </div>
   </div>
</form>



 <div class="container">
         <div class="row">
                <div class="col-md-10">
                    <h1>
                        表格（内容居中）
                    </h1>
                        <div class="table-responsive">

<form role="form">
   <div class="form-group">
      <input class="form-control input-lg" type="text" 
         placeholder=".input-lg">
   </div>

   <div class="form-group">
      <input class="form-control" type="text" placeholder="默认输入">
   </div>

   <div class="form-group">
      <input class="form-control input-sm" type="text" 
         placeholder=".input-sm">
   </div>
   <div class="form-group">
   </div>
   <div class="form-group">
      <select class="form-control input-lg">
         <option value="">.input-lg</option>
      </select>
   </div>
   <div class="form-group">
      <select class="form-control">
         <option value="">默认选择</option>
      </select>
   </div>
   <div class="form-group">
      <select class="form-control input-sm">
         <option value="">.input-sm</option>
      </select>
   </div>

   <div class="row">
      <div class="col-lg-2">
         <input type="text" class="form-control" placeholder=".col-lg-2">
      </div>
      <div class="col-lg-3">
         <input type="text" class="form-control" placeholder=".col-lg-3">
      </div>
      <div class="col-lg-4">
         <input type="text" class="form-control" placeholder=".col-lg-4">
      </div>
   </div>
</form>
</body>
</html>