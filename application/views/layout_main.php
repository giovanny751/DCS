<title>NYGSOFT.COM</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="<?= base_url('js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
<script src='//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js'></script>
<script src="<?= base_url('js/dataTables.responsive.js') ?>" type="text/javascript"></script>
<link href="<?= base_url('css/dataTables.responsive.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('img/blanco.jpg'); ?>" rel="shortcut icon" type="image/x-icon">
<script src="<?= base_url('js/jquery.smartmenus.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('js/validCampoFranz.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('js/jquery.smartmenus.bootstrap.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('js/bootstrap.js') ?>" type="text/javascript"></script>
<link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('css/style.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('css/jquery.smartmenus.bootstrap.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('/assets/global/scripts/metronic.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/admin/pages/scripts/ui-blockui.js'); ?>"></script>
<script src="<?php echo base_url('/assets/global/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('/assets/global/css/plugins.css'); ?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/global/plugins/jquery-notific8/jquery.notific8.min.css'); ?>"/>
<script src="<?php echo base_url('/assets/global/plugins/jquery-notific8/jquery.notific8.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/admin/pages/scripts/ui-notific8.js'); ?>"></script>
<link href="<?php echo base_url('/assets/global/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('/assets/global/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('/css/font_google.css'); ?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css'); ?>"/>  
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/estilos.css'); ?>"/>  
<link href="<?php echo base_url('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('/assets/global/plugins/select2/select2.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('/assets/global/plugins/jquery-multi-select/css/multi-select.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('/assets/global/css/components.css'); ?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url('/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('/assets/global/scripts/datatable.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/admin/pages/scripts/table-ajax.js'); ?>"></script>
<script src="<?php echo base_url('/assets/global/plugins/bootstrap-daterangepicker/moment.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('/assets/admin/pages/scripts/components-pickers.js'); ?>"></script>
<?php
function modulos($datosmodulos, $idusuario, $dato = null) {

    $ci = &get_instance();
    $ci->load->model("ingreso_model");
    $user = null;
    $menu = $ci->ingreso_model->menu($datosmodulos, $idusuario, 2);
    $i = array();
    foreach ($menu as $modulo)
        $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion']);
    echo ($datosmodulos == 'prueba')?"<ul class='nav navbar-nav'>":"<ul class='dropdown-menu'>";
    foreach ($i as $padre => $nombrepapa)
        foreach ($nombrepapa as $nombrepapa => $menuidpadre)
            foreach ($menuidpadre as $modulos => $menu)
                foreach ($menu as $submenus):
                    if ($submenus[1] == "" && $submenus[2] == "") {
                        echo "<li><a href='#'>" . strtoupper($nombrepapa) . "</a>";
                    } else {
                        echo "<li><a href='" . base_url("index.php/" . $submenus[1] . "/" . $submenus[2]) . "'>" . strtoupper($nombrepapa) . "</a>";
                    }
                    if (!empty($submenus[0]))
                        modulos($submenus[0], $idusuario);
                    echo "</li>";
                endforeach;
    echo "</ul>";
}
?>
<div class="row" >
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">NYGSOFT</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php base_url('index.php/presentacion/principal') ?>">NYGSOFT</a>
        </div>
        <div class="navbar-collapse collapse">
            <?php echo modulos('prueba', $id, null); ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><b><?php echo strtoupper($nombre); ?></b></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">OPCIONES</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url('index.php/presentacion/recordarcontrasena'); ?>">Cambiar Contraseña</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('index.php/login/logout'); ?>">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container ">
    <div class="row contenido" >
        <?php echo $content_for_layout ?>
    </div>
</div>
<footer class="footer">
    <div class="row" style="">
        <div class="container">
            <div class="col-md-4 col-lg-4 col-sm-4 col-sx-4" align="center">
                <!--<img src="<?php echo base_url('uploads/Logo_PSAT_Final.png'); ?>" style="width: 90px">-->
            </div>
            <div class="col-md-4 col-lg-4 col-sm-4 col-sx-4"><center><p class="text-muted" style='margin-top:10%'>Copyright -  NYGSOFT right Reserved</p></center></div>
            <div class="col-md-4 col-lg-4 col-sm-4 col-sx-4" align="center"><a href="http://www.nygsoft.com"><img src="<?php echo base_url('img/blanco.jpg'); ?>" style="width: 31%;height: 16%"></a></div>
        </div>  
    </div>  
</footer>
<style>
    .obligado{
        background-color: rgb(250, 255, 189);
    }
    .caption {
        display: inline-block;
        float: left;
        font-size: 18px;
        font-weight: 400;
        line-height: 18px;
        padding: 10px 0;
    }
    .portlet.box, .portlet-title {
        border-bottom: 1px solid #eee;
        color: #fff;
        margin-bottom: 0;
        padding: 0 10px;
    }
    .row{
        margin-top: 1%;
    }
    .container{
        padding-top: 83px;

    }
    * { 
        font-family: "calibri", Garamond, 'Comic Sans'; 
        font: 12px/2em sans-serif;
    }
    .campoobligatorio{
        color:red;
        font-size:16px;
    }
    i{
        cursor:pointer;
    }
    .table tbody tr td {
        border: 1px solid #CCC !important;
    }

    .table tr th {
        border: 1px solid #CCC !important;
        background-color: #008ac9;
        color: #FFF
    }

    .table thead tr td {
        border: 1px solid #CCC !important;
        background-color: #008ac9;
        color: #FFF
    }
</style>
<script>
//    --------------------------------------------------------------------------
//COLORES DE ALERTAS DE METRONIC
//    --------------------------------------------------------------------------
    function alerta(color, texto)
    {
        switch (color) {
            case "rojo":
                var alerta = 'ruby sticky';
                break;
            case "morado":
                var alerta = 'amethyst sticky';
                break;
            case "azul":
                var alerta = 'teal sticky';
                break;
            case "amarillo":
                var alerta = 'lemon sticky';
                break;
            case "verde":
                var alerta = 'lime sticky';
                break;
            case "naranja":
                var alerta = 'tangerine sticky';
                break;
            default:
                break;
        }
        $.notific8('', {
            horizontalEdge: 'bottom',
            life: 5000,
            theme: alerta,
            heading: texto
        });
    }
    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    function obligatorio(clase) {
        var i = 0;
        $('.' + clase).each(function (key, val) {
            if ($(this).val() != "")
                $(this).removeClass('obligado');
            else {
                $(this).addClass('obligado');
                i++;
            }
        });
        if (i == 0)
            return true;
        else{
            $.notific8('', {
                horizontalEdge: 'bottom',
                life: 5000,
                theme: 'ruby sticky',
                heading: 'FALTAN CAMPOS POR LLENAR'
            });
            return false;
            }
    }


    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core componets
//        Layout.init(); // init layout
        TableAjax.init();
        UIBlockUI.init();
        //TableAdvanced.init();
        ComponentsPickers.init();
        //QuickSidebar.init() // init quick sidebar
        //Index.init();
        //Index.initDashboardDaterange();
        //Index.initJQVMAP(); // init index page's custom scripts
        //Index.initCalendar(); // init index page's custom scripts
        //Index.initCharts(); // init index page's custom scripts
        //Index.initChat();
        //TableAdvanced.init();
        //Index.initMiniCharts();
        //Index.initIntro();
        //Tasks.initDashboardWidget();
        //ComponentsDropdowns.init();
        //FormValidation.init();
//        UIAlertDialogApi.init();
        UINotific8.init();
    });
    $('.fecha').datepicker({
        dateFormat: "yy-mm-dd",
//        rtl: Metronic.isRTL(),
        autoclose: true
          
    });
    
    
//    
//    
//    $('body').on('keyup', 'input[type=text]', function () {
//        var start = this.selectionStart,
//                end = this.selectionEnd;
//        $(this).val($(this).val().toUpperCase());
//        this.setSelectionRange(start, end);
//    });
//
//    $('body').on('keyup', 'input[type=search]', function () {
//        $(this).val($(this).val().toUpperCase());
//    });
//
//    $('body').on('keyup', 'input[type=text], textarea', function () {
//        var start = this.selectionStart,
//                end = this.selectionEnd;
//        $(this).val($(this).val().toUpperCase());
//        this.setSelectionRange(start, end);
//
//    });
//
//    $('body').on('keyup', 'input[type=text]', function () {
//        var $th = $(this);
//        $th.val($th.val().replace(/["<>^}{|\\$%'`´Ç]/g, function (str) {
//            return '';
//        }));
//    });
//
//    $('body').on('keyup', 'input[type=text], textarea', function () {
//        var $th = $(this);
//        $th.val($th.val().replace(/["<>^}{|\\$%'`´Ç]/g, function (str) {
//            return '';
//        }));
//    });
//    $(function () {
//    //Se pone para que en todos los llamados ajax se bloquee la pantalla mostrando el mensaje Procesando...
//    $.blockUI.defaults.message = 'Procesando...';
//    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
//});
</script>