						<ul class="nav nav-tabs">
										<li role="presentation" class=""><a href="/admin/stock-exchange/">Stock exchange</a></li>
										<li role="presentation" class=""><a href="/admin/stock-exchange/settings">Stock exchange settings</a></li>
										<li role="presentation" class=""><a href="/admin/stock-exchange/new">New stock exchange</a></li>
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
                    <p> Are you sure you want to delete this stock?</p>


			
			<?php
			foreach($l as $language){?>
			
                    <p><em>"<?= gettranslationfromlang($language['lang'],$t); ?>"</em></p>

			
			<?php } ?>
			
			
			

                    <button class="btn btn-danger" name="submit" type="submit" value="delete">Yes delete this stock</button>
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
				
                    <div class="col-md-12">
                <div class="form-group">
                    <label class="pull-left">Titel <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>" value="<?= gettranslationfromlang($language['lang'],$t); ?>">
                </div>
			</div>
			
			<?php } ?>
			
				</div>

                <div class="row">
                
           
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Min. price</label>
                            <input type="number" class="form-control" name="minprice" value="<?= $c[0]['minprice'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max. price</label>
                            <input type="number" class="form-control" name="maxprice" value="<?= $c[0]['maxprice'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="pull-left">order</label>
                            <input type="number" class="form-control" name="sort" value="<?= $c[0]['sort'];?>">
                        </div>
                    </div>
                    
  
                </div>
                
                <div class="text-right">
                    <button class="btn btn-default" name="submit" type="submit" value="edit">Save</button>
                </div>
            </form>
            
            
            
							
							
							<?php 
							} elseif($var == 'settings'){ 
							
							
		
							
							
							?> 
							
							
			  				
								<form method="post" action="">
			

                <div class="row">
                
           
                         
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Country</label>
                            
                            <select class="form-control" name="country" id="option">
 				 				<option value="0">All country's</option>
                            	<?php foreach($countrys as $cc){?> 
                            	
 				 				<option value="<?= $cc['id'];?>" <?php if($settings[0]['country'] == $cc['id']){ echo"selected"; }?>><?= getcountry($cc['id']);?></option>
                            	<?php } ?>
							</select>


                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max. quantity</label>
                            <input type="number" class="form-control" name="maxquantity" value="<?= $settings[0]['maxquantity'];?>">
                        </div>
                    </div>
  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Commission</label>
                            <input type="number" class="form-control" name="commission" value="<?= $settings[0]['commission'];?>">
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
			
                <div class="row">
			<?php
			foreach($l as $language){?> 
				
  
                	
                    <div class="col-md-12">
                <div class="form-group">
                    <label class="pull-left">Titel <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>" value="">
                </div>
			</div>
			
			
			<?php } ?>
			</div>
			
             
                <div class="row">
                
                       
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Min. price</label>
                            <input type="number" class="form-control" name="minprice" value="">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max. price</label>
                            <input type="number" class="form-control" name="maxprice" value="">
                        </div>
                    </div>
                    
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="pull-left">order</label>
                            <input type="number" class="form-control" name="sort" value="">
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
                        <th width="220px">min.</th>
                        <th width="220px">max.</th>
                        <th width="100px">actions</th>
                    </tr>
                </thead>
                <tbody>
                			
			<?php
			foreach($c as $f){?>
				
                        <tr>
                            <td><?= $f['sort'];?></td>
                            <td><?= gettranslation($f['id'], $t);?></td>
                            <td><?= $f['minprice'];?></td>
                            <td><?= $f['maxprice'];?></td>
                            <td>
                                [<a href="/admin/stock-exchange/edit/?id=<?= $f['id'];?>">Edit</a>] 
                                [<a href="/admin/stock-exchange/delete/?id=<?= $f['id'];?>">Delete</a>]
                            </td>
                        </tr>
                        
			
			<?php } ?>
			
			
                </tbody>
            </table>
        
    
        <?php } ?>
						</div>