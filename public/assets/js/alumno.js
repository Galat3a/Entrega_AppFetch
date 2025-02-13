// Función para cargar alumnos
function loadAlumnos(page = 1) {
    fetch(`${url_base}/api/alumnos?page=${page}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        const tbody = document.getElementById('alumnosTableBody');
        tbody.innerHTML = '';
        data.data.forEach(alumno => {
            tbody.innerHTML += `
                <tr>
                    <td>${alumno.id}</td>
                    <td>${alumno.nombre}</td>
                    <td>${alumno.email}</td>
                    <td>${alumno.edad}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="viewAlumno(${alumno.id})" data-bs-toggle="modal" data-bs-target="#viewAlumnoModal">Ver</button>
                        <button class="btn btn-sm btn-warning" onclick="editAlumno(${alumno.id})" data-bs-toggle="modal" data-bs-target="#editAlumnoModal">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteAlumno(${alumno.id})" data-bs-toggle="modal" data-bs-target="#deleteAlumnoModal">Eliminar</button>
                    </td>
                </tr>
            `;
        });
        createPagination(data, 'alumnosPagination', loadAlumnos);
    })
    .catch(error => console.error('Error:', error));
}

// Función para cargar alumnos y prácticas
function loadAlumnosPracticas(page = 1) {
    fetch(`${url_base}/api/alumnos-practicas?page=${page}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        const tbody = document.getElementById('alumnosPracticasTableBody');
        tbody.innerHTML = '';
        data.data.forEach(item => {
            tbody.innerHTML += `
                <tr>
                    <td>${item.alumno_id}</td>
                    <td>${item.alumno_nombre}</td>
                    <td>${item.alumno_email}</td>
                    <td>${item.alumno_edad}</td>
                    <td>${item.practica_id}</td>
                    <td>${item.practica_nombre}</td>
                    <td>${item.practica_descripcion}</td>
                    <td>${item.practica_fecha_inicio}</td>
                    <td>${item.practica_fecha_fin}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="viewAlumno(${item.alumno_id})" data-bs-toggle="modal" data-bs-target="#viewAlumnoModal">Ver</button>
                        <button class="btn btn-sm btn-warning" onclick="editAlumno(${item.alumno_id})" data-bs-toggle="modal" data-bs-target="#editAlumnoModal">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteAlumno(${item.alumno_id})" data-bs-toggle="modal" data-bs-target="#deleteAlumnoModal">Eliminar</button>
                    </td>
                </tr>
            `;
        });
        createPagination(data, 'alumnosPracticasPagination', loadAlumnosPracticas);
    })
    .catch(error => console.error('Error:', error));
}

// Función para ver un alumno
function viewAlumno(id) {
    fetch(`${url_base}/api/alumnos/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('viewAlumnoId').value = data.id;
        document.getElementById('viewAlumnoName').value = data.nombre;
        document.getElementById('viewAlumnoEmail').value = data.email;
        document.getElementById('viewAlumnoAge').value = data.edad;
    })
    .catch(error => console.error('Error:', error));
}

// Función para editar un alumno
function editAlumno(id) {
    // Ocultar mensaje de error al abrir el modal
    document.getElementById('modalEditAlumnoWarning').style.display = 'none';
    
    fetch(`${url_base}/api/alumnos/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('editAlumnoName').value = data.nombre;
        document.getElementById('editAlumnoEmail').value = data.email;
        document.getElementById('editAlumnoAge').value = data.edad;
        document.getElementById('modalEditAlumnoButton').onclick = function() {
            updateAlumno(id);
        };
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalEditAlumnoWarning').style.display = 'block';
    });
}

// Función para actualizar un alumno
function updateAlumno(id) {
    const formData = new FormData(document.getElementById('editAlumnoForm'));
    const data = Object.fromEntries(formData.entries());

    fetch(`${url_base}/api/alumnos/${id}`, {
        method: 'PUT',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrf_token
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Ocultar mensaje de error y cerrar modal si la actualización fue exitosa
            document.getElementById('modalEditAlumnoWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('editAlumnoModal'));
            modal.hide();
            loadAlumnos();
        } else {
            document.getElementById('modalEditAlumnoWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalEditAlumnoWarning').style.display = 'block';
    });
}

// Función para eliminar un alumno
function deleteAlumno(id) {
    // Ocultar mensaje de error al abrir el modal
    document.getElementById('modalDeleteAlumnoWarning').style.display = 'none';
    
    fetch(`${url_base}/api/alumnos/${id}`, {
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('deleteAlumnoId').value = data.id;
        document.getElementById('deleteAlumnoName').value = data.nombre;
        document.getElementById('modalDeleteAlumnoButton').onclick = function() {
            confirmDeleteAlumno(id);
        };
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalDeleteAlumnoWarning').style.display = 'block';
    });
}

// Función para confirmar la eliminación de un alumno
function confirmDeleteAlumno(id) {
    fetch(`${url_base}/api/alumnos/${id}`, {
        method: 'DELETE',
        headers: headers
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Ocultar mensaje de error y cerrar modal si la eliminación fue exitosa
            document.getElementById('modalDeleteAlumnoWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('deleteAlumnoModal'));
            modal.hide();
            loadAlumnos();
        } else {
            document.getElementById('modalDeleteAlumnoWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalDeleteAlumnoWarning').style.display = 'block';
    });
}

// Función para configurar el botón de crear alumno
document.getElementById('modalCreateAlumnoButton').addEventListener('click', createAlumno);

// Función para crear un alumno
function createAlumno() {
    // Ocultar mensaje de error al intentar crear
    document.getElementById('modalCreateAlumnoWarning').style.display = 'none';
    
    const formData = new FormData(document.getElementById('createAlumnoForm'));
    const data = Object.fromEntries(formData.entries());

    fetch(`${url_base}/api/alumnos`, {
        method: 'POST',
        headers: headers,
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            // Limpiar el formulario
            document.getElementById('createAlumnoForm').reset();
            
            // Ocultar mensaje de error y cerrar modal si la creación fue exitosa
            document.getElementById('modalCreateAlumnoWarning').style.display = 'none';
            const modal = bootstrap.Modal.getInstance(document.getElementById('createAlumnoModal'));
            modal.hide();
            
            // Recargar la lista de alumnos
            loadAlumnos();
        } else {
            document.getElementById('modalCreateAlumnoWarning').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modalCreateAlumnoWarning').style.display = 'block';
    });
}