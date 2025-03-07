<?php
// Configurações de conexão
$host = "localhost";  // Altere para o nome do seu servidor de banco de dados, se necessário
$user = "root";       // Seu usuário do MySQL
$pass = "258025";           // Sua senha do MySQL
$dbname = "vendas_db"; // Nome do banco de dados que você quer acessar

try {
    // Estabelece a conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Define o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Mensagem de sucesso (opcional)
    // echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Se a conexão falhar, captura o erro e exibe uma mensagem
    die("Erro de conexão: " . $e->getMessage());
}
?>