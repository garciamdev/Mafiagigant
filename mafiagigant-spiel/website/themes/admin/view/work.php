						<ul class="nav nav-tabs">
										<li role="presentation" class=""><a href="/admin/work/">Work</a></li>
										<li role="presentation" class=""><a href="/admin/work/new">New work</a></li>
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
                    <p> Are you sure you want to delete this work?</p>


			
			<?php
			foreach($l as $language){?>
			
                    <p><em>"<?= gettranslationfromlang($language['lang'],$t); ?>"</em></p>

			
			<?php } ?>
			
			
			

                    <button class="btn btn-danger" name="submit" type="submit" value="delete">Yes delete this work</button>
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
           
                    
            <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Reward</label>
                            
                            <select class="form-control" name="receive" id="option">
 				 				<option value="money_0"  <?php if($c[0]['receive']."_".$c[0]['receive_id'] == "money_0"){ echo"selected"; }?>>Money</option>
                            	<?php foreach($d as $fd){?> 
                            	
 				 				<option value="drugs_<?= $fd['id'];?>" <?php if($c[0]['receive']."_".$c[0]['receive_id'] == "drugs_".$fd['id']){ echo"selected"; }?>><?= gettranslation($fd['id'],$td);?></option>
                            	<?php } ?>
							</select>


                        </div>
                    </div>
                    
                    
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="pull-left">receive for successful work</label>
                            <input type="number" class="form-control" name="minreceive" value="<?= $c[0]['minreceive'];?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Min. EXP Gained</label>
                            <input type="number" class="form-control" name="exp" value="<?= $c[0]['exp'];?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Max. EXP Gained</label>
                            <input type="number" class="form-control" name="maxexp" value="<?= $c[0]['maxexp'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Cooldown (Seconds)</label>
                            <input type="number" class="form-control" name="cooldown" value="<?= $c[0]['cooldown'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">resting time (Seconds)</label>
                            <input type="number" class="form-control" name="resting" value="<?= $c[0]['resting'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Min user level to comit this crime</label>
                            <input type="number" class="form-control" name="level" value="<?= $c[0]['level'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
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
                          
            <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Reward</label>
                            
                            <select class="form-control" name="receive" id="option">
 				 				<option value="money_0" >Money</option>
                            	<?php foreach($d as $fd){?> 
                            	
 				 				<option value="drugs_<?= $fd['id'];?>"><?= gettranslation($fd['id'],$td);?></option>
                            	<?php } ?>
							</select>


                        </div>
                    </div>
                    
                    
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="pull-left">receive for successful work</label>
                            <input type="number" class="form-control" name="minreceive" value="">
                        </div>
                    </div>
                </div>


                <div class="row">
                
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Min. EXP Gained</label>
                            <input type="number" class="form-control" name="exp" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Max. EXP Gained</label>
                            <input type="number" class="form-control" name="maxexp" value="">
                        </div>
                    </div>
                    
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Cooldown (Seconds)</label>
                            <input type="number" class="form-control" name="cooldown" value="">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">resting time (Seconds)</label>
                            <input type="number" class="form-control" name="resting" value="">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Min user level to comit this crime</label>
                            <input type="number" class="form-control" name="level" value="">
                        </div>
                    </div>
                    
               
                    
                    <div class="col-md-4">
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
                        <th width="100px">actions</th>
                    </tr>
                </thead>
                <tbody>
                			
			<?php
			foreach($c as $f){?>
				
                        <tr>
                            <td><?= $f['sort'];?></td>
                            <td><?= gettranslation($f['id'], $t);?></td>
                            <td>
                                [<a href="/admin/work/edit/?id=<?= $f['id'];?>">Edit</a>] 
                                [<a href="/admin/work/delete/?id=<?= $f['id'];?>">Delete</a>]
                            </td>
                        </tr>
                        
			
			<?php } ?>
			
			
                </tbody>
            </table>
        
    
        <?php } ?>
						</div>