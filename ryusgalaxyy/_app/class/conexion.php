<?php

class conexion
{
    public static $mysqli;
    public static $resultado;
    public static $mensaje = "";
    protected static $affected_rows = "";
    public static $sql = '';
    public static $id = '';

    public function __construct()
    {
        self::$mysqli = new mysqli(LDB_HOST, LDB_USER, LDB_PASS, LDB_NAME);
        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }
        self::$mysqli->query('SET NAMES "utf8"');
    }

    public function __destruct()
    {
        if (isset(self::$resultado)) {
        }
    }

    //Gestión SELECT a la base de datos
    public function select($campos = '*', $table = null, $where = '', $param = null)
    {
        self::$sql = "SELECT " . $campos . "FROM " . $table . " " . $where . " ;";
        if (!($sentencia = self::$mysqli->prepare(self::$sql))) {
            self::$mensaje = "Falló la preparación: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
            return false;
        }

        if (!empty($where) && !is_null($where) && !is_null($param)) {
            $ref = new ReflectionClass('mysqli_stmt');
            if (!($metodo = $ref->getMethod("bind_param"))) {
                self::$mensaje = "Falló el metodo bind param: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
                return false;
            }
            for ($i = 0; $i < count($param); $i++) {
                $parametros[] = self::$mysqli->real_escape_string($param[$i]);
            }
            foreach (array_keys($parametros) as $i) {
                if ($i > 0) $parametros[$i] = &$parametros[$i];
            }

            if (!($metodo->invokeArgs($sentencia, $parametros))) {
                self::$mensaje = "Falló la invocación de argumentos: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
                return false;
            }
        }
        if (!$sentencia->execute()) {
            self::$mensaje = "Falló la ejecución:(" . $sentencia->errno . ") " . $sentencia->error;
            return false;
        }
        if (!(self::$resultado = $sentencia->get_result())) {
            self::$mensaje = "Falló la obtención del conjunto de resultados:(" . $sentencia->errno . ") " . $sentencia->error;
            return false;
        }
        self::$affected_rows = $sentencia->affected_rows;
        return true;
    }

    //Gestión INSERT INTO de la base de datos
    public function insert($campos = '', $table = null, $values = '', $param)
    {
        self::$sql = "INSERT INTO " . $table . " " . $campos . "VALUES " . $values . " ;";
        if (!($sentencia = self::$mysqli->prepare(self::$sql))) {
            self::$mensaje = "Falló la preparación: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
            return false;
        }
        $ref = new ReflectionClass('mysqli_stmt');
        if (!($metodo = $ref->getMethod("bind_param"))) {
            self::$mensaje = "Falló el metodo bind param: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
            return false;
        }

        for ($i = 0; $i < count($param); $i++) {
            $parametros[] = self::$mysqli->real_escape_string($param[$i]);
        }
        foreach (array_keys($parametros) as $i) {
            if ($i > 0) $parametros[$i] = &$parametros[$i];
        }
        if (!($metodo->invokeArgs($sentencia, $parametros))) {
            self::$mensaje = "Falló la invocación de argumentos: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
            return false;
        }
        if (!$sentencia->execute()) {
            self::$mensaje = "Falló la ejecución:(" . $sentencia->errno . ") " . $sentencia->error;
            return false;
        }

        self::$id = $sentencia->insert_id;
        self::$affected_rows = $sentencia->affected_rows;
        $sentencia->close();
        return true;
    }

    //Gestión de UPDATE a la base de datos
    public function update($table = null, $set = '', $where, $param)
    {
        self::$sql = "UPDATE " . $table . " SET " . $set . "WHERE " . $where . " ;";
        if (!($sentencia = self::$mysqli->prepare(self::$sql))) {
            self::$mensaje = "Falló la preparación: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
            return false;
        }
        $ref = new ReflectionClass('mysqli_stmt');
        if (!($metodo = $ref->getMethod("bind_param"))) {
            self::$mensaje = "Falló el metodo bind param: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
            return false;
        }

        for ($i = 0; $i < count($param); $i++) {
            $parametros[] = self::$mysqli->real_escape_string($param[$i]);
        }
        foreach (array_keys($parametros) as $i) {
            if ($i > 0) $parametros[$i] = &$parametros[$i];
        }
        if (!($metodo->invokeArgs($sentencia, $parametros))) {
            self::$mensaje = "Falló la invocación de argumentos: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
            return false;
        }
        if ($exec = !$sentencia->execute()) {
            self::$mensaje = "Falló la ejecución:(" . $sentencia->errno . ") " . $sentencia->error;
            return false;
        }

        if ($sentencia->errno) {
            self::$mensaje = "Error!!! " . $sentencia->error;
            return false;
        }
        self::$affected_rows = $sentencia->affected_rows;
        $sentencia->close();

        if (self::$affected_rows >= 1) {
            return true;
        } else {
            self::$mensaje = "No se afectaron registros";
            return false;
        }
    }

    //Gestión de DELETE en la base de datos 
    //Hay que validar que solo se permitan elimininar datos no implementados por otras tablas
    
    public function delete($table = null, $where, $param)
    {
        self::$sql = "DELETE FROM " . $table . "WHERE " . $where . "LIMIT 1;";
        if (!($sentencia = self::$mysqli->prepare(self::$sql))) {
            self::$mensaje = "Falló la preparación: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
            return false;
        }
        $ref = new ReflectionClass('mysqli_stmt');
        if (!($metodo = $ref->getMethod("bind_param"))) {
            self::$mensaje = "Falló el metodo bind param: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
            return false;
        }

        for ($i = 0; $i < count($param); $i++) {
            $parametros[] = self::$mysqli->real_escape_string($param[$i]);
        }
        foreach (array_keys($parametros) as $i) {
            if ($i > 0) $parametros[$i] = &$parametros[$i];
        }
        if (!($metodo->invokeArgs($sentencia, $parametros))) {
            self::$mensaje = "Falló la invocación de argumentos: (" . self::$mysqli->errno . ")\n" . self::$mysqli->error;
            return false;
        }
        if ($exec = !$sentencia->execute()) {
            self::$mensaje = "Falló la ejecución:(" . $sentencia->errno . ") " . $sentencia->error;
            return false;
        }

        if ($sentencia->errno) {
            self::$mensaje = "Error!!! " . $sentencia->error;
            return false;
        }
        self::$affected_rows = $sentencia->affected_rows;
        $sentencia->close();
        return true;
    }

    //Para obtener la información arrojada por la consulta ejecutada de tipo object
    public function result_object()
    {
        $rows = array();
        if (self::$resultado->num_rows > 0) {
            while ($row = self::$resultado->fetch_object()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    //Para obtener la información arrojada por la consulta ejecutada de tipo array
    public function result_array()
    {
        $rows = array();
        if (self::$resultado->num_rows > 0) {
            while ($row = self::$resultado->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    //Para obtener la sentencia de consulta ejecutada
    public function Sentencia()
    {
        if (DEBUG)
            return self::$sql;
        else
            return "";
    }

    //Para obtener el error de consulta ejecutada
    public function Error($boolForce = false)
    {

        if (DEBUG || $boolForce)
            return self::$mensaje;
        else
            return "";

    }

    //Para obtener la cantidad de filas afectadas de consulta ejecutada
    public function affected_rows()
    {
        return self::$affected_rows;
    }

    //Para obtener el id de consulta ejecutada
    public function Id()
    {
        return self::$id;
    }
}
?>
