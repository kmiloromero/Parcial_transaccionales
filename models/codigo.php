<?php
$html = "<br>";

// Clase

interface CuentaBancariaInterface
{
    public function crearCuenta($numeroCuenta, $nombreCliente, $saldoInicial);
    public function depositar($monto);
    public function retirar(int $monto);
    public function consultarSaldo();
}
abstract class CuentaBancaria implements CuentaBancariaInterface
{
    protected $numeroCuenta;
    protected $nombreCliente;
    protected $saldo;


    public function __construct($numeroCuenta, $nombreCliente, $saldoInicial)
    {
        $this->numeroCuenta = $numeroCuenta;
        $this->nombreCliente = $nombreCliente;
        $this->saldo = $saldoInicial;
    }

    public function crearCuenta($numeroCuenta, $nombreCliente, $saldoInicial)
    {
        $this->numeroCuenta = $numeroCuenta;
        $this->nombreCliente = $nombreCliente;
        $this->saldo = $saldoInicial;
    }

    public function getNumeroCuenta()
    {
        return $this->numeroCuenta;
    }

    public function setNumeroCuenta($numeroCuenta)
    {
        $this->numeroCuenta = $numeroCuenta;
    }

    // Getter y Setter para nombreCliente
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;
    }

    // Getter y Setter para saldo
    public function getSaldo()
    {
        return $this->saldo;
    }

    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    public function depositar($monto)
    {
        $this->saldo += $monto;
        echo "Se ha depositado $" . number_format($monto, 2) . " en la cuenta " . $this->numeroCuenta . ".\n";
    }

    public function retirar(int $monto)
    {
        if ($monto <= $this->saldo) {
            $this->saldo -= $monto;
            echo "Se ha retirado $" . number_format($monto, 2) . " de la cuenta " . $this->numeroCuenta . ".\n";
        } else {
            echo "No se puede retirar $" . number_format($monto, 2) . " de la cuenta " . $this->numeroCuenta . " por insuficiencia de saldo.\n";
        }
    }

    public function consultarSaldo(): float
    {
        return $this->saldo;
    }
}

class CuentaAhorros extends CuentaBancaria
{
    private $porcentajeInteres;

    public function __construct($numeroCuenta, $nombreCliente, $saldoInicial, $porcentajeInteres)
    {
        parent::__construct($numeroCuenta, $nombreCliente, $saldoInicial);
        $this->porcentajeInteres = $porcentajeInteres;
    }

    public function getNumeroCuenta()
    {
        return $this->numeroCuenta;
    }

    public function setNumeroCuenta($numeroCuenta)
    {
        $this->numeroCuenta = $numeroCuenta;
    }

    // Getter y Setter para nombreCliente
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;
    }

    // Getter y Setter para saldo
    public function getSaldo()
    {
        return $this->saldo;
    }

    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    // Getter y Setter para saldo
    public function getPorcentajeInteres()
    {
        return $this->porcentajeInteres;
    }

    public function setPorcentajeInteres($porcentajeInteres)
    {
        $this->saldo = $porcentajeInteres;
    }

    public function depositarIntereses()
    {
        $intereses = $this->saldo * $this->porcentajeInteres;
        $this->saldo += $intereses;
        echo "Se han depositado intereses por $" . number_format($intereses, 2) . " en la cuenta " . $this->numeroCuenta . ".\n";
    }

    public function retirar($monto)
    {
        if ($monto <= $this->saldo) {
            $this->saldo -= $monto;
            echo "Se ha retirado $" . number_format($monto, 2) . " de la cuenta " . $this->numeroCuenta . ".\n";
        } else {
            echo "No se puede retirar $" . number_format($monto, 2) . " de la cuenta " . $this->numeroCuenta . " por insuficiencia de saldo.\n";
        }
    }
}

class CuentaCorriente extends CuentaBancaria
{
    private $cobroPorMil;
    private $sobregiroMaximo;

    public function __construct($numeroCuenta, $nombreCliente, $saldoInicial)
    {
        parent::__construct($numeroCuenta, $nombreCliente, $saldoInicial);
        $this->cobroPorMil = 0.004;
        $this->sobregiroMaximo = 300000;
    }

    public function retirar(int $monto)
    {
        $montoConCobro = $monto + ($monto * $this->cobroPorMil);
        $saldoDisponible = $this->saldo + $this->sobregiroMaximo;

        if ($montoConCobro <= $saldoDisponible) {
            $this->saldo -= $montoConCobro;
            echo "Se ha retirado $" . number_format($monto, 2) . " de la cuenta " . $this->numeroCuenta . " con un cobro de $" . number_format($monto * $this->cobroPorMil, 2) . ".\n";
        } else {
            echo "No se puede retirar $" . number_format($monto, 2) . " de la cuenta " . $this->numeroCuenta . " por insuficiencia de saldo.\n";
        }
    }
}

//Bloques

// Cuentas Corrientes

if ($_POST['bloque'] == 'crearcuentacorriente') {

    $html = "";
    $cuentaCorriente = new CuentaCorriente($_POST['numerocuenta'], $_POST['nombre'], $_POST['saldo']);

    // Crea un diccionario (Persistencia - Base de Datos)

    $cuentaArray = array(
        "numeroCuenta" => intval($cuentaCorriente->getNumeroCuenta()),
        "nombreCliente" => $cuentaCorriente->getNombreCliente(),
        "saldo" => floatval($cuentaCorriente->getSaldo())
    );

    $cuentaJSON = json_encode($cuentaArray);
    file_put_contents('../objetos/cuentacorriente.json', $cuentaJSON);

    //muestra de contenido en Frontend

    $html .= "<div class='alert alert-success' role='alert' style='margin: 2rem;'>
                <h5>Numero de Cuenta: [{$cuentaCorriente->getNumeroCuenta()}]</h5> 
                <h5>Nombre: [{$cuentaCorriente->getNombreCliente()}]</h5>
                <h5>Saldo: [{$cuentaCorriente->getsaldo()}]</h5>
            </div>";
    echo $html;
}

if ($_POST['bloque'] == 'depositarcuentacorriente') {

    if (file_exists('../objetos/cuentacorriente.json')) {
        // Leer el contenido del archivo JSON
        $cuentaJSON = file_get_contents('../objetos/cuentacorriente.json');

        // Deserializar el contenido del archivo JSON en un objeto PHP
        $cuentaCorrienteJSON = json_decode($cuentaJSON);

        $cuentaCorriente = new cuentaCorriente(
            $cuentaCorrienteJSON->numeroCuenta,
            $cuentaCorrienteJSON->nombreCliente,
            $cuentaCorrienteJSON->saldo
        );

        $cuentaCorriente->depositar(intval($_POST['monto']));

        // Serializar el objeto PHP de vuelta a JSON

        $cuentaCorrienteJSON = array(
            "numeroCuenta" => intval($cuentaCorriente->getNumeroCuenta()),
            "nombreCliente" => $cuentaCorriente->getNombreCliente(),
            "saldo" => floatval($cuentaCorriente->getSaldo())
        );

        $cuentaJSON = json_encode($cuentaCorrienteJSON);

        file_put_contents('../objetos/cuentacorriente.json', $cuentaJSON);
        $html = "<div class='alert alert-success' role='alert' style='margin: 1rem;'>
                El saldo de la cuenta corriente es " . number_format($cuentaCorriente->consultarSaldo(), 2) . "
            </div>";
        echo $html;
    } else {
        echo "Cuenta Aun no creada";
    }
}

if ($_POST['bloque'] == 'retirarcuentacorriente') {

    if (file_exists('../objetos/cuentacorriente.json')) {
        $cuentaJSON = file_get_contents('../objetos/cuentacorriente.json');

        // Deserializar el contenido del archivo JSON en un objeto PHP
        $cuentaCorrienteJSON = json_decode($cuentaJSON);

        $cuentaCorriente = new cuentaCorriente(
            $cuentaCorrienteJSON->numeroCuenta,
            $cuentaCorrienteJSON->nombreCliente,
            $cuentaCorrienteJSON->saldo
        );

        $cuentaCorriente->retirar(intval($_POST['monto']));
        // Serializar el objeto PHP de vuelta a JSON

        $cuentaCorrienteJSON = array(
            "numeroCuenta" => intval($cuentaCorriente->getNumeroCuenta()),
            "nombreCliente" => $cuentaCorriente->getNombreCliente(),
            "saldo" => floatval($cuentaCorriente->getSaldo())
        );

        $cuentaJSON = json_encode($cuentaCorrienteJSON);

        file_put_contents('../objetos/cuentacorriente.json', $cuentaJSON);
        $html = $html = "<div class='alert alert-danger' role='alert' style='margin: 1rem;'>
                        El saldo de la cuenta corriente es " . number_format($cuentaCorriente->consultarSaldo(), 2) . "
                    </div>";
        echo $html;
    } else {
        echo "Cuenta Aun no creada";
    }
}


if ($_POST['bloque'] == 'consultarcuentacorriente') {

    if (file_exists('../objetos/cuentacorriente.json')) {

        $cuentaJSON = file_get_contents('../objetos/cuentacorriente.json');

        // Deserializar el contenido del archivo JSON en un objeto PHP
        $cuentaCorrienteJSON = json_decode($cuentaJSON);

        $cuentaCorriente = new cuentaCorriente(
            $cuentaCorrienteJSON->numeroCuenta,
            $cuentaCorrienteJSON->nombreCliente,
            $cuentaCorrienteJSON->saldo
        );

        $html = "<div class='alert alert-primary' role='alert' style='margin: 1rem;'>
                El saldo de la cuenta corriente es " . number_format($cuentaCorriente->consultarSaldo(), 2) . "
    </div>";

        echo $html;
    } else {
        echo "Cuenta Aun no creada";
    }
}

// Cuentas de Ahorro

if ($_POST['bloque'] == 'crearcuentaAhorros') {

    $html = "";
    $cuentaAhorro = new CuentaAhorros($_POST['numerocuenta'], $_POST['nombre'], $_POST['saldo'], $_POST['porcentajeInteres']);

    // Crea un diccionario (Persistencia - Base de Datos)

    $cuentaArray = array(
        "numeroCuenta" => intval($cuentaAhorro->getNumeroCuenta()),
        "nombreCliente" => $cuentaAhorro->getNombreCliente(),
        "saldo" => floatval($cuentaAhorro->getSaldo()),
        "porcentajeInteres" => floatval($cuentaAhorro->getPorcentajeInteres())
    );

    $cuentaJSON = json_encode($cuentaArray);
    file_put_contents('../objetos/cuentaAhorro.json', $cuentaJSON);

    //muestra de contenido en Frontend

    $html .= "<div class='alert alert-success' role='alert' style='margin: 2rem;'>
                <h5>Numero de Cuenta: [{$cuentaAhorro->getNumeroCuenta()}]</h5> 
                <h5>Nombre: [{$cuentaAhorro->getNombreCliente()}]</h5>
                <h5>Saldo: [{$cuentaAhorro->getsaldo()}]</h5>
                <h5>Porcentaje de Interes: [" . number_format($cuentaAhorro->getporcentajeInteres(), 2) . "%]</h5>
            </div>";
    echo $html;
}

if ($_POST['bloque'] == 'depositarcuentaAhorros') {

    if (file_exists('../objetos/cuentaAhorro.json')) {
        // Leer el contenido del archivo JSON
        $cuentaJSON = file_get_contents('../objetos/cuentaAhorro.json');

        // Deserializar el contenido del archivo JSON en un objeto PHP
        $cuentaAhorroJSON = json_decode($cuentaJSON);

        $cuentaAhorro = new CuentaAhorros(
            $cuentaAhorroJSON->numeroCuenta,
            $cuentaAhorroJSON->nombreCliente,
            $cuentaAhorroJSON->saldo,
            $cuentaAhorroJSON->porcentajeInteres
        );

        $cuentaAhorro->depositar(intval($_POST['monto']));

        // Serializar el objeto PHP de vuelta a JSON

        $cuentaAhorroJSON = array(
            "numeroCuenta" => intval($cuentaAhorro->getNumeroCuenta()),
            "nombreCliente" => $cuentaAhorro->getNombreCliente(),
            "saldo" => floatval($cuentaAhorro->getSaldo()),
            "porcentajeInteres" => floatval($cuentaAhorro->getPorcentajeInteres())
        );

        $cuentaJSON = json_encode($cuentaAhorroJSON);

        file_put_contents('../objetos/cuentaAhorro.json', $cuentaJSON);
        $html = "<div class='alert alert-success' role='alert' style='margin: 1rem;'>
                El saldo de la cuenta corriente es " . number_format($cuentaAhorro->consultarSaldo(), 2) . "
            </div>";
        echo $html;
    } else {
        echo "Cuenta Aun no creada";
    }
}

if ($_POST['bloque'] == 'retirarcuentaAhorros') {

    if (file_exists('../objetos/cuentaAhorro.json')) {
        // Leer el contenido del archivo JSON
        $cuentaJSON = file_get_contents('../objetos/cuentaAhorro.json');

        // Deserializar el contenido del archivo JSON en un objeto PHP
        $cuentaAhorroJSON = json_decode($cuentaJSON);

        $cuentaAhorro = new CuentaAhorros(
            $cuentaAhorroJSON->numeroCuenta,
            $cuentaAhorroJSON->nombreCliente,
            $cuentaAhorroJSON->saldo,
            $cuentaAhorroJSON->porcentajeInteres
        );

        $cuentaAhorro->retirar(intval($_POST['monto']));

        // Serializar el objeto PHP de vuelta a JSON

        $cuentaAhorroJSON = array(
            "numeroCuenta" => intval($cuentaAhorro->getNumeroCuenta()),
            "nombreCliente" => $cuentaAhorro->getNombreCliente(),
            "saldo" => floatval($cuentaAhorro->getSaldo()),
            "porcentajeInteres" => floatval($cuentaAhorro->getPorcentajeInteres())
        );

        $cuentaJSON = json_encode($cuentaAhorroJSON);

        file_put_contents('../objetos/cuentaAhorro.json', $cuentaJSON);
        $html = "<div class='alert alert-danger' role='alert' style='margin: 1rem;'>
                El saldo de la cuenta corriente es " . number_format($cuentaAhorro->consultarSaldo(), 2) . "
            </div>";
        echo $html;
    } else {
        echo "Cuenta Aun no creada";
    }
}

if ($_POST['bloque'] == 'consultarcuentaAhorros') {

    if (file_exists('../objetos/cuentaAhorro.json')) {
        $cuentaJSON = file_get_contents('../objetos/cuentaAhorro.json');

        // Deserializar el contenido del archivo JSON en un objeto PHP
        $cuentaAhorroJSON = json_decode($cuentaJSON);

        $cuentaAhorro = new CuentaAhorros(
            $cuentaAhorroJSON->numeroCuenta,
            $cuentaAhorroJSON->nombreCliente,
            $cuentaAhorroJSON->saldo,
            $cuentaAhorroJSON->porcentajeInteres
        );

        $html = "<div class='alert alert-primary' role='alert' style='margin: 1rem;'>
                El saldo de la cuenta corriente es " . number_format($cuentaAhorro->consultarSaldo(), 2) . "
        </div>";

        echo $html;
    } else {
        echo "Cuenta Aun no creada";
    }
}

if ($_POST['bloque'] == 'depositarIntereses') {
    if (file_exists('../objetos/cuentaAhorro.json')) {

        $cuentaJSON = file_get_contents('../objetos/cuentaAhorro.json');

        // Deserializar el contenido del archivo JSON en un objeto PHP
        $cuentaAhorroJSON = json_decode($cuentaJSON);

        $cuentaAhorro = new CuentaAhorros(
            $cuentaAhorroJSON->numeroCuenta,
            $cuentaAhorroJSON->nombreCliente,
            $cuentaAhorroJSON->saldo,
            $cuentaAhorroJSON->porcentajeInteres
        );

        $cuentaAhorro->depositarIntereses();

        // Serializar el objeto PHP de vuelta a JSON

        $cuentaAhorroJSON = array(
            "numeroCuenta" => intval($cuentaAhorro->getNumeroCuenta()),
            "nombreCliente" => $cuentaAhorro->getNombreCliente(),
            "saldo" => floatval($cuentaAhorro->getSaldo()),
            "porcentajeInteres" => floatval($cuentaAhorro->getPorcentajeInteres())
        );

        $cuentaJSON = json_encode($cuentaAhorroJSON);

        file_put_contents('../objetos/cuentaAhorro.json', $cuentaJSON);

        $html = "<div class='alert alert-primary' role='alert' style='margin: 1rem;'>
                El saldo de la cuenta corriente es " . number_format($cuentaAhorro->consultarSaldo(), 2) . "
        </div>";

        echo $html;
    } else {
        echo "Cuenta Aun no creada";
    }
}
