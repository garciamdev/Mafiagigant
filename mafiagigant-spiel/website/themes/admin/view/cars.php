						<ul class="nav nav-tabs">
										<li role="presentation" class=""><a href="/admin/cars/">Cars</a></li>
										<li role="presentation" class=""><a href="/admin/cars/newcar">New car</a></li>
										<li role="presentation" class=""><a href="/admin/cars/newstealcars">Steal cars</a></li>
							</ul>
						<div class="page">
							
							
							<?php
							if($var == 'deletecar'){ 
							
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
                    <p> Are you sure you want to delete this car?</p>


			
			<?php
			foreach($l as $language){?>
			
                    <p><em>"<?= gettranslationfromlang($language['lang'],$tc); ?>"</em></p>

			
			<?php } ?>
			
			
			

                    <button class="btn btn-danger" name="submit" type="submit" value="delete">Yes delete this car</button>
                </div>
            </form>
            <?php
            
							
							}elseif($var == 'editcar'){ 
							
							
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
                    <input type="text" class="form-control" name="<?= $language['lang'];?>" value="<?= gettranslationfromlang($language['lang'],$tc); ?>">
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
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="pull-left">img url</label>
                            <input type="text" class="form-control" name="img" value="<?= $c[0]['img'];?>">
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Steal car in</label>
                            
                 <select class="form-control" name="stealcars" id="option">
 				 				<?php foreach($sc as $fsc){?> 
                            	
 				 				<option value="<?= $fsc['id'];?>" <?php if($c[0]['stealcars'] == $fsc['id']){ echo"selected"; }?>><?= gettranslation($fsc['id'],$tsc);?></option>
                            	<?php } ?>
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
							} elseif($var == 'newcar'){ ?>
							
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
                
                  
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="pull-left">order</label>
                            <input type="number" class="form-control" name="sort" value="">
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
                            <label class="pull-left">Steal car in</label>
                            
                 <select class="form-control" name="stealcars" id="option">
 				 				<?php foreach($sc as $fsc){?> 
                            	
 				 				<option value="<?= $fsc['id'];?>" <?php if($fsc[0]['country'] == $fsc['id']){ echo"selected"; }?>><?= gettranslation($fsc['id'],$tsc);?></option>
                            	<?php } ?>
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
            
            
            
							
							
							
						<?php	}elseif($var == 'newstealcars'){ ?>
							
													<form method="post" action="">
			
               	<?php
			foreach($l as $language){?>
				
                <div class="form-group">
                    <label class="pull-left">Steal car <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>" value="">
                </div>
			
			<?php } ?>
			
			
            

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
                            <label class="pull-left">jail chance (0 = never & 100 = always)</label>
                            <input type="number" class="form-control" name="jailchance" value="">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">jail time</label>
                            <input type="number" class="form-control" name="jailtime" value="">
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
                            <label class="pull-left">Min user level to comit this crime</label>
                            <input type="number" class="form-control" name="level" value="">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">max perc.</label>
                            <input type="number" class="form-control" name="successmaxperc" value=">">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">exp needed for 100%</label>
                            <input type="number" class="form-control" name="successexpneeded" value="">
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
            
            
            
            
							
							
							
						<?php	}elseif($var == 'editstealcar'){ 
						
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
			
               	<?php
			foreach($l as $language){?>
				
                <div class="form-group">
                    <label class="pull-left">Steal car <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>" value="<?= gettranslationfromlang($language['lang'],$tsc); ?>">
                </div>
			
			<?php } ?>
			
			
            

                <div class="row">
                
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Min. EXP Gained</label>
                            <input type="number" class="form-control" name="exp" value="<?= $sc[0]['exp'];?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Max. EXP Gained</label>
                            <input type="number" class="form-control" name="maxexp" value="<?= $sc[0]['maxexp'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">jail chance (0 = never & 100 = always)</label>
                            <input type="number" class="form-control" name="jailchance" value="<?= $sc[0]['jailchance'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">jail time</label>
                            <input type="number" class="form-control" name="jailtime" value="<?= $sc[0]['jailtime'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Cooldown (Seconds)</label>
                            <input type="number" class="form-control" name="cooldown" value="<?= $sc[0]['cooldown'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">Min user level to comit this crime</label>
                            <input type="number" class="form-control" name="level" value="<?= $sc[0]['level'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">max perc.</label>
                            <input type="number" class="form-control" name="successmaxperc" value="<?= $sc[0]['successmaxperc'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">exp needed for 100%</label>
                            <input type="number" class="form-control" name="successexpneeded" value="<?= $sc[0]['successexpneeded'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">order</label>
                            <input type="number" class="form-control" name="sort" value="<?= $sc[0]['sort'];?>">
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
                        <th>order</th>
                        <th width="220px">Title</th>
                        <th width="100px">Cooldown</th>
                        <th width="220px">Reward</th>
                        <th width="75px">Level</th>
                        <th width="57px">exp</th>
                        <th width="100px">actions</th>
                    </tr>
                </thead>
                <tbody>
                			
			<?php
			foreach($sc as $sc){?>
				
                        <tr>
                            <td><?= $sc['sort'];?></td>
                            <td><?= gettranslation($sc['id'], $tsc);?></td>
                            <td><?= $sc['cooldown'];?></td>
                            <td></td>
                            <td><?= $sc['level'];?></td>
                            <td><?= $sc['exp'];?></td>
                            <td>
                                [<a href="/admin/cars/editstealcar/?id=<?= $sc['id'];?>">Edit</a>] 
                                [<a href="/admin/cars/deletestealcar/?id=<?= $sc['id'];?>">Delete</a>]
                            </td>
                        </tr>
                        
			
			<?php } ?>
			
			
                </tbody>
            </table>
            
            
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
                            <td><?= gettranslation($f['id'], $tc);?></td>
                            <td>
                                [<a href="/admin/cars/editcar/?id=<?= $f['id'];?>">Edit</a>] 
                                [<a href="/admin/cars/deletecar/?id=<?= $f['id'];?>">Delete</a>]
                            </td>
                        </tr>
                        
			
			<?php } ?>
			
			
                </tbody>
            </table>
        
    
        <?php } ?>
						</div>