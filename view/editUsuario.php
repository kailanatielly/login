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
    echo " | <a href='../controller/logout.php'>Sair</a>";
}

require_once '../controller/cUsuario.php';
$id = 0;
if (isset($_POST['updateUser'])) {
    $id = $_POST['id'];
}
$listaUser = new cUsuario();
$lista = $listaUser->getUsuarioById($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Usuário</title>
    </head>
    <body>
        <h1>Editar Usuário</h1>
        <form action="../controller/editUser.php" method="POST">
            <input type="hidden" value="<?php echo $lista[0]['idUser']; ?>" name="id"/>
            <input type="text" required value="<?php echo $lista[0]['nomeUser']; ?>" name="nome"/>
            <br><br>
            <input type="email" required value="<?php echo $lista[0]['email']; ?>" name="email"/>
            <br><br>
            <input type="submit" value="Salvar Alterações" name="update"/>
            <input type="button" value="Cancelar"
                   onclick="location.href = 'listaUsuarios.php'"/>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
