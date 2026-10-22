<?php
/* ===========================================================================
   ARA0062 — STARK SHOP — lista as mensagens guardadas no banco
   Ciclo 9: SELECT na tabela mensagens, a mais nova em cima.
   Abra em: http://localhost/ara0062-equipe-patas/backend/controllers/mensagens.php
   =========================================================================== */

require "../config/conexao.php";

// sem valor digitado por ninguém no SQL: query() basta, sem prepare
$comando   = $conexao->query("SELECT * FROM mensagens ORDER BY id DESC");
$mensagens = $comando->fetchAll();

$total = count($mensagens);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens recebidas | Stark Shop</title>
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
        <section id="mensagens">
            <h2>Mensagens recebidas</h2>

            <p class="aviso"><?php echo $total; ?> mensagem(ns) no banco.</p>

            <table>
                <thead>
                    <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Quando</th>
                        <th scope="col">Tutor</th>
                        <th scope="col">Pet</th>
                        <th scope="col">Assunto</th>
                        <th scope="col">Mensagem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mensagens as $m): ?>
                    <tr>
                        <td><?php echo $m["id"]; ?></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($m["criada_em"])); ?></td>
                        <td><?php echo htmlspecialchars($m["nome"]); ?></td>
                        <td><?php echo htmlspecialchars($m["pet"]); ?></td>
                        <td><?php echo htmlspecialchars($m["assunto"]); ?></td>
                        <td><?php echo htmlspecialchars($m["mensagem"]); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p><a href="../../frontend/index.html#contato">← Voltar para a página</a></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 STARK SHOP - ARA0062</p>
    </footer>
</body>
</html>
