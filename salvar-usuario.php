<?php 
    switch($_REQUEST["acao"]){
    case 'cadastrar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nascimento = $_POST["data_nascimento"];

        $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento) 
                VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nascimento}')";

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Usuario cadastrado com sucesso');</script>";
            print "<script>location.href ='?page=listar';</script>";
        }else{
            print "<script>alert('Não foi possivel efetuar o cadastro do usuario');</script>";
            print "<script>location.href ='?page=listar';</script>";
        }
            break;
    case 'editar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nascimento = $_POST["data_nascimento"];

        $sql = "UPDATE usuarios SET nome='{$nome}',
                                    email='{$email}', 
                                    senha='{$senha}', 
                                    data_nascimento='{$data_nascimento}'
                                WHERE 
                                    id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Usuario editado com sucesso');</script>";
            print "<script>location.href ='?page=listar';</script>";
        }else{
            print "<script>alert('Não foi possivel editar o usuario');</script>";
            print "<script>location.href ='?page=listar';</script>";
        }

            break;
        case 'excluir':

            $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];

            $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Usuario excluido com sucesso');</script>";
            print "<script>location.href ='?page=listar';</script>";
        }else{
            print "<script>alert('Não foi possivel excluir o usuario');</script>";
            print "<script>location.href ='?page=listar';</script>";
        }
            break;
    }
?>