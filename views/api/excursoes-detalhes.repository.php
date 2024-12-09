<?php
    // Define o tipo de resposta como JSON
    header('Content-Type: application/json');

    // Verifica se os dados foram enviados
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Captura o conteúdo da requisição POST
        $jsonData = file_get_contents('php://input');

        // Converte os dados para um array associativo
        $data = json_decode($jsonData, true);

        // Exemplo: Salvar os dados no banco ou processá-los
        if (isset($data)) {
            // Apenas para demonstração
            $excursoesDetalhes = $data;
            file_put_contents('excursoes-detalhes.json', json_encode($data, JSON_PRETTY_PRINT));

            echo json_encode(['success' => true, 'message' => 'Dados recebidos com sucesso!']);
        } else {
            $excursoesDetalhes = [];
        }
    } else {
        $excursoesDetalhes = [];
    }
?>