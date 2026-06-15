						<ul class="nav nav-tabs">
										<li role="presentation" class=""><a href="/admin/shop/">Shop</a></li>
										<li role="presentation" class=""><a href="/admin/shop/new">New item</a></li>
							</ul>
						<div class="page">
							
							
							<?php
							if($var == 'delete'){ 
							
					function gettranslationfromlang($language, $string){
							//print_r($string);
							$translation = 'no translation yet!';
							foreach($string as $f){
								if($f['lang'] == $language){
									
									$translation = $f['content'];
								}
							}
							return $translation;
						}							
								
							
							?>
							
							<form method="post" action="">
                <div class="text-center">
                    <p> Are you sure you want to delete this country?</p>


			
			<?php
			foreach($l as $language){?>
			
                    <p><em>"<?= gettranslationfromlang($language['lang'],$tt); ?>"</em></p>

			
			<?php } ?>
			
			
			

                    <button class="btn btn-danger" name="submit" type="submit" value="delete">Yes delete this country</button>
                </div>
            </form>
            <?php
            
							
							}elseif($var == 'edit'){ 
							
							
						function gettranslationfromlang($language, $string){
							//print_r($string);
							$translation = 'no translation yet!';
							foreach($string as $f){
								if($f['lang'] == $language){
									
									$translation = $f['content'];
								}
							}
							return $translation;
						}							
							
							
							
							?>
							
							
							
								<form method="post" action="">
			
                <div class="row">
			<?php
			foreach($l as $language){?>
				
                    <div class="col-md-6">
                <div class="form-group">
                    <label class="pull-left">Titel <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>_title" value="<?= gettranslationfromlang($language['lang'],$tt); ?>">
                </div>
			</div>
			
			  <div class="col-md-6">
                <div class="form-group">
                    <label class="pull-left">Description <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>_description" value="<?= gettranslationfromlang($language['lang'],$td); ?>">
                </div>
			</div>
			<?php } ?>
			
				</div>

                <div class="row">
                
          
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="pull-left">order</label>
                            <input type="number" class="form-control" name="sort" value="<?= $c[0]['sort'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">attack power</label>
                            <input type="number" class="form-control" name="att" value="<?= $c[0]['att'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">deffence power</label>
                            <input type="number" class="form-control" name="deff" value="<?= $c[0]['deff'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="pull-left">img url</label>
                            <input type="text" class="form-control" name="img" value="<?= $c[0]['img'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">category</label>
                            
                            <select class="form-control" name="category" id="option">
 				 				<option value="attack">attack</option>
 				 				<option value="defence">defence</option>
							</select>


                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">price</label>
                            <input type="number" class="form-control" name="price" value="<?= $c[0]['price'];?>">
                        </div>
                    </div>
  
  
  
                </div>
                
                <div class="text-right">
                    <button class="btn btn-default" name="submit" type="submit" value="edit">Save</button>
                </div>
            </form>
            
            
            
							
							
							<?php 
							} elseif($var == 'new'){ ?>
							
							<form method="post" action="">
			
			<?php
			foreach($l as $language){?>
				
  
                	
                    <div class="col-md-6">
                <div class="form-group">
                    <label class="pull-left">Titel <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>_title" value="">
                </div>
			</div>
			
			  <div class="col-md-6">
                <div class="form-group">
                    <label class="pull-left">Description <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>_description" value="">
                </div>
			</div>
			
			
			
			<?php } ?>
			
			
             
                <div class="row">
                
                  
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="pull-left">order</label>
                            <input type="number" class="form-control" name="sort" value="">
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">attack power</label>
                            <input type="number" class="form-control" name="att" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">deffence power</label>
                            <input type="number" class="form-control" name="deff" value="">
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="pull-left">img url</label>
                            <input type="text" class="form-control" name="img" value="">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">category</label>
                            
                 <select class="form-control" name="category" id="option">
 				 				<option value="attack">attack</option>
 				 				<option value="defence">defence</option>
							</select>


                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">price</label>
                            <input type="number" class="form-control" name="price" value="">
                        </div>
                    </div>
                    
                    
                </div>
                <div class="text-right">
                    <button class="btn btn-default" name="submit" type="submit" value="new">Save</button>
                </div>
            </form>
            
            
            
							
							
							
						<?php	}else{
						
						
						
						
					//	echo"<pre>";
					//	print_r($t);
					//	echo"</pre>";
						
					//	echo"<pre>";
					//	print_r($c);
					//	echo"</pre>";
						
						

						?>
            <table class="table table-condensed table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <th width="20px">order</th>
                        <th width="220px">Title</th>
                        <th width="220px">Category</th>
                        <th width="100px">actions</th>
                    </tr>
                </thead>
                <tbody>
                			
			<?php
			foreach($c as $f){?>
				
                        <tr>
                            <td><?= $f['sort'];?></td>
                            <td><?= gettranslation($f['id'], $tt);?></td>
                            <td><?= $f['category'];?></td>
                            <td>
                                [<a href="/admin/shop/edit/?id=<?= $f['id'];?>">Edit</a>] 
                                [<a href="/admin/shop/delete/?id=<?= $f['id'];?>">Delete</a>]
                            </td>
                        </tr>
                        
			
			<?php } ?>
			
			
                </tbody>
            </table>
        
    
        <?php } ?>
						</div>