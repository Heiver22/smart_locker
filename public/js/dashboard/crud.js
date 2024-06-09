document.addEventListener('DOMContentLoaded', function() {
    // Función para cargar los formularios dinámicamente
    window.loadForm = function(entity, action) {
        const formContainer = document.getElementById('formContainer');
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `views/${entity}/${action}.php`, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                formContainer.innerHTML = xhr.responseText;
                attachFormHandlers(entity, action);
            }
        };
        xhr.send();
    };

    function attachFormHandlers(entity, action) {
        if (entity === 'agente_de_seguridad') {
            handleAgenteDeSeguridadForms(action);
        } else if (entity === 'propietarios') {
            handlePropietariosForms(action);
        } else if (entity === 'residentes') {
            handleResidentesForms(action);
        } else if (entity === 'tipo_paquete') {
            handleTipoPaqueteForms(action);
        } else if (entity === 'visitantes') {
            handleVisitantesForms(action);
        }
    }

    function handleAgenteDeSeguridadForms(action) {
        if (action === 'create') {
            const createForm = document.getElementById('createForm');
            if (createForm) {
                createForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(createForm);
                    const data = {
                        nombres: formData.get('nombres'),
                        apellidos: formData.get('apellidos'),
                        cedula: formData.get('cedula'),
                        contrasena: formData.get('contrasena')
                    };
                    
                    fetch('ajax/agente_de_seguridad/create.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('agente_de_seguridad', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        } else if (action === 'read') {
            const agentesList = document.getElementById('agentesList');
            if (agentesList) {
                fetch('ajax/agente_de_seguridad/read.php')
                    .then(response => response.json())
                    .then(agentes => {
                        agentesList.innerHTML = '';
                        agentes.forEach(agente => {
                            const div = document.createElement('div');
                            div.innerHTML = `${agente.nombres} ${agente.apellidos} - Cédula: ${agente.cedula}`;
                            agentesList.appendChild(div);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        } else if (action === 'update') {
            const updateForm = document.getElementById('updateForm');
            if (updateForm) {
                updateForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(updateForm);
                    const data = {
                        id: formData.get('id'),
                        nombres: formData.get('nombres'),
                        apellidos: formData.get('apellidos'),
                        cedula: formData.get('cedula'),
                        contrasena: formData.get('contrasena')
                    };

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
                        loadForm('agente_de_seguridad', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        } else if (action === 'delete') {
            const deleteForm = document.getElementById('deleteForm');
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(deleteForm);
                    const data = {
                        id: formData.get('id')
                    };

                    fetch('ajax/agente_de_seguridad/delete.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('agente_de_seguridad', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        }
    }

    function handlePropietariosForms(action) {
        if (action === 'create') {
            const createForm = document.getElementById('createForm');
            if (createForm) {
                createForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(createForm);
                    const data = {
                        nombres: formData.get('nombres'),
                        apellidos: formData.get('apellidos'),
                        telefono: formData.get('telefono'),
                        cedula: formData.get('cedula'),
                        contrasena: formData.get('contrasena')
                    };
                    
                    fetch('ajax/propietarios/create.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('propietarios', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        } else if (action === 'read') {
            const propietariosList = document.getElementById('propietariosList');
            if (propietariosList) {
                fetch('ajax/propietarios/read.php')
                    .then(response => response.json())
                    .then(propietarios => {
                        propietariosList.innerHTML = '';
                        propietarios.forEach(propietario => {
                            const div = document.createElement('div');
                            div.innerHTML = `${propietario.nombres} ${propietario.apellidos} - Teléfono: ${propietario.telefono} - Cédula: ${propietario.cedula}`;
                            propietariosList.appendChild(div);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        } else if (action === 'update') {
            const updateForm = document.getElementById('updateForm');
            if (updateForm) {
                updateForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(updateForm);
                    const data = {
                        id: formData.get('id'),
                        nombres: formData.get('nombres'),
                        apellidos: formData.get('apellidos'),
                        telefono: formData.get('telefono'),
                        cedula: formData.get('cedula'),
                        contrasena: formData.get('contrasena')
                    };

                    fetch('ajax/propietarios/update.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('propietarios', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        } else if (action === 'delete') {
            const deleteForm = document.getElementById('deleteForm');
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(deleteForm);
                    const data = {
                        id: formData.get('id')
                    };

                    fetch('ajax/propietarios/delete.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('propietarios', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        }
    }

    function handleResidentesForms(action) {
        if (action === 'create') {
            const createForm = document.getElementById('createForm');
            if (createForm) {
                createForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(createForm);
                    const data = {
                        nombres: formData.get('nombres'),
                        apellidos: formData.get('apellidos'),
                        telefono: formData.get('telefono'),
                        cedula: formData.get('cedula'),
                        contrasena: formData.get('contrasena')
                    };
                    
                    fetch('ajax/residentes/create.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('residentes', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        } else if (action === 'read') {
            const residentesList = document.getElementById('residentesList');
            if (residentesList) {
                fetch('ajax/residentes/read.php')
                    .then(response => response.json())
                    .then(residentes => {
                        residentesList.innerHTML = '';
                        residentes.forEach(residente => {
                            const div = document.createElement('div');
                            div.innerHTML = `${residente.nombres} ${residente.apellidos} - Teléfono: ${residente.telefono} - Cédula: ${residente.cedula}`;
                            residentesList.appendChild(div);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        } else if (action === 'update') {
            const updateForm = document.getElementById('updateForm');
            if (updateForm) {
                updateForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(updateForm);
                    const data = {
                        id: formData.get('id'),
                        nombres: formData.get('nombres'),
                        apellidos: formData.get('apellidos'),
                        telefono: formData.get('telefono'),
                        cedula: formData.get('cedula'),
                        contrasena: formData.get('contrasena')
                    };

                    fetch('ajax/residentes/update.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('residentes', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        } else if (action === 'delete') {
            const deleteForm = document.getElementById('deleteForm');
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(deleteForm);
                    const data = {
                        id: formData.get('id')
                    };

                    fetch('ajax/residentes/delete.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('residentes', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        }
    }

    function handleTipoPaqueteForms(action) {
        if (action === 'create') {
            const createForm = document.getElementById('createForm');
            if (createForm) {
                createForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(createForm);
                    const data = {
                        tipo: formData.get('tipo')
                    };

                    fetch('ajax/tipo_paquete/create.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('tipo_paquete', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        } else if (action === 'read') {
            const tipoPaqueteList = document.getElementById('tipoPaqueteList');
            if (tipoPaqueteList) {
                fetch('ajax/tipo_paquete/read.php')
                    .then(response => response.json())
                    .then(tipos => {
                        tipoPaqueteList.innerHTML = '';
                        tipos.forEach(tipo => {
                            const div = document.createElement('div');
                            div.innerHTML = `ID: ${tipo.id} - Tipo: ${tipo.tipo}`;
                            tipoPaqueteList.appendChild(div);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        } else if (action === 'update') {
            const updateForm = document.getElementById('updateForm');
            if (updateForm) {
                updateForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(updateForm);
                    const data = {
                        id: formData.get('id'),
                        tipo: formData.get('tipo')
                    };

                    fetch('ajax/tipo_paquete/update.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('tipo_paquete', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        } else if (action === 'delete') {
            const deleteForm = document.getElementById('deleteForm');
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(deleteForm);
                    const data = {
                        id: formData.get('id')
                    };

                    fetch('ajax/tipo_paquete/delete.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('tipo_paquete', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        }
    }

    function handleVisitantesForms(action) {
        if (action === 'create') {
            const createForm = document.getElementById('createForm');
            if (createForm) {
                createForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(createForm);
                    const data = {
                        nombre: formData.get('nombre'),
                        apellidos: formData.get('apellidos'),
                        cedula: formData.get('cedula'),
                        contrasena: formData.get('contrasena')
                    };

                    fetch('ajax/visitantes/create.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('visitantes', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        } else if (action === 'read') {
            const visitantesList = document.getElementById('visitantesList');
            if (visitantesList) {
                fetch('ajax/visitantes/read.php')
                    .then(response => response.json())
                    .then(visitantes => {
                        visitantesList.innerHTML = '';
                        visitantes.forEach(visitante => {
                            const div = document.createElement('div');
                            div.innerHTML = `${visitante.nombre} ${visitante.apellidos} - Cédula: ${visitante.cedula}`;
                            visitantesList.appendChild(div);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        } else if (action === 'update') {
            const updateForm = document.getElementById('updateForm');
            if (updateForm) {
                updateForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(updateForm);
                    const data = {
                        id: formData.get('id'),
                        nombre: formData.get('nombre'),
                        apellidos: formData.get('apellidos'),
                        cedula: formData.get('cedula'),
                        contrasena: formData.get('contrasena')
                    };

                    fetch('ajax/visitantes/update.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('visitantes', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        } else if (action === 'delete') {
            const deleteForm = document.getElementById('deleteForm');
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(deleteForm);
                    const data = {
                        id: formData.get('id')
                    };

                    fetch('ajax/visitantes/delete.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        alert(result.message);
                        loadForm('visitantes', 'read');
                    })
                    .catch(error => console.error('Error:', error));
                });
            }
        }
    }
});
