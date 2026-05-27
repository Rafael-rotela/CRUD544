<?php
    require "../Classes/usuario.php";
    $usuario = new Usuario();
    $usuario->conectar("crud544","localhost","root","");

    if(isset($_GET['id_usuario']))
    {
        $id_update = addslashes($_GET['id_usuario']);
        $dados = $usuario->buscarDadosUsuario($id_update);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h2 class="titulo-pagina">EDITAR USUÁRIO</h2>
    <a href="cadastro.php"><button>cadastro</button></a>

    <form method="post">
        <input type="text" name="nome" value=" <?php echo $dados['nome']; ?>">
        <input type="email" name="nome" value=" <?php echo $dados['email']; ?>">
        <input type="tel" name="nome" value=" <?php echo $dados['telefone']; ?>">
        <input type="submit" value="ATUALIZAR">
    </form>

</body>
</html>