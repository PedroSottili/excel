<?php
include "conexao.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data["id"])) {
    $id = $data["id"];

    try {
        // Usando prepared statement para evitar SQL Injection
        $sql = "DELETE FROM clientes_vendas WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Erro ao excluir cliente"]);
        }
    } catch (PDOException $e) {
        // Em caso de erro no SQL
        echo json_encode(["success" => false, "error" => $e->getMessage()]);
    }
}
?>