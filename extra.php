<?php

function passCheck($p1, $p2) {
	$check = password_verify($p2, $p1);

	return $check;
}

 ?>
