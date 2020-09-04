<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stilos.css">
    <title>Painel Solicitação de Pedidos</title>
</head>
<body>
    <header>
        <h1>DDGArt Café</h1>
        <h2>Solicite ou acompanhe seu pedido</h2>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
              <div class="leftnav col-sm-4">
                  <div id="qrcode" class="qrCodeBox">
                        <script src="js/qrcode.min.js"></script>
                        <script type="text/javascript">
                            var qrcode = new QRCode(document.getElementById("qrcode"), {
                                text: 'cadastra-pedido.php', //entre com a url absoluta da página de cadastro aqui
                                width: 250,
                                heigh: 250,
                                colorDark: '#40281A',
                                colorLight: '#F2E2CE',
                                correctLevel: QRCode.CorrectLevel.H
                            })
                        </script> 
                  </div>
                  <hr>
                  <p>Scaneie o código acima e realize</p>
                  <p>Você será avisado no painel quando ele estiver pronto</p>
              </div>
              <div class="rightnav col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Venha retirar seu pedido</h3>
                        <?php
                        $result = "SELECT cad_nome FROM controlepedido WHERE cad_status ='feito' LIMIT 1";
                        $resultadoQuery = $conexao->prepare($result);
                        $resultadoQuery->execute();
                        while($row_cont = $resultadoQuery->fetch(PDO::FETCH_ASSOC)) {
                            echo "<h4>". $row_cont['cad_nome']."</h4><br>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <h3>Preparação</h3>
                        <?php
                        $result = "SELECT cad_nome FROM controlepedido WHERE cad_status='emproducao' LIMIT 4";
                        $resultadoQuery = $conexao->prepare($result);
                        $resultadoQuery->execute();

                        while($row_cont = $resultadoQuery->fetch(PDO::FETCH_ASSOC)) {
                            echo "<h4>". $row_cont['cad_nome']."</h4><br>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <h3>Prontos</h3>
                        <?php
                        $result = "SELECT cad_nome FROM controlepedido WHERE cad_status='feito' LIMIT 4";
                        $resultadoQuery = $conexao->prepare($result);
                        $resultadoQuery->execute();

                        while($row_cont = $resultadoQuery->fetch(PDO::FETCH_ASSOC)) {
                            echo "<h4>". $row_cont['cad_nome']."</h4><br>";
                        }
                        ?>
                    </div>
                </div>
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