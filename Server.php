<?php
set_time_limit(0);
$host = '127.0.0.1';
$port = '8080';
$socket = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
socket_bind($socket, $host,$port) or die('Error al vincular socket con ip en ese cliente');
echo socket_strerror(socket_last_error());
socket_listen($socket);
$i=0;
while (true) {
	$client[++$i] = socket_accept($socket);
	$menssage = socket_read($client[$i], 1024 );
	echo $menssage;
	$menssage = "Hola" . $menssage . "\n";
	socket_write($client[$i], $menssage . "\n\r", 1024);
	socket_close($client[$i]);
	$i++;
}
socket_close($socket);
?>

