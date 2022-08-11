<?php
    defined('_access') or exit;
    class script {
        private $javascript = array();

        public function __construct() {
            $this->javascript = array();
        }

        public function addScript($en) {
            $this->javascript[] = $en;
        }

        public function mostrar () {
            for ($f = 0; $f < count($this->javascript); $f++) {
                echo $this->javascript[$f];
            }
        }

        function __destruct() {
            $this->javascript = null;
        }
    }