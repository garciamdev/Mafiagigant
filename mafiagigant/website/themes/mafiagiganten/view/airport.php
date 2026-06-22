<div class="content_block">
  <form method="post">
  <div class="content_inner">
      <h1><?= $text[$lang]['airport_title']; ?></h1>
    
    <?php
    if(isset($flying)){
    ?>
     <table class="info_bad">
        <tbody><tr>
          <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
          <td width="95%"><?= $flying ?></td>
        </tr>
      </tbody></table>
      
<script language="javascript">
	countdown('<?=$waitfly?>','count_timer','<?=$redmodule;?>');
</script>
    <?php
    }else{
    
    
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
                       <table class="info_good">
        <tbody><tr>
          <td width="5%" align="center"><img src="/themes/img/info_good.png"></td>
          <td width="95%"><?= $succes ?></td>
        </tr>
      </tbody></table><?php
                  }
              }
              ?>
              
              
      <table class="content_table">
        <tbody>
          <tr>
            <td width="5%" class="tsub" align="center"><img src="<?= getflag($userdata[0]['country']); ?>"></td>
            <td colspan="6" class="tsub"><?= $currentcountry; ?></td>
          </tr>
          <tr>
            <td colspan="2" class="tcell" width="40%"><?= $text[$lang]['current_country']; ?> <?= $currentcountry; ?></td>
            <td width="5%" class="tcell" align="center"><?= onlinestatus($owner); ?></td>
            <td class="tcell" width="45%"><a href="member/<?= $owner; ?>"><?= $owner; ?></a></td>
          </tr>
        </tbody>
      </table>
      
      <table class="content_table">
        <tbody>
          <tr>
            <td colspan="3" class="tsub"><?= $text[$lang]['choose_destination']; ?></td>
            <td colspan="2" class="tsub"><?= $text[$lang]['ticket_price']; ?></td>
            <td colspan="2" class="tsub"><?= $text[$lang]['residents']; ?></td>
            <td colspan="2" class="tsub"><?= $text[$lang]['president']; ?></td>
          </tr>
          
          <?php
          foreach($c as $f){
            $owner = getobjectowner($f['id'], $o)['username'];
          ?>
          <tr>
            <td width="5%" class="tcell" align="center"><input type="radio" name="fly" value="<?= $f['id']; ?>"></td>
            <td width="5%" class="tcell" align="center"><img src="<?= $f['img']; ?>"></td>
            <td width="15%" class="tcell"><?= gettranslation($f['id'], $t); ?></td>
            <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
            <td width="20%" class="tcell">€ <?= number($f['price']); ?></td>
            <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/citizens.png"></td>
            <td width="15%" class="tcell"><?= number(getredidents($f['id'])); ?></td>
            <td width="5%" class="tcell" align="center"><?= onlinestatus($owner); ?></td>
            <td class="tcell" width="25%"><a href="member/"><?= $owner; ?></a></td>
          </tr>
          <?php } ?>
          
          <tr>
            <td><input type="checkbox" name="hide" value="1"></td>
            <td colspan="8"><?= $text[$lang]['hide_destination']; ?></td>
          </tr>
        </tbody>
      </table>
      <p><input type="submit" name="submit" class="submit" value="<?= $text[$lang]['fly']; ?>"></p>
      <script language="javascript">
	countdown('<?=$wait?>','count_timer','/airport');
</script>

<?php

}
?>    </div>
  </form>
</div>


