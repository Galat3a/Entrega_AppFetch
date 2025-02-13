// Función para cargar prácticas
function loadPracticas(page = 1) {
    fetch(`${url_base}/api/practicas?page=${page}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        const tbody = document.getElementById('practicasTableBody');
        tbody.innerHTML = '';
        data.data.forEach(practica => {
            tbody.innerHTML += `
                <tr>
                    <td>${practica.id}</td>
                    <td>${practica.nombre}</td>
                    <td>${practica.descripcion}</td>
                    <td>${practica.fecha_inicio}</td>
                    <td>${practica.fecha_fin}</td>
                    <td>${practica.alumno.nombre}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="viewPractica(${practica.id})" data-bs-toggle="modal" data-bs-target="#viewPracticaModal">Ver</button>
                        <button class="btn btn-sm btn-warning" onclick="editPractica(${practica.id})" data-bs-toggle="modal" data-bs-target="#editPracticaModal">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="deletePractica(${practica.id})" data-bs-toggle="modal" data-bs-target="#deletePracticaModal">Eliminar</button>
                    </td>
                </tr>
            `;
        });
        createPagination(data, 'practicasPagination', loadPracticas);
    })
    .catch(error => console.error('Error:', error));
}

// Función para ver una práctica
function viewPractica(id) {
    fetch(`${url_base}/api/practicas/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('viewPracticaId').value = data.id;
        document.getElementById('viewPracticaName').value = data.nombre;
        document.getElementById('viewPracticaDescription').value = data.descripcion;
        document.getElementById('viewPracticaStartDate').value = data.fecha_inicio;
        document.getElementById('viewPracticaEndDate').value = data.fecha_fin;
        document.getElementById('viewPracticaAlumno').value = data.alumno_id;
    })
    .catch(error => console.error('Error:', error));
}

// Función para editar una práctica
function editPractica(id) {
    // Ocultar mensaje de error al abrir el modal
    document.getElementById('modalEditPracticaWarning').style.display = 'none';
    
    fetch(`${url_base}/api/practicas/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('editPracticaName').value = data.nombre;
        document.getElementById('editPracticaDescription').value = data.descripcion;
        document.getElementById('editPracticaStartDate').value = data.fecha_inicio;
        document.getElementById('editPracticaEndDate').value = data.fecha_fin;
        document.getElementById('editPracticaAlumno').value = data.alumno_id;
        document.getElementById('modalEditPracticaButton').onclick = function() {
            updatePractica(id);
        };
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalEditPracticaWarning').style.display = 'block';
    });
}

// Función para actualizar una práctica
function updatePractica(id) {
    const formData = new FormData(document.getElementById('editPracticaForm'));
    const data = Object.fromEntries(formData.entries());

    // Asegúrate de que el campo alumno_id esté presente y tenga un valor válido
    if (!data.alumno_id) {
        document.getElementById('modalEditPracticaWarning').style.display = 'block';
        document.getElementById('modalEditPracticaWarning').innerText = 'Debe seleccionar un alumno';
        return;
    }

    fetch(`${url_base}/api/practicas/${id}`, {
        method: 'PUT',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrf_token
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(data => {
        if (data.message) {
            // Ocultar mensaje de error y cerrar modal si la actualización fue exitosa
            document.getElementById('modalEditPracticaWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('editPracticaModal'));
            modal.hide();
            loadPracticas();
        } else {
            document.getElementById('modalEditPracticaWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalEditPracticaWarning').style.display = 'block';
        document.getElementById('modalEditPracticaWarning').innerText = error.message || 'Error al actualizar la práctica';
    });
}

// Función para eliminar una práctica
function deletePractica(id) {
    // Ocultar mensaje de error al abrir el modal
    document.getElementById('modalDeletePracticaWarning').style.display = 'none';
    
    fetch(`${url_base}/api/practicas/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('deletePracticaId').value = data.id;
        document.getElementById('deletePracticaName').value = data.nombre;
        document.getElementById('deletePracticaDescription').value = data.descripcion;
        document.getElementById('modalDeletePracticaButton').onclick = function() {
            confirmDeletePractica(id);
        };
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalDeletePracticaWarning').style.display = 'block';
    });
}

// Función para confirmar la eliminación de una práctica
function confirmDeletePractica(id) {
    fetch(`${url_base}/api/practicas/${id}`, {
        method: 'DELETE',
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Ocultar mensaje de error y cerrar modal si la eliminación fue exitosa
            document.getElementById('modalDeletePracticaWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('deletePracticaModal'));
            modal.hide();
            loadPracticas();
        } else {
            document.getElementById('modalDeletePracticaWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalDeletePracticaWarning').style.display = 'block';
    });
}

// Función para cargar alumnos en el select
function loadAlumnosSelect() {
    fetch(`${url_base}/api/alumnos`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        const createSelect = document.getElementById('createPracticaAlumno');
        const editSelect = document.getElementById('editPracticaAlumno');
        
        // Limpiar opciones existentes
        createSelect.innerHTML = '<option value="">Seleccione un alumno</option>';
        editSelect.innerHTML = '<option value="">Seleccione un alumno</option>';
        
        // Agregar nuevas opciones
        data.data.forEach(alumno => {
            createSelect.innerHTML += `<option value="${alumno.id}">${alumno.nombre}</option>`;
            editSelect.innerHTML += `<option value="${alumno.id}">${alumno.nombre}</option>`;
        });
    })
    .catch(error => console.error('Error:', error));
}

// Función para configurar el botón de crear práctica
document.getElementById('modalCreatePracticaButton').addEventListener('click', createPractica);

// Función para crear una práctica
function createPractica() {
    // Ocultar mensaje de error al intentar crear
    document.getElementById('modalCreatePracticaWarning').style.display = 'none';
    
    const formData = new FormData(document.getElementById('createPracticaForm'));
    const data = Object.fromEntries(formData.entries());

    fetch(`${url_base}/api/practicas`, {
        method: 'POST',
        headers: headers,
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Limpiar el formulario
            document.getElementById('createPracticaForm').reset();
            
            // Ocultar mensaje de error y cerrar modal si la creación fue exitosa
            document.getElementById('modalCreatePracticaWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('createPracticaModal'));
            modal.hide();
            
            // Recargar la lista de prácticas
            loadPracticas();
        } else {
            document.getElementById('modalCreatePracticaWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalCreatePracticaWarning').style.display = 'block';
    });
}

// Cargar los alumnos en el select cuando se abre el modal de crear práctica
document.getElementById('createPracticaBtn').addEventListener('click', loadAlumnosSelect);