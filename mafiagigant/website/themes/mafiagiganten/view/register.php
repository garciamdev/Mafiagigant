<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['block_title']; ?></h1>
    <form method="post">
    
    
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
        <?= $text[$lang]['block_text']; ?>
      </p>
      <table class="content_table">
        <tbody><tr><td class="tsub" colspan="3"><?= $text[$lang]['block_title']; ?></td></tr>
        <tr>
          <td width="27%" class="tcell"><?= $text[$lang]['username']; ?></td>
          <td colspan="2" width="73%" class="tcell"><input maxlength="12" style="width: 80px" type="text" class="input" name="username" value=""></td>
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
          <td class="tcell"><?= $text[$lang]['email']; ?></td>
          <td colspan="2" class="tcell"><input maxlength="90" style="width: 180px" type="text" class="input" name="email" value=""></td>
        </tr>
        <tr>
          <td class="tcell"><?= $text[$lang]['gender']; ?></td>
          <td colspan="2" class="tcell"><select name="gender" class="select">
            <option value="M">Man</option>
            <option value="F">Vrouw</option>
          </select></td>
        </tr>
        <tr>
          <td class="tcell">Beginland</td>
          <td colspan="2" class="tcell"><select name="country" class="select" style="width: 126px">
            <option value="nl">Nederland</option>
            <option value="it">Italië</option>
            <option value="eg">Egypte</option>
            <option value="ru">Rusland</option>
            <option value="cn">China</option>
            <option value="br">Brazilië</option>
            <option value="mx">Mexico</option>
            <option value="au">Australië</option>
            <option value="us">USA</option>
            <option value="ar">Argentinië</option>
            <option value="kz">Kazachstan </option>
            <option selected="selected" value="ca">Canada</option>
            <option value="in">India</option>
            <option value="dz">Algerije </option>
            <option value="de">Duitsland</option>
          </select></td>
        </tr>
        <tr>
          <td class="tcell">&nbsp;</td>
          <td width="5%" class="tcell" align="center"><input type="checkbox" name="accept1" value="1"></td>
 <td class="tcell">Ik verklaar mij akkoord met de <a target="_blank" href="">regels</a> op Secretcrime.nl</td>         </tr>
        <tr>
          <td class="tcell">&nbsp;</td>
          <td width="5%" class="tcell" align="center"><input type="checkbox" name="gdpr" value="1"></td>
          <td class="tcell">I did read <a target="_blank" href="">Privacy Policy / GDPR statement</a></td>
        </tr>
        <tr>
          <td class="tcell">&nbsp;</td>
          <td width="5%" class="tcell" align="center"><input type="checkbox" name="accept2" value="1"></td>
          <td class="tcell">Ik zal met maximaal één account spelen</td>
        </tr>
        <tr>
          <td class="tcell">&nbsp;</td>
          <td width="5%" class="tcell" align="center"><input checked="checked" type="checkbox" name="protect" value="1"></td>
          <td width="68%" class="tcell">Bescherm mij de eerste 3 uur zodat niemand mij kan aanvallen</td>
        </tr>
      </tbody></table>
      <script>
        if (document.getElementById('year').value+'-'+document.getElementById('month').value+'-'+document.getElementById('day').value <= '2007-09-25') { document.getElementById('eldercheck').style.display = 'none'; } else { document.getElementById('eldercheck').style.display = 'table-row'; }
      </script>
<table class="content_table"><tbody><tr><td class="tsub" colspan="4">Typ deze code over:</td></tr><tr><td class="tcell" colspan="4">
    <?= showcaptcha(); ?></td></tr></tbody></table>    </form>
  </div>
</div>

     <table class="content_table">
        <tbody><tr><td class="tsub" colspan="3">Register</td></tr>

        <tr>
          <td class="tcell">Gender</td>
          <td colspan="2" class="tcell"><select name="gender" class="select">
            <option value="M">Male</option>
            <option value="F">Female</option>
          </select></td>
        </tr>
        <tr>
          <td class="tcell">Starting country</td>
          <td colspan="2" class="tcell"><select name="country" class="select" style="width: 126px">
            <option value="nl">Holland</option>
            <option value="it">Italy</option>
            <option value="eg">Egypt</option>
            <option value="ru">Russia</option>
            <option value="cn">China</option>
            <option value="br">Brazil</option>
            <option value="mx">Mexico</option>
            <option value="au">Australia</option>
            <option value="us">USA</option>
            <option value="ar">Argentina</option>
            <option value="kz">Kazakhstan</option>
            <option value="ca">Canada</option>
            <option value="in">India</option>
            <option value="dz">Algeria</option>
            <option selected="selected" value="de">Germany</option>
          </select></td>
        </tr>
        <tr>
          <td class="tcell">&nbsp;</td>
          <td width="5%" class="tcell" align="center"><input type="checkbox" name="accept1" value="1"></td>
 <td class="tcell">I confirm that I have read and accept the <a target="_blank" href="/">rules</a> for Secretcrime.nl</td>         </tr>
        <tr>
          <td class="tcell">&nbsp;</td>
          <td width="5%" class="tcell" align="center"><input type="checkbox" name="gdpr" value="1"></td>
          <td class="tcell">I did read  <a target="_blank" href="">Privacy Policy / GDPR statement</a></td>
        </tr>
        <tr>
          <td class="tcell">&nbsp;</td>
          <td width="5%" class="tcell" align="center"><input type="checkbox" name="accept2" value="1"></td>
          <td class="tcell">I will play with only 1 account</td>
        </tr>
        <tr>
          <td class="tcell">&nbsp;</td>
          <td width="5%" class="tcell" align="center"><input checked="checked" type="checkbox" name="protect" value="1"></td>
          <td width="68%" class="tcell">Protect me for the first 3 hours, so no one can attack me</td>
        </tr>
      </tbody></table>
