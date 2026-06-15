

</div><link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<style>

.cookie {
    background-color: #32323aff;
}
.switch {
}

.switch input[type=checkbox] {
    display: none;
}

.switch input[type=checkbox] + label {
    position:relative;
    min-width:calc(calc(2.375rem * .8) * 2);
    border-radius:calc(2.375rem * .8);
    height:calc(2.375rem * .8);
    line-height:calc(2.375rem * .8);
    display:inline-block;
    cursor:pointer;
    outline:none;
    user-select:none;
    vertical-align:middle;
    text-indent:calc(calc(calc(2.375rem * .8) * 2) + .5rem);
}
.switch input[type=checkbox] + label::before,
.switch input[type=checkbox] + label::after {
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:calc(calc(2.375rem * .8) * 2);
    bottom:0;
    display:block;
}
.switch input[type=checkbox] + label::before {
right:0;
background-color:red;
border-radius:calc(2.375rem * .8);
transition:.2s all;
}
.switch input[type=checkbox] + label::after {
    top:2px;
    left:2px;
    width:calc(calc(2.375rem * .8) - calc(2px * 2));
    height:calc(calc(2.375rem * .8) - calc(2px * 2));
    border-radius:50%;
    background-color:#fff;
    transition: all 0.3s ease-in 0s;;
}
.switch input[type=checkbox]:checked + label::before {
    background-color:green;
}
.switch input[type=checkbox]:checked + label::after {
    margin-left:calc(2.375rem * .8);
}
.switch input[type=checkbox]:focus + label::before {
    outline:none;
    box-shadow:0 0 0 .2rem rgba(0,136,221,.25);
}
.switch input[type=checkbox]:disabled + label {
    color:#868e96;
    cursor:not-allowed;
}
.switch input[type=checkbox]:disabled + label::before {
    background-color:#e9ecef;
}

.switch + .switch {
    margin-left:1rem;
}

.switch input[type=checkbox]:checked + input[type=checkbox]:disabled + label {
    background-color:green;
}


</style>
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
                        
                        



  <footer class="footer ">
    <ul class="nav justify-content-center border-bottom ">
      <li class="nav-item"><a href="/" class="nav-link px-2 ">Home</a></li>
      <li class="nav-item"><a href="/privacy-policy/" class="nav-link px-2 ">Privacy policy</a></li>
      <li class="nav-item"><a href="/contact/" class="nav-link px-2 ">contact</a></li>
     <!-- <li class="nav-item"><a href="#" class="nav-link px-2 ">Adverteren</a></li>-->
    </ul>
    <p class="text-center">© <?=  date('Y');?></p>
  </footer>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>




      <script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"></script>
 <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
    
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Bootstrap library -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<?php
    if($cookie_consent['analytics']) { 
        // Als de gebruiker Google Analytics cookies heeft geaccepteerd, laad dan de Google Analytics tracking code
        echo '
        <script>
          // Google Analytics tracking code
        </script>
        ';
    }
    ?>
    
    
    </body> 