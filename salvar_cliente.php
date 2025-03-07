<?php
include "conexao.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data)) {
    $id = $data['id'] ?? null;
    $nome = $data['nome'];
    $usuario = $data['usuario'];
    $vencimento = $data['vencimento'];
    $valor = $data['valor'];
    $plataforma = $data['plataforma'];

    try {
        if ($id) {
            // Atualiza cliente
            $sql = "UPDATE clientes_vendas SET nome = :nome, usuario = :usuario, vencimento = :vencimento, valor = :valor, plataforma = :plataforma WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
        } else {
            // Insere novo cliente
            $sql = "INSERT INTO clientes_vendas (nome, usuario, vencimento, valor, plataforma) VALUES (:nome, :usuario, :vencimento, :valor, :plataforma)";
            $stmt = $conn->prepare($sql);
        }

        // Vincula os parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':vencimento', $vencimento);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':plataforma', $plataforma);

        // Executa a query
        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Erro ao salvar cliente"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "error" => $e->getMessage()]);
    }
}
?>