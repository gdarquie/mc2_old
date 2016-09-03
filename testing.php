<?php

require __DIR__.'/vendor/autoload.php';

$film = new \GuzzleHttp\Film([
	'base_url' => 'http://localhost:8000',
    'defaults' => [
        'exceptions' => false
		]
	]);
$response = $client->post('/api/films');

echo $response;
echo "\n\n";
