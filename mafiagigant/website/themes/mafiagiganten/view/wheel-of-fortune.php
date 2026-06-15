<div class="content_block">
  <div class="content_inner">
    <h1><?php echo $text[$lang]['wheel_title']; ?></h1>
                  <?php
              if(!empty($errors))
              {
                  foreach($errors AS $error)
                  {?>
                       <table class="info_bad">
        <tbody><tr>
          <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
          <td width="95%"><?= $error ?></td>
        </tr>
      </tbody></table><?php
                  }
              }
              ?>
					
					
                <?php
              if(!empty($success))
              {
                  foreach($success AS $succes)
                  {?>
                       <table class="info_good" id="notification" style="display: none;">
        <tbody><tr>
          <td width="5%" align="center"><img src="/themes/img/info_good.png"></td>
          <td width="95%"><?= $succes ?></td>
        </tr>
      </tbody></table><?php
                  }
              }
              ?>
              
         <style>
        .highlight {
            
            
background: #dcf0d5;
border: 1px solid #46ad24;
border-spacing: 0;
color: #3b4d36;
margin: 0;
padding: 0;


        }
                .turning {
            
            
        background: #f7e0e0;
border: 1px solid #d96662;
border-spacing: 0;
color: #4d3636;
margin: 0;
padding: 0;
width: 100%;


        }
    </style>       
    
        <?php 
if($_SERVER['REQUEST_METHOD'] === 'POST'){ ?>

<script>
    var spinning = false;
    var totalItems = <?= count($w); ?>;
    var currentItem = 0;
    var spinInterval;
    var winningItemIndex = <?= $winningItemIndex ?>; // Assign the winningItemIndex from your PHP code
    var spinDuration = 3000; // The duration for the spin in milliseconds
    var spinStartTime = 0; // The timestamp when the spin started

    function startSpin() {
        if (!spinning) {
            spinning = true;
            spinStartTime = new Date().getTime(); // Record the start time of the spin
            spinInterval = setInterval(spinWheel, 100);
        }
    }

    function spinWheel() {
        var currentTime = new Date().getTime();
        if (currentTime - spinStartTime < spinDuration) {
            document.querySelectorAll('tr#prices').forEach(function (row) {
                row.classList.remove('turning');
            });
            currentItem = (currentItem + 1) % totalItems;
            var rows = document.querySelectorAll('tr#prices');
            rows[currentItem].classList.add('turning');
        } else {
            stopSpin(); // Stop the spin when the duration is reached
        }
    }
 
    function stopSpin() {
        if (spinning) {
        
            document.querySelectorAll('tr#prices').forEach(function (row) {
                row.classList.remove('turning');
            });
            currentItem = (currentItem + 1) % totalItems;
            var rows = document.querySelectorAll('tr#prices');
            rows[currentItem].classList.add('turning');
            
        	if(currentItem === winningItemIndex){
        	         document.querySelectorAll('tr#prices').forEach(function (row) {
                row.classList.remove('turning');
            });
            clearInterval(spinInterval);
            spinning = false;
            var rows = document.querySelectorAll('tr#prices');
            rows[winningItemIndex].classList.add('highlight'); // Highlight the winning row
           // alert('You won ' + '<?= txt($winningItem, '{amount}', $winningAmount); ?>');
                   document.getElementById('notification').style.display = 'table'; // Display the notification

           }
        }
    }

    // Automatically start the spin if the captcha is true
    document.addEventListener('DOMContentLoaded', function () {
        // Check if the captcha is true, and then start the spin
        <?php if ($captcha) : ?>
            startSpin();
        <?php endif; ?>
    });
</script>

 <?php 
 }
?>


  
    <form method="post">
      <table class="content_table">
        <tbody>
          <tr>
            <td class="tsub" width="5%">&nbsp;</td>
            <td class="tsub"><?php echo $text[$lang]['item']; ?></td>
          </tr>
          
                 	<?php
        	
				
						
			foreach($w as  $index => $f){
				$img = '';
				if($f['dbfield'] == 'money'){ $img = '<img src="/themes/img/icons/stats_bank.png">';}
				if($f['dbfield'] == 'credits'){ $img = '<img src="/themes/img/icons/stats_credits.png">';}
				if($f['dbfield'] == 'protection'){ $img = '<img src="/themes/img/icons/stats_money.png">'; $img = '';}
				
				if($f['dbfield'] == 'safe'){ $img = '<img src="/themes/img/icons/stats_safe.png">';}
				if($f['dbfield'] == 'health'){ $img = '<img src="/themes/img/icons/stats_health.png">';}
				if($f['dbfield'] == 'breakout'){ $img = '<img src="/themes/img/icons/breakout.png">';}
				
	
                
			?>
				
					
          <tr id="prices">
            <td class="tcell" align="center"><?= $img;?></td>
            <td class="tcell"><?= txt(gettranslation($f['id'], $t),'{amount}',number($f['value']));?></td>
          </tr>
  
                        
			
			<?php } ?>
			
			

		
          <!-- Repeat for other items -->
        </tbody>
      </table>
      <table class="content_table"><tbody><tr><td class="tsub"><?= $text[$lang]['captcha'];?></td></tr>
<tr>
<td class="tcell"><div style="padding: 2px; text-align: center" ><?= showcaptcha();?></div></td></tr>

</tbody>

</table>   

    </form>

<script language="javascript">
	countdown('<?=$wait?>','count_timer','/wheel-of-fortune');
</script>
  </div>
</div>