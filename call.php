<?php

include('passvalidator.class.php');

$validator = new PassValidator;

$validator->feedDB($dataConnection);

if ( !empty($_GET['password']) ) {

        $password = $_GET['password'];

        list($score, $remarks) = $validator->verifyAwesomeness($password, true, true, true);

        list($color, $message) = $validator->passJudgement($score);

        if ( count($remarks['serious']) === 0 && count($remarks['optional']) === 0 )
		$remarkHTML = 'Geen opmerkingen. Ziet er goed uit!';
	else {
		
		$remarkHTML = '';
		
		if ( count($remarks['serious']) > 0 )
                	$remarkHTML .= '<h4>Serieuze fouten</h4></li><li>' . implode('</li><li>', $remarks['serious']);

		if ( count($remarks['optional']) > 0 )
                	$remarkHTML .= '<h4>Opmerkingen</h4></li><li>' . implode('</li><li>', $remarks['optional']);
	}
        ?>

	<h3><?=$_GET['password']; ?></h3>
        <div class="result">
        	<p style="color: <?=$color; ?>;"><?=$message; ?> (<?=$score;?>)</p>
                <ul><li><?=$remarkHTML; ?></li></ul>
         </div>
	<?php
}

?>
