<?php
$host = "localhost"; 
$usuario = "root";   
$senha = "";         
$banco = "uniao_solidaria_db"; 

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT nome_doador, email_doador, cpf_doador, valor, data_doacao, status FROM doacoes ORDER BY data_doacao DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doações - União Solidária</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="header__logo">União Solidária</div>
        <nav class="header__nav">
            <ul>
                <li><a href="index.html">Início</a></li>
                <li><a href="doacoes.php">Doações</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    </header>

    <!-- Seção de Doações -->
    <section class="section__comodoar">
        <div class="section__comodoar-container">
            <div class="section__comodoar-title-paragraph">
                <h2 class="section_comodoar_title">Doações Recebidas</h2>
                <p class="section_comodoar_paragraph">
                    Veja abaixo as últimas doações realizadas para a União Solidária.
                </p>
            </div>

            <?php if ($result->num_rows > 0): ?>
                <div class="section__comodoar-cards">
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="section__comodoar-card">
                            <h3 class="section__comodoar-card-title"><?= htmlspecialchars($row['nome_doador']) ?></h3>
                            <p class="section__comodoar-card-p"><strong>Email:</strong> <?= htmlspecialchars($row['email_doador']) ?></p>
                            <p class="section__comodoar-card-p"><strong>CPF:</strong> <?= htmlspecialchars($row['cpf_doador']) ?></p>
                            <p class="section__comodoar-card-p"><strong>Valor:</strong> R$ <?= number_format($row['valor'], 2, ',', '.') ?></p>
                            <p class="section__comodoar-card-p"><strong>Data:</strong> <?= date('d/m/Y H:i', strtotime($row['data_doacao'])) ?></p>
                            <p class="section__comodoar-card-p"><strong>Status:</strong> <?= ucfirst($row['status']) ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p style="text-align:center; font-size:1.2rem; margin-top:2rem;">Ainda não há doações registradas.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="section__footer">
        <div class="section__footer-copy">
            &copy; <?= date('Y') ?> União Solidária - Todos os direitos reservados.
        </div>
    </footer>

</body>
</html>

<?php $conn->close(); ?>
Something is wrong with the XAMPP installation :-(
