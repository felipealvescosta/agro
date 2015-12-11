<!DOCTYPE html>
 <html dir="ltr" xml:lang="pt-br" lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <html dir="ltr" xml:lang="pt-br" lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        

        <title>CorePart | Sistema Automatizado </title>

        <!--Favico-->
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
        
        <meta name="author" content="Aluno(a)s: Cicero Anderson, David Correia | Orientador: Felipe Alves">
        
        <!-- Styles -->        
        <link href="css/bootstrap.css" rel="stylesheet">  
        <link href="css/style.css" rel="stylesheet"> 
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../../excanvas.min.js"></script><![endif]-->
        <link href="css/graf.css"  type="text/css" rel="stylesheet">     
        <script language="javascript" type="text/javascript" src="js/jquery.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
        
        <script type="text/javascript">
                $(function() {

                    var datasets = {
                        "Umidade do Ar": {
                            label: "Umidade do Ar",
                            data: [[0, 48], [10, 59], [20, 47], [30, 49], [40,70], [50, 45], [60, 87], [70, 35], [80, 37], [90, 36], [100, 86]]
                        },        

                        "Temperatura": {
                            label: "Temperatura",
                            data: [[0, 39], [10, 40], [20, 47], [30, 19], [40, 42], [50, 42], [60, 37], [70, 35], [80, 29], [90, 10], [100, 23]]
                        },
                        "Luminosidade": {
                            label: "Luminosidade",
                            data:  [[0, 48], [10, 100], [20, 45], [30, 19], [40, 45], [50, 35], [60, 76], [70, 73], [80, 46], [90, 35], [100, 8]]
                        }
                    };//fim var datasets

                    // hard-code color indices to prevent them from shifting as
                    // countries are turned on/off

                    var i = 0;
                    $.each(datasets, function(key, val) {
                        val.color = i;
                        ++i;
                    });

                    // insert checkboxes 
                    var choiceContainer = $("#choices");
                    $.each(datasets, function(key, val) {
                        choiceContainer.append("<br/><input type='checkbox' name='" + key +
                            "' checked='checked' id='id" + key + "'></input>" +
                            "<label for='id" + key + "'>"
                            + val.label + "</label>");
                    });

                    choiceContainer.find("input").click(plotAccordingToChoices);

                    function plotAccordingToChoices() {

                        var data = [];

                        choiceContainer.find("input:checked").each(function () {
                            var key = $(this).attr("name");
                            if (key && datasets[key]) {
                                data.push(datasets[key]);
                            }
                        });

                        if (data.length > 0) {
                            $.plot("#placeholder", data, {
                                yaxis: {
                                    min: 0
                                },
                                xaxis: {
                                    tickDecimals: 0
                                }
                            });
                        }
                    }

                    plotAccordingToChoices();

                    // Add the Flot version string to the footer

                    $("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
                });
    </script>

    <style type="text/css">

    </style>
    </head>
    <body>     
    
        <div class="container">
            <div class="masthead">

                <ul class="nav nav-pills pull-right" style="margin-top:30px; margin-right: 15px;">                                     
                    <li class="active"><a href="projeto.php">Projeto</a></li>
                </ul>

                <ul class="nav nav-pills pull-right" style="margin-top:30px; margin-right: 15px;">                                     
                    <li class="active"><a href="relatorio.php">Relatório</a></li>
                </ul>

                <ul class="nav nav-pills pull-right" style="margin-top:30px; margin-right: 15px;">                                     
                    <li class="active"><a href="index.php">Home</a></li>
                </ul>  

                <a href="index.html">
                <img src="img/header_logo.png" width="180" height="135" alt="CorePart | Sistema Automatizado" id="imgpos" title="Projeto CorePart ">

                <h1 class="slogan">Agro Meteorology</h1>
                </a>

            </div>

             <hr>

            <!--Div do Grafico n corpo do html-->
            <div class="texto-box-1">
               <div id="content">
                <div class="demo-container">
                    <div id="placeholder" class="demo-placeholder" style="float:left; width:650px;"></div>
                    <p id="choices" style="float:right;height:300px; width:170px;"></p>
                </div>
            </div>
           
        </div>

            <!--Rodapé-->
           <?include("rodape.php");?>
            
    </body>
</html>