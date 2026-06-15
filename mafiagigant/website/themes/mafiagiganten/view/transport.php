<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['rob_value_transport'] ?></h1>

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
<?php if($countcars != 0){?>
    <p><?= $text[$lang]['rob_transport_description'] ?></p>

    <form method="post">
      <table class="content_table">
        <tbody>
          <tr>
            <td width="40%" class="tcell"><?= $text[$lang]['choose_getaway_car'] ?></td>
            <td width="5%" align="center" class="tcell"><img src=""></td>
            <td width="55%" class="tcell" colspan="3">
              <select name="car" class="select" id="car">
                <?php foreach ($cars as $f) { ?>
                  <option value="<?= $f['id']; ?>"><?= gettranslation($f['car'], $tc); ?> (<?= $f['demage']; ?>%)</option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td width="40%" class="tcell"><?= $text[$lang]['rob_transport_during'] ?></td>
            <td width="5%" align="center" class="tcell"><img src=""></td>
            <td width="55%" class="tcell" colspan="3">
              <select name="where" class="select" id="where">
                <option value="loading"><?= $text[$lang]['loading'] ?></option>
                <option value="transport"><?= $text[$lang]['transport'] ?></option>
                <option value="unloading"><?= $text[$lang]['unloading'] ?></option>
              </select>
            </td>
          </tr>
          <tr>
            <td width="40%" class="tcell" rowspan="3"><?= $text[$lang]['hire_tools'] ?></td>
            <td width="5%" align="center" class="tcell"><input type="checkbox" id="tools" name="tools" value="tools"></td>
            <td width="25%" class="tcell"><?= $text[$lang]['tools'] ?></td>
            <td width="5%" align="center" class="tcell"><img src=""></td>
            <td width="25%" class="tcell"><?= number('5000'); ?></td>
          </tr>
          <tr>
            <td width="5%" align="center" class="tcell"><input type="checkbox" id="explosives" name="explosives" value="explosives"></td>
            <td width="25%" class="tcell"><?= $text[$lang]['explosives'] ?></td>
            <td width="5%" align="center" class="tcell"><img src=""></td>
            <td width="25%" class="tcell"><?= number('10000'); ?></td>
          </tr>
          <tr>
            <td width="5%" align="center" class="tcell"><input type="checkbox" id="workers" name="workers" value="workers"></td>
            <td width="25%" class="tcell"><?= $text[$lang]['ex_employee'] ?></td>
            <td width="5%" align="center" class="tcell"><img src=""></td>
            <td width="25%" class="tcell"><?= number('50000'); ?></td>
          </tr>
        </tbody>
      </table>

      <table class="content_table">
        <tbody>
          <tr>
            <td class="tsub"><?= $text[$lang]['captcha']; ?></td>
          </tr>
          <tr>
            <td class="tcell">
              <div style="padding: 2px; text-align: center"><?= showcaptcha(); ?></div>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    
    <?php } ?>
  </div>
</div>

<script language="javascript">
  countdown('<?= $wait ?>', 'count_timer', '/transport');
</script>
