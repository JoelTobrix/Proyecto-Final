document.addEventListener("DOMContentLoaded", function() {
    const tbody = document.getElementById('consultas-body');
    const modal = document.getElementById('modal-consulta');
    const closeModal = document.querySelector('.close-btn');
    const btnCerrar = document.getElementById('btn-cerrar-consulta');
    let consultaActual = null;

    function cargarConsultas() {
        fetch('/consultas')
            .then(res => res.json())
            .then(data => {
                tbody.innerHTML = '';
                data.forEach(c => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${c.nombre}</td>
                        <td>${c.email}</td>
                        <td>${c.telefono}</td>
                        <td>${c.propiedad ? c.propiedad.titulo : 'Sin propiedad'}</td>
                        <td>${c.mensaje}</td>
                        <td>${c.estado}</td>
                        <td>${c.agente ? c.agente.nombre + ' ' + c.agente.apellido : 'Sin asignar'}</td>
                        <td><button class="btn btn-ver" onclick="verConsulta(${c.id})">Ver</button></td>
                    `;
                    tbody.appendChild(row);
                });
            });
    }
    // Función para crear nueva consulta
function crearConsulta() {
    const nombre = document.getElementById('nuevo-nombre').value;
    const email = document.getElementById('nuevo-email').value;
    const telefono = document.getElementById('nuevo-telefono').value;
    const propiedad_id = document.getElementById('nuevo-propiedad').value;
    const mensaje = document.getElementById('nuevo-mensaje').value;

    fetch('/consultas', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ nombre, email, telefono, propiedad_id, mensaje })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('Consulta creada correctamente');
            cargarConsultas(); // refresca la tabla
            // limpiar campos
            document.getElementById('nuevo-nombre').value = '';
            document.getElementById('nuevo-email').value = '';
            document.getElementById('nuevo-telefono').value = '';
            document.getElementById('nuevo-propiedad').value = '';
            document.getElementById('nuevo-mensaje').value = '';
        }
    });
}


    window.verConsulta = function(id) {
        fetch(`/consulta/${id}`)
            .then(res => res.json())
            .then(c => {
                consultaActual = c;
                modal.style.display = 'block';
                document.getElementById('modal-consulta-id').innerText = c.id;
                document.getElementById('modal-nombre').innerText = c.nombre;
                document.getElementById('modal-correo').innerText = c.email;
                document.getElementById('modal-telefono').innerText = c.telefono;
                document.getElementById('modal-propiedad').innerText = c.propiedad ? c.propiedad.titulo : 'Sin propiedad';
                document.getElementById('modal-mensaje').innerText = c.mensaje;

                const respuestasDiv = document.getElementById('modal-respuestas');
                respuestasDiv.innerHTML = '';
                c.respuestas.forEach(r => {
                    const p = document.createElement('p');
                    p.innerHTML = `<strong>${r.usuario.nombre}:</strong> ${r.mensaje}`;
                    respuestasDiv.appendChild(p);
                });
            });
    }

    document.getElementById('btn-enviar-respuesta').addEventListener('click', function() {
        const mensaje = document.getElementById('modal-respuesta-texto').value;
        if (!mensaje) return alert('Escribe un mensaje');

        fetch(`/consulta/${consultaActual.id}/responder`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ mensaje })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('Respuesta enviada');
                cargarConsultas();
                modal.style.display = 'none';
                document.getElementById('modal-respuesta-texto').value = '';
            }
        });
    });

    closeModal.onclick = () => modal.style.display = 'none';
    btnCerrar.onclick = () => modal.style.display = 'none';
    document.getElementById('btn-refrescar').addEventListener('click', cargarConsultas);

    cargarConsultas();
});
