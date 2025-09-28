<?php 
    session_start();

    include("../../library/configuration/conexion.php");

    $conexion = conectarDB();

    $correo = $_SESSION['correo'];

    if($correo != ""){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../../assets/cssVendor/sidebar.css">
    <link rel="stylesheet" href="../../assets/cssVendor/table.css">
    <link rel="stylesheet" href="../../assets/cssVendor/style.css">
    <link href="../../assets/js/datatables/datatables.min.css" rel="stylesheet">

    <title>SGE</title>

    <link rel="shortcut icon" href="../../assets/images/book.ico" />
</head>
<body>

    <!--========== HEADER ==========-->
    <header class="header">
        <div class="header__container">

            <a href="../../view/administracion/home.php" class="header__logo">SGE</a>

            <a>Sistema de Gestión Escolar</a>

            <a id="horaActual"></a>

            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>

    <!--========== NAV ==========-->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="../../view/administracion/home.php" class="nav__link nav__logo">
                    <img src="../../assets/images/book.ico" alt="">
                    <span class="nav__logo-name"> SGE</span>
                </a>

                <div class="nav__list">

                    <a href="../../view/administracion/home.php" class="nav__link active">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Inicio</span>
                    </a>
                    <h3 class="nav__subtitle">OPCIONES:</h3>
                    <div class="nav__items">
                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bxs-package nav__icon' ></i>
                                <span class="nav__name">CONFIGURACION</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="../../view/administracion/usuario.php" class="nav__dropdown-item">Usuarios</a>
                                    <a href="../../view/administracion/persona.php" class="nav__dropdown-item">Personas</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nav__items">
                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bxs-package nav__icon' ></i>
                                <span class="nav__name">CURSOS</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="../../view/academico/clase.php" class="nav__dropdown-item">Clases</a>
                                    <a href="../../view/academico/horario.php" class="nav__dropdown-item">Horario</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <a onclick="cerrarSession()" class="nav__link nav__logout">
                <i class='bx bx-log-out nav__icon' ></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <main>
        <section>
<?php }else{ header("Location: ../../index.php"); } ?>