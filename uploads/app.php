<?php
trait Singleton
{
    public static $instance;
    public static function getInstance()
    {
        $args = func_get_args();
        $arg = end($args);
        return (!(self::$instance instanceof self) || !empty($arg))
            ? self::$instance = new static(...(array) $arg)
            : self::$instance;
    }
}

spl_autoload_register('autoload');
header("Content-Type: application/json; charset=UTF-8");
$METHOD = $_SERVER["REQUEST_METHOD"];
$_DATA = json_decode(file_get_contents("php://input"), true);

$res = match ($METHOD) {
    "POST" => customerInstance($_DATA['usersDetails']),
    default => null
};

echo json_encode($res);

//Funciones

function customerInstance($data)
{

    return (isset($data['Full_Name'], $data['Identification'], $data['Email'], $data['Address'], $data['Phone']))
        ? Customer::getInstance(
            $data['Full_Name'],
            $data['Identification'],
            $data['Email'],
            $data['Address'],
            $data['Phone']
        ) : null;

}

function sellerInstance($data)
{
    return Seller::getInstance(
        $data['Seller']
    );
}
function autoload($class)
{
    // Directorios donde buscar archivos de clases
    $directories = [
        dirname(__DIR__) . '/scripts/db/',
        dirname(__DIR__) . '/scripts/user/',
    ];
    // Convertir el nombre de la clase en un nombre de archivo relativo
    $classFile = str_replace('\\', '/', $class) . '.php';

    // Recorrer los directorios y buscar el archivo de la clase
    foreach ($directories as $directory) {
        $file = $directory . $classFile;
        // Verificar si el archivo existe y cargarlo
        if (file_exists($file)) {
            require $file;
            break;
        }
    }
}

?>