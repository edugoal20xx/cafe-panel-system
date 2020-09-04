<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stilos.css">
    <title>Tela de cadstro de pedidos</title>
</head>
<body>
    <header>
        <h1>Café
        Expresso</h1>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 rightnav telaCadastro">
                    <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <form method="POST" action="dcontrol.php">
                            <label>Quantidade:</label>
                            <input type="number" min="1" max="10" name="qtd" value="1" required><br>
                            <input type="text" name="nome" placeholder="Nome Completo" required><br>
                            <input type="text" name="email" placeholder="E-mail" required><br>
                            <input type="text" name="tel" placeholder="Telefone" required><br><br>
                            <button type="submit" name="enviapedido" value="enviapedido" class="btn btn-light">Cadastrar o pedido</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>