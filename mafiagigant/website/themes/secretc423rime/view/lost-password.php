<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['blocklostpassword_title'];?></h1>
    <form method="post" action="lost-password">
      <p><?= $text[$lang]['blocklostpassword_text'];?></p>
         
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
      <table class="content_table">
        <tbody><tr>
          <td width="25%" class="tcell"><?= $text[$lang]['blocklostpassword_username'];?></td>
          <td width="5%" class="tcell" align="center"><?= imgicons('offline');?></td>
          <td width="70%" class="tcell"><input style="width: 30%" type="text" name="username" maxlength="15" class="input"></td>
        </tr>
            <tr>
          <td class="tcell"><?= $text[$lang]['password']; ?></td>
          <td colspan="2" class="tcell"><input maxlength="60" style="width: 120px" type="password" class="input" name="pass1" value=""></td>
        </tr>
        <tr>
          <td class="tcell"><?= $text[$lang]['password_confirm']; ?></td>
          <td colspan="2" class="tcell"><input maxlength="60" style="width: 120px" type="password" class="input" name="pass2" value=""></td>
        </tr>
        <tr>
          <td class="tcell"><?= $text[$lang]['blocklostpassword_email'];?></td>
          <td class="tcell" align="center"><?= imgicons('mail');?></td>
          <td class="tcell"><input style="width: 60%" type="text" name="email" maxlength="80" class="input"></td>
        </tr>
        <tr>
          <td class="tcell">&nbsp;</td>
          <td class="tcell">&nbsp;</td>
          <td class="tcell"><input type="submit" name="submit" class="submit" value="<?= $text[$lang]['blocklostpassword_submit'];?>"></td>
        </tr>
      </tbody></table>
    </form>
  </div>
</div>

