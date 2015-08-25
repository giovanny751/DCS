<?php
include_once '../bd/conexion.php';
session_start();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css" media="screen" />

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">


<script src='../js/bootstrap.js'></script>
<script src="../js/bootstrap.min.js"></script>
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
<link href="http://fonts.googleapis.com/css?family=Oswald:400" rel="stylesheet" type="text/css">
</head>
<body>
<?php

$seleccion = $_POST['seleccion'];
$dato1 = $_POST['dato1'];

$strHTML = "<div id='cero'>Hola</div>";
    
$strHTML = "<div id='cero'></div>"
            . "<div id='uno'></div>"
            . "<div id='dos'></div>"
            . "<div id='tres'></div>"
            . "<div id='cuatro'></div>"
            . "<div id='cinco'></div>"
            . "<div id='seis'></div>"
            . "<div id='siete'></div>"
            . "<div id='ocho'></div>"
            . "<div id='nueve'></div>"
            . "<div id='diez'></div>"
            . "<div id='once'></div>"
            . "<div id='doce'></div>"
            . "<div id='trece'></div>"
            . "<div id='catorce'></div>"
            . "<div id='quince'></div>"
            . "<div id='dieciseis'></div>"
            . "<div id='diecisiete'></div>"
            . "<div id='dieciocho'></div>"
            . "<div id='diecinueve'></div>";

    require_once("../js/dompdf-0.5.1/dompdf_config.inc.php"); 	    
    $dompdf = new DOMPDF(); 	    
    $dompdf->load_html($strHTML); 	    
    $dompdf->render(); 	   
    $dompdf->stream("Consultas.pdf");

    exit(0);

?>
  </body>
<script>

                var seleccion = <?php $seleccion ?>;
                var dato1 = <?php $dato1 ?>;
                    
                    var url = "includes/RUTPERSONA.php";		 
                    var url1= "includes/RUT.php";
                    var url2 = "includes/iofosyga.php";
                    var url3 = "includes/copnia.php";
                    var url4 = "includes/iosisben.php";
                    var url5 = "includes/iorues.php";
                    var url6 = "includes/iosociedades.php";
                    var url7 = "includes/iosociedadesprueba.php";
                    var url8 = "includes/ioofacinstant.php";
                    var url9 = "includes/listaclintonid.php";
                    var url10 = "includes/listaclintonname.php";
                    var url11 = "includes/iointerpol.php";
                    var url12 = "includes/iofederal.php";
                    var url13 = "includes/ioonu.php";
                    var url14 = "includes/ioinformaemp.php";
                    var url15 = "includes/ioanteceperson.php";
                    var url16 = "includes/iocontralorianame.php";
                    var url17 = "includes/iocontralorianamepj.php";
                    var url18 = "includes/iocontralorianit.php";
                    var url19 = "includes/iocontraloriacedula.php";
//                    var url7 = "permisos.php";
//                    var url8 = "permisos.php";
                        $('#cero').load(url,{Cedula:dato1,tipo:1,seleccion:seleccion}); 
                        $('#uno').load(url1,{Cedula:dato1,tipo:2,seleccion:seleccion});       
                        $('#dos').load(url2,{Cedula:dato1,tipo:3,seleccion:seleccion});     
                        $('#tres').load(url3,{Cedula:dato1,tipo:4,seleccion:seleccion});
                        $('#cuatro').load(url4,{Cedula:dato1,tipo:5,seleccion:seleccion});
                        $('#cinco').load(url5,{Cedula:dato1,tipo:6,seleccion:seleccion});
			$('#seis').load(url6,{Cedula:dato1,tipo:7,seleccion:seleccion});
			$('#siete').load(url7,{Cedula:dato1,tipo:8,seleccion:seleccion});
			$('#ocho').load(url8,{Cedula:dato1,tipo:9,seleccion:seleccion});
			$('#nueve').load(url9,{Cedula:dato1,tipo:10,seleccion:seleccion});
			$('#diez').load(url10,{Cedula:dato1,tipo:11,seleccion:seleccion});
			$('#once').load(url11,{Cedula:dato1,tipo:12,seleccion:seleccion});
			$('#doce').load(url12,{Cedula:dato1,tipo:13,seleccion:seleccion});
			$('#trece').load(url13,{Cedula:dato1,tipo:14,seleccion:seleccion});
			$('#catorce').load(url14,{Cedula:dato1,tipo:15,seleccion:seleccion});
			$('#quince').load(url15,{Cedula:dato1,tipo:16,seleccion:seleccion});
			$('#dieciseis').load(url16,{Cedula:dato1,tipo:17,seleccion:seleccion});
			$('#diecisiete').load(url17,{Cedula:dato1,tipo:18,seleccion:seleccion});
			$('#dieciocho').load(url18,{Cedula:dato1,tipo:19,seleccion:seleccion});
			$('#diecinueve').load(url19,{Cedula:dato1,tipo:20,seleccion:seleccion},function(data){
//                            $('#loaderImage').hide();
//                            $('#botones').show();
                         });
</script>