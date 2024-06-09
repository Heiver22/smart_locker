document.getElementById('updateForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    const data = {
        id: formData.get('id'),
        tipo: formData.get('tipo')
    };

    fetch('../../ajax/tipo_paquete/update.php', {
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