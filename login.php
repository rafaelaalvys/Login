<?php 
session_start();
//Inicia a sessão para que possamos guardar os dados do usuário logado 

$email = $_POST['email'];
// Recebe o e-mail digitado no formulário de login

$senha = $_POST['senha'];
// Recebe a senha digitada no formulário

//Conexão com o banco de dados servidos, usuário, senha, nome do banco)

$con = new mysqli("localhost", "root", "", "escola");

// Verifica se ocorreu erro ao tentar conectar
if ($con->connect_error) {
    die("ERRO: " . $con->connect_error);
    //Encerra o programa e mostra o erro
}

// SQL para buscar o usuário pelo e-mail informado
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $con->query($sql);
//Executa a consulta no banco

//Verifica se o e-mail existe na tabela
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    //Pega os dados do usuário encontrado

    //  Verfica se a senha digitada confere com a senha criptografada do banco
    if (password_verify($senha, $usuario['senha'])) {
         
        $_SESSION['usuario'] = $usuario['nome'];
        // Guarda o nome do usuário na sessão (para manter o login ativo)

        header("Location: inicio.php");
        // Redireciona para a página protegida
        exit;
        // Encerra o script após o redirecionamento
    } else {
        echo "Senha incorreta!";
        // Senha não bate
    }
} else {
    echo "E-mail não encontrado!";
    // Nenhum usuário com esse e-mail foi localizado no banco
} 

$con->close();
//Fecha a conexão com o banco
?>