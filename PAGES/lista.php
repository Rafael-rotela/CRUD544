<?php
    require "../Classes/usuario.php";
    $usuario = new Usuario();
    $usuario->conectar("crud544","localhost","root","");

    $dados = $usuario->listarDados();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuario</title>
</head>
<body>
    <h2 class="titulo-pagina">Cadastro lista</h2>

    <a href="cadastro.php"><button>cadastro</button></a>
    <table border='1' cellpadding="10">
        <thead>
            <tr>
                <th>ID USUARIO</th>
                <th>NOME</th>
                <th>TELEFONE</th>
                <th>EMAIL</th>
                <th>AÇOES</th>
            </tr>
        </thead>
        <?php 
            foreach($dados as $pessoa)
            {
        ?>
        <tbody>
            <tr>
                <td>
                    <!-- Informações sofre o id do usuario -->
                     <?php echo $pessoa['id_usuario'] ?>
                    </td>
                    <td>
                        <!-- Informações sofre o NOME do usuario -->
                        <?php echo $pessoa['nome'] ?>
                    </td>
                    <td>
                        <!-- Informações sofre o EMAIL do usuario -->
                        <?php echo $pessoa['email'] ?>
                    </td>
                    <td>
                        <!-- Informações sofre o TELEFONE do usuario -->
                        <?php echo $pessoa['telefone'] ?>
                    </td>
                    <td>
                        <!-- Informações sofre o AÇÕES do usuario -->
                    <a href="editar.php?id_usuario=<?php echo $pessoa['id_usuario']; ?>">EDITAR</a>
                    <a href="excluir.php?id_usuario=<?php echo $pessoa['id_usuario']; ?>">EXCLUIR</a>
                </td>
    
            </tr>

        </tbody>
        <?php 
            }
        ?>
    </table>

</body>
</html>