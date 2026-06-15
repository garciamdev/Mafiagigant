<?php
$page = 'addpage';
require_once ('../../../loader.php');
$page = 'addpage';
$nav = 'ja';
$sitetitle = 'content toevoegen';
$nu = date("Y-m-d H:i:s");
if($addnewcontent != 'ja'){

       header("Location: ".BASE_URL."");
        exit(); 
}



  


 $generated_text = '';
 
 
function chatgpt($keyword, $prompt) {

    $api_key = '';
    
    //$prompt = 'Genereer een SEO-geoptimaliseerd artikel over ' . $keyword . '.';
   // $prompt = 'schrijf in het nederlands. maak een output in een json. genereer 50 blog ideen voor dit onderwerp: ' . $keyword . '.';

    // API-aanvraag opstellen
    $data = array(
        'model' => 'text-davinci-003',
        'prompt' => $prompt,
        'temperature' => 0.7,
        'max_tokens' => 3000,
        'top_p' => 1,
        'frequency_penalty' => 0,
        'presence_penalty' => 0
    );
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    curl_close($ch);

    // JSON-resultaat decoderen en het gegenereerde artikel retourneren
    $response = json_decode($result, true);
    print_r($response);
    return $response['choices'][0]['text'];
}



function chatgpt1($keyword, $prompt) {

    $api_key = '';
    
    //$prompt = 'Genereer een SEO-geoptimaliseerd artikel over ' . $keyword . '.';
   // $prompt = 'schrijf in het nederlands. maak een output in een json. genereer 50 blog ideen voor dit onderwerp: ' . $keyword . '.';

ini_set('max_execution_time', 300);

$messages = array(
    array(
        'role' => 'user',
        'content' => $prompt
    ), 
   	array(
        'role' => 'user',
        'content' => 'make sure you write the article in HTML'
    ),
);

//$data1 = array('role' => 'user','content' => $prompt);
    // API-aanvraag opstellen
    $data = array(
        'model' => 'gpt-3.5-turbo',
        'messages' => $messages,
        'temperature' => 0.7,
        'max_tokens' => 3000,
        'top_p' => 1,
        'frequency_penalty' => 0,
        'presence_penalty' => 0
    );
    echo"<br /><br />";
    print_r(json_encode($data));echo"<br /><br />";
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 600);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    curl_close($ch);
echo"<br /><br />result:<br />";
    print_r($result);echo"<br /><br />";
    // JSON-resultaat decoderen en het gegenereerde artikel retourneren
    $response = json_decode($result, true);
    print_r($response);
    return $response['choices'][0]['message']['content'];
}



if (isset($_POST["prompt"])) {

 	$prompt = $_POST['prompt'];
    $keyword = $_POST['keyword'];
	if($prompt == 'titels'){
	
	    //$prompt = 'schrijf in het nederlands. genereer 5 blog ideen voor dit onderwerp: ' . $keyword . ' en eindig elk idee met:  <|>.';
	    $prompt = 'I Want You To Act As A Content Writer Very Proficient SEO Writer Writes Fluently Dutch. Write a 100% Unique, SEO-optimized, Human-Written blog titles that covers the topic provided in the Prompt. Write The titles In Your Own Words Rather Than Copying And Pasting From Other Sources. Consider perplexity and burstiness when creating content, ensuring high levels of both without losing specificity or context. Write In A Conversational Style As Written By A Human (Use An Informal Tone, Utilize Personal Pronouns, Keep It Simple, Engage The Reader, Use The Active Voice, Keep It Brief, Use Rhetorical Questions, and Incorporate Analogies And Metaphors). its important to end every title with <|>. Now Write the 10 blog titles in dutch for this subject:' . $keyword;

		    echo "<br /><br /><br />";
    $answer = chatgpt($keyword, $prompt);
    //echo '<h1>Uw SEO-geoptimaliseerde artikel over ' . $keyword . ':</h1>';
    
//$tekst = "1. Ontdek de magie van Thailand <|> 2. Aan de slag met avontuur in Thailand <|> 3. Sta versteld van Thailand's ongeëvenaarde schoonheid <|> 4. Meer weten over Thailand: waarom je erheen moet gaan <|> 5. De beste plekken om te bezoeken in Thailand <|> 6. Ontdek de verhalen achter Thailand's culturele erfgoed <|> 7. Waarom is Thailand de perfecte bestemming voor een strandvakantie? <|> 8. Haal het beste uit uw reis naar Thailand <|> 9. Ontdek de magische eetervaringen in Thailand <|> 10. Thailand: waar avontuur begint <|> ";
  $lines = explode("<|>", $answer);

$i = 1;
    // Elk artikel in de database importeren
    	foreach ($lines as $line) {
    		$tekst = str_replace(" ".$i.". ","", $line);
    		$tekst = str_replace($i.". ","", $line);
    		//$tekst = explode($i.". ", $line);
    		//$tekst = $tekst[1];
			$tekst = isset($tekst) ? $tekst : '';
    		
    		$sql = "SELECT id FROM generate_ai  where title LIKE '%".$db->escape($tekst)."%' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 0 and $tekst != ''){  
    			$insert = array(
					'title' => $db->escape($tekst)
				);
		
        		$addinfo = $db->insert('generate_ai', $insert); 
        		
			}else{
				echo"komt al voor > ";
			}
    	    echo "$tekst <br />";
    	    $i = $i + 1;
    	}
        
        
        
		    echo "<br /><br /><br />";
        
	}
	
	
	if($prompt == 'page'){
	
	    //$prompt = 'I Want You To Act As A Content Writer Very Proficient SEO Writer Writes Fluently Dutch. Write an outline, at least 10 headings and subheadings (including H1, H2, H3, and H4 headings) Write a 100% Unique, SEO-optimized, Human-Written article in Dutch with at least 10 headings and subheadings (including H1, H2, H3, and H4 headings) that covers the topic provided in the Prompt. Write The headings In Your Own Words Rather Than Copying And Pasting From Other Sources. Consider perplexity and burstiness when creating content, ensuring high levels of both without losing specificity or context. Write In A Conversational Style As Written By A Human (Use An Informal Tone, Utilize Personal Pronouns, Keep It Simple, Engage The Reader, Use The Active Voice, Keep It Brief, Use Rhetorical Questions, and Incorporate Analogies And Metaphors). this is important to Bold the Title and all headings of the article, and use appropriate headings for H tags. Now Write the headings for this title:' . $keyword;
	    $prompt = 'I Want You To Act As A Content Writer Very Proficient SEO Writer Writes Fluently Dutch. Write a 100% Unique, SEO-optimized, Human-Written outline in Dutch with 10 headings and subheadings (including H1, H2, H3, and H4 headings) that covers the topic provided in the Prompt. Write The headings In Your Own Words Rather Than Copying And Pasting From Other Sources. Consider perplexity and burstiness when creating content, ensuring high levels of both without losing specificity or context. Write In A Conversational Style As Written By A Human (Use An Informal Tone, Utilize Personal Pronouns, Keep It Simple, Engage The Reader, Use The Active Voice, Keep It Brief, Use Rhetorical Questions, and Incorporate Analogies And Metaphors). this is important to Bold the Title and all headings of the article, and use appropriate headings for H tags. Now Write the headings for this title:' . $keyword;

	 	$prompt = 'I Want You To Act As A Content Writer Very Proficient SEO Writer Writes Fluently Dutch. Write a 1000-word 100% Unique, SEO-optimized, Human-Written article in Dutch with at least 10 headings and subheadings in HTML (including H1, H2, H3, and H4 headings) that covers the topic provided in the Prompt. Write The article In Your Own Words Rather Than Copying And Pasting From Other Sources. Consider perplexity and burstiness when creating content, ensuring high levels of both without losing specificity or context. Use fully detailed paragraphs that engage the reader. Write In A Conversational Style As Written By A Human (Use An Informal Tone, Utilize Personal Pronouns, Keep It Simple, Engage The Reader, Use The Active Voice, Keep It Brief, Use Rhetorical Questions, and Incorporate Analogies And Metaphors).  End with a conclusion paragraph and 5 unique FAQs After The Conclusion. this is important to Bold the Title and all headings of the article in HTML, and use appropriate headings for H tags. Now Write An Article in HTML On This Topic: '.$keyword;

    $answer = chatgpt1($keyword, $prompt);
    //echo '<h1>Uw SEO-geoptimaliseerde artikel over ' . $keyword . ':</h1>';
    
        $lines = explode("<body>", $answer);
        $lines = explode("</body>", $lines[1]);
        $lines = $lines[0];

	
        
        
		    echo "<br /><br /><br />";
		    echo $lines;
		    echo "<br /><br /><br />";

    
    
    
    
          	$sql = "SELECT id FROM generate_ai  where title LIKE '%".$db->escape($keyword)."%' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 0){  
    			$insert = array(
					'content' => $db->escape($answer)
				);
        		$addinfo = $db->insert('generate_ai', $insert); 
        	}else{
        	
				$data = array(
					'content' => $db->escape($answer)
				);
				$where = array( 'title' => $db->escape($keyword));
				$db->where($where)->update('generate_ai', $data); 


        	
        	}
        echo  $answer;
	}
	
	
}





if (isset($_POST["generateblog"])) {

    $id = $_POST['generateblog'];
          	$sql = "SELECT id FROM generate_ai  where id =   '".$db->escape($id)."' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 1){  
				$data = array(
					'done' => '1'
				);
				$where = array( 'id' => $db->escape($id));
				$db->where($where)->update('generate_ai', $data); 
				
        	}

	
	
}






    		$sql = "SELECT id, title FROM generate_ai  where done = '0' ";
			$db->query($sql)->execute();
			$fcount = $db->affected_rows;
			
			$f = $db->query($sql)->fetch();
			
			
$theme = 'link';
require_once ('../../../themes/loader.php');


exit;




$tekst = "1. Hoe kan je energie besparen met eenvoudige tips? <|> 2. Waarom zou je energie moeten besparen? <|> 3. Sla je energiekosten drastisch terug met deze tips! <|> 4. Hoe kan je je energieverbruik verminderen? <|> 5. Wat zijn de voordelen van energie besparen? <|> 6. Je energiekosten verlagen met deze simpele stappen! <|> 7. Maak je huis energiezuinig met deze handige tips! <|> 8. Hoe kan je energiebesparingen op de lange termijn behalen? <|> 9. Wat zijn de beste manieren om energie te besparen? <|> 10. Energie besparen kan makkelijk met deze tips! <|>";
$tekst = "1. Ontdek de magie van Thailand <|> 2. Aan de slag met avontuur in Thailand <|> 3. Sta versteld van Thailand's ongeëvenaarde schoonheid <|> 4. Meer weten over Thailand: waarom je erheen moet gaan <|> 5. De beste plekken om te bezoeken in Thailand <|> 6. Ontdek de verhalen achter Thailand's culturele erfgoed <|> 7. Waarom is Thailand de perfecte bestemming voor een strandvakantie? <|> 8. Haal het beste uit uw reis naar Thailand <|> 9. Ontdek de magische eetervaringen in Thailand <|> 10. Thailand: waar avontuur begint <|> ";
    $lines = explode("<|>", $tekst);

$i = 1;
    // Elk artikel in de database importeren
    	foreach ($lines as $line) {
    		$tekst = str_replace(" ".$i.". ","", $line);
    		$tekst = str_replace($i.". ","", $line);
    		//$tekst = explode($i.". ", $line);
    		//$tekst = $tekst[1];
			$tekst = isset($tekst) ? $tekst : '';
    		
    		$sql = "SELECT id FROM generate_ai  where title LIKE '%".$db->escape($tekst)."%' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 0 and $tekst != ''){  
    			$insert = array(
					'title' => $db->escape($tekst)
				);
		
        		$addinfo = $db->insert('generate_ai', $insert); 
        		
			}else{
				echo"komt al voor > ";
			}
    	    echo "$tekst <br />";
    	    $i = $i + 1;
    	}
        
        
        
        
	$post = json_decode($post, true);
	$sql = "SELECT id, title FROM np_portal_pages  where url = '".$db->escape($post['url'])."' limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;

	if($count == 0 and $post['title'] != '' and $post['url'] != ''){  

		$addinfo = array(
			'url' => $db->escape($post['url']),
			'title' => $db->escape($post['title']),
			'keywords' => $db->escape($post['keywords']),
			'description' => $db->escape($post['description']),
		);
		$addinfo = $db->insert('np_portal_pages', $addinfo); 
		
		if($addinfo){
		
			$return = "success";
		}else{
		
			$return = "false";
		}

	}else{
		$return = "false";
	}
	