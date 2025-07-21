<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria MJB</title>
    <link rel="icon" href="logo.png" type="image/png">
    <link rel="stylesheet" href="{{asset('css/inmobiliaria.css')}}">         
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <div class="logo">
                <i class="fas fa-home"></i>
                <span>Inmobiliaria MJB Quito</span>
            </div>
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="header-right">
            <button class="header-btn">
                <i class="fas fa-globe"></i>
                Ver tienda
            </button>
            <button class="header-btn">
                <i class="fas fa-bell"></i>
            </button>
            <div class="dropdown">
                <button class="dropdown-btn">
                    Diseño
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
            <div class="user-profile">
                <div class="user-avatar">R</div>
                <div class="dropdown">
                    <button class="dropdown-btn" onclick="toggleDropdown()">
                        Real State
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <a href="#"><i class="fas fa-user"></i> Perfil</a>
                        <a href="{{route('login')}}"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="main-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <ul>
                    <li class="nav-item active" id="escritorio-nav">
                        <a href="#" class="nav-link" onclick="showSection('escritorio', this)">
                            <i class="fas fa-home"></i>
                            <span>Escritorio</span>
                        </a>
                    </li>
                    <li class="nav-item" id="paginas-nav">
                        <a href="#" class="nav-link" onclick="showSection('paginas', this)">
                            <i class="fas fa-file-alt"></i>
                            <span>Páginas</span>
                        </a>
                    </li>
                    <li class="nav-item" id="blog-nav">
                        <a href="#" class="nav-link" onclick="showSection('blog', this)">
                            <i class="fas fa-blog"></i>
                            <span>Blog</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item" id="realestate-nav">
                        <a href="#" class="nav-link" onclick="showSection('realestate', this)">
                            <i class="fas fa-building"></i>
                            <span>Real Estate</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item" id="consultas-nav">
                        <a href="#" class="nav-link" onclick="showSection('consultas',this)">
                            <i class="fas fa-comments"></i>
                            <span>Consultas</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i>
                            <span>Accounts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-box"></i>
                            <span>Packages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-envelope"></i>
                            <span>Contacto</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-credit-card"></i>
                            <span>Pagos</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Locations</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-images"></i>
                            <span>Medios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-paint-brush"></i>
                            <span>Apariencia</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-tools"></i>
                            <span>Avanzado</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- SECCIÓN ESCRITORIO (Por defecto) -->
            <div id="escritorio-section" class="content-section active">
                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <i class="fas fa-home"></i>
                    <span>Escritorio</span>
                </div>
                                
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card purple">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Active properties</div>
                    </div>
                    <div class="stat-card cyan">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Pending properties</div>
                    </div>
                    <div class="stat-card red">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Expired properties</div>
                    </div>
                    <div class="stat-card blue">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Agents</div>
                    </div>
                </div>
                                
                <!-- Recent Publications Table -->
                <div class="table-section">
                    <div class="table-header">
                        <h3>
                            <i class="fas fa-edit"></i>
                            Publicaciones recientes
                        </h3>
                        <div class="table-actions">
                            <button class="action-btn">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button class="action-btn">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="action-btn">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>FECHA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#" class="table-link">BCG sets great store by real estate negotiations</a></td>
                                    <td>2023-11-19</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="#" class="table-link">Private Home Sales Drop 27% In October</a></td>
                                    <td>2023-11-19</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#" class="table-link">Singapore Overtakes Hong Kong In Terms Of Property Investment Prospects</a></td>
                                    <td>2023-11-19</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="#" class="table-link">S. Korea's Big Investors Flocking to Overseas Real Estate</a></td>
                                    <td>2023-11-19</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><a href="#" class="table-link">The Top 2020 Handbag Trends to Know</a></td>
                                    <td>2023-11-19</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><a href="#" class="table-link">Top Search Engine Optimization Strategies!</a></td>
                                    <td>2023-11-19</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- SECCIÓN PÁGINAS -->
            <div id="paginas-section" class="content-section">
                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <i class="fas fa-home"></i>
                    <span>Escritorio</span>
                    <i class="fas fa-chevron-right"></i>
                    <span>Páginas</span>
                </div>

                <div class="section-header">
                    <h1>
                        <i class="fas fa-file-alt"></i>
                        Gestión de Páginas
                    </h1>
                    <p>Administra todas las páginas de tu sitio web inmobiliario</p>
                </div>

                <!-- Grid de páginas -->
                <div class="pages-grid">
                    <!-- Búsqueda de Propiedades -->
                    <div class="page-card">
                        <div class="page-icon search">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="page-content">
                            <h3>Búsqueda de Propiedades</h3>
                            <p>Página de búsqueda avanzada con filtros por ubicación, precio, tipo de propiedad y características específicas.</p>
                            <div class="page-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    1,234 visitas
                                </span>
                                <span class="status active">Activa</span>
                            </div>
                        </div>
                        <div class="page-actions">
                            <button class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            <button class="btn-view">
                                <i class="fas fa-external-link-alt"></i>
                                Ver
                            </button>
                        </div>
                    </div>

                    <!-- Listado de Propiedades -->
                    <div class="page-card">
                        <div class="page-icon listing">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="page-content">
                            <h3>Listado de Propiedades</h3>
                            <p>Catálogo completo de todas las propiedades disponibles con vista de grid y lista, paginación y ordenamiento.</p>
                            <div class="page-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    2,567 visitas
                                </span>
                                <span class="status active">Activa</span>
                            </div>
                        </div>
                        <div class="page-actions">
                            <button class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            <button class="btn-view">
                                <i class="fas fa-external-link-alt"></i>
                                Ver
                            </button>
                        </div>
                    </div>

                    <!-- Detalle de Propiedad -->
                    <div class="page-card">
                        <div class="page-icon detail">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="page-content">
                            <h3>Detalle de Propiedad</h3>
                            <p>Página individual para cada propiedad con galería de imágenes, descripción completa y formulario de contacto.</p>
                            <div class="page-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    3,891 visitas
                                </span>
                                <span class="status active">Activa</span>
                            </div>
                        </div>
                        <div class="page-actions">
                            <button class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            <button class="btn-view">
                                <i class="fas fa-external-link-alt"></i>
                                Ver
                            </button>
                        </div>
                    </div>

                    <!-- Nuestros Agentes -->
                    <div class="page-card">
                        <div class="page-icon agents">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="page-content">
                            <h3>Nuestros Agentes</h3>
                            <p>Directorio completo del equipo de agentes inmobiliarios con sus especialidades y información de contacto.</p>
                            <div class="page-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    892 visitas
                                </span>
                                <span class="status active">Activa</span>
                            </div>
                        </div>
                        <div class="page-actions">
                            <button class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            <button class="btn-view">
                                <i class="fas fa-external-link-alt"></i>
                                Ver
                            </button>
                        </div>
                    </div>

                    <!-- Perfil de Agente -->
                    <div class="page-card">
                        <div class="page-icon profile">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="page-content">
                            <h3>Perfil de Agente</h3>
                            <p>Página individual de cada agente con biografía, propiedades asignadas, testimonios y formulario de contacto directo.</p>
                            <div class="page-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    456 visitas
                                </span>
                                <span class="status active">Activa</span>
                            </div>
                        </div>
                        <div class="page-actions">
                            <button class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            <button class="btn-view">
                                <i class="fas fa-external-link-alt"></i>
                                Ver
                            </button>
                        </div>
                    </div>

                    <!-- Acerca de Nosotros -->
                    <div class="page-card">
                        <div class="page-icon about">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="page-content">
                            <h3>Acerca de Nosotros</h3>
                            <p>Historia de la empresa, misión, visión, valores y el equipo directivo de la inmobiliaria.</p>
                            <div class="page-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    678 visitas
                                </span>
                                <span class="status active">Activa</span>
                            </div>
                        </div>
                        <div class="page-actions">
                            <button class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            <button class="btn-view">
                                <i class="fas fa-external-link-alt"></i>
                                Ver
                            </button>
                        </div>
                    </div>

                    <!-- Contacto -->
                    <div class="page-card">
                        <div class="page-icon contact">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="page-content">
                            <h3>Contacto</h3>
                            <p>Formulario de contacto general, información de oficinas, horarios de atención y mapa de ubicación.</p>
                            <div class="page-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    1,123 visitas
                                </span>
                                <span class="status active">Activa</span>
                            </div>
                        </div>
                        <div class="page-actions">
                            <button class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            <button class="btn-view">
                                <i class="fas fa-external-link-alt"></i>
                                Ver
                            </button>
                        </div>
                    </div>

                    <!-- Calculadora Hipotecaria -->
                    <div class="page-card">
                        <div class="page-icon calculator">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <div class="page-content">
                            <h3>Calculadora Hipotecaria</h3>
                            <p>Herramienta interactiva para calcular pagos mensuales, intereses y simulaciones de crédito hipotecario.</p>
                            <div class="page-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    2,345 visitas
                                </span>
                                <span class="status active">Activa</span>
                            </div>
                        </div>
                        <div class="page-actions">
                            <button class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            <button class="btn-view">
                                <i class="fas fa-external-link-alt"></i>
                                Ver
                            </button>
                        </div>
                    </div>

                    <!-- Mapa de Propiedades -->
                    <div class="page-card">
                        <div class="page-icon map">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="page-content">
                            <h3>Mapa de Propiedades</h3>
                            <p>Vista geográfica interactiva de todas las propiedades disponibles con filtros y información detallada.</p>
                            <div class="page-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    1,789 visitas
                                </span>
                                <span class="status active">Activa</span>
                            </div>
                        </div>
                        <div class="page-actions">
                            <button class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            <button class="btn-view">
                                <i class="fas fa-external-link-alt"></i>
                                Ver
                            </button>
                        </div>
                    </div>

                    <!-- Testimonios -->
                    <div class="page-card">
                        <div class="page-icon testimonials">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="page-content">
                            <h3>Testimonios</h3>
                            <p>Reseñas y testimonios de clientes satisfechos con calificaciones, fotos y experiencias detalladas.</p>
                            <div class="page-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    567 visitas
                                </span>
                                <span class="status active">Activa</span>
                            </div>
                        </div>
                        <div class="page-actions">
                            <button class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            <button class="btn-view">
                                <i class="fas fa-external-link-alt"></i>
                                Ver
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="action-buttons">
                    <button class="btn-primary">
                        <i class="fas fa-plus"></i>
                        Crear Nueva Página
                    </button>
                    <button class="btn-secondary">
                        <i class="fas fa-download"></i>
                        Exportar Reporte
                    </button>
                </div>
            </div>

            <!-- SECCIÓN BLOG (Ejemplo adicional) -->
            <div id="blog-section" class="content-section">
                <div class="breadcrumb">
                    <i class="fas fa-home"></i>
                    <span>Escritorio</span>
                    <i class="fas fa-chevron-right"></i>
                    <span>Blog</span>
                </div>
                <div class="section-header">
                    <h1>
                        <i class="fas fa-blog"></i>
                        Gestión de Blog
                    </h1>
                    <p>Administra todas las entradas de tu blog inmobiliario</p>
                </div>
                <!-- Aquí irían los artículos del blog -->
                <div class="coming-soon">
                    <i class="fas fa-blog" style="font-size: 64px; color: #bdc3c7; margin-bottom: 20px;"></i>
                    <h3>Sección en desarrollo</h3>
                    <p>La gestión de blog estará disponible próximamente</p>
                </div>
            </div>

            <!-- SECCIÓN REAL ESTATE (Ejemplo adicional) -->
            <div id="realestate-section" class="content-section">
                <div class="breadcrumb">
                    <i class="fas fa-home"></i>
                    <span>Escritorio</span>
                    <i class="fas fa-chevron-right"></i>
                    <span>Real Estate</span>
                </div>
                <div class="section-header">
                    <h1>
                        <i class="fas fa-building"></i>
                        Gestión de Propiedades
                    </h1>
                    <p>Administra todas las propiedades de tu inmobiliaria</p>
                </div>
                <!-- Aquí irían las propiedades -->
                <div class="coming-soon">
                    <i class="fas fa-building" style="font-size: 64px; color: #bdc3c7; margin-bottom: 20px;"></i>
                    <h3>Sección en desarrollo</h3>
                    <p>La gestión de propiedades estará disponible próximamente</p>
                </div>
            </div>
                <!--SECCION CONSULTAS-->
                 <div id="consultas-section" class="content-section">
                    <div class="breadcrumb">
                    <i class="fas fa-home"></i>
                    <span>Escritorio</span>
                    <i class="fas fa-chevron-right"></i>
                    <span>Real Estate</span>
                    </div>
                <div class="section-header">
                    <h1>
                        <i class="fas fa-building"></i>
                        Seccion de consultas
                    </h1>
                </div>
                 <!-- Formulario de Consulta -->
    <div class="formulario-consulta">
        <h3><i class="fas fa-question-circle"></i> Realiza tu consulta</h3>
        <form id="form-consulta">
            <div class="form-group">
                <label for="nombre-consulta">Nombre completo:</label>
                <input type="text" id="nombre-consulta" name="nombre-consulta" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email-consulta">Correo electrónico:</label>
                <input type="email" id="email-consulta" name="email-consulta" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="mensaje-consulta">Mensaje:</label>
                <textarea id="mensaje-consulta" name="mensaje-consulta" rows="4" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Enviar Consulta
            </button>
        </form>
    </div>

    <hr>

    <!-- Formulario de Agendamiento -->
    <div class="formulario-cita">
        <h3><i class="fas fa-calendar-check"></i> Agendar Cita a Propiedad</h3>
        <form id="form-cita">
            <div class="form-group">
                <label for="nombre-cita">Nombre completo:</label>
                <input type="text" id="nombre-cita" name="nombre-cita" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefono-cita">Teléfono:</label>
                <input type="tel" id="telefono-cita" name="telefono-cita" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="propiedad-cita">Propiedad a visitar:</label>
                <input type="text" id="propiedad-cita" name="propiedad-cita" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fecha-cita">Fecha preferida:</label>
                <input type="date" id="fecha-cita" name="fecha-cita" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hora-cita">Hora preferida:</label>
                <input type="time" id="hora-cita" name="hora-cita" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-calendar-plus"></i> Agendar Cita
            </button>
           </form>
           </div>
           </div>

        </main>
    </div>

    <script>
        // Función para mostrar/ocultar dropdown del perfil
        document.addEventListener('DOMContentLoaded', function() {
            function toggleDropdown() {
                const dropdownMenu = document.getElementById("dropdownMenu");
                if (dropdownMenu) {
                    dropdownMenu.classList.toggle("show");
                } else {
                    console.error("Elemento con ID 'dropdownMenu' no encontrado.");
                }
            }
            window.toggleDropdown = toggleDropdown;

            const dropdownBtn = document.querySelector('.dropdown-btn');
            if (dropdownBtn) {
                dropdownBtn.addEventListener('click', toggleDropdown);
            }

            window.onclick = function(event) {
                if (!event.target.matches('.dropdown-btn') && !event.target.closest('.dropdown-menu')) {
                    const dropdowns = document.getElementsByClassName("dropdown-menu");
                    for (let i = 0; i < dropdowns.length; i++) {
                        const openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        });

        // Función para cambiar entre secciones
        function showSection(sectionName, clickedElement) {
            // Prevenir el comportamiento por defecto del enlace
            event.preventDefault();
            
            // Ocultar todas las secciones
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });

            // Mostrar la sección seleccionada
            const targetSection = document.getElementById(sectionName + '-section');
            if (targetSection) {
                targetSection.classList.add('active');
            }

            // Actualizar el estado activo del sidebar
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.classList.remove('active');
            });

            // Activar el elemento del sidebar correspondiente
            const parentNavItem = clickedElement.closest('.nav-item');
            if (parentNavItem) {
                parentNavItem.classList.add('active');
            }
        }
    </script>
</body>
</html>