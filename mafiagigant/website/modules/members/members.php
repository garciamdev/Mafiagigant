<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }


	$text['en']['page_title'] = 'Members';
	$text['en']['order_at'] = 'Sort members by:';
	$text['en']['order_power'] = 'strength';
	$text['en']['order_join'] = 'Join date';
	$text['en']['order_rank'] = 'Rank';
	$text['en']['table_username'] = 'Username';
	$text['en']['table_family'] = 'Family';
	$text['en']['table_join'] = 'Member since';
	$text['en']['table_power'] = 'Strength';
	$text['en']['table_rank'] = 'Rank';
	$text['en']['table_options'] = 'Options';
	
	
	$text['nl']['page_title'] = 'leden';
$text['nl']['order_at'] = 'Sorteer online leden op:';
$text['nl']['order_power'] = 'Power';
$text['nl']['order_join'] = 'Aanmeldingsdatum';
$text['nl']['order_rank'] = 'Rang';
$text['nl']['table_username'] = 'Gebruikersnaam';
$text['nl']['table_family'] = 'Familie';
$text['nl']['table_join'] = 'Lid sinds';
$text['nl']['table_power'] = 'Power';
$text['nl']['table_rank'] = 'Rang';
$text['nl']['table_options'] = 'Opties';
	
	$text['de']['page_title'] = 'Mitglieder';
$text['de']['order_at'] = 'Mitglieder sortieren nach:';
$text['de']['order_power'] = 'Stärke';
$text['de']['order_join'] = 'Beitrittsdatum';
$text['de']['order_rank'] = 'Rang';
$text['de']['table_username'] = 'Benutzername';
$text['de']['table_family'] = 'Familie';
$text['de']['table_join'] = 'Mitglied seit';
$text['de']['table_power'] = 'Stärke';
$text['de']['table_rank'] = 'Rang';
$text['de']['table_options'] = 'Optionen';

$text['es']['page_title'] = 'Miembros';
$text['es']['order_at'] = 'Ordenar miembros por:';
$text['es']['order_power'] = 'Fuerza';
$text['es']['order_join'] = 'Fecha de ingreso';
$text['es']['order_rank'] = 'Rango';
$text['es']['table_username'] = 'Nombre de usuario';
$text['es']['table_family'] = 'Familia';
$text['es']['table_join'] = 'Miembro desde';
$text['es']['table_power'] = 'Fuerza';
$text['es']['table_rank'] = 'Rango';
$text['es']['table_options'] = 'Opciones';

$text['pt']['page_title'] = 'Membros';
$text['pt']['order_at'] = 'Ordenar membros por:';
$text['pt']['order_power'] = 'Força';
$text['pt']['order_join'] = 'Data de entrada';
$text['pt']['order_rank'] = 'Rank';
$text['pt']['table_username'] = 'Nome de usuário';
$text['pt']['table_family'] = 'Família';
$text['pt']['table_join'] = 'Membro desde';
$text['pt']['table_power'] = 'Força';
$text['pt']['table_rank'] = 'Rank';
$text['pt']['table_options'] = 'Opções';

$text['fr']['page_title'] = 'Membres';
$text['fr']['order_at'] = 'Trier les membres par :';
$text['fr']['order_power'] = 'Puissance';
$text['fr']['order_join'] = 'Date d\'adhésion';
$text['fr']['order_rank'] = 'Classement';
$text['fr']['table_username'] = 'Nom d\'utilisateur';
$text['fr']['table_family'] = 'Famille';
$text['fr']['table_join'] = 'Membre depuis';
$text['fr']['table_power'] = 'Puissance';
$text['fr']['table_rank'] = 'Classement';
$text['fr']['table_options'] = 'Options';

$text['cs']['page_title'] = 'Členové';
$text['cs']['order_at'] = 'Řadit členy podle:';
$text['cs']['order_power'] = 'Síla';
$text['cs']['order_join'] = 'Datum připojení';
$text['cs']['order_rank'] = 'Pořadí';
$text['cs']['table_username'] = 'Uživatelské jméno';
$text['cs']['table_family'] = 'Rodina';
$text['cs']['table_join'] = 'Členem od';
$text['cs']['table_power'] = 'Síla';
$text['cs']['table_rank'] = 'Pořadí';
$text['cs']['table_options'] = 'Možnosti';


	
	

   if (isset($var) && $var !="") {
    	$page_no = $var;
    } else {
        $page_no = 1;
     } 
     
      
$total_records_per_page = 25;
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";


$sql = "SELECT * FROM users " ;
$db->query($sql)->execute() ;
$totalincategory = $db->affected_rows;
$total_no_of_pages = ceil($totalincategory / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1

 
 
	$text['en']['page_title'] = 'Members online';
	$text['en']['order_at'] = 'Sort online members by:';
	$text['en']['order_power'] = 'strength';
	$text['en']['order_join'] = 'Join date';
	$text['en']['order_rank'] = 'Rank';
	$text['en']['table_username'] = 'Username';
	$text['en']['table_family'] = 'Family';
	$text['en']['table_join'] = 'Member since';
	$text['en']['table_power'] = 'Strength';
	$text['en']['table_rank'] = 'rank';
	

$sort = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$sort = isset($_POST['sort_members']) ? $_POST['sort_members'] : '';
	
}
	if($sort == 2){ $sort = 'join'; 
		            $qo = "SELECT  * FROM users  order by signup_date desc LIMIT ". $offset .", ". $total_records_per_page."  ";
	} elseif ($sort == 1) { 
		$sort = 'rank'; 
		            $qo = "SELECT  * FROM users  order by xp desc LIMIT ". $offset .", ". $total_records_per_page."  ";
	}else{ $sort = 'power'; 
		            $qo = "SELECT  * FROM users   order by (att_power + deff_power) desc LIMIT ". $offset .", ". $total_records_per_page."  ";
	}
		
	            
	            
	            
	            $fo = $db->query($qo)->fetch();




function pagination($var1,$var2,$totalpages,$total_records_per_page){
$pageniation = '';

   //$total_records_per_page = 2;
     
   if (isset($var2) && $var2 !="") {
    	$page_no = $var2;
    } else {
        $page_no = 1;
     }

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";




		$total_no_of_pages = ceil($totalpages / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1
		


$pageniation .=' <table class="content_table"><tbody><tr class="pagination">
<td width="55%">&nbsp;</td>';

	 // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } 
  
  	if($page_no <= 1){$class = "class='disabled page-item'"; }else{ $class = ""; }
	$pageniation .=' <td class="tcell" align="center" width="5%" $class> ';
	if($page_no > 1){ $url = "href='/".$var1."/".$previous_page."/'"; }else{ $url = "";}
	$pageniation .=" <a  class='page-link' $url >Previous</a> ";
	$pageniation .=" </td>";
    
    
     
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		  $pageniation .= "<td   class='active tcell'><a class='page-link'>$counter</a></td>";	
				}else{
          $pageniation .= "<td class='tcell' ><a class='page-link' href='/".$var1."/".$counter."/'>$counter</a></td>";
				}
        }
	}
	elseif($total_no_of_pages > 10){


		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   $pageniation .= "<td class='active tcell'><a>$counter</a></td>";	
				}else{
           $pageniation .= "<td  class='tcell' ><a class='page-link' href='/".$var1."/".$counter."/'>$counter</a></td>";
				}
        }
		$pageniation .= "<td  class='tcell ><a>...</a></td>";
		$pageniation .= "<td  class='tcell' ><a class='page-link' href='/".$var1."/".$second_last."/'>$second_last</a></td>";
		$pageniation .= "<td  class='tcell' ><a class='page-link' href='/".$var1."/".$total_no_of_pages."/'>$total_no_of_pages</a></td>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		$pageniation .= "<td  class='tcell' ><a class='page-link' href='/".$var1."/1/'>1</a></td>";
		$pageniation .= "<td  class='tcell' ><a class='page-link' href='/".$var1."/2/'>2</a></td>";
        $pageniation .= "<td  class='tcell' ><a>...</a></td>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   $pageniation .= "<td class='tcell active'><a>$counter</a></td>";	
				}else{
           $pageniation .= "<td  class='tcell' ><a class='page-link' href='/".$var1."/".$counter."/'>$counter</a></td>";
				}                  
       }
       $pageniation .= "<td  class='page-item' ><a>...</a></td>";
	   $pageniation .= "<td  class='page-item' ><a class='page-link' href='/".$var1."/".$second_last."/'>$second_last</a></td>";
	   $pageniation .= "<td  class='page-item' ><a class='page-link' href='/".$var1."/".$total_no_of_pages."/'>$total_no_of_pages</a></td>";      
            }
		
		else {
        $pageniation .= "<td  class='page-item' ><a class='page-link' href='/".$var1."/1/'>1</a></td>";
		$pageniation .= "<td  class='page-item' ><a class='page-link' href='/".$var1."/2/'>2</a></td>";
        $pageniation .= "<td  class='page-item' ><a>...</a></td>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   $pageniation .= "<td class='active page-item'><a class='page-link'>$counter</a></td>";	
				}else{
           $pageniation .= "<td  class='page-item' ><a class='page-link' href='/".$var1."/".$counter."/'>$counter</a></td>";
				}                   
                }
            }
	}
    
    
  	if($page_no >= $total_no_of_pages){$class = "class='disabled'"; }else{ $class = ""; }
	$pageniation .= "<td  $class>";
	
	if($page_no < $total_no_of_pages) { $url = "href='/".$var1."/".$next_page."/'"; }else{ $url = "";}
	$pageniation .= "<a class='tcell' $url >Next</a>";
	$pageniation .= "</td>";
   if($page_no < $total_no_of_pages){
		$pageniation .= "<td><a class='page-link' href='/".$var1."/".$total_no_of_pages."/'>Last &rsaquo;&rsaquo;</a></td>";
		} 
		

	$pageniation .=" </tr></tbody></table>";




return $pageniation;
}
?>
<!--
<table class="content_table"><tbody><tr class="pagination">
<td width="55%">&nbsp;</td>
<td class="tsell" align="center" width="5%">1</td>
<td class="tcell" align="center" width="5%"><a href="members/page/2">2</a></td>
<td class="tcell" align="center" width="5%"><a href="members/page/3">3</a></td>
<td class="tcell" align="center" width="5%"><a href="members/page/4">4</a></td>
<td class="tcell" align="center" width="5%"><a href="members/page/5">5</a></td>
<td class="tcell" align="center" width="5%"><a href="members/page/6">6</a></td>
<td class="tcell" align="center" width="5%"><a href="members/page/7">7</a></td>
<td class="tcell" align="center" width="5%">…</td>
<td class="tcell" align="center" width="5%"><a href="members/page/129">129</a></td>
</tr></tbody></table> -->

