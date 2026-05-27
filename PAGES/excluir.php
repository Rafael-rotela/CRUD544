<?php
    require "../Classes/usuario.php";
    $usuario = new Usuario();
    $usuario->conectar("crud544","localhost","root","");

    if (isset($_GET['id_usuario'])) 
    {
       $id_usuario = addslashes($_GET['id_usuario']);
       $usuario->excluirUsuario($id_usuario);
    }
    header("location:lista.php")
?>