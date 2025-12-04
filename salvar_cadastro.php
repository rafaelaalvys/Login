<?php
//Recebemos aqui os dados enviados pelo formulário
$nome = $_POST['nome'];
$email = $_POST['email'];

//CRIPTOGRAFIA DA SENHA ANTES DE SALVAR NO BANCO DE DADOS (por segurança)
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// Conecta ao banco de dados ( servidor, usuário, senha, nome do banco)
$con = new mysqli("localhost", "root", "", "escola");

// Verifica se houve erro na conexão
if ($con->connect_error) {
die("Erro: " . $con->connect_error);
// Encerra o código e mostra o erro
}

//Monta a instrução SQL para inserir o novo usuário no banco
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$NOME', '$email', '$senha')";

//Tenta executar o comando SQL
if ($con->query($sql)=== TRUE) {
    // Se der certo, mostra mensagem de sucesso
    echo "<h2>Cadastro realizado com sucesso!</h2>";
    echo "<a href='index.html'>Ir para o Login</a>";
} else {
    // Caso de erro, mostra o motivo
    echo "Erro ao cadastrar: " . $con->error;
}

//Encerra a conexão com o banco 
$con->close();

?>