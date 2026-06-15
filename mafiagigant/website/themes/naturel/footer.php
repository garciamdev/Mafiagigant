          </div>
        </section>
    </main>
    

    <footer id="footer">
        <div class="container py-4">
            <div class="row">
                <div class="col-6 copyright">&copy; Copyright <?=$setting['site_title'];?></div>
                <div class="col-6 text-end">
                <a href="/">Home</a> <a href="/contact/" >contact</a> <a href="/privacy-policy/">Privacy policy</a>
      
                </div>
            </div>
        </div>
    </footer>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script defer src="<?= THEMES_URL;?>naturel/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="<?= THEMES_URL;?>naturel/assets/js/main.js"></script>





 <?php
 
$koekje = isset($_COOKIE['cookie_consent']) ? $_COOKIE['cookie_consent'] : '';
$cookie_consent = json_decode($koekje, true);     
$marketingcookie = isset($cookie_consent['basics']) ?  'checked' : 'checked';     
$analyticscookie = isset($cookie_consent['analytics']) ?  'checked' : '';
//print_r($_COOKIE['cookie_consent']);
?>
      


<?php
if($koekje == ''){

          echo'

<div class="modal fade" id="cookie-settings-modal" tabindex="-1" role="dialog" aria-labelledby="cookie-settings-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cookie-settings-modal-label">Cookie-instellingen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Sluiten">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form method="post" action="">
            <div class="modal-body">
              	<div class="form-group">	
        			<span class="switch">
            			<input disabled type="checkbox" class="switch" name="basics" id="basics" '.$marketingcookie.'>
            			<label for="marketing">Marketing cookies</label>
        			</span>
              
              	</div>
	
	

              	<div class="form-group">	 
        			<span class="switch">
            			<input type="checkbox" class="switch" name="analytics" id="analytics" '.$analyticscookie.'>
            			<label for="analytics">Analytics cookies</label>
        			</span>
              	
              	</div>

                    
            </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" name="save-cookie-settings" class="btn btn-primary">Opslaan</button>
        
      </div>
                </form>
        </div>
    </div>
</div>





                        
      '; 
      
        ?><!-- Cookie melding -->


<div class='fixed-bottom bg-light py-2'>    
	<div class='container text-center'>
		<div class="row" style="background-color: #f8f9fa">
            <div class="col-12 col-md-8">
                <p>Deze website maakt gebruik van cookies om de gebruikerservaring te verbeteren. Door op "Accepteren" te klikken ga je akkoord met het gebruik van alle cookies.</p>
            </div>
            <div class="col-12 col-md-4 d-flex align-items-center justify-content-end">
        		<form method="post" action="" class="form-inline">
            		<button type="submit" class="btn btn-primary" name="accept-all-cookies">Accepteren</button>
           		 	<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#cookie-settings-modal">Cookie-instellingen</button>
        		</form>
          	</div>
        </div>  
    </div>
</div>


<?php
             

}  

?>                  
                        
                        



<!--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>




      <script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"></script>
 <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
    -->
    <!-- jQuery library -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->

<!-- Bootstrap library -->

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script> -->
<?php

    if(isset($cookie_consent['analytics'])) { 
        // Als de gebruiker Google Analytics cookies heeft geaccepteerd, laad dan de Google Analytics tracking code
        echo '
        <script>
          // Google Analytics tracking code
        </script>
        ';
    }
    ?>
</body>

</html>