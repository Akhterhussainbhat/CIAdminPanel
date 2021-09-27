<div class="form-group" id="subcatdiv">
           <label for="catid"> Subcategory Title</label>
           <select class="form-control" id="subCatId" name="subcattitle" >
           <?php 
           foreach ($subcatdata as $subcat){

           ?>
           <option value="<?php echo $subcat['id'];?>"><?php echo $subcat['subcattitle'];?></option>
           <?php } ?>
           </select>
           </div>