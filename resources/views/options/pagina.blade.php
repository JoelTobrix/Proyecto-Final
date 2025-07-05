<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inmobiliaria MJB Quito</title>
    <link rel="stylesheet" href="{{asset('css/pagina.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <i class="fas fa-home"></i>
            <span class="logo">Inmobiliaria MJB Quito</span>
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="header-right">
            <button class="header-btn">
                <i class="fas fa-store"></i>
                Ver tienda
            </button>
            <button class="header-btn">
                <i class="fas fa-bell"></i>
            </button>
            <div class="user-menu">
                <span>Diseño</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="user-avatar">R</div>
            <div class="user-menu">
                <span>Real State</span>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </header>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-item active" onclick="showSection('escritorio')">
                <i class="fas fa-home"></i>
                <span>Escritorio</span>
            </div>
            
            <div class="sidebar-item" onclick="showSection('paginas')">
                <i class="fas fa-file-alt"></i>
                <span>Páginas</span>
            </div>

            <div class="sidebar-item">
                <i class="fas fa-blog"></i>
                <span>Blog</span>
                <i class="fas fa-chevron-right"></i>
            </div>
            
            <div class="sidebar-item">
                <i class="fas fa-building"></i>
                <span>Real Estate</span>
                <i class="fas fa-chevron-right"></i>
            </div>
            
            <div class="sidebar-item">
                <i class="fas fa-comments"></i>
                <span>Consults</span>
            </div>
            
            <div class="sidebar-item">
                <i class="fas fa-users"></i>
                <span>Accounts</span>
            </div>
            
            <div class="sidebar-item">
                <i class="fas fa-box"></i>
                <span>Packages</span>
            </div>
            
            <div class="sidebar-item">
                <i class="fas fa-envelope"></i>
                <span>Contacto</span>
            </div>
            
            <div class="sidebar-item">
                <i class="fas fa-credit-card"></i>
                <span>Pagos</span>
                <i class="fas fa-chevron-right"></i>
            </div>
            
            <div class="sidebar-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Locations</span>
                <i class="fas fa-chevron-right"></i>
            </div>
            
            <div class="sidebar-item">
                <i class="fas fa-photo-video"></i>
                <span>Medios</span>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Sección Escritorio -->
            <div id="escritorio-section" class="content-section active">
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
                    
                    <div class="stat-card green">
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
                <div class="table-container">
                    <div class="table-header">
                        <h3>
                            <i class="fas fa-edit"></i>
                            Publicaciones recientes
                        </h3>
                        <div class="table-actions">
                            <button class="table-btn">
                                <i class="fas fa-sync"></i>
                            </button>
                            <button class="table-btn">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="table-btn">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    
                    <table class="publications-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NOMBRE</th>
                                <th>FECHA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="no-data">No hay publicaciones recientes</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sección Páginas -->
            <div id="paginas-section" class="content-section">
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
        </main>
    </div>

    <script>
        function showSection(sectionName) {
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
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            sidebarItems.forEach(item => {
                item.classList.remove('active');
            });

            // Activar el elemento del sidebar correspondiente
            event.target.closest('.sidebar-item').classList.add('active');
        }
    </script>
</body>
</html>