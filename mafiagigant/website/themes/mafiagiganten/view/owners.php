<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['property_title']; ?></h1>
    <p>
      <?= $text[$lang]['property_description']; ?>
    </p>

    <?php
    foreach($c as $f) {
      $owner = getobjectowner($f['id'], $jail);
      $owner['earnings'] = isset($owner['earnings']) ? $owner['earnings'] : 0;
      
      
      $fhospital = getobjectowner($f['id'], $hospital);
      $fhospital['earnings'] = isset($fhospital['earnings']) ? $fhospital['earnings'] : 0;
      

      $fbulletfactory = getobjectowner($f['id'], $bulletfactory);
      $fbulletfactory['earnings'] = isset($fbulletfactory['earnings']) ? $fbulletfactory['earnings'] : 0;
      
    ?>
    

    <table class="content_table">
      <tbody>
        <tr>
          <td class="tsub" width="5%" align="center"><img src="<?= getflag($f['id']); ?>"></td>
          <td class="tsub" width="25%"><?= getcountry($f['id']); ?></td>
          <td class="tsub" width="5%">&nbsp;</td>
          <td class="tsub" width="30%"><?= $text[$lang]['owner']; ?></td>
          <td class="tsub" width="5%">&nbsp;</td>
          <td class="tsub" width="30%"><?= $text[$lang]['profits_losses']; ?></td>
        </tr>
        <tr>
          <td class="tcell" align="center"><img src="/themes/img/icons/object_prison.png"></td>
          <td class="tcell"><?= $text[$lang]['prison']; ?></td>
          <td class="tcell" align="center"><?= onlinestatus($owner['username']); ?></td>
          <td class="tcell">
            <?php
            if($owner['username'] == '') {
              echo $text[$lang]['no_owner'];
            } else {
              echo '<a href="member/'.$owner['username'].'/">'.$owner['username'].'</a>';
            }
            ?>
          </td>
          <td class="tcell" align="center"><img src="/themes/img/icons/cash_up.png"></td>
          <td class="tcell">€ <?= number($owner['earnings']); ?></td>
        </tr>
        <tr>
          <td class="tcell" align="center"><img src="/themes/img/icons/object_hospital.png"></td>
          <td class="tcell"><?= $text[$lang]['hospital']; ?></td>
          <td class="tcell" align="center"><?= onlinestatus($fhospital['username']); ?></td>
          <td class="tcell">
            <?php
            if($fhospital['username'] == '') {
              echo $text[$lang]['no_owner'];
            } else {
              echo '<a href="member/'.$fhospital['username'].'/">'.$fhospital['username'].'</a>';
            }
            ?>
          </td>
          <td class="tcell" align="center"><img src="/themes/img/icons/cash_up.png"></td>
          <td class="tcell">€ <?= number($fhospital['earnings']); ?></td>
        </tr>
        <?php if($userdata[0]['authority'] == 'admin'){ ?>
        
        
        <tr>
          <td class="tcell" align="center"><img src="/themes/img/icons/object_bulletfactory.png"></td>
          <td class="tcell"><?= $text[$lang]['bulletfactory']; ?></td>
          <td class="tcell" align="center"><?= onlinestatus($fbulletfactory['username']); ?></td>
          <td class="tcell">
            <?php
            if($fbulletfactory['username'] == '') {
              echo $text[$lang]['no_owner'];
            } else {
              echo '<a href="member/'.$fbulletfactory['username'].'/">'.$fbulletfactory['username'].'</a>';
            }
            ?>
          </td>
          <td class="tcell" align="center"><img src="/themes/img/icons/cash_up.png"></td>
          <td class="tcell">€ <?= number($fbulletfactory['earnings']); ?></td>
        </tr>
       <?php } ?>
      </tbody>
    </table>

    <?php } ?>

  </div>
</div>
