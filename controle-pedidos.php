<?php
include_once './conexao.php';

function updateToDooing (){

}

function updateToDone (){

}
function removeOrderEntry (){

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stilos.css">
    <title>Painel Controle de Pedidos</title>
    <!--<meta http-equiv="Refresh" content="30">-->
</head>
<body>
    <header>
        <h1>Controle</h1>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
              <div class="rightnav col-sm-4">
                <h3>A Fazer</h3>
                <?php
                  $result = "SELECT cad_nome, cad_qtd FROM controlepedido WHERE cad_status='afazer' LIMIT 10";
                  $resultadoQuery = $conexao->prepare($result);
                  $resultadoQuery->execute();
                  while($row_cont = $resultadoQuery->fetch(PDO::FETCH_ASSOC)) {
                    echo "<h4>". $row_cont['cad_nome']." - Qtd. de pedidos ".$row_cont['cad_qtd']." <button name='atualizaStatus' value='viraEmAndamento' class='btn btn-secondary' type='submit' type='button' onclick='".updateToDooing()."'>Próximo</button></h4><hr>";
                  }
                ?>
              </div>
              <div class="rightnav col-sm-4">
                <h3>Em andamento</h3>
                <?php
                  $result = "SELECT cad_nome FROM controlepedido WHERE cad_status='emproducao' LIMIT 10";
                  $resultadoQuery = $conexao->prepare($result);
                  $resultadoQuery->execute();
                  while($row_cont = $resultadoQuery->fetch(PDO::FETCH_ASSOC)) {
                    echo "<h4>". $row_cont['cad_nome']." <button name='atualizaStatus' value='viraFeito' class='btn btn-secondary' type='submit' type='button' onclick='".updateToDone()."'>Próximo</button></h4><hr>";
                  }
                ?>
              </div>
              <div class="rightnav col-sm-4">
                <h3>Feito</h3>
                <?php
                  $result = "SELECT cad_nome FROM controlepedido WHERE cad_status='feito' LIMIT 10";
                  $resultadoQuery = $conexao->prepare($result);
                  $resultadoQuery->execute();
                  while($row_cont = $resultadoQuery->fetch(PDO::FETCH_ASSOC)) {
                    echo "<h4>". $row_cont['cad_nome']." <button name='atualizaStatus' value='removeitem' class='btn btn-secondary' type='submit' type='button' onclick='".removeOrderEntry()."'>Remover</button></h4><hr>";
                  }
                ?>
              </div>
            </div>
        </div>
    </main>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        setTimeout(() => {
            window.location.reload(true);
        }, 60000);
    </script>
</body>
</html>