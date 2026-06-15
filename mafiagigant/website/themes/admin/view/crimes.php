						<ul class="nav nav-tabs">
										<li role="presentation" class=""><a href="/admin/crimes/">Crimes</a></li>
										<li role="presentation" class=""><a href="/admin/crimes/new">New crime</a></li>
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
                    <p> Are you sure you want to delete this crime?</p>


			
			<?php
			foreach($l as $language){?>
			
                    <p><em>"<?= gettranslationfromlang($language['lang'],$t); ?>"</em></p>

			
			<?php } ?>
			
			
			

                    <button class="btn btn-danger" name="submit" type="submit" value="delete">Yes delete this crime</button>
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
			
			<?php
			foreach($l as $language){?>
				
                <div class="form-group">
                    <label class="pull-left">Crime <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>" value="<?= gettranslationfromlang($language['lang'],$t); ?>">
                </div>
			
			<?php } ?>
			
						
						      <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Min. money for successful crime</label>
                            <input type="number" class="form-control" name="money" value="<?= $c[0]['money'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max. monney for successful crime</label>
                            <input type="number" class="form-control" name="maxmoney" value="<?= $c[0]['maxmoney'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Min. bullets for successful crime</label>
                            <input type="number" class="form-control" name="bullets" value="<?= $c[0]['bullets'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max. bullets for successful crime</label>
                            <input type="number" class="form-control" name="maxbullets" value="<?= $c[0]['maxbullets'];?>">
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
                            <label class="pull-left">jail chance (0 = never & 100 = always)</label>
                            <input type="number" class="form-control" name="jailchance" value="<?= $c[0]['jailchance'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">jail time</label>
                            <input type="number" class="form-control" name="jailtime" value="<?= $c[0]['jailtime'];?>">
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
                            <label class="pull-left">Min user level to comit this crime</label>
                            <input type="number" class="form-control" name="level" value="<?= $c[0]['level'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">max perc.</label>
                            <input type="number" class="form-control" name="successmaxperc" value="<?= $c[0]['successmaxperc'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="pull-left">exp needed for 100%</label>
                            <input type="number" class="form-control" name="successexpneeded" value="<?= $c[0]['successexpneeded'];?>">
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
			
			<?php
			foreach($l as $language){?>
				
                <div class="form-group">
                    <label class="pull-left">Crime <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>" value="">
                </div>
			
			<?php } ?>
			
			
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Min. money for successful crime</label>
                            <input type="number" class="form-control" name="money" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max. monney for successful crime</label>
                            <input type="number" class="form-control" name="maxmoney" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Min. bullets for successful crime</label>
                            <input type="number" class="form-control" name="bullets" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="pull-left">Max. bullets for successful crime</label>
                            <input type="number" class="form-control" name="maxbullets" value="">
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
			foreach($c as $crime){?>
				
                        <tr>
                            <td><?= $crime['sort'];?></td>
                            <td><?= gettranslation($crime['id'], $t);?></td>
                            <td><?= $crime['cooldown'];?></td>
                            <td><?= $crime['money'];?> - <?= $crime['maxmoney'];?></td>
                            <td><?= $crime['level'];?></td>
                            <td><?= $crime['exp'];?></td>
                            <td>
                                [<a href="/admin/crimes/edit/?id=<?= $crime['id'];?>">Edit</a>] 
                                [<a href="/admin/crimes/delete/?id=<?= $crime['id'];?>">Delete</a>]
                            </td>
                        </tr>
                        
			
			<?php } ?>
			
			
                </tbody>
            </table>
        
    
        <?php } ?>
						</div>