
<div class="content_block">
  <div class="content_inner">

            <h1><?= $text[$lang]['title_news']; ?></h1>  
  
               

<?php


foreach($c as $f){
?>

    <table class="content_table">
      <tbody><tr>
      <td colspan="1" width="70%" class="tsub" style="vertical-align: top"><?= onlinestatus($f['username']);?> <a href="member/<?= $f['username'];?>" ><?= $f['username'];?></a></td>
        <td width="30%" class="tsub" style="text-align: right; font-weight: normal">
          <img style="margin-bottom:-4px" src="/images/icons/set_1/date.png" alt=""><?= $f['date'];?></td>
      </tr><tr>        <td colspan="2" width="70%" class="tsub" style="vertical-align: top"><?= gettranslation($f['id'], $tt); ?></td>
</tr><tr>
        <td colspan="2" class="tcell" style="vertical-align: top"><?= gettranslation($f['id'], $td); ?></td>
      </tr>
    </tbody></table>
    
    
    


      
      <?php

}


?>
  </div>
</div>

