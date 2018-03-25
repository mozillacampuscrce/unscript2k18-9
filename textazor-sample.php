<?php
require_once('TextRazor.php');

 
 TextRazorSettings::setApiKey('843479adf9dd3bca3d0df79585cfcfc369d0f532795fe5cc87f571f9');

 $text = 'Barclays misled shareholders and the public about one of the biggest investments in the banks history, a BBC Panorama investigation has found.';

 $textrazor = new TextRazor();

 $textrazor->addExtractor('entities');

 $response = $textrazor->analyze($text);

 if (isset($response['response']['entities'])) {
 	foreach ($response['response']['entities'] as $entity) {
 		print($entity['entityId']);
 		print(PHP_EOL);
 	}
 }
 ?>