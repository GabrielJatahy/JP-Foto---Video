<?php
// Configuração do banco de dados
$servername = "localhost";   // servidor local
$username = "root";          // usuário do MySQL local
$password = "N3gr3sc0"; // coloque a senha do seu MySQL
$dbname = "jp_foto_video";   // nome do banco que você criou

// Conexão com o banco
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão deu certo
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$whatsapp = $_POST['whatsapp'] ?? '';
$dataFundacao = $_POST['dataFundacao'] ?? null;
$mensagem = $_POST['descricao'] ?? '';

// Validar campos obrigatórios
if(empty($nome) || empty($email) || empty($whatsapp) || empty($mensagem)){
    die("Por favor, preencha todos os campos obrigatórios.");
}

// Preparar query segura
$stmt = $conn->prepare("INSERT INTO contatos (nome, email, whatsapp, dataFundacao, mensagem) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nome, $email, $whatsapp, $dataFundacao, $mensagem);

// Executa a query e redireciona para página de agradecimento
if($stmt->execute()){
    header("Location: /obrigado.html"); // redireciona para a página de agradecimento
    exit(); // importante para parar a execução do script
} else {
    die("Erro ao enviar: " . $stmt->error);
}

// Fecha statement e conexão
$stmt->close();
$conn->close();
?>
