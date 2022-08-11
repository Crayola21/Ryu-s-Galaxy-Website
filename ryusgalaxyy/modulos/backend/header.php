<?php 
    include_once Clase . 'rol.php';
    $rol = new Rol();
    if(isset($_SESSION[ID_USUARIO])){
        $permiso = $rol->permisos_por_usuario($_SESSION[ID_USUARIO]);
    }else{
        return false;
    }
    

    
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8"/>

    <!-- Icono de la página para dispositivos Apple -->
    <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> -->

    <link rel="icon" type="image/png" href="<?php echo rutaRaiz?>assets/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ryu's Galaxy | Panel Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="<?php echo rutaRaiz?>dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo rutaRaiz?>dist/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />

    <!-- Iconos -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
    


    


</head>

<body>
    <div class="wrapper">
        <div class="sidebar bg-dark text-white">
            <?php include_once 'aside.php'?>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg bg-warning text-dark" color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"> Panel de administración </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>   
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span class="no-icon">Cuenta de usuario</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Lista desplegable</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo  rutaRaiz?>pages/cerrarsesion.php">
                                    <span class="no-icon">Cerrar sesión</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
</body>