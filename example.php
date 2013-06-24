<?php

include('passvalidator.class.php');

$password = 'never gonna give you up, never gonna let you dooooOOOooowwwnnnnn';

$validator = new PassValidator;

$validator->feedDB($dataConnection);

list($score, $remarks) = $validator->verifyAwesomeness($password, true, true, true);

list($color, $message) = $validator->passJudgement($score);

?>