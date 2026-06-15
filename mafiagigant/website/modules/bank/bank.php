<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }




$text['en']['bank_account'] = 'Bank account';
$text['en']['welcome_to_bank'] = 'Welcome to the bank!';
$text['en']['deposit_withdraw_info'] = 'Here you can deposit/withdraw cash to/from your bank account. You cannot spend money from the bank unless you withdraw it first .';
$text['en']['bank_transactions_left'] = 'Bank transactions left';
$text['en']['cash'] = 'Cash';
$text['en']['bank_account'] = 'Bank account';
$text['en']['deposit_withdraw'] = 'Deposit / Withdraw';
$text['en']['deposit'] = 'Deposit';
$text['en']['withdraw'] = 'Withdraw';
$text['en']['bank_account'] = 'Withdraw';
$text['en']['table_cash'] = 'Cash';
$text['en']['table_cash'] = 'Bank account';
$text['en']['error_deposit_tomuch'] = "You don't have that much money!";
$text['en']['deposit_success'] = "You deposited € {amount}!";
$text['en']['error_withdraw_tomuch'] = "You don't have that much money!";
$text['en']['withdraw_success'] = "You withdrawed € {amount}!";
$text['en']['error_number'] = "Only positive numbers are alowed!";

$text['nl']['bank_account'] = 'Bankrekening';
$text['nl']['welcome_to_bank'] = 'Welkom bij de bank!';
$text['nl']['deposit_withdraw_info'] = 'Hier kunt u geld storten/opnemen van uw bankrekening. U kunt geen geld uitgeven van de bank, tenzij u het eerst opneemt.';
$text['nl']['bank_transactions_left'] = 'Resterende banktransacties';
$text['nl']['cash'] = 'Contant geld';
$text['nl']['bank_account'] = 'Bankrekening';
$text['nl']['deposit_withdraw'] = 'Storten / Opnemen';
$text['nl']['deposit'] = 'Storten';
$text['nl']['withdraw'] = 'Opnemen';
$text['nl']['table_cash'] = 'Contant geld';
$text['nl']['table_cash'] = 'Bankrekening';
$text['nl']['error_deposit_tomuch'] = "U heeft niet zoveel geld!";
$text['nl']['deposit_success'] = "U heeft € {amount} gestort!";
$text['nl']['error_withdraw_tomuch'] = "U heeft niet zoveel geld!";
$text['nl']['withdraw_success'] = "U heeft € {amount} opgenomen!";
$text['nl']['error_number'] = "Alleen positieve getallen zijn toegestaan!";

$text['de']['bank_account'] = 'Bankkonto';
$text['de']['welcome_to_bank'] = 'Willkommen bei der Bank!';
$text['de']['deposit_withdraw_info'] = 'Hier können Sie Geld auf Ihr Bankkonto einzahlen oder abheben. Sie können kein Geld von der Bank ausgeben, es sei denn, Sie heben es zuerst ab.';
$text['de']['bank_transactions_left'] = 'Verbleibende Banktransaktionen';
$text['de']['cash'] = 'Bargeld';
$text['de']['deposit_withdraw'] = 'Einzahlen / Abheben';
$text['de']['deposit'] = 'Einzahlen';
$text['de']['withdraw'] = 'Abheben';
$text['de']['table_cash'] = 'Bargeld';
$text['de']['table_bank_account'] = 'Bankkonto';
$text['de']['error_deposit_too_much'] = 'Sie haben nicht so viel Geld!';
$text['de']['deposit_success'] = 'Sie haben € {amount} eingezahlt!';
$text['de']['error_withdraw_too_much'] = 'Sie haben nicht so viel Geld!';
$text['de']['withdraw_success'] = 'Sie haben € {amount} abgehoben!';
$text['de']['error_number'] = 'Nur positive Zahlen sind erlaubt!';


$text['es']['bank_account'] = 'Cuenta bancaria';
$text['es']['welcome_to_bank'] = '¡Bienvenido al banco!';
$text['es']['deposit_withdraw_info'] = 'Aquí puede depositar o retirar dinero en su cuenta bancaria. No puede gastar dinero del banco a menos que lo retire primero.';
$text['es']['bank_transactions_left'] = 'Transacciones bancarias restantes';
$text['es']['cash'] = 'Dinero en efectivo';
$text['es']['deposit_withdraw'] = 'Depositar / Retirar';
$text['es']['deposit'] = 'Depositar';
$text['es']['withdraw'] = 'Retirar';
$text['es']['table_cash'] = 'Dinero en efectivo';
$text['es']['table_bank_account'] = 'Cuenta bancaria';
$text['es']['error_deposit_too_much'] = '¡No tienes tanto dinero!';
$text['es']['deposit_success'] = '¡Depositaste € {amount}!';
$text['es']['error_withdraw_too_much'] = '¡No tienes tanto dinero!';
$text['es']['withdraw_success'] = '¡Retiraste € {amount}!';
$text['es']['error_number'] = '¡Solo se permiten números positivos!';

$text['pt']['bank_account'] = 'Conta bancária';
$text['pt']['welcome_to_bank'] = 'Bem-vindo ao banco!';
$text['pt']['deposit_withdraw_info'] = 'Aqui você pode depositar/retirar dinheiro de sua conta bancária. Você não pode gastar dinheiro do banco a menos que o retire primeiro.';
$text['pt']['bank_transactions_left'] = 'Transações bancárias restantes';
$text['pt']['cash'] = 'Dinheiro em espécie';
$text['pt']['deposit_withdraw'] = 'Depositar / Retirar';
$text['pt']['deposit'] = 'Depositar';
$text['pt']['withdraw'] = 'Retirar';
$text['pt']['table_cash'] = 'Dinheiro em espécie';
$text['pt']['table_bank_account'] = 'Conta bancária';
$text['pt']['error_deposit_too_much'] = 'Você não tem tanto dinheiro!';
$text['pt']['deposit_success'] = 'Você depositou € {amount}!';
$text['pt']['error_withdraw_too_much'] = 'Você não tem tanto dinheiro!';
$text['pt']['withdraw_success'] = 'Você retirou € {amount}!';
$text['pt']['error_number'] = 'Apenas números positivos são permitidos!';

$text['fr']['bank_account'] = 'Compte bancaire';
$text['fr']['welcome_to_bank'] = 'Bienvenue à la banque !';
$text['fr']['deposit_withdraw_info'] = "ci, vous pouvez déposer/retirer de l'argent sur votre compte bancaire. Vous ne pouvez pas dépenser de l'argent de la banque à moins de le retirer d'abord.";
$text['fr']['bank_transactions_left'] = 'Transactions bancaires restantes';
$text['fr']['cash'] = 'Argent liquide';
$text['fr']['deposit_withdraw'] = 'Déposer / Retirer';
$text['fr']['deposit'] = 'Déposer';
$text['fr']['withdraw'] = 'Retirer';
$text['fr']['table_cash'] = 'Argent liquide';
$text['fr']['table_bank_account'] = 'Compte bancaire';
$text['fr']['error_deposit_too_much'] = "Vous n'avez pas autant d'argent !";
$text['fr']['deposit_success'] = 'Vous avez déposé € {amount} !';
$text['fr']['error_withdraw_too_much'] = "Vous n'avez pas autant d'argent !";
$text['fr']['withdraw_success'] = 'Vous avez retiré € {amount} !';
$text['fr']['error_number'] = 'Seuls les nombres positifs sont autorisés !';


$text['cs']['bank_account'] = 'Bankovní účet';
$text['cs']['welcome_to_bank'] = 'Vítejte v bance!';
$text['cs']['deposit_withdraw_info'] = 'Zde můžete vkládat/vyplácet hotovost na svůj bankovní účet. Peníze z banky nemůžete utratit, pokud je nevyberete.';
$text['cs']['bank_transactions_left'] = 'Zbývající bankovní transakce';
$text['cs']['cash'] = 'Hotovost';
$text['cs']['deposit_withdraw'] = 'Vklad / Výběr';
$text['cs']['deposit'] = 'Vklad';
$text['cs']['withdraw'] = 'Výběr';
$text['cs']['table_cash'] = 'Hotovost';
$text['cs']['table_bank_account'] = 'Bankovní účet';
$text['cs']['error_deposit_too_much'] = 'Nemáte tolik peněz!';
$text['cs']['deposit_success'] = 'Vložili jste € {amount}!';
$text['cs']['error_withdraw_too_much'] = 'Nemáte tolik peněz!';
$text['cs']['withdraw_success'] = 'Vybrali jste € {amount}!';
$text['cs']['error_number'] = 'Povoleny jsou pouze kladné čísla!';



		
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
                'bank' => ($fu[0]['bank'] + $amount),
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
		
			if($fu[0]['bank'] >= $_POST['amount']){
				//goed
				//$connect->query("UPDATE gebruikers SET bankgeld = '".$gebruiker['bankgeld']."'-'".$_POST['amount']."',cash = '".$gebruiker['cash']."'+'".$_POST['amount']."' WHERE id = '".$gebruiker['id']."'");
				//$connect->query("INSERT INTO transacties(gebruiker_id,omschrijving,bedrag,datum,status,pagina,logtype) VALUES('".$gebruiker['id']."','opname door <a href=\'\'>".$gebruiker['gebruikersnaam']."</a>','".$_POST['amount']."','".time()."','deposit','bank','cashtransactie')");				
				//$connect->query("INSERT INTO transacties(gebruiker_id,omschrijving,bedrag,datum,status,pagina,logtype) VALUES('".$gebruiker['id']."','opname door <a href=\'\'>".$gebruiker['gebruikersnaam']."</a>','".$_POST['amount']."','".time()."','withdraw','bank','banktransactie')");				
			
			
			$user = array(
                'cash' => ($fu[0]['cash'] + $amount),
                'bank' => ($fu[0]['bank'] - $amount),
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
		
