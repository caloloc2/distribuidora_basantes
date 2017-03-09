<?php

/**
 * Representa el la estructura de las metas
 * almacenadas en la base de datos
 */
require 'conexion.php';

class Meta
{
    function __construct()
    {
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function getAll()
    {
        $consulta = "SELECT * FROM test";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerParametros()
    {
        $consulta = "SELECT * FROM parametros ORDER BY id_parametro ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerParametrosAreas($matriz)
    {
        $consulta = "SELECT * FROM parametros WHERE (area = ?) ORDER BY parametro ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($matriz));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerUsuarios()
    {
        $consulta = "SELECT * FROM usuarios, usuarios_roles WHERE (usuarios.rol=usuarios_roles.id_rol) ORDER BY usuarios.nombres ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerUsuariosAccesos()
    {
        $consulta = "SELECT * FROM usuarios, accesos WHERE (usuarios.id_usuario=accesos.id_usuario) ORDER BY usuarios.nombres ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerUsuariosporRol($rol)
    {
        $consulta = "SELECT * FROM usuarios, usuarios_roles WHERE ((usuarios.rol=usuarios_roles.id_rol) AND (usuarios.rol=?)) ORDER BY usuarios.nombres ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($rol));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function obtenerUsuariosCampo($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM usuarios, usuarios_roles WHERE ((CONCAT(usuarios.nombres, ' ', usuarios.correo, ' ', usuarios.cedula, ' ', usuarios.iniciales, ' ', usuarios.rol) ILIKE ?) AND (usuarios.rol=usuarios_roles.id_rol)) ORDER BY usuarios.nombres ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerRoles()
    {
        $consulta = "SELECT * FROM usuarios_roles ORDER BY id_rol ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function TopClientes()
    {
        $consulta = "SELECT * FROM clientes WHERE status=1 ORDER BY nombre ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerClientes()
    {
        $consulta = "SELECT * FROM clientes ORDER BY nombre ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerTecnicos()
    {
        $consulta = "SELECT * FROM usuarios WHERE rol=6 ORDER BY id_usuario";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerVehiculos()
    {
        $consulta = "SELECT * FROM vehiculos WHERE estado=1 ORDER BY id_vehiculo";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerVehiculosTodos()
    {
        $consulta = "SELECT * FROM vehiculos ORDER BY id_vehiculo";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerViaticos($id)
    {
        $consulta = "SELECT * FROM monitoreos_viaticos WHERE id_monitoreo=?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerViaticosInfo($id)
    {
        $consulta = "SELECT * FROM monitoreos_viaticos, usuarios WHERE (monitoreos_viaticos.id_monitoreo=? AND monitoreos_viaticos.id_tecnico = usuarios.id_usuario)";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function obtenerLocaciones($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM clientes_locacion WHERE id_cliente= ? ORDER BY id_locacion ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerMatrices()
    {
        $consulta = "SELECT * FROM matrices ORDER BY matriz ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

     /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerMonitoreos()
    {
        $consulta = "SELECT * FROM monitoreo WHERE (estado!=2 OR estado!=3) ORDER BY id_monitoreo DESC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }    

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function obtenerMonitoreos_Campos($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM monitoreo WHERE id_cotizacion=? ORDER BY id_monitoreo DESC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerAnalistas()
    {
        $consulta = "SELECT * FROM analistas ORDER BY id_analista ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }



    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerAreas()
    {
        $consulta = "SELECT * FROM areas";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerTrabajoAnalista($id_analista)
    {
        $consulta = "SELECT * FROM trabajo_analistas WHERE (id_analista=".$id_analista." AND impreso=0) ORDER BY id_orden ASC, num_muestra ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function Verificar_Informe_Listo($id_orden, $version)
    {
        $consulta = "SELECT * FROM trabajo_analistas WHERE ((id_orden=? AND estado=0) AND (version_informe=?))";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_orden, $version));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Clientes_Campos($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM clientes WHERE CONCAT(nombre, ' ', ciruc, ' ', cod_cliente, ' ', correo, ' ', contacto) ILIKE ? ORDER BY nombre ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function obtenerCotizacionesExportar($sql)
    {
        // Consulta de la meta
        $consulta = $sql;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function obtenerParaExportar($sql)
    {
        // Consulta de la meta
        $consulta = $sql;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function obtenerSQLModificar($sql)
    {
        // Consulta de la meta
        $consulta = $sql;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Clientes_Por_Nombre($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM clientes WHERE nombre ILIKE ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Normas_Campo($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM normas WHERE CONCAT(normas) ILIKE ? ORDER BY norma";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Paquete_Campo($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM paquetes WHERE CONCAT(paquete) ILIKE ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Items($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE CONCAT(parametro, ' ', clave, ' ', nombre_corto) ILIKE ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Inventario($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM inventario WHERE CONCAT(codigo, ' ', nombre, ' ', marca) ILIKE ? ORDER BY stock ASC, caducidad";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Cotizaciones($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM cotizaciones WHERE CONCAT(codigo, ' ', nombre, ' ', marca) ILIKE ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Parametros($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE CONCAT(clave, ' ', parametro, ' ', nombre_corto) ILIKE ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_ParametrosAcreditado($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE ((CONCAT(clave, ' ', parametro, ' ', nombre_corto) ILIKE ?) AND ((acreditacion='1')OR(acreditacion='4')))";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Parametros_Grupo($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE id_grupo= ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Numero_Cotizacion()
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM cotizaciones WHERE version=0 ORDER BY num_cotizacion DESC LIMIT 1";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();        

            return $comando->fetchAll(PDO::FETCH_ASSOC);          

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Numero_Orden()
    {
        // Consulta de la meta
        $consulta = "SELECT num_orden FROM ordenes ORDER BY id_orden DESC LIMIT 1";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();                
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;            

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Ejecutar_SQL($sql)
    {
        // Consulta de la meta
        $consulta = $sql;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();                
            // Capturar primera fila del resultado
            /*$row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;            */
            return 1;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return $e->getMessage();
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Numero_Orden2($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes WHERE id_orden=?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));

            return $comando->fetchAll(PDO::FETCH_ASSOC);          

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Numero_Version($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM cotizaciones WHERE num_cotizacion=".$id;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();        

            return $comando->fetchAll(PDO::FETCH_ASSOC);          

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Parametros_Id($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE id_parametro= ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function Busqueda_Parametros_Clave($campo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE clave= ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function obtenerActividadParametros($campo, $actividad)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades_parametros WHERE ((id_cotizacion = ?) AND (id_actividad = ?))";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo, $actividad));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $campo Identificador de la meta
     * @return mixed
     */
    public static function obtener_Numero_Muestras($id, $ver, $actividad)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades WHERE ((id_cotizacion=? AND version=?) AND actividad = ?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $ver, $actividad));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerActividades($id_test, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades WHERE (id_cotizacion = ? AND version = ?) ORDER BY actividad ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test, $version));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerActividades_Crear_Orden($id_test, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades WHERE (id_cotizacion = ? AND version = ?) AND (estado=0) ORDER BY actividad ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test, $version));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerActividadesMuestreado($id, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM cotizaciones WHERE (num_cotizacion = ? AND version = ?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $version));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;            

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerMatrizActividades($id_cotizacion, $id_actividad, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades WHERE (id_cotizacion = ? AND actividad = ? AND version=?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_cotizacion, $id_actividad, $version));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

            //return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosCotizacion($id, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades_parametros WHERE (id_cotizacion = ? AND version=?) ORDER BY parametro ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $version));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosCotizacion2($id, $version, $actividad)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades_parametros WHERE (id_cotizacion = ? AND version=? AND id_actividad=?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $version, $actividad));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function Comprobar_Orden_Completa($id, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades WHERE (id_cotizacion = ? AND estado=0 AND version=?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $version));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function Comprobar_Cotizacion_con_Monitoreo($id, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM monitoreo WHERE (id_cotizacion = ? AND version=?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $version));
            // Capturar primera fila del resultado
            /*$row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;*/

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosMuestras($id_orden, $num_muestra)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes_muestras_parametros WHERE ((id_orden = ?) AND (num_muestra = ?)) ORDER BY id_parametro,num_muestra ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_orden, $num_muestra));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosMuestrasIdVer($id_orden, $num_muestra, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes_muestras_parametros WHERE (((id_orden = ?) AND (num_muestra = ?)) AND (version_informe=?)) ORDER BY id_parametro,num_muestra ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_orden, $num_muestra, $version));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosActividad($id_act, $id, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades_parametros WHERE ((id_cotizacion = ? AND version=?) AND id_actividad = ? )";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $version, $id_act));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerNormas()
    {
        $consulta = "SELECT * FROM normas ORDER BY norma";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerNormasCampo($campo)
    {
        $consulta = "SELECT * FROM normas WHERE (norma ILIKE ?) ORDER BY norma";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerNormasId($id)
    {
        $consulta = "SELECT * FROM normas WHERE (id_norma = ?) ORDER BY norma";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerPaquetes()
    {
        $consulta = "SELECT * FROM paquetes ORDER BY id_paquete";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesTodas()
    {        
        $consulta = "SELECT * FROM cotizaciones ORDER BY num_cotizacion ASC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesListaPendiente()
    {        
        $consulta = "SELECT * FROM cotizaciones WHERE (estado=0 OR estado=3) ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesListaUsuario($campo)
    {        
        $consulta = "SELECT * FROM cotizaciones WHERE (id_usuario=?) ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesPendientes()
    {        
        $consulta = "SELECT * FROM cotizaciones WHERE estado=1 ORDER BY num_cotizacion DESC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesRango($inicio, $final)
    {        
        $consulta = "SELECT * FROM cotizaciones WHERE (fecha_elaboracion>=?) AND (fecha_elaboracion<=?) ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($inicio, $final));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesCampo($campo)
    {        
        $consulta = "SELECT * FROM cotizaciones WHERE (cotizaciones.num_cotizacion=?) ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesIDCliente($campo)
    {        
        $consulta = "SELECT * FROM cotizaciones WHERE (id_cliente=?) ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesCliente($campo)
    {        
        $consulta = "SELECT * FROM cotizaciones WHERE id_cliente=? ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesParametro($campo)
    {        
        $consulta = "SELECT * FROM actividades_parametros WHERE id_parametro=?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizaciones($mes)
    {
        $consulta = "SELECT * FROM cotizaciones WHERE EXTRACT(month from fecha_elaboracion)=? ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($mes));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesSQL($sql)
    {
        $consulta = $sql;
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array());

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function Consulta($sql)
    {
        $consulta = $sql;
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array());

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function Consulta_Unico($sql) {
        // Consulta de la meta
        $consulta = $sql;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function Ejecutar($sql) {
        // Consulta de la meta
        $consulta = $sql;

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
                        
            return 1;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesaOrdenes($mes)
    {
        $consulta = "SELECT * FROM cotizaciones WHERE (EXTRACT(month from fecha_elaboracion)=? AND estado=1) ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($mes));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesDia($dia, $mes)
    {        
        $consulta = "SELECT * FROM cotizaciones WHERE (EXTRACT(day from fecha_elaboracion)=? AND EXTRACT(month from fecha_elaboracion)=?)";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($dia, $mes));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesDiaEstado($dia, $mes, $estado)
    {        
        $consulta = "SELECT * FROM cotizaciones WHERE (EXTRACT(day from fecha_elaboracion)=? AND EXTRACT(month from fecha_elaboracion)=? AND (estado=?))";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($dia, $mes, $estado));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerOrdenes()
    {
        $consulta = "SELECT * FROM ordenes ORDER BY id_orden DESC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerOrdenesporId($id, $version)
    {
        $consulta = "SELECT * FROM ordenes WHERE (id_cotizacion = ? AND version = ?)";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $version));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerOrdenesCliente($id)
    {
        $consulta = "SELECT * FROM ordenes WHERE id_cliente = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerOrdenesParametro($id)
    {
        $consulta = "SELECT * FROM ordenes_muestras_parametros WHERE id_parametro = ?";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

     /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerOrdenesGeneradas()
    {
        $consulta = "SELECT * FROM ordenes WHERE estado>=2 ORDER BY id_orden DESC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesGanadas($mes)
    {
        $consulta = "SELECT * FROM cotizaciones WHERE (EXTRACT(month from fecha_elaboracion)=? AND estado=1) ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($mes));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesPerdidas($mes)
    {
        $consulta = "SELECT * FROM cotizaciones WHERE (EXTRACT(month from fecha_elaboracion)=? AND estado=2) ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($mes));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionessinPerdidas($mes)
    {
        $consulta = "SELECT * FROM cotizaciones WHERE (EXTRACT(month from fecha_elaboracion)=? AND estado!=2) ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($mes));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCotizacionesporAprobar($mes)
    {
        $consulta = "SELECT * FROM cotizaciones WHERE (EXTRACT(month from fecha_elaboracion)=? AND estado=3) ORDER BY num_cotizacion DESC, version ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($mes));

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

     /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerTrabajosAnalistas2()
    {
        $consulta = "SELECT * FROM trabajo_analistas WHERE estado=0 ORDER BY id_orden DESC, num_muestra ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

     /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerTrabajosAnalistas()
    {
        $consulta = "SELECT * FROM trabajo_analistas WHERE estado=0 ORDER BY id_orden ASC, num_muestra ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

     /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerTrabajosAnalistasXImprimir()
    {
        $consulta = "SELECT * FROM trabajo_analistas WHERE impreso=0 ORDER BY id_orden DESC, num_muestra ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerTrabajosAnalistasTodos()
    {
        $consulta = "SELECT * FROM trabajo_analistas ORDER BY id_orden DESC, num_muestra ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerInventario()
    {
        $consulta = "SELECT * FROM inventario ORDER BY stock DESC, nombre ASC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerCondiciones()
    {
        $consulta = "SELECT * FROM condiciones ORDER BY contador DESC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerNotificaciones()
    {
        //$consulta = "SELECT * FROM notificaciones WHERE ((estado=0) AND (id_user= ?)) ORDER BY id_notificacion DESC";
        $consulta = "SELECT * FROM notificaciones WHERE estado=1 ORDER BY id_notificacion DESC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerNotificacionesListado($quien)
    {
        //$consulta = "SELECT * FROM notificaciones WHERE ((estado=0) AND (id_user= ?)) ORDER BY id_notificacion DESC";
        $consulta = "SELECT * FROM notificaciones WHERE id_tipo=? ORDER BY id_notificacion DESC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($quien));
            

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtenerNotificacionesID($id)
    {
        //$consulta = "SELECT * FROM notificaciones WHERE ((estado=0) AND (id_user= ?)) ORDER BY id_notificacion DESC";
        $consulta = "SELECT * FROM notificaciones WHERE (estado=1 AND id_tipo=?) ORDER BY id_notificacion DESC";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function obtener_trabajo_analistas($id)
    {        
        $consulta = "SELECT * FROM trabajo_analistas T, parametros P WHERE (T.id_orden= ? AND (T.id_parametro=P.clave)) ORDER BY T.num_muestra";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            
            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function Obtener_Trabajos_Analistas_Muestra($num_orden, $muestra)
    {        
        $consulta = "SELECT * FROM trabajo_analistas T, parametros P WHERE ((T.id_orden= ? AND T.num_muestra=?) AND (T.id_parametro=P.clave)) ORDER BY T.num_muestra";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($num_orden, $muestra));
            
            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Retorna en la fila especificada de la tabla 'meta'
     *
     * @param $idMeta Identificador del registro
     * @return array Datos del registro
     */
    public static function Obtener_Trabajos_Analistas_MuestraIdVer($num_orden, $muestra, $version)
    {        
        $consulta = "SELECT * FROM trabajo_analistas T, parametros P WHERE (((T.id_orden= ? AND T.num_muestra=?) AND (T.id_parametro=P.clave)) AND (T.version_informe=?)) ORDER BY T.num_muestra";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($num_orden, $muestra, $version));
            
            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getById($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT id_test, nombre, edad FROM test WHERE id_test = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ClientePorId($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM clientes WHERE id_cliente = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerTrabajoPorCampo($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE (id_parametro = ? AND estado=0) ORDER BY id_orden DESC, num_muestra ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerTrabajoPorCampo2($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE (id_parametro = ? AND estado!=2) ORDER BY id_orden ASC, num_muestra ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerTrabajoPorID($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE id_orden = ? AND estado!=2 ORDER BY id_orden ASC, num_muestra ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerTrabajoPorID_NumMuestra($id_test, $num_muestra)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE (id_orden = ? AND num_muestra= ?) ORDER BY id_orden DESC, num_muestra ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test, $num_muestra));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerTrabajoPorIDVer_NumMuestra($id_test, $num_muestra, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE ((id_orden = ? AND num_muestra= ?) AND (version_informe=?)) AND (estado!=2) ORDER BY id_orden ASC, num_muestra ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test, $num_muestra, $version));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerTrabajoPorAnalista($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE (id_analista = ? AND estado=0 AND estado!=2) ORDER BY id_orden ASC, num_muestra ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerTrabajoPorAnalista2($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE (id_analista = ? AND estado!=2) ORDER BY id_orden ASC, num_muestra ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function MonitoreoId($id, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT estado FROM monitoreo WHERE (id_cotizacion = ? AND version = ?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $version));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getCotizacion($id_cot, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM cotizaciones WHERE (num_cotizacion = ? AND version=?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_cot, $version));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getCotizacionIDCliente($id_cliente)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM cotizaciones WHERE (id_cliente = ?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_cliente));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getOrden($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes WHERE num_orden = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getEstadoOrden($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes WHERE num_orden = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getEstadoOrdenIdVer($id, $ver)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes WHERE (num_orden = ? AND version_informe=?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $ver));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getOrdenMuestra($orden, $muestra)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes WHERE (num_orden = ? AND num_muestras = ?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($orden, $muestra));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getOrdenId($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes WHERE id_orden = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getOrdenIdVer($id, $ver)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes WHERE (id_orden = ? AND version_informe=?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $ver));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getOrdenCotizacionIdVer($id, $ver)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes WHERE (id_orden = ? AND version_informe=?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id, $ver));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getMuestrasOrden($id_orden, $id_muestra)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes_muestras WHERE ((id_orden= ?) AND (num_muestra = ?)) ORDER BY num_muestra";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_orden, $id_muestra));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;



        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getMuestrasOrdenIdVer($id_orden, $id_muestra, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes_muestras WHERE (((id_orden= ?) AND (num_muestra = ?)) AND (version_informe=?)) ORDER BY num_muestra";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_orden, $id_muestra, $version));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;



        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getMuestrasParametrosOrden($id_orden, $id_muestra)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM ordenes_muestras_parametros WHERE ((id_orden= ?) AND (num_muestra = ?)) ORDER BY num_muestra";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_orden, $id_muestra));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;



        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getMonitoreo($id_test, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM monitoreo WHERE (id_cotizacion = ? AND version=?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test, $version));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getMonitoreoId($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM monitoreo WHERE id_monitoreo = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getCliente($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM clientes WHERE id_cliente = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getClienteNombre($nombre)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM clientes WHERE nombre = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($nombre));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getEventoMonitoreo($id_monitoreo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM monitoreo WHERE id_monitoreo = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_monitoreo));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getEventoID($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM calendario WHERE id_calendario = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getNorma($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM normas WHERE norma = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getNormaId($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM normas WHERE id_norma = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getPaquete($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM paquetes WHERE paquete = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getPaqueteId($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM paquetes WHERE id_paquete = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getParametro($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE id_parametro = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getExpress($clave, $id, $ver)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades_parametros WHERE (id_parametro = ?) AND (id_cotizacion =?) AND (version = ?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($clave, $id, $ver));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getDatosParametro($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE id_trabajo_analista = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getDatosParametroIdVer($id, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE id_trabajo_analista = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getParametroClave($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE clave = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getAreaId($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM areas WHERE id_area = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getUsuario($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM usuarios WHERE (nombres = ?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getUsuarioId($id_test) {
        // Consulta de la meta
        $consulta = "SELECT * FROM usuarios WHERE (id_usuario = ?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

 /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getResultados($id_orden, $id_muestra, $id_parametro)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE ((id_orden = ? AND num_muestra = ?) AND id_parametro= ? )";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_orden, $id_muestra, $id_parametro));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerResultados($id_orden, $id_muestra)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE ((id_orden = ? AND num_muestra = ?)) ORDER BY id_parametro ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_orden, $id_muestra));
            
            return $comando->fetchAll(PDO::FETCH_ASSOC);            

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerResultadosIdVer($id_orden, $id_muestra, $version)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM trabajo_analistas WHERE (((id_orden = ? AND num_muestra = ?)) AND (version_informe=?)) ORDER BY id_parametro ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_orden, $id_muestra, $version));
            
            return $comando->fetchAll(PDO::FETCH_ASSOC);            

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getMatriz($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM matrices WHERE id_matriz = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getViaticos($id_monitoreo)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM monitoreos_viaticos WHERE id_monitoreo = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_monitoreo));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getLocacion($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM clientes_locacion WHERE id_locacion = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }




    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getParametroPDF($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE clave = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getLimitesNorma($id_parametro, $id_norma)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM normas_parametros WHERE (id_parametro = ? AND id_norma = ?)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_parametro, $id_norma));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getParametroCampo($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE ((CONCAT(clave, ' ', parametro, ' ', id_tecnica_analitica, ' ', id_metodo_inter, ' ', nombre_corto) ILIKE ?)) ORDER BY parametro ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    
    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getInventarioCategoria($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT categoria FROM inventario_categorias WHERE id_categoria = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function getInventarioItem($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM inventario WHERE id_item = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosNormas($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM normas_parametros WHERE id_norma = ? ORDER BY id_parametro";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosNormas2($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT N.id_parametro, N.id_norma, N.texto, N.observaciones, N.lim_inf_trabajo, N.lim_sup_trabajo, P.parametro, P.clave FROM normas_parametros N, parametros P WHERE ((N.id_norma = ?) AND (N.id_parametro=P.id_parametro)) ORDER BY P.parametro ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerCalendarioUsuario($id_usuario)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM calendario, monitoreo WHERE (calendario.id_usuario = ? AND monitoreo.id_monitoreo=calendario.id_monitoreo)";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_usuario));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerCalendarioID($id_usuario)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM calendario WHERE id_usuario = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_usuario));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

     /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerCalendario()
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM calendario";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosNormasListado($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE id_parametro = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosPaquetes($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM paquetes_parametros WHERE id_paquete = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosPaquetes2($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM paquetes_parametros A, parametros P WHERE ((A.id_paquete = ?) AND (A.id_parametro=P.id_parametro)) ORDER BY P.parametro ASC";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosPDF($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM actividades_parametros WHERE id_cotizacion = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosSubcontratados($parametro)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE CONCAT(parametro) ILIKE ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($parametro));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ListadoParametros()
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id_test Identificador de la meta
     * @return mixed
     */
    public static function ObtenerParametrosSolos($id_test)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM parametros WHERE clave = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_test));
            // Capturar primera fila del resultado
            //$row = $comando->fetch(PDO::FETCH_ASSOC);
            //return $row;


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }



    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $id   Identificador del usuario que ingresa
     * @return mixed
     */
    public static function getUser($id)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM usuarios WHERE id_usuario = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $user     Nombre de Usuario
     * @param $psw      Password del usuario
     * @return mixed
     */
    public static function getCredencial($user, $psw)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM accesos WHERE ((usuario = ?) AND (password = ?))";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($user, $psw));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $user     Nombre de Usuario
     * @param $psw      Password del usuario
     * @return mixed
     */
    public static function getAccesos($id_user)
    {
        // Consulta de la meta
        $consulta = "SELECT * FROM usuarios WHERE id_usuario = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_user));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Obtiene los campos de una meta con un identificador
     * determinado
     *
     * @param $user     Nombre de Usuario
     * @param $psw      Password del usuario
     * @return mixed
     */
    public static function getRol($id_rol)
    {
        // Consulta de la meta
        $consulta = "SELECT rol FROM usuarios_roles WHERE id_rol = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($id_rol));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function update($id_test, $nombre, $edad)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE test" .
            " SET id_test=?, nombre=?, edad=? " .
            "WHERE id_test=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($id_test, $nombre, $edad, $id_test));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Inventario($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE inventario SET ".$campo."=? WHERE id_item=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Impresion_Analista($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE trabajo_analistas SET ".$campo."=? WHERE id_analista=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Norma($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE normas SET ".$campo."=? WHERE id_norma=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Paquete($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE paquetes SET ".$campo."=? WHERE id_paquete=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }


    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Usuario($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE usuarios SET ".$campo."=? WHERE id_usuario=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Horas_Extras($valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE usuarios SET horas_extra=(horas_extra+".$valor.") WHERE id_usuario=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Usuario_Clave($valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE accesos SET password = ? WHERE id_usuario = ?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Monitoreo($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE monitoreo SET ".$campo."=? WHERE id_monitoreo=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Vehiculo($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE vehiculos SET ".$campo."=? WHERE id_vehiculo=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Viaticos($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE monitoreos_viaticos SET ".$campo."=? WHERE id_viatico=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Calendario($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE calendario SET ".$campo."=? WHERE id_monitoreo=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Evento($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE calendario SET ".$campo."=? WHERE id_calendario=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

   

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Trabajo_Analista($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE trabajo_analistas SET ".$campo."=? WHERE id_trabajo_analista=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

     /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Listados($sql)
    {
        // Creando consulta UPDATE
        $consulta = $sql;

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array());

        return $cmd;
    }

     /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Parametros_Norma($campo, $valor, $id, $id_norma)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE normas_parametros SET ".$campo."=? WHERE (id_parametro=? AND id_norma= ?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id, $id_norma));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Parametros($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE parametros SET ".$campo."=? WHERE (id_parametro=?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Clientes($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE clientes SET ".$campo."=? WHERE id_cliente=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Actividad($id_cotizacion, $actividad, $version)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE actividades SET estado='1' WHERE (id_cotizacion=? AND actividad=? AND version=?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($id_cotizacion, $actividad, $version));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Cotizacion($campo, $valor, $id, $version)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE cotizaciones SET ".$campo."=? WHERE (num_cotizacion=? AND version=?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id, $version));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Orden($campo, $valor, $id, $version)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE ordenes SET ".$campo."=? WHERE (id_orden=? AND version_informe=?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id, $version));

        return $cmd;
    }

     /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_OrdenIdVer($campo, $valor, $id, $version)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE ordenes SET ".$campo."=? WHERE (num_orden=? AND version_informe=?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id, $version));

        return $cmd;
    }


     /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_OrdenIdVer2($campo, $valor, $id, $version, $num_muestra)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE ordenes_muestras SET ".$campo."=? WHERE (id_orden=? AND version_informe=?) AND (num_muestra= ?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id, $version, $num_muestra));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Bloquear($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE trabajo_analistas SET ".$campo."=? WHERE id_orden=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

     /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function BloquearIdVer($campo, $valor, $id, $version)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE trabajo_analistas SET ".$campo."=? WHERE (id_orden=? AND version_informe=?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id, $version));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function BloquearIdVer2($campo, $valor, $id, $version)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE trabajo_analistas SET ".$campo."=? WHERE (id_orden=? AND version_informe=?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id, $version));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Orden_Informe($id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE ordenes SET estado=1 WHERE num_orden=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Orden_InformeIdVer($id, $ver)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE ordenes SET estado=1 WHERE (num_orden=? AND version_informe=?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($id, $ver));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Cotizacion_A_Ganada($id, $version)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE cotizaciones SET estado=1 WHERE (num_cotizacion=? AND version=?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($id, $version));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Cotizacion_A_Perdida($id, $version, $razon)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE cotizaciones SET estado=2, razon_perdida=? WHERE (num_cotizacion=? AND version=?)";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($razon, $id, $version));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador$id=$_POST["id_item"];
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Notificacion_Leida($id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE notificaciones SET estado=0 WHERE id_notificacion=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($id));

        return $cmd;
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad nueva descripcion     
     */
    public static function Actualizar_Descarga($campo, $valor, $id)
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE inventario SET ".$campo."=(".$campo."-?) WHERE id_item=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($valor, $id));

        return $cmd;
    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function insert($nombre, $edad)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO test ( " .
            "nombre," .
            " edad)" .
            " VALUES( ?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $titulo,
                $descripcion,
                $fechaLim,
                $categoria,
                $prioridad
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function nuevo_inventario($codigo, $ub, $nombre, $pureza, $marca, $presentacion, $caducidad, $numartcat, $lote, $grupo, $stock, $sm, $peligro, $obs)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO inventario (codigo,ubicacion, nombre, pureza, marca, presentacion, caducidad, num_art_cat, lote, id_categoria, stock, stock_min, peligrosidad, observaciones, estado, conteo) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,1,1)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $codigo,
                $ub,
                $nombre,
                $pureza,
                $marca,
                $presentacion,
                $caducidad,
                $numartcat,
                $lote,
                $grupo,
                $stock,
                $sm,
                $peligro,
                $obs 
            )
        );

    }

   

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Notificacion($tipo, $notificacion, $quien)
    {
        $fecha=date("Y-m-d");
        $hora=date("H:i:s");
        // Sentencia INSERT
        $comando = "INSERT INTO notificaciones (id_tipo, notificacion, estado, fecha, hora, quien) VALUES( ?,?,1,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $tipo,
                $notificacion,                
                $fecha,
                $hora,
                $quien
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Cotizacion($version, $elaboracion, $solicitud, $dias, $numero, $condiciones, $id_cliente, $id_cliente_facturar, 
        $muestreado, $prioridad, $tipo_muestreo, $subtotal, $descuento, $impuesto, $total, $id_usuario, $estado, $observaciones, $logistica, $descuento_logistica, $cantidad_logistica)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO cotizaciones (version, fecha_elaboracion, fecha_solicitud, dias_vigencia, num_cotizacion, id_condiciones, id_cliente, 
            id_cliente_factura, muestreado_por, prioridad, tipo_muestreo, descuento, subtotal, impuesto, 
            total, id_usuario, estado, impreso, enviado, razon_perdida, observaciones, logistica, descuento_logistica, cantidad_logistica) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,0,'',?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $version,
                $elaboracion,
                $solicitud,
                $dias,
                $numero,
                $condiciones,
                $id_cliente_facturar,
                $id_cliente,
                $muestreado,
                $prioridad,
                $tipo_muestreo,
                $descuento,
                $subtotal,
                $impuesto,
                $total,
                $id_usuario,
                $estado,
                $observaciones,
                $logistica,
                $descuento_logistica, 
                $cantidad_logistica
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Cotizacion_2($version, $elaboracion, $solicitud, $dias, $numero, $condiciones, $id_cliente, $id_cliente_facturar, 
        $muestreado, $prioridad, $tipo_muestreo, $subtotal, $descuento, $impuesto, $total, $id_usuario, $estado, $observaciones, $logistica, $descuento_logistica, $cedula_no, $cliente_no, $empresa_no, $direccion_no, $telefonos_no, $cantidad_logistica)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO cotizaciones (version, fecha_elaboracion, fecha_solicitud, dias_vigencia, num_cotizacion, id_condiciones, id_cliente, 
            id_cliente_factura, muestreado_por, prioridad, tipo_muestreo, descuento, subtotal, impuesto, 
            total, id_usuario, estado, impreso, enviado, razon_perdida, observaciones, logistica, descuento_logistica, cedula_no, cliente_no, empresa_no, direccion_no, telefonos_no, cantidad_logistica) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,0,'',?,?,?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $version,
                $elaboracion,
                $solicitud,
                $dias,
                $numero,
                $condiciones,
                $id_cliente_facturar,
                $id_cliente,
                $muestreado,
                $prioridad,
                $tipo_muestreo,
                $descuento,
                $subtotal,
                $impuesto,
                $total,
                $id_usuario,
                $estado,
                $observaciones,
                $logistica,
                $descuento_logistica,
                $cedula_no,
                $cliente_no,
                $empresa_no,
                $direccion_no,
                $telefonos_no, 
                $cantidad_logistica
            )
        );

    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Registro($tabla, $id, $id_valido)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM ".$tabla." WHERE ".$id."=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_valido));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Actualizar_Campo($tabla, $campo, $valor, $id, $id_valida)
    {
        // Sentencia DELETE
        $comando = "UPDATE ".$tabla." SET ".$campo."=? WHERE ".$id."= ?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($valor, $id_valida));
    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Orden($fecha_ingreso, $id_cotizacion, $id_cliente, $id_locacion, $id_actividad, $num_muestras, $id_usuario, $estado, $version, $num_orden, $prioridad)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO ordenes (fecha_ingreso, id_cotizacion, id_cliente, id_locacion, id_actividad, num_muestras, id_usuario, estado, impreso, version, num_orden, razon_jt, razon_dt, razon_dc, recibido, enviado, prioridad) VALUES( ?,?,?,?,?,?,?,?,0,?,?,'','','',0,0,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $fecha_ingreso,
                $id_cotizacion,
                $id_cliente, 
                $id_locacion,
                $id_actividad,
                $num_muestras,
                $id_usuario,
                $estado,
                $version,
                $num_orden,
                $prioridad
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Version_Orden($fecha_ingreso, $id_cotizacion, $id_cliente, $id_locacion, $id_actividad, $num_muestras, $id_usuario, $estado, $version, $num_orden, $prioridad, $version_informe)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO ordenes (fecha_ingreso, id_cotizacion, id_cliente, id_locacion, id_actividad, num_muestras, id_usuario, estado, impreso, version, num_orden, razon_jt, razon_dt, razon_dc, recibido, enviado, prioridad,version_informe) VALUES( ?,?,?,?,?,?,?,?,0,?,?,'','','',0,0,?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $fecha_ingreso,
                $id_cotizacion,
                $id_cliente, 
                $id_locacion,
                $id_actividad,
                $num_muestras,
                $id_usuario,
                $estado,
                $version,
                $num_orden,
                $prioridad,
                $version_informe
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Monitoreo($id, $fecha_inicio, $fecha_final, $hora_inicial, $hora_final, $contacto, $telefono, $direccion, $observaciones, $confirmar, $version, $fecha_alta, $id_usuario)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO monitoreo (id_cotizacion, fecha_inicio, fecha_final, hora_inicial, hora_final, contacto, telefono, direccion, observaciones, estado, version, id_vehiculo, fecha_alta, id_usuario) VALUES( ?,?,?,?,?,?,?,?,?,?,?,0,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $id, 
                $fecha_inicio, 
                $fecha_final, 
                $hora_inicial, 
                $hora_final,
                $contacto, 
                $telefono, 
                $direccion, 
                $observaciones, 
                $confirmar,
                $version,
                $fecha_alta,
                $id_usuario
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Evento($id_tipo, $id_usuario, $id_monitoreo, $fecha_inicio, $fecha_final, $hora, $titulo, $dirigido)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO calendario (id_tipo, id_usuario, id_monitoreo, fecha_inicio, fecha_final, hora, titulo, dirigido) VALUES( ?,?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $id_tipo, 
                $id_usuario, 
                $id_monitoreo,
                $fecha_inicio, 
                $fecha_final, 
                $hora, 
                $titulo,
                $dirigido
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Actividad($actividad, $id_cotizacion, $id_matriz, $descripcion, $version, $num_muestras)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO actividades (actividad, id_cotizacion, id_matriz, descripcion, version, estado, num_muestras) VALUES( ?,?,?,?,?,0,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $actividad,
                $id_cotizacion,
                $id_matriz,
                $descripcion, 
                $version,
                $num_muestras
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Muestra($id_orden, $num_muestra, $fecha_monitoreo, $hora, $muestreado_por, $tipo_muestreo, $identificacion, 
        $integridad, $motivo, $num_envases, $temperatura, $custodia, $volumen, $id_matriz, $tipo_informe, $id_norma, $observaciones)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO ordenes_muestras (id_orden, num_muestra, fecha_monitoreo, hora, muestreado_por, tipo_muestreo, identificacion, 
            integridad, motivo, num_envases, temperatura, custodia, volumen, id_matriz, tipo_informe, id_norma, observaciones) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $id_orden, 
                $num_muestra, 
                $fecha_monitoreo, 
                $hora, 
                $muestreado_por, 
                $tipo_muestreo, 
                $identificacion,
                $integridad, 
                $motivo, 
                $num_envases, 
                $temperatura, 
                $custodia, 
                $volumen, 
                $id_matriz, 
                $tipo_informe, 
                $id_norma, 
                $observaciones             
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Muestra_Version($id_orden, $num_muestra, $fecha_monitoreo, $hora, $muestreado_por, $tipo_muestreo, $identificacion, 
        $integridad, $motivo, $num_envases, $temperatura, $custodia, $volumen, $id_matriz, $tipo_informe, $id_norma, $observaciones, $version_informe)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO ordenes_muestras (id_orden, num_muestra, fecha_monitoreo, hora, muestreado_por, tipo_muestreo, identificacion, 
            integridad, motivo, num_envases, temperatura, custodia, volumen, id_matriz, tipo_informe, id_norma, observaciones, version_informe) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $id_orden, 
                $num_muestra, 
                $fecha_monitoreo, 
                $hora, 
                $muestreado_por, 
                $tipo_muestreo, 
                $identificacion,
                $integridad, 
                $motivo, 
                $num_envases, 
                $temperatura, 
                $custodia, 
                $volumen, 
                $id_matriz, 
                $tipo_informe, 
                $id_norma, 
                $observaciones,
                $version_informe
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Actividad_Analistas($id_orden, $id_parametro, $analista, $num_muestra, $express)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO trabajo_analistas (id_analista, id_parametro, id_orden, num_muestra, estado, impreso, express) VALUES( ?,?,?,?,0,0,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $analista,
                $id_parametro, 
                $id_orden,
                $num_muestra,
                $express
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Actividad_Analistas_Version($id_orden, $id_parametro, $analista, $num_muestra, $express, $version_informe, $resultado, $fecha, $hora, $bitacora, $razon_modificacion, $estado, $impreso, $observaciones)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO trabajo_analistas (id_analista, id_parametro, id_orden, num_muestra, resultado, fecha, hora, bitacora, razon_modificacion, estado, impreso, observaciones, express, version_informe) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $analista,
                $id_parametro, 
                $id_orden,
                $num_muestra,
                $resultado,
                $fecha,
                $hora,
                $bitacora,
                $razon_modificacion,
                $estado,
                $impreso,
                $observaciones,
                $express,
                $version_informe
            )
        );

    }


    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Actividad_Parametro($id_cotizacion, $id_actividad, $id_parametro, $cantidad, $precio, $descuento, $express, $version)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO actividades_parametros (id_cotizacion, id_actividad, id_parametro, cantidad, precio, descuento, express, version) VALUES( ?,?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $id_cotizacion,
                $id_actividad,
                $id_parametro,
                $cantidad,
                $precio,
                $descuento,
                $express, 
                $version
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Norma_Parametro($id_norma, $id_parametro, $lim_inf_trabajo, $lim_sup_trabajo, $texto, $observaciones)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO normas_parametros (id_norma, id_parametro, lim_inf_trabajo, lim_sup_trabajo, texto, observaciones) VALUES( ?,?,?,?,?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array(
                $id_norma,
                $id_parametro,
                $lim_inf_trabajo,
                $lim_sup_trabajo,
                $texto,
                $observaciones
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Paquete_Parametro($id_paquete, $id_parametro)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO paquetes_parametros (id_paquete, id_parametro) VALUES( ?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array(
                $id_paquete,
                $id_parametro
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Muestra_Parametro($id_parametro, $num_muestra, $id_orden)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO ordenes_muestras_parametros (id_parametro, num_muestra, id_orden) VALUES( ?,?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $id_parametro, 
                $num_muestra,
                $id_orden           
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Muestra_Parametro_Version($id_parametro, $num_muestra, $id_orden, $version_informe)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO ordenes_muestras_parametros (id_parametro, num_muestra, id_orden, version_informe) VALUES( ?,?,?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $id_parametro, 
                $num_muestra,
                $id_orden,
                $version_informe
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Cliente($codigo, $razon_social, $ciruc, $direccion, $ciudad, $telefono, $celular, $fax, $correo, $correo_contacto, $contacto, $observaciones)
    {
        // Sentencia INSERT
        $vacio="";
        $fecha=date("Y/m/d");
        $comando = "INSERT INTO clientes (cod_cliente, status, nombre, ciruc, direccion, ciudad, telefono, celular, 
            fax, correo, correo_factura, contacto, num_ventas, observaciones, fecha_alta) VALUES( ?,1,?,?,?,?,?,?,?,?,?,?,0,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $codigo,                
                $razon_social,
                $ciruc,
                $direccion,
                $ciudad,
                $telefono,
                $celular,
                $fax,
                $correo,
                $correo_contacto,
                $contacto,
                $observaciones,
                $fecha
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Usuario($nombres, $cargo, $direccion, $telefono, $celular, $correo, $cedula, $iniciales, $rol, $estado, $acceso, $notificaciones)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO usuarios (nombres, cargo, direccion, telefono, celular, correo, cedula, iniciales, rol, estado, horas_extra, acceso, notificaciones, analistas, administradores) VALUES( ?,?,?,?,?,?,?,?,?,?,0,?,?,'',0)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array($nombres, $cargo, $direccion, $telefono, $celular, $correo, $cedula, $iniciales, $rol, $estado, $acceso, $notificaciones)
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Acceso($id_usuario, $usuario, $password)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO accesos (id_usuario, usuario, password) VALUES( ?,?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array($id_usuario, $usuario, $password)
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Locacion($codigo, $locacion)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO clientes_locacion (id_cliente, locacion) VALUES( ?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $codigo,                
                $locacion
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Area($area, $codigo)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO areas (area, codigo) VALUES( ?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $area,                
                $codigo
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Vehiculo($vehiculo)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO vehiculos (vehiculo, estado) VALUES( ?,0 )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $vehiculo
            )
        );

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Viatico($viatico, $valor, $fecha, $id_monitoreo, $id_tecnico)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO monitoreos_viaticos (viatico, valor, fecha, id_monitoreo, id_tecnico) VALUES( ?,?,?,?,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $viatico,
                $valor,
                $fecha,
                $id_monitoreo,
                $id_tecnico
            )
        );

    }

     /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Matriz($matriz)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO matrices (matriz, grupo) VALUES( ?,1 )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($matriz));

    }

     /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Condicion($cod_condicion, $condicion)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO condiciones (cod_condicion, condicion, contador) VALUES( ?,?,0 )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($cod_condicion, $condicion));

    }


     /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Parametro($id_matriz_pdf, $clave, $parametro, $tiempo_cliente, $tiempo_analista, $id_tecnica_analitica, $id_metodo_inter, $precio, $lim_deteccion, $lim_cuantificacion, $lim_inf_trabajo, $lim_sup_trabajo, $unidades, $decimales, $id_analista, $id_area, $holding_time, $holding_time_express, $acreditacion, $nombre_corto, $volumen, $envase, $area, $impresion)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO parametros (id_matriz_pdf, clave, parametro, tiempo_cliente, tiempo_analista, id_tecnica_analitica, id_metodo_inter, precio, lim_deteccion, lim_cuantificacion, lim_inf_trabajo, lim_sup_trabajo, unidades, decimales, id_analista, id_area, holding_time, holding_time_express, acreditacion, nombre_corto, volumen, envase, area, ventas, impresion) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $id_matriz_pdf,                
                $clave,
                $parametro,
                $tiempo_cliente,
                $tiempo_analista,
                $id_tecnica_analitica,
                $id_metodo_inter,
                $precio,
                $lim_deteccion,
                $lim_cuantificacion,
                $lim_inf_trabajo,
                $lim_sup_trabajo,
                $unidades,
                $decimales,
                $id_analista,
                $id_area,
                $holding_time,
                $holding_time_express,
                $acreditacion,
                $nombre_corto,
                $volumen,
                $envase,
                $area,
                $impresion
            )
        );

    }

     /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nueva_Norma($norma)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO normas (norma, contador) VALUES( ?, 0 )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($norma));

    }

    /**
     * Insertar una nueva meta
     *
     * @param $id_test      identificador
     * @param $nombre       nuevo titulo
     * @param $edad         nueva descripcion 
     * @return PDOStatement
     */
    public static function Nuevo_Paquete($paquete, $precio)
    {
        // Sentencia INSERT
        $fecha=date("Y/m/d");
        $comando = "INSERT INTO paquetes (paquete, precio, estado, ventas, fecha) VALUES( ?,?,1,0,? )";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($paquete, $precio, $fecha));

    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function delete($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM test WHERE id_test=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Borrar_Todo($tabla)
    {
        // Sentencia DELETE
        $comando = "TRUNCATE TABLE ".$tabla;

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute();
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Inventario($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM inventario WHERE id_item=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Area($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM areas WHERE id_area=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Cotizacion($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM cotizaciones WHERE id_cotizacion=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Norma($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM normas WHERE id_norma=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

     /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Paquete($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM paquetes WHERE id_paquete=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Parametro_Norma($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM normas_parametros WHERE id_norma=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }


    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Parametro_Norma2($id, $norma)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM normas_parametros WHERE (id_parametro=? AND id_norma=?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id, $norma));
    }


    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Parametro_Paquete($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM paquetes_parametros WHERE id_paquete=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Parametro_Paquete2($id, $paquete)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM paquetes_parametros WHERE (id_parametro=? AND id_paquete=?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id, $paquete));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Usuario($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM usuarios WHERE id_usuario=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Usuario_Acceso($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM accesos WHERE id_usuario=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Notificacion($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM notificaciones WHERE id_notificacion=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Cliente($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM clientes WHERE id_cliente=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Evento($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM calendario WHERE id_calendario=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Locacion($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM clientes_locacion WHERE id_locacion=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Vehiculo($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM vehiculos WHERE id_vehiculo=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Condicion($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM condiciones WHERE id_condicion=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Matriz($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM matrices WHERE id_matriz=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }

     /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function Eliminar_Parametro($id_test)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM parametros WHERE id_parametro=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id_test));
    }


}

?>