<!-- Modal Crear Alumno -->
<div class="modal fade" id="createAlumnoModal" tabindex="-1" aria-labelledby="createAlumnoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createAlumnoModalLabel">Crear Alumno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createAlumnoForm">
                    <div class="mb-3">
                        <label for="createAlumnoName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="createAlumnoName" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="createAlumnoEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="createAlumnoEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="createAlumnoAge" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="createAlumnoAge" name="edad" min="10" max="100">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalCreateAlumnoWarning">Ha ocurrido un error. El alumno no ha sido creado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalCreateAlumnoButton">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ver Alumno -->
<div class="modal fade" id="viewAlumnoModal" tabindex="-1" aria-labelledby="viewAlumnoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewAlumnoModalLabel">Ver Alumno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="viewAlumnoForm">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control" id="viewAlumnoId" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="viewAlumnoName" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="viewAlumnoEmail" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad</label>
                        <input type="number" class="form-control" id="viewAlumnoAge" readonly disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear Práctica -->
<div class="modal fade" id="createPracticaModal" tabindex="-1" aria-labelledby="createPracticaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createPracticaModalLabel">Crear Práctica</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createPracticaForm">
                    <div class="mb-3">
                        <label for="createPracticaName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="createPracticaName" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="createPracticaDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="createPracticaDescription" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="createPracticaStartDate" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="createPracticaStartDate" name="fecha_inicio">
                    </div>
                    <div class="mb-3">
                        <label for="createPracticaEndDate" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="createPracticaEndDate" name="fecha_fin">
                    </div>
                    <div class="mb-3">
                        <label for="createPracticaAlumno" class="form-label">Alumno</label>
                        <select class="form-control" id="createPracticaAlumno" name="id_alumno">
                        </select>
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalCreatePracticaWarning">Ha ocurrido un error. La práctica no ha sido creada.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalCreatePracticaButton">Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ver Práctica -->
<div class="modal fade" id="viewPracticaModal" tabindex="-1" aria-labelledby="viewPracticaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewPracticaModalLabel">Ver Práctica</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="viewPracticaForm">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control" id="viewPracticaId" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="viewPracticaName" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" id="viewPracticaDescription" readonly disabled></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="viewPracticaStartDate" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="viewPracticaEndDate" readonly disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alumno</label>
                        <input type="text" class="form-control" id="viewPracticaAlumno" readonly disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Alumno -->
<div class="modal fade" id="editAlumnoModal" tabindex="-1" aria-labelledby="editAlumnoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editAlumnoModalLabel">Editar Alumno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAlumnoForm">
                    <div class="mb-3">
                        <label for="editAlumnoName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editAlumnoName" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="editAlumnoEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editAlumnoEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="editAlumnoAge" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="editAlumnoAge" name="edad" min="10" max="100">
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalEditAlumnoWarning">Ha ocurrido un error. El alumno no ha sido actualizado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalEditAlumnoButton">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Práctica -->
<div class="modal fade" id="editPracticaModal" tabindex="-1" aria-labelledby="editPracticaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editPracticaModalLabel">Editar Práctica</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPracticaForm">
                    <div class="mb-3">
                        <label for="editPracticaName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editPracticaName" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="editPracticaDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="editPracticaDescription" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editPracticaStartDate" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="editPracticaStartDate" name="fecha_inicio">
                    </div>
                    <div class="mb-3">
                        <label for="editPracticaEndDate" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="editPracticaEndDate" name="fecha_fin">
                    </div>
                    <div class="mb-3">
                        <label for="editPracticaAlumno" class="form-label">Alumno</label>
                        <select class="form-control" id="editPracticaAlumno" name="id_alumno">
                        </select>
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalEditPracticaWarning">Ha ocurrido un error. La práctica no ha sido actualizada.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modalEditPracticaButton">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar Alumno -->
<div class="modal fade" id="deleteAlumnoModal" tabindex="-1" aria-labelledby="deleteAlumnoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteAlumnoModalLabel">Eliminar Alumno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteAlumnoForm">
                    <div class="mb-3">
                        <p>¿Está seguro de que desea eliminar al alumno?</p>
                        <div class="alert alert-warning">
                            <strong>Advertencia:</strong> Esta acción también eliminará todas las prácticas asociadas a este alumno.
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" id="deleteAlumnoId" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="deleteAlumnoName" readonly disabled>
                        </div>
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalDeleteAlumnoWarning">Ha ocurrido un error. El alumno no ha sido eliminado.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="modalDeleteAlumnoButton">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar Práctica -->
<div class="modal fade" id="deletePracticaModal" tabindex="-1" aria-labelledby="deletePracticaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deletePracticaModalLabel">Eliminar Práctica</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deletePracticaForm">
                    <div class="mb-3">
                        <p>¿Está seguro de que desea eliminar esta práctica?</p>
                        <div class="mb-3">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control" id="deletePracticaId" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="deletePracticaName" readonly disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" id="deletePracticaDescription" readonly disabled></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert" id="modalDeletePracticaWarning">Ha ocurrido un error. La práctica no ha sido eliminada.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="modalDeletePracticaButton">Eliminar</button>
            </div>
        </div>
    </div>
</div>