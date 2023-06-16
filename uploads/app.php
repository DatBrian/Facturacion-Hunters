<?php
    trait getInstance{
        public static $instance;
        public static function getInstance() {
            $arg = func_get_args();
            $arg = array_pop($arg);
            return (!(self::$instance instanceof self) || !empty($arg)) ? self::$instance = new static(...(array) $arg) : self::$instance;
        }
        function __set($name, $value){
            $this->$name = $value;
        }
    }
    function autoload($class) {
        // Directorios donde buscar archivos de clases
        $directories = [
            dirname(__DIR__).'/scripts/bill/',
            dirname(__DIR__).'/scripts/client/',
            dirname(__DIR__).'/scripts/product/',
            dirname(__DIR__).'/scripts/seller/',
            dirname(__DIR__).'/scripts/db/'
        ];
        // Convertir el nombre de la clase en un nombre de archivo relativo
        $classFile = str_replace('\\', '/', $class) . '.php';
    
        // Recorrer los directorios y buscar el archivo de la clase
        foreach ($directories as $directory) {
            $file = $directory.$classFile;
            // Verificar si el archivo existe y cargarlo
            if (file_exists($file)) {
                require $file;
                break;
            }
        }
    }
    spl_autoload_register('autoload');


    client::getInstance(json_decode(file_get_contents("php://input"), true));

// trait Singleton
// {
//     public static $instance;

//     public static function getInstance(...$args)
//     {
//         // $args = func_get_args();
//         // $arg = end($args);
//         return (!(self::$instance instanceof self) || !empty($args))
//             ? self::$instance = new static(...$args)
//             : self::$instance;
//     }

//     public function __set($name, $value){
//         $this -> $name = $value;
//     }

//     public function __get($name){
//         return $this -> $name;
//     }

// }

//Funciones

// class api{
//     use Singleton;

//     public function __construct(private $_METHOD, private $_HEADER, private $_DATA){
//     }

//     public function request(){

//         return match ($this -> _METHOD){
//             "POST" => $this -> postRequest(),
//             default => null
//         };

//     }

//     public function postRequest(){
//         // return isset($this->_DATA['usersDetails'])
//         // ? customerInstance($this->_DATA['usersDetails'])
//         // : null;
//         return customerInstance($this->_DATA['usersDetails']);
//     }


// }


//     // Directorios donde buscar archivos de clases
//     $directories = [
//         dirname(__DIR__) . '/scripts/',
//     ];
//     // Convertir el nombre de la clase en un nombre de archivo relativo
//     $classFile = str_replace('\\', '/', $class) . '.php';

//     // Recorrer los directorios y buscar el archivo de la clase
//     foreach ($directories as $directory) {
//         $file = $directory . $classFile;
//         // Verificar si el archivo existe y cargarlo
//         if (file_exists($file)) {
//             require $file;
//             break;
//         }
//     }


// $api = Api::getInstance($_METHOD, $_HEADER, $_DATA);
// $res = $api->request();

// echo json_encode($res);

?>