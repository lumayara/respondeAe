<?php
include './dao/UsuarioDAO.php';


$dao = new UsuarioDAO();
// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// Salva duas variáveis com o que foi digitado no formulário

// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido

    $email = (isset($_POST['email'])) ? $_POST['email'] : '';

    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';

    $remember = isset($_POST['senha']);

// Utiliza uma função pra validar os dados digitados

    if ($dao->validaUsuario($email, $senha, $remember) == true) {

    // O usuário e a senha digitados foram validados, manda pra página interna

        header("Location: index.html");

    } else {

    // O usuário e/ou a senha são inválidos, manda de volta pro form de login

    // Para alterar o endereço da página de login, verifique o arquivo seguranca.php

        header("Location: blank.html");

    }
}