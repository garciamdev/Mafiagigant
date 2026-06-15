<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }




$text['nl']['bank_account'] = 'Kluis';
$text['nl']['welcome_to_bank'] = 'Welkom bij de Kluis!';
$text['nl']['deposit_withdraw_info'] = "Hier kunt u geld storten/opnemen van/naar uw kluis. U kunt het geld in de kluis niet gebruiken voor aankopen, dus u moet eerst contant geld opnemen. Het geld in uw kluis is altijd veilig, zelfs in geval van uw overlijden!";
$text['nl']['cash'] = 'Contant geld';
$text['nl']['bank_account'] = 'Kluis';
$text['nl']['deposit_withdraw'] = 'Storten / Opnemen';
$text['nl']['deposit'] = 'Storten';
$text['nl']['withdraw'] = 'Opnemen';
$text['nl']['table_cash'] = 'Contant geld';
$text['nl']['table_cash'] = 'Kluis';
$text['nl']['error_deposit_tomuch'] = "U heeft niet zoveel geld!";
$text['nl']['deposit_success'] = "U heeft € {amount} gestort!";
$text['nl']['error_withdraw_tomuch'] = "U heeft niet zoveel geld!";
$text['nl']['withdraw_success'] = "U heeft € {amount} opgenomen!";
$text['nl']['error_number'] = "Alleen positieve getallen zijn toegestaan!";
$text['nl']['no_safe'] = "Je hebt nog geen kluis! Je kan deze <a href='/exchange-office'>hier kopen</a>";

$text['en']['bank_account'] = 'Safe';
$text['en']['welcome_to_bank'] = 'Welcome to the Safe!';
$text['en']['deposit_withdraw_info'] = "Here you can deposit/withdraw money to/from your safe. You can't use the money in the safe for purchases, so you have to withdraw cash first. The money in your safe is always secure, even in the event of your death!";
$text['en']['cash'] = 'Cash';
$text['en']['deposit_withdraw'] = 'Deposit / Withdraw';
$text['en']['deposit'] = 'Deposit';
$text['en']['withdraw'] = 'Withdraw';
$text['en']['table_cash'] = 'Cash';
$text['en']['table_cash'] = 'Safe';
$text['en']['error_deposit_tomuch'] = "You don't have that much money!";
$text['en']['deposit_success'] = "You have deposited €{amount}!";
$text['en']['error_withdraw_tomuch'] = "You don't have that much money!";
$text['en']['withdraw_success'] = "You have withdrawn €{amount}!";
$text['en']['error_number'] = "Only positive numbers are allowed!";
$text['en']['no_safe'] = "You don't have a safe yet! You can buy one <a href='/exchange-office'>here</a>";

$text['de']['bank_account'] = 'Tresor';
$text['de']['welcome_to_bank'] = 'Willkommen im Tresor!';
$text['de']['deposit_withdraw_info'] = "Hier können Sie Geld in Ihren Tresor einzahlen/abheben. Sie können das Geld im Tresor nicht für Einkäufe verwenden, daher müssen Sie zuerst Bargeld abheben. Das Geld in Ihrem Tresor ist immer sicher, selbst im Todesfall!";
$text['de']['cash'] = 'Bargeld';
$text['de']['deposit_withdraw'] = 'Einzahlen / Abheben';
$text['de']['deposit'] = 'Einzahlen';
$text['de']['withdraw'] = 'Abheben';
$text['de']['table_cash'] = 'Bargeld';
$text['de']['table_cash'] = 'Tresor';
$text['de']['error_deposit_tomuch'] = "Sie haben nicht so viel Geld!";
$text['de']['deposit_success'] = "Sie haben €{amount} eingezahlt!";
$text['de']['error_withdraw_tomuch'] = "Sie haben nicht so viel Geld!";
$text['de']['withdraw_success'] = "Sie haben €{amount} abgehoben!";
$text['de']['error_number'] = "Nur positive Zahlen sind erlaubt!";
$text['de']['no_safe'] = "Sie haben noch keinen Tresor! Sie können einen <a href='/exchange-office'>hier</a> kaufen";

$text['es']['bank_account'] = 'Caja de seguridad';
$text['es']['welcome_to_bank'] = '¡Bienvenido a la Caja de seguridad!';
$text['es']['deposit_withdraw_info'] = "Aquí puedes depositar/retirar dinero en/desde tu caja de seguridad. No puedes usar el dinero de la caja de seguridad para compras, así que primero debes retirar efectivo. El dinero en tu caja de seguridad siempre está seguro, incluso en caso de tu fallecimiento.";
$text['es']['cash'] = 'Efectivo';
$text['es']['deposit_withdraw'] = 'Depositar / Retirar';
$text['es']['deposit'] = 'Depositar';
$text['es']['withdraw'] = 'Retirar';
$text['es']['table_cash'] = 'Efectivo';
$text['es']['table_cash'] = 'Caja de seguridad';
$text['es']['error_deposit_tomuch'] = "No tienes tanto dinero.";
$text['es']['deposit_success'] = "Has depositado €{amount}.";
$text['es']['error_withdraw_tomuch'] = "No tienes tanto dinero.";
$text['es']['withdraw_success'] = "Has retirado €{amount}.";
$text['es']['error_number'] = "Solo se permiten números positivos.";
$text['es']['no_safe'] = "Aún no tienes una caja de seguridad. Puedes comprar una <a href='/exchange-office'>aquí</a>.";

$text['pt']['bank_account'] = 'Cofre';
$text['pt']['welcome_to_bank'] = 'Bem-vindo ao Cofre!';
$text['pt']['deposit_withdraw_info'] = "Aqui você pode depositar/sacar dinheiro para/do seu cofre. Você não pode usar o dinheiro no cofre para compras, portanto, deve sacar dinheiro em espécie primeiro. O dinheiro no seu cofre está sempre seguro, mesmo em caso de falecimento.";
$text['pt']['cash'] = 'Dinheiro em espécie';
$text['pt']['deposit_withdraw'] = 'Depositar / Sacar';
$text['pt']['deposit'] = 'Depositar';
$text['pt']['withdraw'] = 'Sacar';
$text['pt']['table_cash'] = 'Dinheiro em espécie';
$text['pt']['table_cash'] = 'Cofre';
$text['pt']['error_deposit_tomuch'] = "Você não tem tanto dinheiro!";
$text['pt']['deposit_success'] = "Você depositou €{amount}!";
$text['pt']['error_withdraw_tomuch'] = "Você não tem tanto dinheiro!";
$text['pt']['withdraw_success'] = "Você sacou €{amount}!";
$text['pt']['error_number'] = "Apenas números positivos são permitidos!";
$text['pt']['no_safe'] = "Você ainda não possui um cofre! Você pode comprar um <a href='/exchange-office'>aqui</a>.";


$text['fr']['bank_account'] = 'Coffre-fort';
$text['fr']['welcome_to_bank'] = 'Bienvenue dans le Coffre-fort !';
$text['fr']['deposit_withdraw_info'] = "Vous pouvez déposer/retirer de l'argent dans/depuis votre coffre-fort ici. Vous ne pouvez pas utiliser l'argent dans le coffre-fort pour des achats, vous devez donc d'abord retirer de l'argent liquide. L'argent dans votre coffre-fort est toujours en sécurité, même en cas de décès.";
$text['fr']['cash'] = 'Argent liquide';
$text['fr']['deposit_withdraw'] = 'Déposer / Retirer';
$text['fr']['deposit'] = 'Déposer';
$text['fr']['withdraw'] = 'Retirer';
$text['fr']['table_cash'] = 'Argent liquide';
$text['fr']['table_cash'] = 'Coffre-fort';
$text['fr']['error_deposit_tomuch'] = "Vous n'avez pas autant d'argent !";
$text['fr']['deposit_success'] = "Vous avez déposé €{amount} !";
$text['fr']['error_withdraw_tomuch'] = "Vous n'avez pas autant d'argent !";
$text['fr']['withdraw_success'] = "Vous avez retiré €{amount} !";
$text['fr']['error_number'] = "Seuls les nombres positifs sont autorisés !";
$text['fr']['no_safe'] = "Vous n'avez pas encore de coffre-fort ! Vous pouvez en acheter un <a href='/exchange-office'>ici</a>.";



$text['cs']['bank_account'] = 'Treasure';
$text['cs']['welcome_to_bank'] = 'Vítejte v Treasure!';
$text['cs']['deposit_withdraw_info'] = "Zde můžete vkládat/vyplácet peníze do/z vaší Treasure. Peníze v Treasure nemůžete použít k nákupům, takže musíte nejprve vybrat hotovost. Peníze ve vaší Treasure jsou vždy v bezpečí, dokonce i v případě vašeho úmrtí!";
$text['cs']['cash'] = 'Hotovost';
$text['cs']['deposit_withdraw'] = 'Vklad / Výběr';
$text['cs']['deposit'] = 'Vklad';
$text['cs']['withdraw'] = 'Výběr';
$text['cs']['table_cash'] = 'Hotovost';
$text['cs']['table_cash'] = 'Treasure';
$text['cs']['error_deposit_tomuch'] = "Nemáte tolik peněz!";
$text['cs']['deposit_success'] = "Vložili jste €{amount}!";
$text['cs']['error_withdraw_tomuch'] = "Nemáte tolik peněz!";
$text['cs']['withdraw_success'] = "Vybrali jste €{amount}!";
$text['cs']['error_number'] = "Povoleny jsou pouze kladné čísla!";
$text['cs']['no_safe'] = "Zatím nemáte Treasure! Můžete si ji koupit <a href='/exchange-office'>zde</a>!";


 if($userdata[0]['safeactive'] == 0){
 
				$errors[] = $text[$lang]['no_safe'];
 }
		 
if($_SERVER['REQUEST_METHOD'] === 'POST')
{		
if($_POST['amount'] > 0 AND is_numeric($_POST['amount']) AND ctype_digit($_POST['amount']) ){

	$amount = $db->escape($_POST['amount']);
	
	

  	$qu = "SELECT * FROM users where id = '".$userdata[0]['id']."' ";
	$fu = $db->query($qu)->fetch();
	

		if(isset($_POST['deposit'])){		
			if($fu[0]['cash'] >= $_POST['amount']){
				//goed
				//$connect->query("UPDATE gebruikers SET bankgeld = '".$gebruiker['bankgeld']."'+'".$_POST['amount']."',cash = '".$gebruiker['cash']."'-'".$_POST['amount']."' WHERE id = '".$gebruiker['id']."'");
				//$connect->query("INSERT INTO transacties(gebruiker_id,omschrijving,bedrag,datum,status,pagina,logtype) VALUES('".$gebruiker['id']."','storting door <a href=\'\'>".$gebruiker['gebruikersnaam']."</a>','".$_POST['amount']."','".time()."','withdraw','bank','cashtransactie')");
				//$connect->query("INSERT INTO transacties(gebruiker_id,omschrijving,bedrag,datum,status,pagina,logtype) VALUES('".$gebruiker['id']."','storting door <a href=\'\'>".$gebruiker['gebruikersnaam']."</a>','".$_POST['amount']."','".time()."','deposit','bank','banktransactie')");
				//$user = $connect->query("SELECT * FROM gebruikers WHERE id = '".$gebruiker['id']."'");
				//$gebruiker = mysqli_fetch_array($user);		
				//$alert = alertsucces('&euro;'.$postgeld.' '.$txt['success_deposit']);
				
				
				

			$user = array(
                'cash' => ($fu[0]['cash'] - $amount),
                'safe' => ($fu[0]['safe'] + $amount),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			
				$success[] = txt($text[$lang]['deposit_success'],'{amount}',number($_POST['amount']));
			}else{
			
				$errors[] = $text[$lang]['error_deposit_tomuch'];
			}

		}
		if(isset($_POST['withdraw'])){			
		
			if($fu[0]['safe'] >= $_POST['amount']){
				//goed
				//$connect->query("UPDATE gebruikers SET bankgeld = '".$gebruiker['bankgeld']."'-'".$_POST['amount']."',cash = '".$gebruiker['cash']."'+'".$_POST['amount']."' WHERE id = '".$gebruiker['id']."'");
				//$connect->query("INSERT INTO transacties(gebruiker_id,omschrijving,bedrag,datum,status,pagina,logtype) VALUES('".$gebruiker['id']."','opname door <a href=\'\'>".$gebruiker['gebruikersnaam']."</a>','".$_POST['amount']."','".time()."','deposit','bank','cashtransactie')");				
				//$connect->query("INSERT INTO transacties(gebruiker_id,omschrijving,bedrag,datum,status,pagina,logtype) VALUES('".$gebruiker['id']."','opname door <a href=\'\'>".$gebruiker['gebruikersnaam']."</a>','".$_POST['amount']."','".time()."','withdraw','bank','banktransactie')");				
			
			
			$user = array(
                'cash' => ($fu[0]['cash'] + $amount),
                'safe' => ($fu[0]['safe'] - $amount),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
				$success[] = txt($text[$lang]['withdraw_success'],'{amount}',number($_POST['amount']));
			}else{
				$errors[] = $text[$lang]['error_withdraw_tomuch'];
			}
		}  

	}else{
	
				$errors[] = $text[$lang]['error_number'];
	
	}
}	
		
