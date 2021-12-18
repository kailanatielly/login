<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
session_start();
if (!isset($_SESSION['logado']) && $_SESSION['logado'] != true) {
    header("Location: login.php");
} else {
    echo $_SESSION['usuario'] . " | " . $_SESSION['email'];
    echo " | <a href= '../controller/logout.php'>Sair</a>";
}
require_once '../controller/cUsuario.php';
$cadUser = new cUsuario();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title></title>
    </head>
    <body>

        <h1>Cadastro de Usuários</h1>
         <form action="<?php $cadUser->inserir(); ?>" method="POST">
            <input type="text" name="nome" placeholder="Nome aqui..."/>
            <br><br>
            <input type="email" name="email" placeholder="E-mail aqui..."/>
            <br><br>
            <input type="password" name="pas" placeholder="Senha aqui..."/>
            <br><br>
            <input type="submit" name="salvar" value="Salvar"/>
            <input type="reset" name="limpar" value="Limpar"/>
            <input type="button" value="Voltar"
                   onclick="location.href = '../index.php'"/>
            <br><br>
            <input type="button" value="Lista Usuários" 
                   onclick="location.href = 'listaUsuarios.php'"/>
        </form>
<?php
// put your code here
?>
    </body>
</html>