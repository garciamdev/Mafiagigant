						<ul class="nav nav-tabs">
										<li role="presentation" class=""><a href="/admin/news/">News</a></li>
										<li role="presentation" class=""><a href="/admin/news/new">New news item</a></li>
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
                    <p> Are you sure you want to delete this news item?</p>


			
			<?php
			foreach($l as $language){?>
			
                    <p><em>"<?= gettranslationfromlang($language['lang'],$tt); ?>"</em></p>

			
			<?php } ?>
			
			
			

                    <button class="btn btn-danger" name="submit" type="submit" value="delete">Yes delete this news item</button>
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
                    <input type="text" class="form-control" name="<?= $language['lang'];?>_title" value="<?= gettranslationfromlang($language['lang'],$tt); ?>">
                </div>
			</div>
			
			  <div class="col-md-12">
                <div class="form-group">
                    <label class="pull-left">Description <?= $language['lang'];?></label>
                    
                   <textarea rows="4" type="text" class="form-control" name="<?= $language['lang'];?>_description" value="<?= gettranslationfromlang($language['lang'],$td); ?>"><?= gettranslationfromlang($language['lang'],$td); ?></textarea>
                </div>
			</div>
			<?php } ?>
			
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
				
  
                	
                    <div class="col-md-12">
                <div class="form-group">
                    <label class="pull-left">Titel <?= $language['lang'];?></label>
                    <input type="text" class="form-control" name="<?= $language['lang'];?>_title" value="">
                </div>
			</div>
			
			  <div class="col-md-12">
                <div class="form-group">
                    <label class="pull-left">Description <?= $language['lang'];?></label>
                    <textarea rows="4" type="text" class="form-control" name="<?= $language['lang'];?>_description" value=""></textarea>
                </div>
			</div>
			
			
			
			<?php } ?>
			
			
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
                        <th width="220px">Date</th>
                        <th width="220px">Title</th>
                        <th width="220px">Username</th>
                        <th width="100px">actions</th>
                    </tr>
                </thead>
                <tbody>
                			
			<?php
			foreach($c as $f){?>
				
                        <tr>
                            <td><?= $f['date'];?></td>
                            <td><?= gettranslation($f['id'], $tt);?></td>
                            
                            <td><?= $f['username'];?></td>
                            <td>
                                [<a href="/admin/news/edit/?id=<?= $f['id'];?>">Edit</a>] 
                                [<a href="/admin/news/delete/?id=<?= $f['id'];?>">Delete</a>]
                            </td>
                        </tr>
                        
			
			<?php } ?>
			
			
                </tbody>
            </table>
        
    
        <?php } ?>
						</div>