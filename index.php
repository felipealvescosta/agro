<?php

    // Recebimento de dados via serial
    $porta  = fopen('/dev/ttyUSB1', 'r+');

    if($porta)
    {         
//---------------------------------------------------------------------------------------------
                //Dados da serial
                $serial = fgets($porta);
                $dados = $serial;
                echo "$serial | ";

                // Banco de dados e inserção de valores
                $conecta = mysql_connect('localhost','root', '');
                $banco = mysql_select_db('agro');

                if($banco){
                    $sql = "INSERT INTO dados (leitura) VALUES ('$dados')";
                    $insere = mysql_query($sql);
                }
                else
                {
                    echo "Conexão não pode ser realizada! <br><br>";
                }
//-----------------------------------------------------------------------------------------------
                //Listagem dos dados
                $sql2 = "SELECT * FROM dados";
                $listagem = mysql_query($sql2, $conecta);

                while ($consulta = mysql_fetch_assoc($listagem)) {
                    $leiturasensores = $consulta['leitura'];
                    $data = $consulta['data'];
                }
                
                echo "$data";
                //impressão dos sensores
                $sensores = explode(":", $leiturasensores);

                mysql_close($conecta);
    }
    else
    {
        echo "Conexão serial não foi realizada.";
    }

//--------------------------------------------------------------------------------------------------------------------
?>

<!DOCTYPE html>
 <html dir="ltr" xml:lang="pt-br" lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <html dir="ltr" xml:lang="pt-br" lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

        <!-- Faz o refresh page para atualizar os valores do banco na tela. Deveria usar ajax , jquery ou json, mas foda-se, eu quero usar o refresh.
        O site é meu e eu faço o que quiser kkkkkkk. Vlw, Flw.s  -->
        <META HTTP-EQUIV="refresh" CONTENT="8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        

        <title>CorePart | Sistema Automatizado </title>

        <!--Favico-->
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
        
        <meta name="author" content="Aluno(a)s: Orientador: Talitha Tabatha, Felipe Alves">
        
        <!-- Styles -->        
         <link href="css/graf.css"  type="text/css" rel="stylesheet">     
        <link href="css/bootstrap.css" rel="stylesheet">  
        <link href="css/style.css" rel="stylesheet">         
        
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <style type="text/css">
     
        h3{
            font:  Tahoma, Helvetica, Arial, Sans-Serif;
        }

        .alt{
            height: 380px;
        }

        .bola {
            border-radius: 50%;
            display: inline-block;
            height: 230px;
            width: 230px;
            /*background-color: #FFFF00;*/
        }

        .dados{
            font: 50px Tahoma, Helvetica, Arial, Sans-Serif;
            text-align: center;
            margin-top: 78px;
            color: white;
        }
        </style>
    </head>
    <body>   
        <!--___________________ Cabeçalho e Menu _______________________________________ -->  
        <div class="container">
            <div class="masthead" style="margin-bottom:-12px;">

                <ul class="nav nav-pills pull-right" style="margin-top:30px; margin-right: 15px;">                                     
                    <li class="active"><a href="projeto.php">Projeto</a></li>
                </ul>

                <ul class="nav nav-pills pull-right" style="margin-top:30px; margin-right: 15px;">                                     
                    <li class="active"><a href="relatorio.php">Relatório</a></li>
                </ul>

                <ul class="nav nav-pills pull-right" style="margin-top:30px; margin-right: 15px;">                                     
                    <li class="active"><a href="index.php">Home</a></li>
                </ul>  

                <a href="index.html"><img src="img/header_logo.png" width="180" height="135" 
                alt="CorePart | Sistema Automatizado" id="imgpos" title="Projeto CorePart "><h1 class="slogan">Agro Meteorology</h1> </a>

            </div>
            <hr id="hr1" style="margin-top:25px;">
            <br>

            <!--___________________ temperaturas_______________________________________ -->
            
               <div class="row alt">

                    <div class="span4">
                        <center><h3 style="color:#0E96FD;">Temperatura</h3>
                        <br>
                            <section class="bola" style="background-color:#0E96FD">
                                <p class="dados"><? echo "$sensores[0]";?> ˚C</p>
                            </section>
                        </center>

                    </div>

                    <div class="span4">
                        <center><h3 style="color:#0CBD64;">Umidade Relativa do Ar</h3>
                       <br>
                             <section class="bola" style="background-color:#0CBD64">
                                 <p class="dados"><? echo "$sensores[1]";?> %</p>
                             </section>


                        </center>
                    </div>

                    <div class="span4">
                        <center><h3 style="color:#F6B00C;">Luminosidade</h3>
                        <br>
                            <section class="bola" style="background-color:#F6B00C">
                                <p class="dados"><? echo "$sensores[2]";?> Lm</p>
                            </section>
                        </center>
                    </div>
                </div>
            

            <!--Rodapé-->
          <?include("rodape.php");?>
            
    </body>
</html>