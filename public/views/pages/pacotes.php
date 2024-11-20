<?php
// pacotes.php
$pacotes = [
    1 => [
        'id' => 1,
        'nome' => 'Pacote para Fortaleza',
        'descricao' => 'Uma viagem incrível para Fortaleza.',
        'preco' => 'R$ 1500,00',
        'duracao' => '7 dias e 6 noites',
        'imagem' => 'fortaleza.jpg'
    ],
    2 => [
        'id' => 2,
        'nome' => 'Pacote para Salvador',
        'descricao' => 'Explore as maravilhas de Salvador.',
        'preco' => 'R$ 1800,00',
        'duracao' => '5 dias e 4 noites',
        'imagem' => 'salvador.jpg'
    ],
    // Adicione mais pacotes conforme necessário
];

// Função para obter os dados de um pacote pelo ID
function getPacoteData($id) {
    global $pacotes;
    return $pacotes[$id] ?? null;
}
?>
