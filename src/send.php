<?php
require_once __DIR__ . '/vendor/autoload.php';

//Importa as dependências
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

//Verifica se o formulário foi enviado
if(! isset($_POST['destinatario'])){
    die("Informe o email para prosseguir com o envio"); 
}

// Obtém o host da variável de ambiente, ou 'localhost' como default
$rabbitmqHost = getenv('RABBITMQ_HOST') ?: 'localhost'; 

// Conexão com o RabbitMQ
$connection = new AMQPStreamConnection($rabbitmqHost, 5672, 'guest', 'guest');
$channel = $connection->channel();
$channel->queue_declare('fila_emails', false, true, false, false);

//Recebe os dados enviados pelo formulário
$to = $_POST["destinatario"];
$subject = $_POST["assunto"];
$body = $_POST["mensagem"];

// Dados do e-mail
$email = [
    'to' => $to,
    'subject' => $subject,
    'body' => $body
];

//Converte os dados do email para JSON
$dados = json_encode($email);

//Gera a mensagem a ser inserida na fila
$msg = new AMQPMessage($dados, ['delivery_mode' => 2]); // persistente

//Publica a mensagem na fila
$channel->basic_publish($msg, '', 'fila_emails');

echo "Mensagem de e-mail enviada para a fila!<br>";

echo "<a href='/'>Voltar</a>";

//Encerra a conexão
$channel->close();
$connection->close();