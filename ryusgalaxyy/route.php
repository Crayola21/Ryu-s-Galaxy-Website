<?php
    class Enrutador{
        protected $url = array();

        private $ViewUser = array(
            'home',
            'compras',
            'index',
            'proveedores',
            'productos',
            'panelinicio',
            'panelcliente',
            '404',
            'catalogo',
            'realizarpago',
            'mispedidos',
            'pedidos'
        );

        public function setUrl($urls){
            $this->url = $urls;
        }
        public function cargarVista($vista)
        {
            $directorio = 'pages';
            $_inp = new Input();
            $_val = new Validar();
            $ficheros1 = scandir($directorio);
            if (in_array($vista . '.php', $ficheros1)) {
                include('inc/' . $vista . '.php');
                include('pages/' . $vista . '.php');
            } else {
                    //header('Location:'.rutaRaiz);
            }
        }

        public function Vista()
        {
            // include('modulos/header.php');
            // include('modulos/lateral.php');
            // include('modulos/footer.php');
        }

        public function cargarVista2($_vista)
        {
            $directorio = 'pages';
            $_inp = new Input();
            $_val = new Validar();
            $ficheros1 = scandir($directorio);
            if (in_array($_vista . '.php', $ficheros1)) {
                if (in_array($_vista, $this->ViewUser)) {
                    include('inc/' . $_vista . '.php');
                } 
                include('modulos/backend/layout.php');
            } else {
                include('pages/404.php');
            }
        }

        public function PrintFormat($var)
        {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
    }
?>
