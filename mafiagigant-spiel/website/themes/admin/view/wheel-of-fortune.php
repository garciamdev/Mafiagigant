						<ul class="nav nav-tabs">
										<li role="presentation" class=""><a href="/admin/wheel-of-fortune/">wheel of fortune</a></li>
										<li role="presentation" class=""><a href="/admin/wheel-of-fortune/new">New item</a></li>
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
                    <p> Are you sure you want to delete this item?</p>


			
			<?php
			foreach($l as $language){?>
			
                    <p><em>"<?= gettranslationfromlang($language['lang'],$t); ?>"</em></p>

			
			<?php } ?>
			
			
			

                    <button class="btn btn-danger" name="submit" type="submit" value="delete">Yes delete this item</button>
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
								<p>Use this command to show the reward in the title: {amount}</p>
			
			<?php
			foreach($l as $language){?>
				
                <div class="form-group">
                    <label class="pull-left">title <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>" value="<?= gettranslationfromlang($language['lang'],$t); ?>">
                </div>
			
			<?php } ?>
			
				

                <div class="row">
                
          
                    
                    
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">order</label>
                            <input type="number" class="form-control" name="sort" value="<?= $c[0]['sort'];?>">
                        </div>
                    </div>
                    
                
                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">option</label>
                            
                            <select name="option" class="form-control" id="option">
  <option value="money" <?php if($c[0]['dbfield'] == 'money'){ echo "selected"; }?> >money (bank)</option>
  <option value="credits" <?php if($c[0]['dbfield'] == 'credits'){ echo "selected"; }?> >credits</option>
  <option value="breakout"  <?php if($c[0]['dbfield'] == 'breakout'){ echo"selected"; }?> >breakout points</option>
  <option value="garagespots"  <?php if($c[0]['dbfield'] == 'garagespots'){ echo"selected"; }?> >Garage spots</option>
</select>


                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">reward</label>
                            <input type="number" class="form-control" name="value" value="<?= $c[0]['value'];?>">
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
                
                <div class="text-right">
                    <button class="btn btn-default" name="submit" type="submit" value="edit">Save</button>
                </div>
            </form>
            
            
            
							
							
							<?php 
							} elseif($var == 'new'){ ?>
							
								<p>Use this command to show the reward in the title: {amount}</p>
							<form method="post" action="">
			
			<?php
			foreach($l as $language){?>
				
                <div class="form-group">
                    <label class="pull-left">Title <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>" value="">
                </div>
			
			<?php } ?>
			
			

                    
                    
                    
                <div class="row">
                
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">order</label>
                            <input type="number" class="form-control" name="sort" value="">
                        </div>
                    </div>
                    
                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">option</label>
   <select name="option" class="form-control" id="option">
  <option value="money">money</option>
  <option value="credits">Credits</option>
  <option value="breakout">breakout points</option>
  <option value="garagespots">Garage spots</option>
</select>                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">reward</label>
                            <input type="number" class="form-control" name="value" value="">
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
                            <td><?= txt(gettranslation($f['id'], $t),'{amount}',number($f['value']));?></td>
                            <td>
                                [<a href="/admin/wheel-of-fortune/edit/?id=<?= $f['id'];?>">Edit</a>] 
                                [<a href="/admin/wheel-of-fortune/delete/?id=<?= $f['id'];?>">Delete</a>]
                            </td>
                        </tr>
                        
			
			<?php } ?>
			
			
                </tbody>
            </table>
        
    
        <?php } ?>
						</div>