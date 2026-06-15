<div class="content_block">
  <div class="content_inner">
  <form method="post">
    <h1><?php echo $text[$lang]['Gym_Title'];?></h1>
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
                       <table class="info_good">
        <tbody><tr>
          <td width="5%" align="center"><img src="/themes/img/info_good.png"></td>
          <td width="95%"><?= $succes ?></td>
        </tr>
      </tbody></table><?php
                  }
              }
              ?>
              
    <p>
      <?php echo $text[$lang]['Welcome_Message'];?>
    </p>
    <p>
      <?php echo $text[$lang]['Boost_Message'];?>
    </p>
    <table class="content_table">
      <tbody><tr>
        <td class="tsub" colspan="6"><?php echo $text[$lang]['Sport_Selection_Title'];?></td>
      </tr>
      <tr>
        <td width="5%" align="center" class="tcell"><input type="radio" name="sport" value="basketball"></td>
        <td width="5%" align="center" class="tcell"><img src="/themes/img/icons/sports_basketball.png"></td>
        <td width="40%" class="tcell"><?php echo $text[$lang]['Basketball'];?></td>
        <td width="5%" align="center" class="tcell"><input type="radio" name="sport" value="golf"></td>
        <td width="5%" align="center" class="tcell"><img src="/themes/img/icons/sports_golf.png"></td>
        <td width="40%" class="tcell"><?php echo $text[$lang]['Golf'];?></td>
      </tr>
      <tr>
        <td width="5%" align="center" class="tcell"><input type="radio" name="sport" value="tennis"></td>
        <td width="5%" align="center" class="tcell"><img src="/themes/img/icons/sports_tennis.png"></td>
        <td width="40%" class="tcell"><?php echo $text[$lang]['Tennis'];?></td>
        <td width="5%" align="center" class="tcell"><input type="radio" name="sport" value="soccer"></td>
        <td width="5%" align="center" class="tcell"><img src="/themes/img/icons/sports_soccer.png"></td>
        <td width="40%" class="tcell"><?php echo $text[$lang]['Soccer'];?></td>
      </tr>
    </tbody></table>
<table class="content_table"><tbody><tr><td class="tsub"><?= $text[$lang]['captcha'];?></td></tr>
<tr>
<td class="tcell"><div style="padding: 2px; text-align: center"><?= showcaptcha();?></div></td></tr>

</tbody> </table> </div>
</div>


<script language="javascript">
	countdown('<?=$wait?>','count_timer','/gym');
</script>
