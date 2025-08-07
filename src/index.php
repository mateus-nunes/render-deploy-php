<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema distribuido</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body class="bg-body-secondary">

<main class="container bg-body-tertiary my-5 py-5">

    <h1 class="text-center">Integração Sistema distribuído</h1>

    <blockquote class="py-3 text-center">
        # O formulário a seguir trata da integração de dois sistemas por intermedio de um broker de mensagens (RabbitMq).
        <br>
        # Ao enviar o formulário, uma mensagem é inserida na fila do RabbitMq.
        <br>
        # Essa mensagem será consumida por outro sistema responsável pelo envio da mensagem via Email
    </blockquote>

    <form action="send.php" method="post">

        <div class=" mb-3">
            <label for="destinatario" class="form-label">Destinatário</label>
            <input type="email" class="form-control" name="destinatario" id="destinatario" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="assunto" class="form-label">Assunto</label>
            <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Convite para colação">
        </div>
        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea class="form-control" name="mensagem" id="mensagem" rows="3"></textarea>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>

</main> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>