<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nome = $_POST['nome'];
    $emal = $_POST['email'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];

    require 'vendor/autoload.php';

    $from = new SendGrid\Email(null, "franciscostanleyb@gmail.com");
    $subject = "Confirmar email";

    $to = new SendGrid\Email(null, "franciscothestanley@gmail.com");
    $content = new SendGrid\Content("text/html", "Ola, <br><br> PEGO COM SUCESSO! <br><br> Nome: $nome<br> Nome: $nome<br> Email: $email<br> Celular: $celular<br> Endereco: $endereco<br> Bairro: $bairro<br>");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = gatenv('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');
    $ag = new \SendGrid($apiKey);

    $response = $sg->cliente->mail()->send()->post($mail);

    echo $response->statusCode();
    echo $response->headers();
    echo $response->body();
    ?>

</body>
</html>