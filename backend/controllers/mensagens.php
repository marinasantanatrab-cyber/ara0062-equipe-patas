<?php
/* ===========================================================================
   ARA0062 — STARK SHOP — lista as mensagens gravadas no banco
   Trabalho final: a tela que mostra o que está na tabela mensagens.

   Nada aqui está escrito à mão: o PHP faz um SELECT e monta uma linha
   da tabela para cada registro. Se alguém incluir uma linha no banco,
   ela aparece aqui.

   Este arquivo fica em backend/controllers/, dois níveis abaixo da raiz:
   por isso os caminhos para o frontend começam com ../../
   =========================================================================== */

require "../config/conexao.php";

// SELECT: busca todas as mensagens, da mais nova para a mais antiga
$sql = "SELECT id, nome, pet, assunto, mensagem, criado_em
        FROM mensagens
        ORDER BY id DESC";

$comando = $conexao->prepare($sql);
$comando->execute();
$mensagens = $comando->fetchAll(PDO::FETCH_ASSOC);   // vira uma lista de arrays

$total = count($mensagens);

// o banco guarda o value do <select>; aqui vira o texto que a pessoa leu
$assuntos = [
    "duvida"      => "Uma dúvida",
    "agendamento" => "Agendar um serviço",
    "consulta"    => "Consulta veterinária",
    "outro"       => "Outro assunto",
];
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
        <nav>
            <ul>
                <li><a href="../../frontend/index.html">Início</a></li>
                <li><a href="../../frontend/index.html#contato">Contato</a></li>
            </ul>
        </nav>
        <h1>STARK SHOP</h1>
        <p>Cuidado e carinho para o seu melhor amigo!</p>
    </header>

    <main>
        <section id="mensagens">
            <h2>Mensagens recebidas</h2>

            <?php if ($total === 0): ?>
                <p class="aviso">Nenhuma mensagem gravada ainda.</p>
            <?php else: ?>
                <table>
                    <caption><?php echo $total; ?> mensagem(ns) no banco, da mais nova para a mais antiga</caption>
                    <thead>
                        <tr>
                            <th scope="col">Nº</th>
                            <th scope="col">Data</th>
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
                                <td><?php echo date("d/m/Y H:i", strtotime($m["criado_em"])); ?></td>
                                <td><?php echo htmlspecialchars($m["nome"]); ?></td>
                                <td><?php echo htmlspecialchars($m["pet"]); ?></td>
                                <td><?php echo $assuntos[$m["assunto"]] ?? "Outro assunto"; ?></td>
                                <td><?php echo htmlspecialchars($m["mensagem"]); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <p><a href="../../frontend/index.html#contato">← Enviar uma nova mensagem</a></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 STARK SHOP - ARA0062</p>
    </footer>
</body>
</html>
