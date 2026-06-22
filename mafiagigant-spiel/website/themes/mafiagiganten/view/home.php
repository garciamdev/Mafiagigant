<div class="content_block">
<div class="content_inner">
<h1><?=$txt[$lang]['blocklogin_title'];?></h1>
<form id="lf" method="post" action="<?= BASE_URL; ?>login">
            <input class="l1" type="text" name="username" value="<?=$txt[$lang]['blocklogin_username'];?>" onfocus="this.value=''; this.onfocus=''" maxlength="35">
            <input class="l2" type="password" name="password" value="**********" onfocus="this.value=''; this.onfocus=''">
            <input class="l2" type="submit" name="submit" value="<?=$txt[$lang]['blocklogin_button'];?>">
            <a class="lostpass" href="lost-password"><?=$txt[$lang]['blocklogin_forgetpassword'];?></a>
          </form>
</div>
</div>


<div class="content_block">
  <div class="content_inner">
    <h1><?=$txt[$lang]['blockwelcome_title'];?></h1>
    <p><?=$txt[$lang]['blockwelcome_text'];?></p>

    <table class="content_table">
      <tbody>
        <tr><td class="tsub" colspan="8" style="text-align:center;">Was dich erwartet</td></tr>
        <tr>
          <td class="tcell" style="width:1px;"><img src="/themes/img/icons/crime.png" alt=""></td>
          <td class="tcell">Verbrechen &amp; Raub&uuml;berf&auml;lle begehen</td>
          <td class="tcell" style="width:1px;"><img src="/themes/img/icons/transport.png" alt=""></td>
          <td class="tcell">Geldtransporter &uuml;berfallen</td>
          <td class="tcell" style="width:1px;"><img src="/themes/img/icons/car.png" alt=""></td>
          <td class="tcell">Autos stehlen &amp; tunen</td>
          <td class="tcell" style="width:1px;"><img src="/themes/img/icons/wheel.png" alt=""></td>
          <td class="tcell">Casino: Roulette, Blackjack &amp; mehr</td>
        </tr>
        <tr>
          <td class="tcell"><img src="/themes/img/icons/stats_boxing.png" alt=""></td>
          <td class="tcell">St&auml;rke trainieren</td>
          <td class="tcell"><img src="/themes/img/icons/stats_family.png" alt=""></td>
          <td class="tcell">Eine Familie gr&uuml;nden</td>
          <td class="tcell"><img src="/themes/img/icons/airport.png" alt=""></td>
          <td class="tcell">Um die Welt reisen</td>
          <td class="tcell"><img src="/themes/img/icons/packages.png" alt=""></td>
          <td class="tcell">Verd&auml;chtige Pakete finden</td>
        </tr>

        <tr><td class="tsub" colspan="8" style="text-align:center;">Dein Startbonus</td></tr>
        <tr>
          <td class="tcell"><img src="/themes/img/icons/stats_cash.png" alt=""></td>
          <td class="tcell">&euro; 1.000.000 Bargeld</td>
          <td class="tcell"><img src="/themes/img/icons/stats_bank.png" alt=""></td>
          <td class="tcell">&euro; 500.000 Bank</td>
          <td class="tcell"><img src="/themes/img/icons/stats_credits.png" alt=""></td>
          <td class="tcell">100 Credits</td>
          <td class="tcell"><img src="/themes/img/icons/stats_health.png" alt=""></td>
          <td class="tcell">100 % Gesundheit</td>
        </tr>

        <tr><td class="tsub" colspan="8" style="text-align:center;">Genug gesehen? Werde jetzt Teil der Familie!</td></tr>
        <tr>
          <td colspan="8" style="text-align:center; padding:14px;">
            <a href="<?= BASE_URL; ?>register" style="display:inline-block; background:#c0392b; color:#fff; padding:12px 30px; border-radius:6px; text-decoration:none; font-weight:bold; font-size:15px;">Jetzt kostenlos registrieren &raquo;</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
