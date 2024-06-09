
document.getElementById('updateForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    const data = {
        id: formData.get('id'),
        nombres: formData.get('nombres'),
        apellidos: formData.get('apellidos'),
        cedula: formData.get('cedula'),
        contrasena: formData.get('contrasena')
    }
    fetch('ajax/agente_de_seguridad/update.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        alert(result.message);
        loadForm('read');
    })
    .catch(error => console.error('Error:', error));
});
