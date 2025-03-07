<?php
include "conexao.php";

header('Content-Type: application/json'); // Garantir que a resposta seja tratada como JSON

try {
    // Prepara e executa a consulta
    $sql = "SELECT * FROM clientes_vendas";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Busca os dados como um array associativo
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna os dados em formato JSON
    echo json_encode($clientes);
} catch (PDOException $e) {
    // Retorna erro em JSON
    echo json_encode(["erro" => $e->getMessage()]);
}
?>