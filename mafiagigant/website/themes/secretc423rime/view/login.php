<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['blocklogin_title'];?></h1>
    <form method='POST' action="" >
    
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
              
           

      <p>
      <?= $text[$lang]['blocklogin_text'];?>
      </p>
      <table class="content_table">
        <tbody><tr>
          <td width="25%" class="tcell"><?= $text[$lang]['blocklogin_username'];?></td>
          <td width="5%" class="tcell" align="center"><?= imgicons('offline'); ?></td>
          <td width="70%" class="tcell"><input style="width: 120px" type="text" name="username" maxlength="35" class="input"></td>
        </tr>
        <tr>
          <td class="tcell"><?= $text[$lang]['blocklogin_password'];?></td>
          <td class="tcell" align="center"><?= imgicons('password'); ?></td>
          <td class="tcell"><input style="width: 120px" type="password" name="password" class="input"></td>
        </tr>
        <tr>
          <td class="tcell">&nbsp;</td>
          <td class="tcell">&nbsp;</td>
          <td class="tcell"><input type="submit" name="submit" class="submit" value="Login"></td>
        </tr>
      </tbody></table>
      <p>
        <?= $text[$lang]['blocklogin_noaccount'];?><br>
        <?= $text[$lang]['blocklogin_nopassword'];?>
      </p>
    </form>
  </div>
</div>