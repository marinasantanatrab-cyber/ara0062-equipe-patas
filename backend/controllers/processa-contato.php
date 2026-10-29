<?php
/* ===========================================================================
   ARA0062 — STARK SHOP — recebe o formulário de contato do frontend
   Ciclo 8: o PHP lê o que o formulário enviou (method="post") e devolve
   uma página de agradecimento com o mesmo CSS do site.
   Ciclo 9: antes de responder, grava a mensagem na tabela mensagens.

   O formulário (frontend/index.html) aponta para cá:
   <form action="../backend/controllers/processa-contato.php" method="POST">

   Este arquivo fica em backend/controllers/, dois níveis abaixo da raiz:
   por isso os caminhos para o frontend começam com ../../
   =========================================================================== */

// o php.ini do XAMPP vem com o fuso de Berlim: acerta para o Brasil
date_default_timezone_set("America/Sao_Paulo");

// $_POST: cada campo chega com o seu name; ?? "" evita Warning se nada veio
$nome     = $_POST["nome"] ?? "";
$pet      = $_POST["pet"] ?? "";
$assunto  = $_POST["assunto"] ?? "";
$mensagem = $_POST["mensagem"] ?? "";

// nome vazio: ninguém passou pelo formulário (abriram o arquivo direto)
if ($nome === "") {
    exit("Nada chegou do formulário. Envie pela página: ../../frontend/index.html");
}

require "../config/conexao.php";

// ? no lugar dos valores: o banco nunca confunde o que foi digitado com o comando
$sql = "INSERT INTO mensagens (nome, pet, assunto, mensagem)
        VALUES (?, ?, ?, ?)";

$comando = $conexao->prepare($sql);
$comando->execute([$nome, $pet, $assunto, $mensagem]);

$numero = $conexao->lastInsertId();   // o id que o banco acabou de dar

$limite  = 500;
$hoje    = date("d/m/Y");
$hora    = date("H:i");
$tamanho = mb_strlen($mensagem);   // mb_strlen conta letras; strlen contaria bytes
$sobra   = $limite - $tamanho;
$carimbo = "Recebida em " . $hoje . " às " . $hora . ".";

// o <select> manda o value (sem acento); aqui vira o texto que a pessoa leu
switch ($assunto) {
    case "duvida":
        $assuntoTexto = "Uma dúvida";
        break;
    case "agendamento":
        $assuntoTexto = "Agendar um serviço";
        break;
    case "consulta":
        $assuntoTexto = "Consulta veterinária";
        break;
    default:
        $assuntoTexto = "Outro assunto";
}

// htmlspecialchars: o navegador mostra um <b> digitado, em vez de obedecer
$nomeSeguro     = htmlspecialchars($nome);
$petSeguro      = htmlspecialchars($pet);
$mensagemSegura = htmlspecialchars($mensagem);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem recebida | Stark Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;600;700&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../frontend/css/estilo.css">
</head>
<body>
    <header>
        <h1>STARK SHOP</h1>
        <p>Cuidado e carinho para o seu melhor amigo!</p>
    </header>

    <main>
        <section id="resposta">
            <h2>Obrigado, <?php echo $nomeSeguro; ?>!</h2>
            <p class="aviso">Mensagem nº <?php echo $numero; ?> guardada.
               <?php echo $carimbo; ?></p>
            <p>Recebemos a sua solicitação para <strong><?php echo $petSeguro; ?></strong>.</p>
            <p>Assunto: <?php echo $assuntoTexto; ?></p>
            <p>A sua mensagem tem <?php echo $tamanho; ?> caracteres
               (sobraram <?php echo $sobra; ?> dos <?php echo $limite; ?>).</p>
            <blockquote><?php echo $mensagemSegura; ?></blockquote>
            <p><a href="../../frontend/index.html#contato">← Voltar para a página</a>
               · <a href="mensagens.php">Ver todas as mensagens</a></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 STARK SHOP - ARA0062</p>
    </footer>
</body>
</html>

