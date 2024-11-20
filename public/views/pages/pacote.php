
<?php
// single-event.php

// Inclui o arquivo com os dados dos pacotes
include 'pacotes.php';

// Obtém o ID do pacote da URL (exemplo: single-event.php?id=1)
$pacoteId = $_GET['id'] ?? null;
$pacote = getPacoteData($pacoteId);

if (!$pacote) {
    echo "Pacote não encontrado.";
    exit;
}
?>

<h1><?php echo htmlspecialchars($pacote['nome']); ?></h1>
    <img src="imagens/<?php echo htmlspecialchars($pacote['imagem']); ?>" alt="<?php echo htmlspecialchars($pacote['nome']); ?>">
    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($pacote['descricao']); ?></p>
    <p><strong>Preço:</strong> <?php echo htmlspecialchars($pacote['preco']); ?></p>
    <p><strong>Duração:</strong> <?php echo htmlspecialchars($pacote['duracao']); ?></p>
    
    <a href="pacotes.php">Voltar para lista de pacotes</a>