<?php
//Recebemos aqui os dados enviados pelo formulário
$nome = $_POST['nome'];
$email = $_POST['email'];

//CRIPTOGRAFIA DA SENHA ANTES DE SALVAR NO BANCO DE DADOS (por segurança)
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
?>