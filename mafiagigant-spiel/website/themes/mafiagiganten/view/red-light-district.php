<?php
if($var == 'search'){ ?>

<div class="content_block">
  <div class="content_inner">
    <form method="post">
      <input type="hidden" name="redlight/search" value="1">
      <h1><?= $text[$lang]['redlight_title']; ?></h1>
      <?php if (!empty($errors)) {
        foreach ($errors as $error) {
      ?>
          <table class="info_bad">
            <tbody>
              <tr>
                <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
                <td width="95%"><?= $error ?></td>
              </tr>
            </tbody>
          </table>
      <?php
        }
      }
      ?>

      <?php
      if (!empty($success)) {
        foreach ($success as $succes) {
      ?>
          <table class="info_good">
            <tbody>
              <tr>
                <td width="5%" align="center"><img src="/themes/img/info_good.png"></td>
                <td width="95%"><?= $succes ?></td>
              </tr>
            </tbody>
          </table>
      <?php
        }
      }
      ?>
      <p><?= $text[$lang]['search_instructions']; ?></p>
      <table class="content_table" style="width: 55%; margin-left: auto; margin-right: auto">
        <tbody>
          <tr>
            <td class="tcell" width="60%"><?= $text[$lang]['prostitutes_on_street']; ?></td>
            <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
            <td class="tcell" width="30%"><?= number($userdata[0]['prostitutes']); ?></td>
          </tr>
          <tr>
            <td class="tcell"><?= $text[$lang]['prostitutes_in_brothels']; ?></td>
            <td class="tcell" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
            <td class="tcell"><?= number($userdata[0]['prostitutes_work']); ?></td>
          </tr>
        </tbody>
      </table>
      <table class="content_table">
        <tbody>
          <tr>
            <td class="tsub"><?= $text[$lang]['look_for_prostitutes']; ?></td>
          </tr>
          <tr>
            <td class="tcell">
              <div style="padding: 2px; text-align: center">
                <?= showcaptcha(); ?>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<script language="javascript">
	countdown('<?=$wait?>','count_timer','/red-light-district/search/');
</script>
<?php 
}
if($var == 'manage'){?>
<div class="content_block">
  <div class="content_inner">
    <form method="post">
      <h1><?= $text[$lang]['redlight_title']; ?></h1>
      <?php 
        if (!empty($errors)) {
          foreach ($errors as $error) {
      ?>
            <table class="info_bad">
              <tbody>
                <tr>
                  <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
                  <td width="95%"><?= $error ?></td>
                </tr>
              </tbody>
            </table>
      <?php
          }
        }
      ?>
					
      <?php
        if (!empty($success)) {
          foreach ($success as $succes) {
      ?>
            <table class="info_good">
              <tbody>
                <tr>
                  <td width="5%" align="center"><img src="/themes/img/info_good.png"></td>
                  <td width="95%"><?= $succes ?></td>
                </tr>
              </tbody>
            </table>
      <?php
          }
        }
      ?>
              
      <p><?= $text[$lang]['earnings_info']; ?></p>
      <table class="content_table" style="width: 75%; margin-left: auto; margin-right: auto">
        <tbody>
          <tr>
            <td class="tcell" width="45%"><?= $text[$lang]['prostitutes_on_street']; ?></td>
            <td class="tcell" width="7%" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
            <td class="tcell" width="22%"><?= number($userdata[0]['prostitutes']); ?></td>
            <td class="tcell" width="26%">&nbsp;</td>
          </tr>
          <tr>
            <td class="tcell"><?= $text[$lang]['prostitutes_in_brothels']; ?></td>
            <td class="tcell" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
            <td class="tcell"><?= number($userdata[0]['prostitutes_work']); ?></td>
            <td class="tcell">&nbsp;</td>
          </tr>
          <tr>
            <td class="tcell"><?= $text[$lang]['put_into_brothel']; ?></td>
            <td class="tcell" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
            <td class="tcell"><input maxlength="12" style="width: 60px" type="text" class="input" name="amount" value="0"></td>
            <td align="center" class="tcell"><input type="submit" class="submit" name="move" value="<?= $text[$lang]['move']; ?>"></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<?php
}

if($var == 'reverse'){?>

<div class="content_block">
  <div class="content_inner">
    <form method="post">
      <h1><?= $text[$lang]['redlight_title']; ?></h1>
      <?php 
        if (!empty($errors)) {
          foreach ($errors as $error) {
      ?>
            <table class="info_bad">
              <tbody>
                <tr>
                  <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
                  <td width="95%"><?= $error ?></td>
                </tr>
              </tbody>
            </table>
      <?php
          }
        }
      ?>
					
      <?php
        if (!empty($success)) {
          foreach ($success as $succes) {
      ?>
            <table class="info_good">
              <tbody>
                <tr>
                  <td width="5%" align="center"><img src="/themes/img/info_good.png"></td>
                  <td width="95%"><?= $succes ?></td>
                </tr>
              </tbody>
            </table>
      <?php
          }
        }
      ?>
              
      <p><?= $text[$lang]['earnings_info']; ?></p>
      <table class="content_table" style="width: 75%; margin-left: auto; margin-right: auto">
        <tbody>
          <tr>
            <td class="tcell" width="45%"><?= $text[$lang]['prostitutes_on_street']; ?></td>
            <td class="tcell" width="7%" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
            <td class="tcell" width="22%"><?= number($userdata[0]['prostitutes']); ?></td>
            <td class="tcell" width="26%">&nbsp;</td>
          </tr>
          <tr>
            <td class="tcell"><?= $text[$lang]['prostitutes_in_brothels']; ?></td>
            <td class="tcell" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
            <td class="tcell"><?= number($userdata[0]['prostitutes_work']); ?></td>
            <td class="tcell">&nbsp;</td>
          </tr>
          <tr>
            <td class="tcell"><?= $text[$lang]['put_back_on_streets']; ?></td>
            <td class="tcell" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
            <td class="tcell"><input maxlength="12" style="width: 60px" type="text" class="input" name="amount" value="0"></td>
            <td align="center" class="tcell"><input type="submit" class="submit" name="move" value="<?= $text[$lang]['move']; ?>"></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>


<?php
}




if($varallowed == 'no'){?>
<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['redlight_title']; ?></h1>
    <p>
      <?= $text[$lang]['redlight_description']; ?>
    </p>
    <table class="content_table" style="width: 55%; margin-left: auto; margin-right: auto">
      <tbody>
        <tr>
          <td class="tcell" width="60%"><?= $text[$lang]['prostitutes_on_street']; ?></td>
          <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
          <td class="tcell" width="30%"><?= number($userdata[0]['prostitutes']); ?></td>
        </tr>
        <tr>
          <td class="tcell"><?= $text[$lang]['prostitutes_in_brothels']; ?></td>
          <td class="tcell" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
          <td class="tcell"><?= number($userdata[0]['prostitutes_work']); ?></td>
        </tr>
      </tbody> 
    </table>
    <table class="content_table" style="width: 55%; margin-left: auto; margin-right: auto">
      <tbody>
        <tr>
          <td class="tcell" align="center" colspan="3"><a href="red-light-district/search"><?= $text[$lang]['search_for_prostitutes']; ?></a></td>
        </tr>
        <tr>
          <td class="tcell" align="center" colspan="3"><a href="red-light-district/manage"><?= $text[$lang]['employ_prostitutes']; ?></a></td>
        </tr>
        <tr>
          <td class="tcell" align="center" colspan="3"><a href="red-light-district/reverse"><?= $text[$lang]['put_hookers_back_on_streets']; ?></a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>






<?php
} 