<div class="content_block">
  <div class="content_inner">
  <form method="post">
      <style>
        .info_good {
            display: none;
        }
    </style>
    <h1><?php echo $text[$lang]['suspiciouspackages_Title'];?></h1>
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
              
              
                      if($_SERVER['REQUEST_METHOD'] === 'POST'){


              ?>
					
					
                <?php
              if(!empty($success))
              { echo"<p>".$text[$lang]['suspiciouspackages_searching']."</p>";
              
              ?><table class="content_table" style="width: 55%; margin-left: auto; margin-right: auto">
      <tbody><?php
    
                  foreach($success AS $succes)
                  {?>
                    <tr  class="info_good">
          <td class="tcell" align="center"><img src="/themes/img/icons/packages.png"></td>
          <td class="tcell" width="100%"><?= $succes;?></td>
        </tr><?php
        
                  }?> 
      </tbody> 
    </table><?php
              }
              }else{
              ?>
         
<?php   if(empty($errors))
              {?>     
    <p> 
      <?php echo $text[$lang]['suspiciouspackages_message'];?>
    </p>
<table class="content_table"><tbody><tr><td class="tsub"><?= $text[$lang]['captcha'];?></td></tr>
<tr>
<td class="tcell"><div style="padding: 2px; text-align: center"><?= showcaptcha();?></div></td></tr>

</tbody> </table> <?php }} ?></div>
</div>


<script language="javascript">
	countdown('<?=$wait?>','count_timer','/suspicious-packages');
</script>

<script>
        function showTables() {
            var tables = document.querySelectorAll(".info_good");
            var index = 0;

            function showNextTable() {
                if (index < tables.length) {
                    tables[index].style.display = "table";
                    index++;
                } else {
                    clearInterval(interval);
                }
            }

            var interval = setInterval(showNextTable, 1000); // 1000 milliseconds = 1 second
        }

        showTables();
    </script>
    
