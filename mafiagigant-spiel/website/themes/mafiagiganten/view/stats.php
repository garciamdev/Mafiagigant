<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['statistics_title']; ?></h1>
    <p>
      <?= $text[$lang]['statistics_description']; ?>
    </p>
    
    <table class="wrap_table">
      <tbody>
        <tr>
          <td width="49%">
            <table class="content_table">
              <tbody>
                <tr>
                  <td colspan="3" class="tsub"><?= $text[$lang]['top_power']; ?></td>
                </tr>
                
                <?php
                foreach($fpower as $f){
                  if($f['power'] > 0){
                ?>
                <tr>
                  <td class="tcell" width="44%"><a href="member/<?= $f['username'];?>"><?= $f['username'];?></a></td>
                  <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_power.png"></td>
                  <td class="tcell" width="46%" align="center"><?= number($f['power']);?></td>
                </tr>
                <?php
                  }
                }	
                ?>
              </tbody>
            </table>
          </td>
          <td width="2%">&nbsp;</td>
          <td width="49%">
            <table class="content_table">
              <tbody>
                <tr>
                  <td colspan="3" class="tsub"><?= $text[$lang]['top_money']; ?></td>
                </tr>
                
                <?php
                foreach($fmoney as $f){
                  if($f['money'] > 0){
                ?>
                <tr>
                  <td class="tcell" width="44%"><a href="member/<?= $f['username'];?>"><?= $f['username'];?></a></td>
                  <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_money.png"></td>
                  <td class "tcell" width="46%" align="center"><?= number($f['money']);?></td>
                </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td width="49%">
            <table class="content_table">
              <tbody>
                <tr>
                  <td colspan="3" class="tsub"><?= $text[$lang]['top_box_power']; ?></td>
                </tr>
                <?php
                foreach($fbox as $f){
                  if($f['box_power'] > 0){
                ?>
                <tr>
                  <td class="tcell" width="44%"><a href="member/<?= $f['username'];?>"><?= $f['username'];?></a></td>
                  <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_boxing.png"></td>
                  <td class="tcell" width="46%" align="center"><?= number($f['box_power']);?></td>
                </tr>
                <?php
                  }
                }	
                ?>
              </tbody>
            </table>
          </td>
          <td width="2%">&nbsp;</td>
          <td width="49%">
            <table class="content_table">
              <tbody>
                <tr>
                  <td colspan="3" class="tsub"><?= $text[$lang]['top_rank']; ?></td>
                </tr>
                <?php
                foreach($frank as $f){
                  if($f['xp'] > 0){
                ?>
                <tr>
                  <td class="tcell" width="44%"><a href="member/<?= $f['username'];?>"><?= $f['username'];?></a></td>
                  <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_rank.png"></td>
                  <td class="tcell" width="46%" align="center"><?= rank($f['username']);?></td>
                </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td width="49%">
            <table class="content_table">
              <tbody>
                <tr>
                  <td colspan="3" class="tsub"><?= $text[$lang]['top_prostitutes']; ?></td>
                </tr>
                <?php
                foreach($fprostitutes as $f){
                  if($f['prostitutes'] > 0){
                ?>
                <tr>
                  <td class="tcell" width="44%"><a href="member/<?= $f['username'];?>"><?= $f['username'];?></a></td>
                  <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
                  <td class="tcell" width="46%" align="center"><?= number($f['prostitutes']);?></td>
                </tr>
                <?php
                  }
                }	
                ?>
              </tbody>
            </table>
          </td>
          <td width="2%">&nbsp;</td>
          <td width="49%">&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
