
document.addEventListener('DOMContentLoaded', function () {
    // Seleccionamos el formulario por su ID
    const form = document.querySelector('#form-checkout');
    if (!form) {
        console.error('Formulario no encontrado');
        return;
    }

    // Obtenemos referencias a los inputs del formulario
    const inputs = {
        nombre: form.querySelector('#nombre'),
        email: form.querySelector('#email'),
        direccion: form.querySelector('#direccion'),
        telefono: form.querySelector('#telefono')
    };

    // Función para validar formato de email usando expresión regular
    function validarEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Mostrar mensaje de error debajo del input y añadir clase de error
    function mostrarError(input, mensaje) {
        let errorDiv = input.nextElementSibling;
        if (!errorDiv || !errorDiv.classList.contains('text-danger')) {
            errorDiv = document.createElement('div');
            errorDiv.classList.add('text-danger', 'mt-1');
            input.parentNode.insertBefore(errorDiv, input.nextSibling);
        }
        errorDiv.textContent = mensaje;
        input.classList.add('is-invalid');
    }

    // Limpiar mensaje de error y clases de error del input
    function limpiarError(input) {
        let errorDiv = input.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('text-danger')) {
            errorDiv.remove();
        }
        input.classList.remove('is-invalid');
    }

    // Validar cada campo según su id y reglas específicas
    function validarCampo(input) {
        const valor = input.value.trim();
        limpiarError(input);

        switch (input.id) {
            case 'nombre':
                if (valor.length < 3) {
                    mostrarError(input, 'El nombre completo debe tener al menos 3 caracteres.');
                    return false;
                }
                break;
            case 'email':
                if (!validarEmail(valor)) {
                    mostrarError(input, 'Por favor, ingresa un correo electrónico válido.');
                    return false;
                }
                break;
            case 'direccion':
                if (valor.length < 5) {
                    mostrarError(input, 'La dirección debe tener al menos 5 caracteres.');
                    return false;
                }
                break;
            case 'telefono':
                if (valor.length < 7) {
                    mostrarError(input, 'El teléfono debe tener al menos 7 caracteres.');
                    return false;
                }
                break;
        }
        return true;
    }

    // Validar todos los campos al enviar el formulario
    form.addEventListener('submit', function (e) {
        let valido = true;
        for (const key in inputs) {
            if (!validarCampo(inputs[key])) {
                valido = false;
            }
        }
        if (!valido) {
            e.preventDefault(); // Evitar envío si hay errores
        }
    });

    // Validar cada campo al perder foco (blur)
    for (const key in inputs) {
        inputs[key].addEventListener('blur', function () {
            validarCampo(this);
        });
    }
});
