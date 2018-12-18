#!/usr/bin/php
<?php


$check = exec('sudo systemctl status apache2.service');

if(strpos($check,"Started")){
	echo "true";
} else {

	echo "false";
}







?>
