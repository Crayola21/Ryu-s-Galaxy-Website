<?php 
    include_once Clase . 'rol.php';
    $rol = new Rol();
    if(isset($_SESSION[ID_USUARIO])){
        $permiso = $rol->permisos_por_usuario($_SESSION[ID_USUARIO]);
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ryu's Galaxy">
    <meta name="keywords" content="dagashi, confitería, japón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ryu's Galaxy | Dulces japoneses</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo rutaRaiz ?>assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo rutaRaiz ?>assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo rutaRaiz ?>assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo rutaRaiz ?>assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo rutaRaiz ?>assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo rutaRaiz ?>assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo rutaRaiz ?>assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo rutaRaiz ?>assets/css/style.css" type="text/css">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">

</head>

 <!-- Animación de carga de página -->
<div id="preloder">
    <div class="loader"></div>
</div>
 <!-- Fin de la animación de carga de página -->

 <div class="humberger__menu__overlay"></div>

 <!-- Versión móvil del sitio -->
 <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">Producto: <span>$0.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">

            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Iniciar sesión</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="">Inicio</a></li>
                <li><a href="#">Productos</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="">Chocolates</a></li>
                        <li><a href="">Bebidas</a></li>
                        <li><a href="">Bento</a></li>
                        <li><a href="">Enlatados</a></li>
                    </ul>
                </li>
                <li><a href="">Contacto</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> ryusgalaxy@gmail.com</li>
                <li>¡Una colección de sabores y experiencias!</li>
            </ul>
        </div>
    </div>
 <!-- Fin versión móvil -->

<!-- Header página web -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> ryusgalaxy@gmail.com</li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__auth p-2">
                        <?php if(!isset($_SESSION[ID_USUARIO])) : ?>  
                        <button type="button" class="btn btn-block btn-outline-info btn-flat" name="ingresarU"  id="ingresarU" data-toggle="modal" data-target="#modalLogin"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
                        <?php endif?>  
                        <?php if(isset($_SESSION[ID_USUARIO])) : ?>  
                           <a href="<?php echo rutaRaiz ?>pages/cerrarsesion.php" class="btn btn-block btn-outline-info btn-flat" style="color: white">Cerrar Sesión</a>
                        <?php endif?>  
                        </div>
                        <div class="header__top__right__auth">
                        <?php if(!isset($_SESSION[ID_USUARIO])) : ?>  
                            <button type="button" name="crearcuenta" id="crearcuenta" class="btn btn-block btn-outline-success btn-flat"  data-toggle="modal" data-target="#modalregistro"><i class="fa fa-user-plus"></i> Crear Cuenta</button>
                        <?php endif?>  
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href=""><img class="" src="<?php echo rutaRaiz?>assets/img/Logo2018.png" alt="" style="width: 30%"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="#">Inicio</a></li>
                        <li><a href="#">Productos</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">Chocolates</a></li>
                                <li><a href="#">Bebidas</a></li>
                                <li><a href="#">Bento</a></li>
                                <li><a href="#">Enlatados</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Contacto</a></li>
                        <?php 
                        if(isset($permiso)){
                            $opcion = $permiso;
                            if($opcion == "2"){
                                $opcion = "panelinicio";
                            }else if($opcion == "1"){
                                $opcion = "panelcliente";
                            }
                        }
                        if(isset($_SESSION[ID_USUARIO])): ?>  
                            <li><a href="<?php echo rutaRaiz . $opcion ?>">MI CUENTA</a></li>
                        <?php endif ?>
                        <li><a href="<?php echo rutaRaiz ?>catalogo" target="_blank" rel="noopener noreferrer" >CATALOGO</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fas fa-cart-plus"></i> <span>3</span></a></li>
                    </ul>
                    <div class="header__cart__price">Total: <span>$0</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Final del header -->





<!-- Inicio menu categorías lateral -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Todos Los Productos</span>
                    </div>
                    <ul >
                        <li><a href="#">Fresh Meat</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruit &amp; Nut Gifts</a></li>
                        <li><a href="#">Fresh Berries</a></li>
                        <li><a href="#">Ocean Foods</a></li>
                        <li><a href="#">Butter &amp; Eggs</a></li>
                        <li><a href="#">Fastfood</a></li>
                        <li><a href="#">Fresh Onion</a></li>
                        <li><a href="#">Papayaya &amp; Crisps</a></li>
                        <li><a href="#">Oatmeal</a></li>
                        <li><a href="#">Fresh Bananas</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" id="buscador-producto" name="buscador-producto" placeholder="Buscar Producto">
                            <button type="submit" class="site-btn"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>311 111 111 </h5>
                            <span>Linea De Soporte</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                    <div class="hero__text">
                         <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img src="<?php echo rutaRaiz ?>assets/img/carousel/carousel2.jpg"  class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img src="<?php echo rutaRaiz ?>assets/img/carousel/carousel3.jpg"  class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-danger">Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Final -->

<!-- Inicio categorias, carousel horizontal -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel2.jpg">
                        <h5><a href="#">Categorías</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel2.jpg">
                        <h5><a href="#">Categorías</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel2.jpg">
                        <h5><a href="#">Categorías</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel2.jpg">
                        <h5><a href="#">Categorías</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel2.jpg">
                        <h5><a href="#">Categorías </a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Final carousel categorias -->

<!-- Inicio productos destacados -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Prdouctos destacados</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Final productos destacados -->


<!-- Inicio nuevos productos -->
<div class="banner p-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Final  nuevos productos -->



<!-- Modal para ingreso usuarios -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicio De Sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="login_ryus" method="POST">
            <div class="form-group">
                <label for="correo_user_login">Ingrese su usuario y/o Correo Electrónico</label>
                <input type="email" class="form-control" id="correo_user_login" name="correo_user_login" aria-describedby="emailHelp" placeholder="Ingrese Su Correo y/o Usuario Para Ingresar">
                <!-- <small id="emailHelp" class="form-text text-muted">Ingrese Su Usuario Paara Conectarse</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" id="contrasena_login" name="contrasena_login" placeholder="Ingrese Su Contraseña">
            </div>
            <div class="form-group form-check p-3">
                <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
                <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
            </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="login" class="btn btn-block btn-outline-success btn-flat">Iniciar Sesión</button>
      </div>
    </div>
  </div>
</div>
<!-- Final Ingreso usuarios -->


<!-- Modal Creación de cuenta -->
<div class="modal fade" id="modalregistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro De Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="login_ryus_registro">
            <div class="form-group">
                <label for="correo_user_login ">Nombre De Usuario:</label>
                <input type="email" class="form-control" id="nombre_usuario" name="nombre_usuario" aria-describedby="emailHelp" placeholder="Ingrese Un Nombre De Usuario">
                <small id="ComprobarUser" class="form-text text-danger text-center">El Usuario Ya Existe En Nuestra Base De Datos</small>
            </div>
            <div class="form-group">
                <label for="correo_user_login">Ingrese Su Correo Electrónico:</label>
                <input type="email" class="form-control" id="email_usuario" name="email_usuario" aria-describedby="emailHelp" placeholder="Ingrese Un Corre Electrónico">
                <!-- <small id="emailHelp" class="form-text text-muted">Ingrese Su Usuario Paara Conectarse</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ingresar Una Contraseña</label>
                <input type="password" class="form-control" id="contrasena_registro" name="contrasena_registro" placeholder="Ingrese Una Contraseña">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="contrasena_registro_confirm" name="contrasena_registro_confirm" placeholder="Confirmar Contraseña">
            </div>
            <div class="form-group form-check p-3">
                <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
                <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
            </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" name="registro_usuario" class="btn btn-block btn-outline-success btn-flat">Registrar Usuario</button>
      </div>
    </div>
  </div>
</div>
<!-- Final Modal registro usuarios -->

     <!-- Inicio del footer -->
     <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href=""><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Whatsapp: +57 311 358 61 97</li>
                            <li>Celular: 311 358 6197</li>
                            <li>Email: ryusgalaxy@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Enlaces</h6>
                        <ul>
                            <li><a href="#">Cónozcanos</a></li>
                            <li><a href="#">Información de envío</a></li>
                            <li><a href="#">Política de privacidad</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">¿Quiénes somos?</a></li>
                            <li><a href="#">Cóntactenos</a></li>
                            <li><a href="#">Opiniones</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Reciba nuestras actualizaciones</h6>
                        <p>Reciba actualizaciones y promociones especiales vía E-mail</p>
                        <form action="#">
                            <input type="text" placeholder="Ingresa su E-mail">
                            <button type="submit" class="site-btn">Subscribirse</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Ryu's Galaxy</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Final footer -->
   
   <!-- Js Plugins -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?php echo rutaRaiz ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo rutaRaiz ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo rutaRaiz ?>assets/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo rutaRaiz ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo rutaRaiz ?>assets/js/jquery.slicknav.js"></script>
    <script src="<?php echo rutaRaiz ?>assets/js/mixitup.min.js"></script>
    <script src="<?php echo rutaRaiz ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo rutaRaiz ?>assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <!-- Achivos propios -->
     <script src="<?php echo rutaRaiz ?>js/registro_ajax.js"></script>
     <script src="<?php echo rutaRaiz ?>js/login.js"></script>
     <script>
         let _rutaAJAX = '<?php echo rutaAJAX ?>';
         let _rutaRaiz = '<?php echo rutaRaiz ?>';
     </script>

