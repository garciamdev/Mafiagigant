<?php


    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

$objectprice = 250;
$minprice = 50;
$maxprice = 250;

$owner = '';
$price = 100;

$q = "SELECT * FROM objects where object = 'jail' and country = '".$userdata[0]['country']."' ";
$o = $db->query($q)->fetch();
if($db->affected_rows > 0){
	
$owner = $o[0]['username'];
$price = $o[0]['price'];
$earnings = $o[0]['earnings'];
}
		



$text['nl']['page_title'] = "Gevangenis kopen";
$text['nl']['page_content'] = "Gevangenis in {country} is tekoop.";
$text['nl']['buy_text'] = "Koop gevangenis voor {amount} credits.";
$text['nl']['revenue_text'] = "Koop gevangenis voor {amount} credits.";
$text['nl']['text1'] = "Nadat je de gevangenis hebt gekocht, zul je alle inkomsten daaruit ontvangen!";
$text['nl']['text2'] = "Je bent de eigenaar voor altijd... tenzij je sterft.";
$text['nl']['purchase_button'] = "Betaal {amount} credits";
$text['nl']['page_title_prison'] = "Gevangenis";
$text['nl']['prison_country'] = "Gevangenis";
$text['nl']['inmates'] = "Gevangenen";
$text['nl']['page_title_prison_country'] = "Gevangenis in {country}";
$text['nl']['page_text_prison_country'] = "Deze pagina toont iedereen die momenteel een gevangene is in {land}.";
$text['nl']['page_text_prison_country_content'] = "Je kunt proberen iemand te helpen ontsnappen. Het succes van een ontsnapping hangt af van je rang en de rang van de gevangene.
Hoe hoger je rang, hoe gemakkelijker het is om iemand te helpen ontsnappen.
Hoe hoger de rang van de gevangene, hoe moeilijker het is om hem te helpen ontsnappen!";
$text['nl']['page_text_prison_country_content1'] = "Je hebt nog {breakoutpoints} uitbreekpunten over. Met een uitbreekpunt kun je gratis uit de gevangenis ontsnappen!
Als je geen lockpicks meer hebt, kun je jezelf vrijkopen voor € {amount} per seconde!";
$text['nl']['table_username'] = "Gebruikersnaam";
$text['nl']['table_family'] = "Familie";
$text['nl']['table_rank'] = "Rang";
$text['nl']['table_time'] = "Tijd";
$text['nl']['prison_empty'] = "De gevangenis is leeg!";
$text['nl']['no_user'] = "Je moet wel een gebruiker uitbreken";
$text['nl']['no_jail'] = "Deze gebruiker zit niet meer in de gevangenis";
$text['nl']['success_breakoutpoint'] = "Je bent vrijgelaten uit de gevangenis!";
$text['nl']['success_money'] = "Je hebt jezelf uitgekocht voor {amount}";
$text['nl']['no_cash'] = "Je hebt niet genoeg cash om je zelf uit te kopen!";
$text['nl']['go_jail'] = "Helaas is het uitbreken niet gelukt! Je gaat zelf de bak in!";
$text['nl']['breakout'] = "Je hebt {username} uitgebroken!";
$text['nl']['self_jail'] = "Je zit zelf in de gevangenis!";
$text['nl']['already_owner'] = "Dit object heeft al een eigenaar!";
$text['nl']['text1'] = "Na aankoop van de gevangenis ontvang je alle inkomsten ervan!";
$text['nl']['text2'] = "Je bent voor altijd de eigenaar... tenzij je sterft.";
$text['nl']['purchase_button'] = "Betaal {amount} credits";
$text['nl']['not_enough_credits'] = "Je hebt niet voldoende credits om dit object te kopen!";
$text['nl']['purchase_object'] = "Je hebt het object gekocht!";
$text['nl']['profit_jail'] = "Winst met deze gevangenis";
$text['nl']['save_setting'] = "Opslaan";
$text['nl']['settings'] = "Instellingen";
$text['nl']['buyoutprice'] = "Uitkoopprijs per seconde";
$text['nl']['minprice'] = "min. {minprice}";
$text['nl']['maxprice'] = "max. {maxprice}";
$text['nl']['cheating'] = 'Probeer je de boel op te lichten?';
$text['nl']['price_to_low'] = 'Minimale prijs per seconde is € {minprice}';
$text['nl']['price_to_high'] = 'Maximale prijs per seconde is € {maxprice}';
$text['nl']['price_changes'] = 'De prijs per seconde is nu € {price}';
$text['nl']['success_letfree'] = 'Je hebt {username} vrij gelaten!';
 
$text['en']['page_title'] = "Buy Prison";
$text['en']['page_content'] = "Prison in {country} is for sale.";
$text['en']['buy_text'] = "Buy prison for {amount} credits.";
$text['en']['revenue_text'] = "Buy prison for {amount} credits.";
$text['en']['text1'] = "After purchasing the prison, you will receive all the income from it!";
$text['en']['text2'] = "You are the owner forever... unless you die.";
$text['en']['purchase_button'] = "Pay {amount} credits";
$text['en']['page_title_prison'] = "Prison";
$text['en']['prison_country'] = "Prison";
$text['en']['inmates'] = "Inmates";
$text['en']['page_title_prison_country'] = "Prison in {country}";
$text['en']['page_text_prison_country'] = "This page displays everyone currently incarcerated in {country}.";
$text['en']['page_text_prison_country_content'] = "You can try to help someone escape. The success of an escape depends on your rank and the inmate's rank.
The higher your rank, the easier it is to help someone escape.
The higher the inmate's rank, the more difficult it is to assist them in escaping!";
$text['en']['page_text_prison_country_content1'] = "You have {breakoutpoints} breakout points left. A breakout point allows you to escape from prison for free!
If you run out of lockpicks, you can buy your freedom for € {amount} per second!";
$text['en']['table_username'] = "Username";
$text['en']['table_family'] = "Family";
$text['en']['table_rank'] = "Rank";
$text['en']['table_time'] = "Time";
$text['en']['prison_empty'] = "The prison is empty!";
$text['en']['no_user'] = "You must choose a user to break out.";
$text['en']['no_jail'] = "This user is no longer in jail.";
$text['en']['success_breakoutpoint'] = "You have been released from prison!";
$text['en']['success_money'] = "You have bought your way out for {amount}";
$text['en']['no_cash'] = "You don't have enough cash to buy your way out!";
$text['en']['go_jail'] = "Unfortunately, the breakout attempt failed! You're going to jail yourself!";
$text['en']['breakout'] = "You broke out {username}!";
$text['en']['self_jail'] = "You are in prison yourself!";
$text['en']['already_owner'] = "This object already has an owner!";
$text['en']['text1'] = "After purchasing the prison, you will receive all the income from it!";
$text['en']['text2'] = "You are the owner forever... unless you die.";
$text['en']['purchase_button'] = "Pay {amount} credits";
$text['en']['not_enough_credits'] = "You don't have enough credits to buy this object!";
$text['en']['purchase_object'] = "You have purchased the object!";
$text['en']['profit_jail'] = "Profit with this prison";
$text['en']['save_setting'] = "Save";
$text['en']['settings'] = "Settings";
$text['en']['buyoutprice'] = "Buyout price per second";
$text['en']['minprice'] = "min. {minprice}";
$text['en']['maxprice'] = "max. {maxprice}";
$text['en']['cheating'] = 'Are you trying to cheat?';
$text['en']['price_to_low'] = 'Minimum price per second is € {minprice}';
$text['en']['price_to_high'] = 'Maximum price per second is € {maxprice}';
$text['en']['price_changes'] = 'The price per second is now € {price}';
$text['en']['success_letfree'] = 'You have freed {username}!';


$text['de']['page_title'] = "Gefängnis kaufen";
$text['de']['page_content'] = "Gefängnis in {country} steht zum Verkauf.";
$text['de']['buy_text'] = "Kaufe das Gefängnis für {amount} Credits.";
$text['de']['revenue_text'] = "Kaufe das Gefängnis für {amount} Credits.";
$text['de']['text1'] = "Nach dem Kauf des Gefängnisses erhalten Sie alle Einnahmen daraus!";
$text['de']['text2'] = "Du bist der Eigentümer für immer... es sei denn, du stirbst.";
$text['de']['purchase_button'] = "Bezahle {amount} Credits";
$text['de']['page_title_prison'] = "Gefängnis";
$text['de']['prison_country'] = "Gefängnis";
$text['de']['inmates'] = "Insassen";
$text['de']['page_title_prison_country'] = "Gefängnis in {country}";
$text['de']['page_text_prison_country'] = "Diese Seite zeigt alle derzeit inhaftierten Personen in {land} an.";
$text['de']['page_text_prison_country_content'] = "Du kannst versuchen, jemandem bei der Flucht zu helfen. Der Erfolg einer Flucht hängt von deinem Rang und dem Rang des Insassen ab.
Je höher dein Rang, desto einfacher ist es, jemandem bei der Flucht zu helfen.
Je höher der Rang des Insassen, desto schwieriger ist es, ihm bei der Flucht zu helfen!";
$text['de']['page_text_prison_country_content1'] = "Du hast noch {breakoutpoints} Ausbruchspunkte übrig. Ein Ausbruchspunkt ermöglicht dir die kostenlose Flucht aus dem Gefängnis!
Wenn dir die Dietriche ausgehen, kannst du dich für € {amount} pro Sekunde freikaufen!";
$text['de']['table_username'] = "Benutzername";
$text['de']['table_family'] = "Familie";
$text['de']['table_rank'] = "Rang";
$text['de']['table_time'] = "Zeit";
$text['de']['prison_empty'] = "Das Gefängnis ist leer!";
$text['de']['no_user'] = "Du musst einen Benutzer auswählen, um auszubrechen.";
$text['de']['no_jail'] = "Dieser Benutzer sitzt nicht mehr im Gefängnis.";
$text['de']['success_breakoutpoint'] = "Du wurdest aus dem Gefängnis entlassen!";
$text['de']['success_money'] = "Du hast dich für {amount} freigekauft";
$text['de']['no_cash'] = "Du hast nicht genug Bargeld, um dich freizukaufen!";
$text['de']['go_jail'] = "Leider ist der Ausbruchversuch fehlgeschlagen! Du kommst selbst ins Gefängnis!";
$text['de']['breakout'] = "Du hast {username} befreit!";
$text['de']['self_jail'] = "Du bist selbst im Gefängnis!";
$text['de']['already_owner'] = "Dieses Objekt hat bereits einen Eigentümer!";
$text['de']['text1'] = "Nach dem Kauf des Gefängnisses erhalten Sie alle Einnahmen daraus!";
$text['de']['text2'] = "Du bist für immer der Eigentümer... es sei denn, du stirbst.";
$text['de']['purchase_button'] = "Bezahle {amount} Credits";
$text['de']['not_enough_credits'] = "Du hast nicht genug Credits, um dieses Objekt zu kaufen!";
$text['de']['purchase_object'] = "Du hast das Objekt gekauft!";
$text['de']['profit_jail'] = "Gewinn mit diesem Gefängnis";
$text['de']['save_setting'] = "Speichern";
$text['de']['settings'] = "Einstellungen";
$text['de']['buyoutprice'] = "Auskaufspreis pro Sekunde";
$text['de']['minprice'] = "mind. {minprice}";
$text['de']['maxprice'] = "max. {maxprice}";
$text['de']['cheating'] = 'Versuchst du zu betrügen?';
$text['de']['price_to_low'] = 'Der Mindestpreis pro Sekunde beträgt € {minprice}';
$text['de']['price_to_high'] = 'Der Höchstpreis pro Sekunde beträgt € {maxprice}';
$text['de']['price_changes'] = 'Der Preis pro Sekunde beträgt jetzt € {price}';
$text['de']['success_letfree'] = 'Du hast {username} befreit!';



$text['es']['page_title'] = "Comprar prisión";
$text['es']['page_content'] = "La prisión en {country} está en venta.";
$text['es']['buy_text'] = "Compra la prisión por {amount} créditos.";
$text['es']['revenue_text'] = "Compra la prisión por {amount} créditos.";
$text['es']['text1'] = "Después de comprar la prisión, recibirás todos los ingresos de ella.";
$text['es']['text2'] = "Eres el propietario para siempre... a menos que mueras.";
$text['es']['purchase_button'] = "Pagar {amount} créditos";
$text['es']['page_title_prison'] = "Prisión";
$text['es']['prison_country'] = "Prisión";
$text['es']['inmates'] = "Reclusos";
$text['es']['page_title_prison_country'] = "Prisión en {country}";
$text['es']['page_text_prison_country'] = "Esta página muestra a todos los actualmente encarcelados en {país}.";
$text['es']['page_text_prison_country_content'] = "Puedes intentar ayudar a alguien a escapar. El éxito de una fuga depende de tu rango y el rango del recluso.
Cuanto más alto sea tu rango, más fácil será ayudar a alguien a escapar.
Cuanto más alto sea el rango del recluso, más difícil será ayudarle a escapar.";
$text['es']['page_text_prison_country_content1'] = "Tienes {breakoutpoints} puntos de escape restantes. Un punto de escape te permite escapar de la prisión de forma gratuita.
Si te quedas sin ganzúas, puedes comprar tu libertad por € {amount} por segundo.";
$text['es']['table_username'] = "Nombre de usuario";
$text['es']['table_family'] = "Familia";
$text['es']['table_rank'] = "Rango";
$text['es']['table_time'] = "Tiempo";
$text['es']['prison_empty'] = "La prisión está vacía.";
$text['es']['no_user'] = "Debes elegir un usuario para liberar.";
$text['es']['no_jail'] = "Este usuario ya no está en la cárcel.";
$text['es']['success_breakoutpoint'] = "Has sido liberado de la prisión.";
$text['es']['success_money'] = "Te has comprado la libertad por {amount}";
$text['es']['no_cash'] = "No tienes suficiente efectivo para comprar tu libertad.";
$text['es']['go_jail'] = "¡Desafortunadamente, el intento de fuga falló! ¡Irás a la cárcel tú mismo!";
$text['es']['breakout'] = "¡Has liberado a {username}!";
$text['es']['self_jail'] = "¡Estás en la cárcel tú mismo!";
$text['es']['already_owner'] = "¡Este objeto ya tiene un propietario!";
$text['es']['text1'] = "Después de comprar la prisión, recibirás todos los ingresos de ella.";
$text['es']['text2'] = "Eres el propietario para siempre... a menos que mueras.";
$text['es']['purchase_button'] = "Pagar {amount} créditos";
$text['es']['not_enough_credits'] = "No tienes suficientes créditos para comprar este objeto.";
$text['es']['purchase_object'] = "Has comprado el objeto.";
$text['es']['profit_jail'] = "Beneficio con esta prisión";
$text['es']['save_setting'] = "Guardar";
$text['es']['settings'] = "Configuración";
$text['es']['buyoutprice'] = "Precio de compra por segundo";
$text['es']['minprice'] = "mín. {minprice}";
$text['es']['maxprice'] = "máx. {maxprice}";
$text['es']['cheating'] = '¿Estás intentando hacer trampas?';
$text['es']['price_to_low'] = 'El precio mínimo por segundo es € {minprice}';
$text['es']['price_to_high'] = 'El precio máximo por segundo es € {maxprice}';
$text['es']['price_changes'] = 'El precio por segundo ahora es € {price}';
$text['es']['success_letfree'] = 'Has liberado a {username}!';


$text['pt']['page_title'] = "Comprar Prisão";
$text['pt']['page_content'] = "A prisão em {country} está à venda.";
$text['pt']['buy_text'] = "Compre a prisão por {amount} créditos.";
$text['pt']['revenue_text'] = "Compre a prisão por {amount} créditos.";
$text['pt']['text1'] = "Após a compra da prisão, você receberá toda a renda dela!";
$text['pt']['text2'] = "Você é o proprietário para sempre... a menos que você morra.";
$text['pt']['purchase_button'] = "Pague {amount} créditos";
$text['pt']['page_title_prison'] = "Prisão";
$text['pt']['prison_country'] = "Prisão";
$text['pt']['inmates'] = "Reclusos";
$text['pt']['page_title_prison_country'] = "Prisão em {country}";
$text['pt']['page_text_prison_country'] = "Esta página exibe todas as pessoas atualmente detidas em {país}.";
$text['pt']['page_text_prison_country_content'] = "Você pode tentar ajudar alguém a escapar. O sucesso de uma fuga depende do seu posto e do posto do recluso.
Quanto mais alto for o seu posto, mais fácil é ajudar alguém a escapar.
Quanto mais alto for o posto do recluso, mais difícil é ajudá-lo a escapar!";
$text['pt']['page_text_prison_country_content1'] = "Você tem {breakoutpoints} pontos de fuga restantes. Um ponto de fuga permite que você escape da prisão gratuitamente!
Se ficar sem ganzuas, você pode comprar a sua liberdade por € {amount} por segundo.";
$text['pt']['table_username'] = "Nome de Usuário";
$text['pt']['table_family'] = "Família";
$text['pt']['table_rank'] = "Posto";
$text['pt']['table_time'] = "Tempo";
$text['pt']['prison_empty'] = "A prisão está vazia!";
$text['pt']['no_user'] = "Você deve escolher um usuário para libertar.";
$text['pt']['no_jail'] = "Este usuário não está mais na prisão.";
$text['pt']['success_breakoutpoint'] = "Você foi libertado da prisão!";
$text['pt']['success_money'] = "Você comprou sua liberdade por {amount}";
$text['pt']['no_cash'] = "Você não tem dinheiro suficiente para comprar sua liberdade!";
$text['pt']['go_jail'] = "Infelizmente, a tentativa de fuga falhou! Você vai para a prisão!";
$text['pt']['breakout'] = "Você libertou {username}!";
$text['pt']['self_jail'] = "Você está na prisão!";
$text['pt']['already_owner'] = "Este objeto já tem um proprietário!";
$text['pt']['text1'] = "Após a compra da prisão, você receberá toda a renda dela!";
$text['pt']['text2'] = "Você é o proprietário para sempre... a menos que você morra.";
$text['pt']['purchase_button'] = "Pague {amount} créditos";
$text['pt']['not_enough_credits'] = "Você não tem créditos suficientes para comprar este objeto!";
$text['pt']['purchase_object'] = "Você comprou o objeto!";
$text['pt']['profit_jail'] = "Lucro com esta prisão";
$text['pt']['save_setting'] = "Salvar";
$text['pt']['settings'] = "Configurações";
$text['pt']['buyoutprice'] = "Preço de Resgate por Segundo";
$text['pt']['minprice'] = "mín. {minprice}";
$text['pt']['maxprice'] = "máx. {maxprice}";
$text['pt']['cheating'] = 'Você está tentando trapacear?';
$text['pt']['price_to_low'] = 'O preço mínimo por segundo é de € {minprice}';
$text['pt']['price_to_high'] = 'O preço máximo por segundo é de € {maxprice}';
$text['pt']['price_changes'] = 'O preço por segundo agora é de € {price}';
$text['pt']['success_letfree'] = 'Você libertou {username}!';


$text['fr']['page_title'] = "Acheter la prison";
$text['fr']['page_content'] = "La prison en {country} est à vendre.";
$text['fr']['buy_text'] = "Achetez la prison pour {amount} crédits.";
$text['fr']['revenue_text'] = "Achetez la prison pour {amount} crédits.";
$text['fr']['text1'] = "Après l'achat de la prison, vous recevrez tous les revenus qui en découlent !";
$text['fr']['text2'] = "Vous êtes le propriétaire pour toujours... à moins que vous ne mouriez.";
$text['fr']['purchase_button'] = "Payez {amount} crédits";
$text['fr']['page_title_prison'] = "Prison";
$text['fr']['prison_country'] = "Prison";
$text['fr']['inmates'] = "Détenus";
$text['fr']['page_title_prison_country'] = "Prison en {country}";
$text['fr']['page_text_prison_country'] = "Cette page affiche actuellement tous les détenus en {pays}.";
$text['fr']['page_text_prison_country_content'] = "Vous pouvez essayer d'aider quelqu'un à s'évader. Le succès d'une évasion dépend de votre rang et du rang du détenu.
Plus votre rang est élevé, plus il est facile d'aider quelqu'un à s'évader.
Plus le rang du détenu est élevé, plus il est difficile de l'aider à s'évader !";
$text['fr']['page_text_prison_country_content1'] = "Il vous reste {breakoutpoints} points d'évasion. Un point d'évasion vous permet de vous échapper de la prison gratuitement !
Si vous manquez de crochets, vous pouvez acheter votre liberté pour € {amount} par seconde.";
$text['fr']['table_username'] = "Nom d'utilisateur";
$text['fr']['table_family'] = "Famille";
$text['fr']['table_rank'] = "Rang";
$text['fr']['table_time'] = "Temps";
$text['fr']['prison_empty'] = "La prison est vide !";
$text['fr']['no_user'] = "Vous devez choisir un utilisateur à libérer.";
$text['fr']['no_jail'] = "Cet utilisateur n'est plus en prison.";
$text['fr']['success_breakoutpoint'] = "Vous avez été libéré de prison !";
$text['fr']['success_money'] = "Vous avez acheté votre liberté pour {amount}";
$text['fr']['no_cash'] = "Vous n'avez pas assez d'argent pour acheter votre liberté !";
$text['fr']['go_jail'] = "Malheureusement, la tentative d'évasion a échoué ! Vous allez en prison vous-même !";
$text['fr']['breakout'] = "Vous avez libéré {username} !";
$text['fr']['self_jail'] = "Vous êtes en prison vous-même !";
$text['fr']['already_owner'] = "Cet objet a déjà un propriétaire !";
$text['fr']['text1'] = "Après l'achat de la prison, vous recevrez tous les revenus qui en découlent !";
$text['fr']['text2'] = "Vous êtes le propriétaire pour toujours... à moins que vous ne mouriez.";
$text['fr']['purchase_button'] = "Payez {amount} crédits";
$text['fr']['not_enough_credits'] = "Vous n'avez pas suffisamment de crédits pour acheter cet objet !";
$text['fr']['purchase_object'] = "Vous avez acheté l'objet !";
$text['fr']['profit_jail'] = "Profit avec cette prison";
$text['fr']['save_setting'] = "Enregistrer";
$text['fr']['settings'] = "Paramètres";
$text['fr']['buyoutprice'] = "Prix de rachat par seconde";
$text['fr']['minprice'] = "min. {minprice}";
$text['fr']['maxprice'] = "max. {maxprice}";
$text['fr']['cheating'] = 'Êtes-vous en train de tricher ?';
$text['fr']['price_to_low'] = 'Le prix minimum par seconde est de € {minprice}';
$text['fr']['price_to_high'] = 'Le prix maximum par seconde est de € {maxprice}';
$text['fr']['price_changes'] = 'Le prix par seconde est maintenant de € {price}';
$text['fr']['success_letfree'] = 'Vous avez libéré {username} !';

$text['cs']['page_title'] = "Koupit vězení";
$text['cs']['page_content'] = "Vězení v {country} je na prodej.";
$text['cs']['buy_text'] = "Kupte si vězení za {amount} kreditů.";
$text['cs']['revenue_text'] = "Kupte si vězení za {amount} kreditů.";
$text['cs']['text1'] = "Po zakoupení vězení obdržíte veškerý výnos z něj!";
$text['cs']['text2'] = "Jste majitelem navždy... kromě když zemřete.";
$text['cs']['purchase_button'] = "Zaplacení {amount} kreditů";
$text['cs']['page_title_prison'] = "Vězení";
$text['cs']['prison_country'] = "Vězení";
$text['cs']['inmates'] = "Vězni";
$text['cs']['page_title_prison_country'] = "Vězení v {country}";
$text['cs']['page_text_prison_country'] = "Tato stránka zobrazuje všechny aktuálně uvězněné osoby v {země}.";
$text['cs']['page_text_prison_country_content'] = "Můžete se pokusit někomu pomoci uniknout. Úspěch útěku závisí na vašem postavení a postavení vězně.
Čím vyšší je vaše postavení, tím snazší je pomoci někomu uniknout.
Čím vyšší je postavení vězně, tím obtížnější je mu pomoci uniknout!";
$text['cs']['page_text_prison_country_content1'] = "Máte ještě {breakoutpoints} bodů útěku. Bod útěku vám umožní zdarma uniknout z vězení!
Pokud dojdou zámky, můžete si koupit svobodu za € {amount} za sekundu.";
$text['cs']['table_username'] = "Uživatelské jméno";
$text['cs']['table_family'] = "Rodina";
$text['cs']['table_rank'] = "Postavení";
$text['cs']['table_time'] = "Čas";
$text['cs']['prison_empty'] = "Vězení je prázdné!";
$text['cs']['no_user'] = "Musíte vybrat uživatele k osvobození.";
$text['cs']['no_jail'] = "Tento uživatel již není ve vězení.";
$text['cs']['success_breakoutpoint'] = "Byli jste propuštěni z vězení!";
$text['cs']['success_money'] = "Zakoupili jste si svobodu za {amount}";
$text['cs']['no_cash'] = "Nemáte dostatek hotovosti na zakoupení svobody!";
$text['cs']['go_jail'] = "Bohužel pokus o útěk selhal! Jdete sám do vězení!";
$text['cs']['breakout'] = "Osvobodili jste {username}!";
$text['cs']['self_jail'] = "Jste sám ve vězení!";
$text['cs']['already_owner'] = "Tento objekt má již majitele!";
$text['cs']['text1'] = "Po zakoupení vězení obdržíte veškerý výnos z něj!";
$text['cs']['text2'] = "Jste majitelem navždy... kromě když zemřete.";
$text['cs']['purchase_button'] = "Zaplacení {amount} kreditů";
$text['cs']['not_enough_credits'] = "Nemáte dostatek kreditů na zakoupení tohoto objektu!";
$text['cs']['purchase_object'] = "Zakoupili jste objekt!";
$text['cs']['profit_jail'] = "Zisk s tímto vězením";
$text['cs']['save_setting'] = "Uložit";
$text['cs']['settings'] = "Nastavení";
$text['cs']['buyoutprice'] = "Cena výkupu za sekundu";
$text['cs']['minprice'] = "min. {minprice}";
$text['cs']['maxprice'] = "max. {maxprice}";
$text['cs']['cheating'] = 'Snažíte se podvádět?';
$text['cs']['price_to_low'] = 'Minimální cena za sekundu je € {minprice}';
$text['cs']['price_to_high'] = 'Maximální cena za sekundu je € {maxprice}';
$text['cs']['price_changes'] = 'Cena za sekundu nyní činí € {price}';
$text['cs']['success_letfree'] = 'Osvobodili jste {username}!';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$buyy = isset($_POST['buy']) ? $_POST['buy'] : '0';
	$buyy = $db->escape($buyy);
	
	if($buyy == 1){
		
		if($owner == $userdata[0]['username']){
			
			
			$price = isset($_POST['price']) ? $_POST['price'] : $min;
			$price = $db->escape($price);
	
	
			if(!is_numeric($price)){
				$errorss[] = $text[$lang]['cheating'];
			}
			if($price < $minprice){
				$errorss[] = txt($text[$lang]['price_to_low'],"{minprice}",number($minprice));
			}
			if($price > $maxprice){
				$errorss[] = txt($text[$lang]['price_to_high'],"{maxprice}",number($maxprice));
			}
	
	 

			if(empty($errorss))
			{
			
			
				$update = array(   'price' =>  $price	 );
				$where = array( 'username' => $userdata[0]['username'], 'country' => $userdata[0]['country'], 'object' => 'jail'	);
				$db->where($where)->update('objects', $update); 
							$successs[] = txt($text[$lang]['price_changes'],"{price}",number($price));

			}
		
		}else{
  		$q = "SELECT * FROM objects where object = 'jail' and country = '".$userdata[0]['country']."' ";
		$o = $db->query($q)->fetch();
		if($db->affected_rows > 0){
			$errorss[] = $text[$lang]['already_owner'];
		}
		
		if($userdata[0]['credits'] < $objectprice){
			$errorss[] = $text[$lang]['not_enough_credits'];
		
		}
		
		
		

		if(empty($errorss))
		{
		
					
			$insert = array(
                'object' => 'jail',
                'username' => $userdata[0]['username'],
                'price' => $price,
                'country' => $userdata[0]['country'],
                'earnings' => 0,
            );
         	$insert = $db->insert('objects', $insert); 
         	
         	
				$update = array(   'credits' => ($userdata[0]['credits'] - $objectprice)	 );
				$where = array( 'username' => $userdata[0]['username'] 	);
				$db->where($where)->update('users', $update); 
				
				$successs[] = $text[$lang]['purchase_object'];
		
		
		
		}}
		
		
	}else{
	
	
	
	
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$username = $db->escape($username);
	if($username == ''){
			$errors = $text[$lang]['no_user'];
	}
	
	
	if($owner == $userdata[0]['username']){
	
		
		$q = "SELECT * FROM timers where activity = 'jail' and username = '".$username."'";
		$timer = $db->query($q)->fetch();
		$now = date("Y-m-d H:i:s");
		if($timer[0]['time'] < $now){
				$errors[] = $text[$lang]['no_jail'];
		}
		
		
	
		
  		$q = "SELECT id FROM users where username = '".$username."' and country = '".$userdata[0]['country']."'";
		$o = $db->query($q)->fetch();
		if($db->affected_rows == 0){
				$errors[] = $text[$lang]['no_jail'];
		}
		
		
		if(empty($errors))
		{
		
				$timers = array('time' => $now, );
				$where = array( 'activity' => 'jail', 'username' => $username );
				$db->where($where)->update('timers', $timers); 
				$success[] = txt($text[$lang]['success_letfree'],"{username}",$username);
		
		}
		
	} elseif($username == $userdata[0]['username']){
	
		$q = "SELECT * FROM timers where activity = 'jail' and username = '".$userdata[0]['username']."'";
		$timer = $db->query($q)->fetch();
		$now = date("Y-m-d H:i:s");
		if($timer[0]['time'] < $now){
				$errors[] = $text[$lang]['no_jail'];
		}
		


		if(empty($errors))
		{

			if($userdata[0]['breakoutpoints'] > 0){
			
			
				$timers = array('time' => $now, );
				$where = array( 'activity' => 'jail', 'username' => $userdata[0]['username'] );
				$db->where($where)->update('timers', $timers); 
			
			
				$update = array(   'breakoutpoints' => ($userdata[0]['breakoutpoints'] - 1)	 );
				$where = array( 'username' => $userdata[0]['username'] 	);
				$db->where($where)->update('users', $update); 
				
				$success[] = $text[$lang]['success_breakoutpoint'];
		
			
			}else{
				
				$wait = datetotime($timer[0]['time']) - time();
				if($userdata[0]['cash'] > ($wait  * $price)){
					
					
				$timers = array('time' => $now, );
				$where = array( 'activity' => 'jail', 'username' => $userdata[0]['username'] );
				$db->where($where)->update('timers', $timers); 
			
			
				$update = array(   'cash' => ($userdata[0]['cash'] - ($wait * $price))	 );
				$where = array( 'username' => $userdata[0]['username'] 	);
				$db->where($where)->update('users', $update); 
				
				if($owner != ''){
					$qu = "update users set bank = bank + (".$wait." * ".$price.") where username = '".$owner."'  ";
					$db->query($qu)->execute() ;
					$qu = "update objects set earnings = earnings + (".$wait." * ".$price.") where username = '".$owner."' and  country = '".$userdata[0]['country']."' and object = 'jail' ";
					$db->query($qu)->execute() ;
				}
				$success[] = txt($text[$lang]['success_money'],"{amount}",number($wait*$price) );
					
				}else{
				
					$errors[] = $text[$lang]['no_cash'];
				}
			
			}
		
		}
		
		
	}else{
	
	
		$q = "SELECT * FROM timers where activity = 'jail' and username = '".$username."'";
		$timer = $db->query($q)->fetch();
		$now = date("Y-m-d H:i:s");
		if($timer[0]['time'] < $now){
				$errors[] = $text[$lang]['no_jail'];
		}
		
		
	
		
  		$q = "SELECT id FROM users where username = '".$username."' and country = '".$userdata[0]['country']."'";
		$o = $db->query($q)->fetch();
		if($db->affected_rows == 0){
				$errors[] = $text[$lang]['no_jail'];
		}
		
			
		$q = "SELECT * FROM timers where activity = 'jail' and username = '".$userdata[0]['username']."'";
		$timer = $db->query($q)->fetch();
		$now = date("Y-m-d H:i:s");
		if($timer[0]['time'] > $now){
				$errors[] = $text[$lang]['self_jail'];
		}
		
		
		if(empty($errors))
		{
			$chance = rand(1,3);
			if($chance == '1'){
			
				$timers = array('time' => $now, );
				$where = array( 'activity' => 'jail', 'username' => $username );
				$db->where($where)->update('timers', $timers); 
				
				$success[] = txt($text[$lang]['breakout'],"{username}",$username );
			}else{
				jail($userdata[0]['username'], 150);
				$errors[] = $text[$lang]['go_jail'];
			}
		
		
		}
	
	
	
	}}

}

	
	 
	
	    
 	$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();

	
  	$q = "SELECT * FROM countrys";
	$c = $db->query($q)->fetch();
	$countrycount = $db->affected_rows;
	
	
	
	
	 
	
$q = "SELECT * FROM timers where activity = 'jail' and time > '".$now."'";
$timer = $db->query($q)->fetch();

$arrtimer[] = '';
foreach($timer as $ft){
	
	$wait = datetotime($ft['time']) - time();
	$qcu = "SELECT country FROM users where username = '".$ft['username']."'";
	$fcu = $db->query($qcu)->fetch();
	$uc = $fcu[0]['country']; 
	$arrtimer[$uc] = isset($arrtimer[$uc]) ? $arrtimer[$uc] + 1 : 1;
	$arrusers[$uc][] = array("username" => $ft['username'], "time" => $wait);
}
	

$q = "SELECT * FROM objects where object = 'jail' and country = '".$userdata[0]['country']."' ";
$o = $db->query($q)->fetch();
if($db->affected_rows > 0){
	
$owner = $o[0]['username'];
$price = $o[0]['price'];
$earnings = $o[0]['earnings'];
}
		


