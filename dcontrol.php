<?php
session_start();
include_once './conexao.php';
//cadastro de pedidos da pagina cadastra-pedido.php
$enviaPedido = filter_input(INPUT_POST, 'enviapedido', FILTER_SANITIZE_STRING);
if($enviaPedido == 'enviapedido'){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
        $qtd = filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_STRING);
        
        $query_prod = "INSERT INTO `controlepedido` (`cad_nome`, `cad_email`, `cad_tel`, `cad_qtd`) VALUES (:nome, :email, :tel, :qtd)";
        
        $cadastrar = $conexao->prepare($query_prod);
        $cadastrar->bindParam(':nome', $nome);
        $cadastrar->bindParam(':email', $email);
        $cadastrar->bindParam(':tel', $tel);
        $cadastrar->bindParam(':qtd', $qtd);
        
        if($cadastrar->execute()){
            $_SESSION['msg'] = "<p>Pedido cadastrado com sucesso.<p>";
            header('Location: panel.php');
        } else {
            $_SESSION['msg'] = "<p>Erro 1: Pedido não foi cadastrado.<p>";
            header('Location: cadastra-pedido.php');
        }
    }else{
        $_SESSION['msg'] = "<p>Erro 2: Pedido não foi cadastrado.<p>";
            header('Location: cadastra-pedido.php');
}
//fim do cadastro