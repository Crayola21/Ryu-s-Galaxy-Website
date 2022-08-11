<?php 
    include_once Clase . 'catalogo.php';
    $producto = new Catalogo();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | catalogo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

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
                <li class="active"><a href="<?php echo rutaRaiz?>home">Inicio</a></li>
            
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
                        <li class="active"><a href="<?php echo rutaRaiz ?>home">Inicio  </a></li>
                        <input type="hidden" name="tokken_user" value="<?php
                            if(isset($_SESSION['csrf_token']['token'])){
                                echo $_SESSION['csrf_token']['token'] ;
                            }else{
                                echo "0";
                            }
                         ?>">
                        <?php if(isset($_SESSION['carrito'])) :?>
                            <li class="active"><a class="btn btn-success p-2 " style="color: black" href="<?php echo rutaRaiz?>realizarpago">PAGAR</a></li>
                        <?php endif ?>
                    </ul>
                            <?php  if(isset($_SESSION['carrito'])) {
                                var_dump($_SESSION['total']);
                    } ?>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li>
                            <a href="<?php echo rutaRaiz?>realizarpago" id="pagarProductos">
                                <i class="fas fa-cart-plus"></i> 
                                <span class="color-black" id="contador_productos" >
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="header__cart__price">
                    Total: 
                    <span class="color-black" id="totalprecio" ></span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
    <!-- Final del header -->

    <!-- Product Section Begin -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="">
                        <div class="section-title ">
                            <h2>CATALOGO</h2>
                            <!-- <?php var_dump($producto->load_prodructs()) ?> -->
                        </div>
                        <div class="container">
                            <div class="row ">
                                <!-- <div class="col-12">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                            <img class="d-block w-100" src="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                            <img class="d-block w-100" src="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                            <img class="d-block w-100" src="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row p-5" >
                        <?php foreach ($producto->load_prodructs() as $producto) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" >
                                        <img class="product__item__pic" src="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg" alt="">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="" name="carrito" data-id="<?php echo $producto['IdProducto'] ?>" ><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#"></a><?php echo $producto['NombreProducto'] ?></h6>
                                        <h5><?php echo "$" . number_format($producto['Precio']) ?></h5>
                                    </div>
                                </div>
                            </div> 
                        <?php endforeach  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="<?php echo rutaRaiz ?>assets/img/carousel/carousel1.jpg" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
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
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    
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
    <!-- <script src="<?php echo rutaRaiz ?>assets/js/main.js"></script> -->
    <!-- <script src="<?php echo rutaRaiz ?>assets/js/jquery-3.3.1.min.js"></script> -->
    <script src="<?php echo rutaRaiz ?>js/proveedor_ajax.js"></script>
    <script src="<?php echo rutaRaiz ?>js/producto_ajax.js"></script>
    <script src="<?php echo rutaRaiz ?>js/categoria_ajax.js"></script>
    <script src="<?php echo rutaRaiz ?>js/estadoProducto_ajax.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
            let _rutaAJAX = '<?php echo rutaAJAX ?>';
            let _rutaRaiz = '<?php echo rutaRaiz ?>';
    </script>
    <script src="<?php echo rutaRaiz ?>js/catalogo.js"></script>
    <script src="<?php echo rutaRaiz ?>js/registro_ajax.js"></script>
     <script src="<?php echo rutaRaiz ?>js/login.js"></script>
</body>