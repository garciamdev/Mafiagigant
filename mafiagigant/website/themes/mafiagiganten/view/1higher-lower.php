<div class="content_block">
    <form method="post">
        <div class="content_inner">
            <h1>Higher / Lower</h1>
            
                  
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
                Welcome to the casino game higher / lower!
            </p>
            <p>
                In this game, you have to guess whether the next number will be higher or lower than the number currently on the screen.
                If correct, you move to the next round. The further you get, the more you win!
            </p>

            <table class="wrap_table">
                <tr>
                    <td width="38%">
                        <table class="content_table">
                            <tr>
                                <td width="40%" class="tsub">Round</td>
                                <td width="10%" class="tsub">&nbsp;</td>
                                <td width="50%" class="tsub">Price</td>
                            </tr>
                            <?php for ($i = 1; $i <= count($price); $i++) { ?>
                                <tr>
                                    <td align="center" class="tcell"><?php echo $i; ?></td>
                                    <td align="center" class="tcell"><img src="/themes/img/icons/stats_cash.png"></td>
                                    <td align="center" class="tcell">€&nbsp;<?php echo number($price[$i - 1]); ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                    <td width="2%">&nbsp;</td>
                    <td width="60%" valign="top">
                        <table class="content_table">
                            <tr>
                                <td class="tsub">The number</td>
                            </tr>
                            <tr>
                                <td align="center" class="tcell">The current number is</td>
                            </tr>
                            <tr>
                                <td align="center" class="tcell"><span style="font-size: 160%; font-weight: bold; display: block; padding: 10px"><?= $hlgetal; ?></span></td>
                            </tr>
                        </table>
                        <table class="content_table">
                            <tr>
                                <td class="tsub">Higher or lower?</td>
                            </tr>
                            <tr>
                                <td align="center" class="tcell">The next number is...</td>
                            </tr>
                            <tr>
                                <td align="center" class="tcell">
                                        <input class="submit" type="submit" name="hi" value="Higher">
                                        Or
                                        <input class="submit" type="submit" name="lo" value="Lower">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>