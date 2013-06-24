<?php

include('passvalidator.class.php');

$validator = new PassValidator;

$validator->feedDB($dataConnection);

$passwords['Enkele voorbeelden'] = array(
'cook',
'cookies',
'cook123',
'cookies123',
'cookie cookie cookie',
'w00tw00tw00t',
'ZawllaPmnqw14485',
'ZawllaPmnqw14485$$(#',
'Correct Horse Battery Staple',
'correct horse battery staple',
'wooo234j2hgryudfsdf'
);

$passwords['Top 25 ergste wachtwoorden 2012'] = array(
'password',
'123456',
'12345678',
'abc123',
'qwerty',
'monkey',
'letmein',
'dragon',
'111111',
'baseball',
'iloveyou',
'trustno1',
'1234567',
'sunshine',
'master',
'123123',
'welcome',
'shadow',
'ashley',
'football',
'jesus',
'michael',
'ninja',
'mustang',
'password1'
);

$passwords['Passwords generated via getvau.lt'] = array(
'msHS**$7[EX_',
'mHsw!zjM0nWn*#',
'mHsw!zs71@(gAJZh',
'Xrow*rH70(WgrhXV"^',
'XrC 5,t{@Sm[!%X~-pTE',
'Wa7,M<3y0[M[uL7%h.t[',
'>3nt7M@y%=60J\'JLet3<',
'[.3}1$'
);


foreach ( $passwords as $title => $passwordBulk ) {

?>
<h2><?=$title; ?></h2>
<ul>
<?php

foreach ($passwordBulk as $password) {
	
	list($score, $remarks) = $validator->verifyAwesomeness($password);

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
	<li>
        <h3 style="color: <?=$color; ?>;"><?=$password; ?></h3>
        <div class="result">
                <p style="color: <?=$color; ?>;"><?=$message; ?> (<?=$score;?>)</p>
                <ul><li><?=$remarkHTML; ?></li></ul>
        </div>
	</li>
        <?php
	
	
}


?>
</ul>
<?php
}

?>
