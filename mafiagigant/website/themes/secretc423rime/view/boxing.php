<div class="content_block">
  <div class="content_inner">
    <form method="post">
      <h1><?= $text[$lang]['boxing_club_title']; ?></h1>
      
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
        <?= $text[$lang]['boxing_club_welcome']; ?>
      </p>
      <p>
        <?= $text[$lang]['boxing_club_description']; ?>
      </p>
      <table class="content_table">
        <tbody>
          <tr>
            <td width="45%" class="tcell"><?= $text[$lang]['current_boxing_strength']; ?></td>
            <td width="5%" align="center" class="tcell"><img src="/themes/img/icons/stats_boxing.png"></td>
            <td width="50%" class="tcell"><?= $userdata[0]['box_power'];?></td>
          </tr>
        </tbody>
      </table>
      <table class="content_table">
        <tbody>
          <tr>
            <td class="tsub"><?= $text[$lang]['train_boxing_skill_instruction']; ?></td>
          </tr>
          <tr>
            <td class="tcell">
              <div style="padding: 2px; text-align: center">
                <?= showcaptcha();?>      </div>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>



<script language="javascript">
	countdown('<?=$wait?>','count_timer','/boxing');
</script>
