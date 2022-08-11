<div class="sidebar-wrapper">
    <div class="logo">
        <a href="" class="simple-text">
            RYU'S GALAXY
            <?php echo $permiso  ?>
        </a>
    </div>
    <ul class="nav">
        <?php if($permiso === 2) :?>
            <li>
                <a class="nav-link" href="<?php echo rutaRaiz ?>proveedores">
                <i class="fas fa-users"></i>
                        <p>Proveedores</p>
                </a>
            </li>
        <?php else :  ?>
            <li>
                <a class="nav-link" href="<?php echo rutaRaiz ?>mispedidos">
                <i class="fas fa-clipboard-list"></i>
                    <p>Mis Pedidos</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="<?php echo rutaRaiz ?>catalogo">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Catalogo</p>
                </a>
            </li>
        <?php endif ?>

        <?php if($permiso === 2) :?>
            <li>
                <a class="nav-link" href="<?php echo rutaRaiz ?>pedidoscliente">
                    <i class="fas fa-list-ol"></i>
                        <p>Pedidos Clientes</p>
                </a>
            </li>
        <?php endif ?>
        
        <!-- <?php if($permiso === 2) :?>
            <li>
                <a class="nav-link" href="<?php echo rutaRaiz ?>proveedores">
                    <i class="nc-icon nc-chart-pie-35"></i>
                        <p>Usuarios</p>
                </a>
            </li>
        <?php endif ?> -->

        <?php if($permiso === 2) :?>
            <li>
                <a class="nav-link" href="<?php echo rutaRaiz ?>compras">
                <i class="fas fa-shopping-basket"></i>
                
                        <p>Compras</p>
                </a>
            </li>
        <?php endif ?>

        <?php if($permiso === 2) :?>
            <li>
                <a class="nav-link" href="<?php echo rutaRaiz ?>productos">
                <i class="fas fa-clipboard-list"></i>
                        <p>Productos</p>
                </a>
            </li>
        <?php endif ?>
        

    </ul>
</div>
