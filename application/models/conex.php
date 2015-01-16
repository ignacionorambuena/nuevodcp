<?php
class Connect {
    private $conexion;
    public function Connect(){
        if(!isset($this->conexion))
        {
            $this->conexion = (mysql_connect("localhost", "root", "2wsxcde3", "intranet"))
            or die("Error en la conexion");
        }
    }

    public function consulta($query){

        $resultado = mysql_query($query, $this->conexion);
        if(!$resultado)
        {
            echo 'MySQL Error: '.mysql_error();
            exit();
        }
        return $resultado;

    }

    public function fetch_array($sql){
        return mysql_fetch_array($sql);
    }

    public function num_rows($sql){
        return mysql_num_rows($sql);

    }
    public function num_fields($sql)
    {
        return mysql_num_fields($sql);
    }
    public function field_name($x,$y)
    {
        return mysql_field_name($x,$y);
    }
    public function fetch_row($sql)
    {
        return mysql_fetch_row($sql);
    }
}
?>
