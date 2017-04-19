<?php
use ScientiaMobile\WurflCloud\Config;
use ScientiaMobile\WurflCloud\Cache\NullCache;
use ScientiaMobile\WurflCloud\Cache\Cookie;
use ScientiaMobile\WurflCloud\Client;
/**
 * WURFL Cloud Client - Simple example using MyWurfl
 * @package WurflCloud_Client
 * @subpackage Examples
 * 
 * This example uses the included MyWurfl class to get device capabilities.
 * If you prefer to use the WURFL Cloud Client directly, see show_capabilities.php
 * 
 * For this example to work properly, you must put your API Key in the script below.
 */
/**
 * Include the WURFL Cloud Client file
 */
require_once __DIR__.'/../src/autoload.php';
try {
	// Create a WURFL Cloud Config
	$config = new Config();
	
	// Set your API Key here
	$config->api_key = '296488:POv9VK5rGqKuscrjFAeJbGqqynUxohJM';
	
	// Create a WURFL Cloud Client
	$client = new Client($config, new NullCache());
	
	// Detect the visitor's device
	$client->detectDevice();

	// Show all the capabilities returned by the WURFL Cloud Service

	// Print headers to output tsv file
	header('Content-type: text/tab-separated-values');
	header('Content-Disposition: attachment;filename=output.tsv');
	echo $userAgent = $_SERVER['HTTP_USER_AGENT'];echo "\t";
	
	$dataSet = $client->capabilities;
	//print_r($dataSet);
	// Show all the capabilities returned by the WURFL Cloud Service
	foreach ($client->capabilities as $name => $value) {
		//echo "<strong>$name</strong>: ".(is_bool($value)? var_export($value, true): $value) ."<br/>";
		//Capture capabilities in array to print it in column
		$arr[$name]=(is_bool($value)? var_export($value, true): $value);				
	}
	//Print capability in tab separated value 
	print $arr['is_mobile'];echo "\t"; echo $arr['complete_device_name'];echo"\t";echo$arr['form_factor'];echo"\t";echo$arr['id'];
	//echo "<br>";
	//echo "Capability 1 = $arr['is_mobile']";
	//echo "Capability 2 = $arr['complete_device_name']";
	//echo "Capability 3 = $arr['form_factor']";
	//echo "Capability 4 = $arr['id']";

	//echo "<br>";
	//echo echo $userAgent;
} catch (Exception $e) {
	// Show any errors
	echo "Error: ".$e->getMessage();
}




























