<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/responsividade.css">
        <link rel="stylesheet" href="css/card.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700" rel="stylesheet"> 
        <link rel="icon" href="img/logoTMF.png" type="image/png">
        <title> Indústria TMF | Home </title> 

    </head>
    

    <body>

        <!-- Inclusão do cabeçalho do site -->
        <header>
            <?php include_once('header.php'); ?>
        </header>

        <!-- Corpo principal -->
        <main>
            <span id="secaoHome"></span>
            <!--SOBRE NÓS-->
            <section id="secaoSobre" class="secaoSite" style="margin-top:140px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 container-titulos">
                            <h1 class="titulo_secoes">
                                Sobre Nós
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 my-auto">
                            <img src="img/tmf.png" class="img-fluid mx-auto d-block rounded" style="margin-right:50px;">
                            <br>
                        </div>
                        <div class="col-md-7">
                            <!-- Texto com até 700 caracteres, minimo 530 -->
                            <h3 style="text-align:right;" class="subTituloSobre"> Conheça a TMF </h3>
                            <p class="texto" style="text-align:justify;">
                                &emsp;
                                <span id="textoSobre">
                                    
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

            <!--Produtos-->
            <section id="secaoProdutos" class="secaoSite">
                <div class="container-fluid tema">
                    <div class="row">
                        <div class="col-md-12 container-titulos">
                            <h1 class="titulo_secoes_tema">
                                Produtos
                            </h1>
                        </div>
                    </div>
                    <div class="row mx-auto pb-3 pb-md-5 pl-3 pl-md-5 pr-3 pr-md-5">
                        <?php
                            include_once('sistema/db.class.php');
                            $objDB = new db();
                            $conn = $objDB->conecta_mysql();
                            $query_select = "SELECT imagemproduto.nome,produto.nome AS nomes,codImagem,produto.codProduto, descricao FROM produto
                            INNER JOIN imagemproduto ON produto.codProduto = imagemproduto.codProduto WHERE produto.codProduto IN ( SELECT produto2 FROM sobre)
                            OR produto.codProduto IN ( SELECT produto1 FROM sobre) OR produto.codProduto IN ( SELECT produto3 FROM sobre) GROUP BY imagemproduto.codProduto ;";
                            $result_select = mysqli_query($conn,$query_select) or die(mysqli_error($conn));
                            $rows = array();
                            $contadorProdutos = 0;
                            while($row = mysqli_fetch_array($result_select))
                                $rows[] = $row;
                            foreach($rows as $row){
                                $contadorProdutos = $contadorProdutos + 1;
                                $codProduto = $row['codProduto'];
                                $nome = $row['nome'];
                                $nomes = $row['nomes'];
                                $descricao = $row['descricao'];
                                echo '<div class="col-12 col-sm-6 col-lg-3">';
                                echo '<div class="cardProdutos">';
                                echo '<div class="containerProduto sombra-cartao" id="cardProduto'.$contadorProdutos.'">';
                                echo '<div class="cardProdutosImgContainer">';
                                echo '<img src="sistema/Img/Produtos/'.$nome.'" class="img-fluid rounded my-auto mx-auto d-block" style="object-fit: cover">';
                                echo '</div>';
                                echo '<div class="cardProdutosDescricao">';
                                echo '<div class="justify-content-center text-center align-items-center d-flex nomeProduto">';
                                echo '<h4> '.$nomes.' </h4>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="descricaoProduto sombra-cartao">';
                                echo '<h4 class="nomeProdutoInterno"> '.$nomes.' </h4>';
                                echo '<p class="text-justify px-3 py-1 " style="transition: display 1s linear 1s;">
                                                '.(substr($descricao,0,70)).'...
                                                <br>
                                                <a href="./produtos.php"> Ver mais... </a>
                                            </p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        ?>                            
                       
                        <div class="col-12 col-sm-6 col-lg-3">
                            <a href="produtos.php" style="text-decoration:none;">
                                <div id="cardProdutosVerMais" class="sombra-cartao" style="box-sizing:border-box;border:2px solid #FFFFFF;background-color:#808080;border-bottom:none;height:80%;padding:10px;">
                                    <h2 style="font-size:150px;text-align:center;color:#FFFFFF">+</span>
                                </div>

                                <div id="cardProdutosVerMaisDescricao" class="sombra-cartao" style="border:2px solid #FFFFFF;height:20%;">
                                    <div class="justify-content-center align-items-center d-flex nomeProduto" style="margin-top:7px; display:inline-block;" >
                                        <h4 id="nomeProduto"> Ver Mais </h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>             
                </div>
            </section>
            <!--/PRODUTOS-->

            <!--SERVICOS-->
            <section id="secaoServicos" class="secaoSite">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 container-titulos">
                            <h1 class="titulo_secoes">
                                Serviços
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 my-auto">
                            <p class="texto" style="text-align:justify;">
                                &emsp;
                                <span id="textoServicos">
                                Lorem ipsum dolor sit amet, consecttur adipiscing elit. Done c rutrum feugiat augue. Aenean ac laoreet mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce egestas augue sit amet posuere volutpat. Ut a leo ut risus accumsan luctus id eu velit. Curabitur sodales pharetra lectus sit amet luctus. Integer dignissim laoreet velit non cursus. Suspendisse sit amet neque scelerisque, vehicula libero ac, fermentum neque. Integer lacinia pulvinar massa, sit amet egestas turpis pulvinar a. Suspendisse hendrerit, marcoligula vel sagittis . Suspendisse hendrerit, marcoligula vel sagittis. Suspendisse hendrerit, marcoligula vel sagittis. Suspendisse hendrerit, marcoligula vel sagittis. Suspendisse hendrerit, marcoligula vel sagittisaaa
                                </span>
                            </p>
                            <a href="servicos.php" id="vermais">Ver mais...</a>
                        </div>

                        <div class="col-md-7 mx-5 mx-md-0 my-3">
                        <?php 
                            include_once('sistema/db.class.php');
                            $objDB = new db();
                            $conn = $objDB->conecta_mysql();
                            $query_select = "SELECT imagemservico.nome AS imgServ, servico.nome AS nomeServ FROM servico INNER JOIN imagemservico ON servico.codServico = imagemservico.codServico
                                WHERE servico.codServico IN (SELECT servico1 FROM sobre) OR servico.codServico IN (SELECT servico2 FROM sobre) OR servico.codServico IN (SELECT servico3 FROM sobre) 
                                OR servico.codServico IN (SELECT servico4 FROM sobre) GROUP BY imagemservico.codServico;";
                            $result_select = mysqli_query($conn, $query_select) or die(mysqli_error($conn));
                            $rows = array();
                            while($row = mysqli_fetch_array($result_select)){
                                $rows[] = $row;
                            }

                            $contadorServicos = 0;

                            foreach($rows as $row){
                                //var_dump($row);
                                //die();
                                //$codServico = $row['codServico'];
                                $imgServ = $row['imgServ'];
                                $nomeServ = $row['nomeServ'];
                                if($contadorServicos % 2 == 0){
                                    echo '<div class="row">';
                                }
                                echo '<div class="col-md-6">';
                                echo '<div class="container">';
                                echo '<div class="row">';
                                echo '<div class="col-md-12" style="padding: 20px;">';
                                echo '<img src="sistema/Img/Servicos/'.$imgServ.'" id="'.($contadorServicos + 1).'" style="max-height: 250px;" class="img-fluid rounded mx-auto d-block">';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="row">';
                                echo '<div class="col-md-12">';
                                echo '<h4 class="nomeServicos" id="'.($contadorServicos + 1).'">'.$nomeServ.'</h4>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';

                                if($contadorServicos % 2 == 1){
                                    echo '</div>';
                                }

                                $contadorServicos += 1;
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </section>
            <!--/SERVICOS-->
            <section>
                <div class="container-fluid mt-3 tema">
                    <div class="row d-flex m-0 m-md-5 p-0 p-md-3 my-auto">
                        <div class="col-md-3 col-sm-6 col-xs-6 col-6 d-flex justify-content-center mx-auto p-3 m-0">
                            <div class="card border-danger d-flex justify-content-center p-3 sombra-cartao">
                                <div class="text-info text-center"><h4 class="font_info_card text-uppercase" id="indicador1"> Projetos entregues</h4></div>
                                <div class="linha_separadora"></div>
                                <div class="text-info text-center mt-2"><h2 class="font_info_card_num"><div id="numero1">1</div></h2></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-6 d-flex justify-content-center mx-auto p-3 m-0">
                            <div class="card border-danger d-flex justify-content-center p-3 sombra-cartao">
                                <div class="text-info text-center"><h4 class="font_info_card text-uppercase" id="indicador2">Anos no mercado</h4></div>
                                <div class="linha_separadora"></div>
                                <div class="text-info text-center mt-2"><h2 class="font_info_card_num"><div id="numero2">1</div></h2></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-6 d-flex justify-content-center mx-auto p-3 m-0">
                            <div class="card border-danger d-flex justify-content-center p-3 sombra-cartao">
                                <div class="text-info text-center"><h4 class="font_info_card text-uppercase" id="indicador3">Produtos próprios</h4></div>
                                <div class="linha_separadora"></div>
                                <div class="text-info text-center mt-2"><h2 class="font_info_card_num"><div id="numero3">1</div></h2></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-6 d-flex justify-content-center mx-auto p-3 m-0">
                            <div class="card border-danger d-flex justify-content-center p-3 sombra-cartao">
                                <div class="text-info text-center "><h4 class="font_info_card text-uppercase" id="indicador4">Opções de serviço</h4></div>
                                <div class="linha_separadora"></div>
                                <div class="text-info text-center mt-2"><h2 class="font_info_card_num"><div id="numero4">1</div></h2></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
            <!--PORTIFÓLIO-->
            <!-- <section id="secaoPortifolio" class="secaoSite">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 container-titulos">
                            <h1 class="titulo_secoes">
                                Portifólio
                            </h1>
                        </div>
                    </div>
                        <div class="tab-content">
                            <div class="ProjetoPortifolio tab-pane active" role="tabpanel" id="port1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="img/tornearia.png" id="imagem_port">
                                    </div>
                                    <div class="col-md-6">
                                            <p id ="texto_port" class="texto">
                                                Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam vel lacus ut tellus fringilla imperdiet.
                                            </p>                          
                                    </div>
                                </div>
                            </div>
                            <div class="ProjetoPortifolio tab-pane " role="tabpanel" id="port2">
                            <div class="row">
                                    <div class="col-md-6">
                                        <img src="img/usinagem.png" id="imagem_port">
                                    </div>
                                    <div class="col-md-6">
                                            <p id ="texto_port" class="texto">
                                                Pellentesque nec sem non arcu fringilla mattis sed nec turpis.
                                            </p>                          
                                    </div>
                                </div>
                            </div>
                            <div class="ProjetoPortifolio tab-pane " role="tabpanel" id="port3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="img/manutencao.png" id="imagem_port">
                                    </div>
                                    <div class="col-md-6">
                                            <p id ="texto_port" class="texto">
                                                Etiam ut consectetur lacus. Mauris sagittis orci ut odio pharetra, eget sagittis odio pharetra.
                                            </p>                          
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container" id="div_button_port">
                            <ul class="nav nav-tabs listaPortifolio"  role="tablist">
                                <li class="nav-item itemPortifolio"><button class="btn btn-primary btn_port" class="nav-link active" href="#port2" role="tab" data-toggle="tab"> <center> <img src="img/circulo.png" class="img_btn_port"> </center> </button> </li>
                                <li class="nav-item itemPortifolio"><button class="btn btn-primary btn_port" class="nav-link" href="#port1" role="tab" data-toggle="tab"> <center> <img src="img/circulo.png" class="img_btn_port"> </center> </button> </li>
                                <li class="nav-item itemPortifolio"><button class="btn btn-primary btn_port" class="nav-link" href="#port3" role="tab" data-toggle="tab"> <center> <img src="img/circulo.png" class="img_btn_port"> </center> </button> </li>
                            </ul>
                        </div>
                </div>
            </section> -->
            <section>
                <div id="secaoPortifolio" class="container secaoSite">
                    <div class="row">
                        <div class="col-md-12 container-titulos">
                            <h1 class="titulo_secoes">
                                Portifólio
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="carouselPortifolio" class="carousel slide" data-ride="carousel">

                                <div class="carousel-inner">

                                    <?php 
                                    $cont_slide = 0;
                                    $i = 0;
                                    $query_select = "SELECT imagemportifolio.nome AS imgNome, codImagem, portifolio.codPortifolio, portifolio.nome AS portNome, descricao FROM portifolio INNER Join imagemportifolio on portifolio.codPortifolio = imagemportifolio.codPortifolio where status ='1' group by imagemportifolio.codPortifolio 
                                    ;";
                                    $result_select = mysqli_query($conn,$query_select) or die(mysql_error());
                                    $rows = array();
                                    while($row = mysqli_fetch_array($result_select))
                                        $rows[] = $row;
                                    foreach($rows as $row){
                                        $active = "";
                                        if($cont_slide == 0){
                                            $active = "active";
                                        }
                                        $codPortifolio = $row['codPortifolio'];
                                        $imgNome = $row['imgNome'];
                                        $descricao = $row['descricao'];
                                        $portNome = $row['portNome'];

                                        echo '<div class="carousel-item pb-3 imagem_port_fundo mx-auto '.$active.' " style="background-image:url(sistema/Img/Portifolio/'.$imgNome.'">';
                                        echo '<img class="d-block w-100 imagem_port_frente mx-auto" src="sistema/Img/Portifolio/'.$imgNome.'"  >';
                                        echo '<div class="carousel-caption mx-auto">';
                                        echo '<p>'.$portNome.' - '.(substr($descricao,0,250)).'<br><a href="portifolio.php" style="float:right; color:#f8aa00; text-decoration:underline; margin-right:10px">Saiba mais</a>'.'</p>';
                                        echo '</div>';
                                        echo '</div>';
                                        $cont_slide = $cont_slide + 1;
                                        }
                                        ?>
                                          
                                <a class="carousel-control-prev" href="#carouselPortifolio" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselPortifolio" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Próximo</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/PORTIFÓLIO-->
            
            <!--PARCEIROS/CLIENTES-->

            <section id="secaoParceiros">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 container-titulos">
                            <h1 class="titulo_secoes">
                             Parceiros
                         </h1>
                     </div>
                 </div>
                 <div class="row">
                    <?php 
                    $query_select = "SELECT * FROM parceiros where estatus = '1' ;";
                    $result_select = mysqli_query($conn,$query_select) or die(mysql_error());
                    $rows = array();
                    while($row = mysqli_fetch_array($result_select))
                        $rows[] = $row;
                    foreach($rows as $row){ 
                        $codParceiro = $row['codParceiro'];
                        $nome = $row['nome'];
                        $extensao = $row['extensao'];
                        $linkParceiro = $row['linkParceiro'];
                        echo '<div class=" col-xl-2 col-md-2 col-sm-4 col-6 mx-auto text-center">';
                        echo ' <a href="'.$linkParceiro.'" target="_blank" >';
                        echo ' <img src="sistema/Img/Parceiros/'.$codParceiro.'.'.$extensao.'" target="_blank" class="centro-vertical img_patro-forne img-responsive">';
                        echo ' </a>';
                        echo '</div>';
                    }
                    ?>  
                </div>
            </div>

            <section id="secaoClientes">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 container-titulos">
                        <h1 class="titulo_secoes">
                          Clientes
                        </h1>
                    </div>
                </div>
                <div class="row">
                      <?php 
     
                   
                   
                    $query_select = "SELECT * FROM clienteempresa where estatus = '1' ;";
                    $result_select = mysqli_query($conn,$query_select) or die(mysql_error());
                    $rows = array();
                    while($row = mysqli_fetch_array($result_select))
                        $rows[] = $row;
                    foreach($rows as $row){ 
                        $codCliente = $row['codCliente'];
                        $extensao = $row['extensao'];
                        $linkCliente = $row['linkCliente'];
                        echo '<div class=" col-xl-2 col-md-2 col-sm-4 col-6 mx-auto text-center">';
                        echo ' <a href="'.$linkCliente.'" target="_blank" >';
                        echo ' <img src="sistema/Img/Clientes/'.$codCliente.'.'.$extensao.'" target="_blank" class="centro-vertical  img_patro-forne img-responsive">';
                        echo ' </a>';
                        echo '</div>';
                    }
                    ?>  
                </div>
            </div>

            <!--PATROCÌNIO/FORNECEDORES-->
            
            <!--CONTATO-->
           <section id="secaoContato" class="secaoSite">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 container-titulos">
                            <h1 class="titulo_secoes">
                                Contato
                            </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 tema pt-3" id="contate-nos">
                            <!-- <h3> Contate-nos</h3> -->
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <div class="icone-contatenos">
                                        <img class="img-responsive float-left d-inline-block" src='img/Contato/local.png'>
                                    </div>
                                    <div class="info-contatenos text-center">
                                        <p class="m-0"><a href="https://goo.gl/maps/3fBXQVXTmBF2">Rua Prudente de Moraes, 200 <br> Duas Pedras, Nova Friburgo-RJ</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <div class="icone-contatenos">
                                        <img class="img-responsive float-left d-inline-block" src='img/Contato/telefone.png'>
                                    </div>
                                    <div class="info-contatenos text-center">
                                        <p class="m-0">&emsp;&emsp;<a href="tel:2225232525">(22) 2523-2525</a></p>
                                        <p class="m-0"><img src="img/Contato/whatsapp-brands.svg" id="icone-whatsapp"><a href="https://wa.me/5522992891123">(22) 99289-1123</a></p>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <div class="icone-contatenos">
                                        <img class="img-responsive float-left d-inline-block" src='img/Contato/email.png'>
                                    </div>    
                                    <div class="info-contatenos text-center">
                                        <p><a href="mailto:industriatmf@gigalink.com.br">usinagemtmf@gmail.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pt-3 pt-lg-2" id="mande_mensagem">
                            <!-- <h3> Mande uma mensagem </h3> -->
                            <br>
                            <div id="sucesso" class="alert alert-success" role="alert" style="display:none;">
                                Mensagem enviada com sucesso!
                            </div>
                            <div id="fracasso" class="alert alert-danger" role="alert" style="display:none;">
                                Houve um erro ao enviar sua mensagem, por favor, tente novamente mais tarde ou entre em contato diretamente pelos canais ao lado!
                            </div>
                            <div id="incompleto" class="alert alert-warning" role="alert" style="display:none;">
                                Por favor, verifique se há informações faltando ou incorretas e tente novamente!
                            </div>
                            <form id="formularioContato" method="POST" enctype="multipart/form-data">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="txtForm" for="nome"> &ensp;Nome </label> <br>
                                            <input type="text" class="inpForm" id="nome" name="nome" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 pt-3 pt-md-0">
                                            <label class="txtForm" for="telefone"> &ensp;Telefone </label> <br>
                                            <input type="text" class="inpForm" id="telefone" name="telefone" autocomplete="off" maxlength="15">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="txtForm" for="email"> &ensp;E-mail </label> <br>
                                            <input type="email" class="inpForm" id="email" name="email" autocomplete="off">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="txtForm" for="mensagem"> &ensp;Mensagem </label> <br>
                                            <textarea class="inpForm" id="mensagem" name="mensagem" rows="6"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="hidden" name="pagina" id="pagina" value="Principal">

                                    <!-- Limite de 32MB para envio de arquivos -->
                                    <input type="hidden" name="MAX_FILE_SIZE" value="33554432">
                                    <div class="float-left  p-2">
                                        <input type="file"  class="form-control jfilestyle" id="file" name="file[]" accept="image/*,.pdf" multiple="multiple"> 
                                    </div>
                                    <div class="float-right p-2">
                                        <button type="button" class="btn btn-primary inpForm" id="enviar" name="enviar"> Enviar </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--
                    <div class="row ">
                                        <div class="col-md-10 col-sm-12 d-flex justify-content-center y-auto">
                                            <label for='anexar' id="inputcustom">Selecionar um arquivo &#187;</label>
                                            <input type="file" class="form-control" id="anexar" name="_FILES" accept="image/*,.pdf"> 
                                            <span style=" color: #365C9A;"id='file-name'>Vazio</span>
                                        </div>
                                        <div class="col-md-2 col-sm-12 d d-flex justify-content-center y-auto">
                                            <button type="button p-0" class="btn btn-primary" id="enviar" name="enviar"> Enviar </button>
                                        </div>
>>>>>>> Marco Araujo: Inclusão do favicon, alteração das imagens em Conteúdo e melhoria no dissmiss dos modals
                                    </div>

                    -->

                    <div class="row" id="linha-mapa">
                        <div class="container-fluid" id="container-mapa">
                            <div id="mapa">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3692.3557553650658!2d-42.533161308407855!3d-22.26450980253507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x978ab7bdf4026d%3A0x202aa51e0d1b3d97!2sTmf+tornearia+e+usinagem!5e0!3m2!1spt-BR!2sbr!4v1542190577400" width="100%" height="450" frameborder="0" style="border:0;margin-top:20px;" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/CONTATO-->
        </main>
        

        <!-- Inclusão do rodapé do site -->
        <footer>
            <?php include_once('footer.php'); ?>
        </footer>
    </body>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/header.js"></script>
    <script src="js/modalContato.js"></script>
    <script src="js/Input/jquery-filestyle.min.js"></script>
    <script>$(":file").jfilestyle('buttonBefore', true)</script>
    <script>$(":file").jfilestyle('text', 'Selecionar arquivo');</script>
    <script>
        if ($(window).width() < 530){
            $(":file").jfilestyle('input',false);
        }
    </script>
    
    <!-------------------------- scripts de contagem  ------------------------------------------>

  
</html>