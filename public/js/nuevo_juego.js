document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('data-form').addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Asegurar de llenar datos 
            alert("Por favor, complete todos los campos y acepte el tratamiento de datos personales.");
        }
    });

    function validateForm() {
        var name = document.getElementById('name').value.trim();
        var email = document.getElementById('email').value.trim();
        var city = document.getElementById('city').value.trim();
        var phone = document.getElementById('phone').value.trim();
        var company = document.getElementById('company').value.trim();
        var nit = document.getElementById('nit').value.trim();
        var products = document.getElementById('products').value;
        var acceptData = document.getElementById('accept-data').checked;

        // Verificar si hay '' vacios
        if (name === "" || email === "" || city === "" || phone === "" || company === "" || nit === "" || products === "" || !acceptData) {
            alert("Por favor, complete todos los campos y acepte el tratamiento de datos personales.");
            return false;
        } else {
            return true;
        }
    }
});
