<?php
    Class Usuario
    {
        private $pdo;

        public $msgErro = "";

        public function conectar($nome_banco, $host, $usuario, $senha)
        {
            global $pdo;
            try{
                $pdo = new PDO("mysql:dbname=".$nome_banco,$usuario,$senha);
            } catch(PDOException $erro){
                $msgErro = $erro->getMessage();
            }
        }
        public function cadastrarUsuario($nome, $email, $telefone, $senha)
        {
            global $pdo;
            $usuario = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e");
            $usuario->bindValue(":e", $email);
            $usuario->execute();
            if($usuario->rowCount() > 0)
            {
                return false;
            }
            else
            {
                $usuario = $pdo-> prepare("INSERT INTO usuario(nome,email,telefone,senha) VALUES (:n, :e , :t, :s)");
                $usuario->bindValue(":n",$nome);
                $usuario->bindValue(":e",$email);
                $usuario->bindValue(":t",$telefone);
                $usuario->bindValue(":s",$senha);
                $usuario->execute();
                return True;
            }
        }

        public function listarDados()
        {
            $dados_usuario = array();
            global $pdo;

            $sql =  $pdo->prepare("SELECT * FROM usuario ORDER BY nome");
            $sql->execute();

            $dados_usuario = $sql->fetchALL(PDO:: FETCH_ASSOC);

            return $dados_usuario;
        }

        public function excluirUsuario($id_usuario)
        {
            global $pdo;
            $sql = $pdo->prepare("DELETE FROM usuario WHERE id_usuario = :id");
            $sql->bindValue(":id", $id_usuario);
            $sql->execute();
        }

        public function buscarDadosUsuario($id_usuario)
        {
            $dados_usuario = array();
            global $pdo;

            $sql = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
            $sql->bindValue(":id", $id_usuario);
            $sql->execute();

            $dados_usuario = $sql->fetch(PDO::FETCH_ASSOC);

            return $dados_usuario;
        }

        public function atualizarDadosUsuario($id_usuario, $nome, $email, $telefone, $senha)
        {
            $dados_usuario = array();

            global $pdo;

            $sql-> $pdo->prepare("UPDATE usuario set nome = :n, email = :e, telefone = :t WHERE id_usuario = :id ");
            $sql->binValue(":n",)

        }
    }

?>