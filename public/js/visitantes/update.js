document.getElementById('updateForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    const data = {
        id: formData.get('id'),
        nombre: formData.get('nombre'),
        apellidos: formData.get('apellidos'),
        cedula: formData.get('cedula'),
        contrasena: formData.get('contrasena')
    };

    fetch('../../ajax/visitantes/update.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        alert(result.message);
        window.location.href = 'index.php';
    })
    .catch(error => console.error('Error:', error));
});