<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <!-- <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Proyectos BBDD</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary" href="proyectos.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Proyectos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary" href="nuevoProyecto.php">
                    <div class="text-white text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">+</i>
                    </div>
                    <span class="nav-link-text ms-1">Añadir Proyecto</span>
                </a>
            </li>
        </ul>
    </div>

</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Proyectos</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Proyectos</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <?php
                    if (isset($_SESSION["usuario"])) {
                        echo("<div class='ms-md-auto pe-md-3'>
                                <form action='proyectos.php' method='get' class='d-flex align-items-center gap-2'>
                                    <div class='input-group input-group-outline mb-3'>
                                        <label class='form-label'>Buscar proyecto...</label>
                                        <input type='text' name='buscarProyecto' class='form-control'>
                                    </div>
                                    <button type='submit' class='btn btn-outline-secondary btn-sm d-flex justify-content-center'>Buscar</button>
                                </form>
                            </div> 
                    <ul class='navbar-nav  justify-content-end'>
                                <li class='nav-item d-flex align-items-center mb-3'>
                                    <a href='controlador.php?accion=cerrarSesion' class='nav-link text-body font-weight-bold px-0'>
                                        <i class='fa fa-user me-sm-1'></i>
                                        <span class='d-sm-inline d-none'>Cerrar Sesión</span>
                                    </a>
                                </li>
                            </ul>");
                    } else{
                        echo("<div class='ms-md-auto pe-md-3'>
                                <form action='proyectos.php' method='get' class='d-flex align-items-center gap-2' >
                                    <div class='input-group input-group-outline mb-3'>
                                        <label class='form-label'>Buscar proyecto...</label>
                                        <input type='text' class='form-control' disabled>
                                    </div>
                                    <button type='submit' class='btn btn-outline-secondary btn-sm d-flex justify-content-center' disabled>Buscar</button>
                                </form>
                            </div>  
                            <ul class='navbar-nav  justify-content-end'>
                                <li class='nav-item d-flex align-items-center mb-3'>
                                    <a href='login.php' class='nav-link text-body font-weight-bold px-0'>
                                        <i class='fa fa-user me-sm-1'></i>
                                        <span class='d-sm-inline d-none'>Iniciar Sesión</span>
                                    </a>
                                </li>
                            </ul>");
                    }
                ?>
            </div>
        </div>
    </nav>