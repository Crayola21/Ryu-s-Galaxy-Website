<?php

    function error($mensaje){
        return '<div class="alert alert-danger alert-dismissable">
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>'.$mensaje.'
                    <button type="button" class="close" data-dismiss="alerta" aria-hidden="true">Listo
                    </button>
                </div>';
    }

    function info($mensaje){
        return '<div class="alert alert-info alert-dismissable">
                    <h4><i class="icon fa fa-info"></i> Alerta!</h4>'.$mensaje.'
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Listo
                    </button>
                </div>';
    }

    function alerta($mensaje){
        return '<div class="alert alert-warning">
                    <h4><i class="icon fa fa-warning"></i> Alerta!</h4>'.$mensaje.'
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Listo
                    </button>
                </div>';
    }

    function correcto($mensaje){
        return '<div class="alert alert-success alert-dismissable">
                     <h4><i class="icon fa fa-check"></i> Alerta!</h4>'.$mensaje.'
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Listo
                    </button>
                </div>';
    }
?>