<?php
require '../Classes/usuario.php';
$usuario =  new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 class="titulo-pagina">CADASTRO DE USUÁRIO</h2>
    <a href="lista.php"><button>listar</button></a>
    <form method="post">
        <input type="text" name="nome" id="" class="input-form" placeholder="Digite seu nome">
        <input type="email" name="email" id="" class="input-form" placeholder="Digite seu email">
        <input type="tel" name="telefone" id="" class="input-form" placeholder="Digite seu telefone">
        <input type="password" name="senha" id="" class="input-form" placeholder="Digite seu Senha">
        <input type="password" name="confSenha" id="" class="input-form" placeholder="Confirme sua Senha">
        <input type="submit" value="CADASTRAR">
        <p>Já é cadastrado? <a href="login.php">Aqui</a> para acessar</p>
    </form>

    <?php
        if (isset($_POST['nome'])) 
        {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];

            $confSenha = addslashes($_POST['confSenha']);
            if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confSenha)) 
            {
                $usuario->conectar("crud544", "localhost", "root", "");
                if ($usuario->msgErro == "") {
                    echo "conectado";
                    if ($senha == $confSenha) 
                    {
                        if ($usuario->cadastrarUsuario($nome, $email, $telefone, $senha)) 
                        {
                            ?>
                                <div class="msg-usuario">
                                    <p>Usuário cadastrado com sucesso!</p>
                                </div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class="msg-usuario">
                                <p>Usuário já cadastrado</p>
                            </div>
                            <?php
                        }
                    } 
                    else 
                    {
                        ?>
                        <div class="msg-usuario">
                            <p>As senhas não são iguais</p>
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <div class="msg-usuario">
                        <p>Erro de Conexão com o banco</p>
                        <?php
                        echo "Erro: ".
                        $usuario->msgErro;
                        ?>
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="msg-usuario">
                    <p>Preencha todos os campos</p>
                </div>
                <?php
            }
        }
    ?>
</body>

</html>