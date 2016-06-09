<?php

require __DIR__.'/vendor/autoload.php';

use Ratchet\Server\IoSever;
use Ratchet\http\HttpServer;
use Ratchet\WebSocket\WsServer;


	$server = IoSever::factory(new HttpServer(new WsServer(new Chat)), 3000);

	$server->run;

