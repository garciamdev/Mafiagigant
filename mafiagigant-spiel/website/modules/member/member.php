<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }


    $text['nl']['username'] = 'Gebruikersnaam';
    $text['nl']['attack'] = 'Aanvallen';
    $text['nl']['boks'] = 'Bokswedstrijden';
    $text['nl']['message'] = 'Bericht versturen';
	$text['nl']['respect_plus'] = 'Respect +';
	$text['nl']['health'] = 'Gezondheid';
    $text['nl']['power'] = 'Power';
    $text['nl']['country'] = 'Land';
    $text['nl']['country_hide'] = 'Verborgen';
    $text['nl']['married'] = 'Getrouwd met';
    $text['nl']['married_no'] = 'Geen partner';
    $text['nl']['cash'] = 'Geld (contant)';
    $text['nl']['bank'] = 'Geld (bank)';
    $text['nl']['signup'] = 'Lid sinds';
    $text['nl']['married'] = 'Getrouwd met';
    $text['nl']['married_no'] = 'Geen partner';
    $text['nl']['cash'] = 'Geld (contant)';
    $text['nl']['bank'] = 'Geld (bank)';
    $text['nl']['signup'] = 'Lid sinds';
        
    $text['nl']['family'] = 'Familie';
    $text['nl']['family_no'] = 'Geen familie';
    $text['nl']['lastonline'] = 'Laatst online';
    $text['nl']['gender'] = 'Geslacht';
    $text['nl']['att_win'] = 'Attacks gewonnen';
    $text['nl']['att_lost'] = 'Attacks verloren';
    $text['nl']['killed'] = 'Aantal vermoord';
    $text['nl']['rank'] = 'Rank';
    $text['nl']['respect'] = 'Respectpunten';
    $text['nl']['protection'] = 'Bescherming';
    $text['nl']['missions'] = 'Voltooide missies';
    $text['nl']['holiday'] = 'Vakantie';
    $text['nl']['profile'] = 'Persoonlijke tekst';
   
   
    $text['en']['username'] = 'Username';
	$text['en']['attack'] = 'Attack';
$text['en']['boks'] = 'Boxing Matches';
$text['en']['message'] = 'Send Message';
$text['en']['respect_plus'] = 'Respect +';
$text['en']['health'] = 'Health';
$text['en']['power'] = 'Power';
$text['en']['country'] = 'Country';
$text['en']['country_hide'] = 'Hidden';
$text['en']['married'] = 'Married to';
$text['en']['married_no'] = 'No partner';
$text['en']['cash'] = 'Cash';
$text['en']['bank'] = 'Bank';
$text['en']['signup'] = 'Member since';
$text['en']['family'] = 'Family';
$text['en']['family_no'] = 'No family';
$text['en']['lastonline'] = 'Last online';
$text['en']['gender'] = 'Gender';
$text['en']['att_win'] = 'Attacks won';
$text['en']['att_lost'] = 'Attacks lost';
$text['en']['killed'] = 'Number killed';
$text['en']['rank'] = 'Rank';
$text['en']['respect'] = 'Respect Points';
$text['en']['protection'] = 'Protection';
$text['en']['missions'] = 'Completed missions';
$text['en']['holiday'] = 'Holiday';
$text['en']['profile'] = 'Personal text';




// German
$text['de']['username'] = 'Benutzername';
$text['de']['attack'] = 'Angriff';
$text['de']['boks'] = 'Boxkämpfe';
$text['de']['message'] = 'Nachricht senden';
$text['de']['respect_plus'] = 'Respekt +';
$text['de']['health'] = 'Gesundheit';
$text['de']['power'] = 'Kraft';
$text['de']['country'] = 'Land';
$text['de']['country_hide'] = 'Versteckt';
$text['de']['married'] = 'Verheiratet mit';
$text['de']['married_no'] = 'Kein Partner';
$text['de']['cash'] = 'Geld';
$text['de']['bank'] = 'Bank';
$text['de']['signup'] = 'Mitglied seit';
$text['de']['family'] = 'Familie';
$text['de']['family_no'] = 'Keine Familie';
$text['de']['lastonline'] = 'Zuletzt online';
$text['de']['gender'] = 'Geschlecht';
$text['de']['att_win'] = 'Gewonnene Angriffe';
$text['de']['att_lost'] = 'Verlorene Angriffe';
$text['de']['killed'] = 'Getötete';
$text['de']['rank'] = 'Rang';
$text['de']['respect'] = 'Respekt-Punkte';
$text['de']['protection'] = 'Schutz';
$text['de']['missions'] = 'Abgeschlossene Missionen';
$text['de']['holiday'] = 'Urlaub';
$text['de']['profile'] = 'Persönlicher Text';

// Spanish
$text['es']['username'] = 'Nombre de usuario';
$text['es']['attack'] = 'Ataque';
$text['es']['boks'] = 'Combates de boxeo';
$text['es']['message'] = 'Enviar mensaje';
$text['es']['respect_plus'] = 'Respeto +';
$text['es']['health'] = 'Salud';
$text['es']['power'] = 'Poder';
$text['es']['country'] = 'País';
$text['es']['country_hide'] = 'Oculto';
$text['es']['married'] = 'Casado con';
$text['es']['married_no'] = 'Sin pareja';
$text['es']['cash'] = 'Dinero en efectivo';
$text['es']['bank'] = 'Banco';
$text['es']['signup'] = 'Miembro desde';
$text['es']['family'] = 'Familia';
$text['es']['family_no'] = 'Sin familia';
$text['es']['lastonline'] = 'Última conexión';
$text['es']['gender'] = 'Género';
$text['es']['att_win'] = 'Ataques ganados';
$text['es']['att_lost'] = 'Ataques perdidos';
$text['es']['killed'] = 'Número de asesinatos';
$text['es']['rank'] = 'Rango';
$text['es']['respect'] = 'Puntos de respeto';
$text['es']['protection'] = 'Protección';
$text['es']['missions'] = 'Misiones completadas';
$text['es']['holiday'] = 'Vacaciones';
$text['es']['profile'] = 'Texto personal';

// Portuguese
$text['pt']['username'] = 'Nome de usuário';
$text['pt']['attack'] = 'Ataque';
$text['pt']['boks'] = 'Lutas de boxe';
$text['pt']['message'] = 'Enviar mensagem';
$text['pt']['respect_plus'] = 'Respeito +';
$text['pt']['health'] = 'Saúde';
$text['pt']['power'] = 'Poder';
$text['pt']['country'] = 'País';
$text['pt']['country_hide'] = 'Oculto';
$text['pt']['married'] = 'Casado com';
$text['pt']['married_no'] = 'Sem parceiro';
$text['pt']['cash'] = 'Dinheiro';
$text['pt']['bank'] = 'Banco';
$text['pt']['signup'] = 'Membro desde';
$text['pt']['family'] = 'Família';
$text['pt']['family_no'] = 'Sem família';
$text['pt']['lastonline'] = 'Último online';
$text['pt']['gender'] = 'Gênero';
$text['pt']['att_win'] = 'Ataques vencidos';
$text['pt']['att_lost'] = 'Ataques perdidos';
$text['pt']['killed'] = 'Nº de mortes';
$text['pt']['rank'] = 'Rank';
$text['pt']['respect'] = 'Pontos de respeito';
$text['pt']['protection'] = 'Proteção';
$text['pt']['missions'] = 'Missões completas';
$text['pt']['holiday'] = 'Férias';
$text['pt']['profile'] = 'Texto pessoal';

// French
$text['fr']['username'] = 'Nom d\'utilisateur';
$text['fr']['attack'] = 'Attaque';
$text['fr']['boks'] = 'Matchs de boxe';
$text['fr']['message'] = 'Envoyer un message';
$text['fr']['respect_plus'] = 'Respect +';
$text['fr']['health'] = 'Santé';
$text['fr']['power'] = 'Puissance';
$text['fr']['country'] = 'Pays';
$text['fr']['country_hide'] = 'Caché';
$text['fr']['married'] = 'Marié à';
$text['fr']['married_no'] = 'Pas de partenaire';
$text['fr']['cash'] = 'Argent';
$text['fr']['bank'] = 'Banque';
$text['fr']['signup'] = 'Membre depuis';
$text['fr']['family'] = 'Famille';
$text['fr']['family_no'] = 'Pas de famille';
$text['fr']['lastonline'] = 'Dernière connexion';
$text['fr']['gender'] = 'Genre';
$text['fr']['att_win'] = 'Attaques gagnées';
$text['fr']['att_lost'] = 'Attaques perdues';
$text['fr']['killed'] = 'Nombre de tués';
$text['fr']['rank'] = 'Classement';
$text['fr']['respect'] = 'Points de respect';
$text['fr']['protection'] = 'Protection';
$text['fr']['missions'] = 'Missions terminées';
$text['fr']['holiday'] = 'Vacances';
$text['fr']['profile'] = 'Texte personnel';

// Czech
$text['cs']['username'] = 'Uživatelské jméno';
$text['cs']['attack'] = 'Útok';
$text['cs']['boks'] = 'Boxovací zápasy';
$text['cs']['message'] = 'Odeslat zprávu';
$text['cs']['respect_plus'] = 'Respekt +';
$text['cs']['health'] = 'Zdraví';
$text['cs']['power'] = 'Síla';
$text['cs']['country'] = 'Země';
$text['cs']['country_hide'] = 'Skryto';
$text['cs']['married'] = 'Ženatý s';
$text['cs']['married_no'] = 'Bez partnera';
$text['cs']['cash'] = 'Hotovost';
$text['cs']['bank'] = 'Banka';
$text['cs']['signup'] = 'Členem od';
$text['cs']['family'] = 'Rodina';
$text['cs']['family_no'] = 'Žádná rodina';
$text['cs']['lastonline'] = 'Poslední přihlášení';
$text['cs']['gender'] = 'Pohlaví';
$text['cs']['att_win'] = 'Vítězství v útocích';
$text['cs']['att_lost'] = 'Prohry v útocích';
$text['cs']['killed'] = 'Počet zabitých';
$text['cs']['rank'] = 'Hodnost';
$text['cs']['respect'] = 'Body respektu';
$text['cs']['protection'] = 'Ochrana';
$text['cs']['missions'] = 'Dokončené mise';
$text['cs']['holiday'] = 'Dovolená';
$text['cs']['profile'] = 'Osobní text';

	



$qm = "SELECT  * FROM users where username = '".$var."' ";
$fm = $db->query($qm)->fetch();


				$count = $db->affected_rows;
				
		
