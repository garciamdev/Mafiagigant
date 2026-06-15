						<ul class="nav nav-tabs">
										<li role="presentation" class=""><a href="/admin/suspicius-packages/">Suspicious packages</a></li>
							</ul>
						<div class="page">
							
							
					
					
		
            <?php
            $var="edit";
							
						if($var == 'edit'){ 
							
					
							?>
							
							
							
								<form method="post" action="">

                <div class="row">
                
          
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Country</label>
                            
                            <select class="form-control" name="country" id="option">
 				 				<option value="0">All country's</option>
                            	<?php foreach($countrys as $cc){?> 
                            	
 				 				<option value="<?= $cc['id'];?>" <?php if($c[0]['country'] == $cc['id']){ echo"selected"; }?>><?= getcountry($cc['id']);?></option>
                            	<?php } ?>
							</select>


                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max random wins (quantity)</label>
                            <input type="number" class="form-control" name="quantity" value="<?= $c[0]['quantity'];?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Min. money</label>
                            <input type="number" class="form-control" name="money" value="<?= $c[0]['money'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max. monney</label>
                            <input type="number" class="form-control" name="maxmoney" value="<?= $c[0]['maxmoney'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Min. bullets</label>
                            <input type="number" class="form-control" name="bullets" value="<?= $c[0]['bullets'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max. bullets</label>
                            <input type="number" class="form-control" name="maxbullets" value="<?= $c[0]['maxbullets'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Min. credits</label>
                            <input type="number" class="form-control" name="credits" value="<?= $c[0]['credits'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max. credits</label>
                            <input type="number" class="form-control" name="maxcredits" value="<?= $c[0]['maxcredits'];?>">
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
                    
                    
                </div>
                


  
                
                <div class="text-right">
                    <button class="btn btn-default" name="submit" type="submit" value="edit">Save</button>
                </div>
            </form>
            
                </div>
            
            
							
							
							<?php 
							} elseif($var == 'new'){ ?>
							
							<form method="post" action="">
			
			<?php
			foreach($l as $language){?>
				
                <div class="form-group">
                    <label class="pull-left">country <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>" value="">
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
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">category</label>
                            
                            <select name="category" id="option">
 				 				<option value="att">attack</option>
 				 				<option value="deff">deffence</option>
							</select>


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