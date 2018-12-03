#!/usr/bin/php
<?php

require_once('/home/samg/git/rabbitmqphp_example/path.inc');
require_once('/home/samg/git/rabbitmqphp_example/get_host_info.inc');
require_once('/home/samg/git/rabbitmqphp_example/rabbitMQLib.inc');

#$client = new rabbitMQClient("deplploymentServer.ini", "testServer");

function sendRequest($machineType, $brokerINI)
{
	$client = new rabbitMQClient($brokerINI,"testServer");
	$request = array();
	$request['type'] = getMachineType("Installer.ini");
	$response = $response=$client->send_request($request);
	return $response;
}

function getMachineType($installerINI)
{

	$iniContent = parse_ini_file($installerINI);
	$machineType = $iniContent['MACHINE_TYPE'];
	return $machineType;
}


$machineType =  getMachineType('/home/samg/installer/Installer.ini');
sendRequest($machineType, 'deploymentServer.ini');
?>
