<?php

// CONTROLLER NOT CONTROLLER ACTUALLY
// But Manager class is abstract and we need this function elsewhere than in inherited classes

function redirect($url, $permanent = false) {
    if($permanent) throw new Exception('ERREUR 404');
	header('Location: '.$url);
	exit();
}