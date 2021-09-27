<div class="form-group" id="subcatdiv">
           <label for="catid"> Subcategory Title</label>
           <select class="form-control" id="subCatId" name="subcattitle" >
           <?php 
           foreach ($subcatdata as $editsubcat){
           ?>
           <option value="<?php echo $editsubcat['id'];?>"><?php echo $editsubcat['subcattitle'];?></option>
           <?php } ?>
           </select>
           </div>