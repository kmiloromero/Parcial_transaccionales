function creacionCuentaCorriente() {

    numerocuenta = document.getElementById('numerocuenta').value;
    nombre = document.getElementById('nombre').value;
    saldo = document.getElementById('saldo').value;
    let regexNumeroCuenta = /^[1-9][0-9]{0,9}$/;
    console.log(numerocuenta, nombre, saldo)

    if (numerocuenta == '' || nombre == '' || saldo == '') {
        alert('falta diligenciar algun dato');
    } else if (!regexNumeroCuenta.test(numerocuenta)) {
        alert('El número de cuenta debe contener sólo números, no empezar con 0, tener máximo 10 dígitos y no estar vacío.');
    } else if (saldo.trim() !== '' && !/^[0-9]+$/.test(saldo)) {
        alert('El saldo debe contener sólo números.');
    } else {
        $("#resp").load('models/codigo.php', {
            bloque: 'crearcuentacorriente',
            numerocuenta: numerocuenta,
            nombre: nombre,
            saldo: saldo,
        }, function (response, status, xhr) {
            if (response == 1) {
                //location.reload();
            }
        });
    }
}

function depositarcuentacorriente() {
    monto = document.getElementById('cantidadDeposito').value;
    console.log(depositar);
    $("#resp").load('models/codigo.php', {
        bloque: 'depositarcuentacorriente',
        monto: monto
    }, function (response, status, xhr) {
        if (response == 1) {
            //location.reload();
        }
    });
}

function retirarcuentacorriente() {
    monto = document.getElementById('cantidadRetiro').value;
    console.log(retirar);
    $("#resp").load('models/codigo.php', {
        bloque: 'retirarcuentacorriente',
        monto: monto
    }, function (response, status, xhr) {
        if (response == 1) {
            //location.reload();
        }
    });
}

function consultarcuentacorriente() {
    $("#resp").load('models/codigo.php', {
        bloque: 'consultarcuentacorriente',
    }, function (response, status, xhr) {
        if (response == 1) {
            //location.reload();
        }
    });
}

function creacionCuentaAhorros() {

    numerocuenta = document.getElementById('numerocuenta').value;
    nombre = document.getElementById('nombre').value;
    saldo = document.getElementById('saldo').value;
    porcentajeInteres = document.getElementById('porcentajeInteres').value;
    let regexNumeroCuenta = /^[1-9][0-9]{0,9}$/;
    let regexPorcentajeInteres = /^\d+(\.\d{1,2})?$/;

    console.log(numerocuenta, nombre, saldo, porcentajeInteres)

    if (numerocuenta == '' || nombre == '' || saldo == '' || porcentajeInteres == '') {
        alert('falta diligenciar algun dato');
    } else if (!regexNumeroCuenta.test(numerocuenta)) {
        alert('El número de cuenta debe contener sólo números, no empezar con 0, tener máximo 10 dígitos y no estar vacío.');
    } else if (saldo.trim() !== '' && !/^[0-9]+$/.test(saldo)) {
        alert('El saldo debe contener sólo números.');
    } else if (!regexPorcentajeInteres.test(porcentajeInteres)) {
        alert('El Porcentaje de Interes debe contener sólo números Enteros o Decimales.');
    } else {
        $("#resp").load('models/codigo.php', {
            bloque: 'crearcuentaAhorros',
            numerocuenta: numerocuenta,
            nombre: nombre,
            saldo: saldo,
            porcentajeInteres: porcentajeInteres
        }, function (response, status, xhr) {
            if (response == 1) {
                //location.reload();
            }
        });
    }
}

function depositarcuentaAhorros() {
    monto = document.getElementById('cantidadDeposito').value;
    console.log(depositar);
    if (monto == '') {
        alert('falta diligenciar el Monto de Deposito');
    } else {
        $("#resp").load('models/codigo.php', {
            bloque: 'depositarcuentaAhorros',
            monto: monto
        }, function (response, status, xhr) {
            if (response == 1) {
                //location.reload();
            }
        });
    }
}

function retirarcuentaAhorros() {
    monto = document.getElementById('cantidadRetiro').value;
    console.log(retirar);
    if (monto == '') {
        alert('falta diligenciar el Monto de Retiro');
    } else {
        $("#resp").load('models/codigo.php', {
            bloque: 'retirarcuentaAhorros',
            monto: monto
        }, function (response, status, xhr) {
            if (response == 1) {
                //location.reload();
            }
        });
    }
}

function consultarcuentaAhorros() {
    $("#resp").load('models/codigo.php', {
        bloque: 'consultarcuentaAhorros',
    }, function (response, status, xhr) {
        if (response == 1) {
            //location.reload();
        }
    });
}

function depositarIntereses() {
    fechadeposito = document.getElementById('fecha').value;
    let fecha = new Date(fechadeposito);
    console.log(fecha);
    console.log(fecha.getDate())
    if (fecha == '') {
        alert('Debe Seleccionar una Fecha');
    } else if (fecha.getDate() != 1) {
        alert('Solo se puede Depositar en Interes el Primer dia del Mes')
    } else {
        $("#resp").load('models/codigo.php', {
            bloque: 'depositarIntereses',
        }, function (response, status, xhr) {
            if (response == 1) {
                //location.reload();
            }
        });
    }
}