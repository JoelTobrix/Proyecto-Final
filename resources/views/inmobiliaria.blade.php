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
                        Usuario
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
                    @if(in_array($usuario->rol_id, [3]))
                    <li class="nav-item" id="paginas-nav">
                        <a href="#" class="nav-link" onclick="showSection('paginas', this)">
                            <i class="fas fa-file-alt"></i>
                            <span>Páginas</span>
                        </a>
                    </li> @endif
                    @if(in_array($usuario->rol_id, [3]))
                    <li class="nav-item" id="blog-nav">
                        <a href="#" class="nav-link" onclick="showSection('blog', this)">
                            <i class="fas fa-blog"></i>
                            <span>Asignar agente vendedor</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li> @endif
                    @if(in_array($usuario->rol_id, [3]))
                    <li class="nav-item" id="realestate-nav">
                        <a href="#" class="nav-link" onclick="showSection('realestate', this)">
                            <i class="fas fa-building"></i>
                            <span>Propiedades reservadas</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li> @endif
                    @if(in_array($usuario->rol_id, [1,2,3]))
                    <li class="nav-item" id="consultas-nav">
                        <a href="#" class="nav-link" onclick="showSection('consultas',this)">
                            <i class="fas fa-comments"></i>
                            <span>Consultas</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li> @endif
                   @if(in_array($usuario->rol_id, [1,2,3]))
                    <li class="nav-item" id="catalogo-nav">
                        <a href="#" class="nav-link" onclick="showSection('catalogo',this)">
                            <i class="fas fa-book"></i>
                            <span>Catalogo</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li> @endif
                    @if(in_array($usuario->rol_id, [3]))
                    <li class="nav-item" id="reservas-nav">
                        <a href="#" class="nav-link" onclick="showSection('reservas', this)">
                            <i class="fas fa-box"></i>
                            <span>Reservas</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li> @endif
                    @if(in_array($usuario->rol_id,[2,3] ))
                    <li class="nav-item" id="destacadas-nav">
                        <a href="#" class="nav-link" onclick="showSection('destacadas', this)">
                            <i class="fas fa-building"></i>
                            <span>Propiedades destacadas</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li> @endif
                    @if(in_array($usuario->rol_id,[3] ))
                    <li class="nav-item" id="usuarios-nav">
                        <a href="#" class="nav-link" onclick="showSection('usuarios'), this">
                            <i class="fas fa-user"></i>
                            <span>Agentes</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li> @endif
                    @if(in_array($usuario->rol_id,[2,3] ))
                    <li class="nav-item" id="reportes-nav">
                        <a href="#" class="nav-link" onclick="showSection('reportes'), this">
                            <i class="fas fa-file-alt"></i>
                            <span>Reportes</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li> @endif
                  
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

            <!-- SECCIÓN GESTION DE PROPIEDADES -->    <!--Rol Agente vendedor y propietario-->
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
                <!-- Lista propiedades -->
                <div class="coming-soon">
                    <i class="fas fa-building" style="font-size: 64px; color: #bdc3c7; margin-bottom: 20px;"></i>
                    <h3>Sección en desarrollo</h3>
                    <p>La gestión de propiedades estará disponible próximamente</p>
                </div>
            </div>
                <!--SECCION CONSULTAS-->   <!--Roles Agente vendedor y propietario-->
                 <div id="consultas-section" class="content-section">
                    <div class="breadcrumb">
                    <i class="fas fa-home"></i>
                    <span>Escritorio</span>
                    <i class="fas fa-chevron-right"></i>
                    <span>Real Estate</span>
                    </div>
                <div class="section-header">
                    <h1>
                        <i class="fas fa-comments"></i>
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

    <!-- SECCION CATALOGO --> <!-- Todos los roles -->
<div id="catalogo-section" class="content-section">
    <!-- Breadcrumb -->
    <div class="breadcrumb mb-3">
        <i class="fas fa-home"></i>
        <span>Escritorio</span>
        <i class="fas fa-chevron-right"></i>
        <span>Real Estate</span>  
    </div>

    <!-- Título sección -->
    <div class="section-header mb-4">
        <h1><i class="fas fa-book"></i> Sección de Catálogo</h1>
    </div>

    <!-- Listado de propiedades -->
    <div class="row mt-2">
        @forelse($propiedades as $propiedad)
        <div class="col-card">
            <div class="card">
                <div class="card-image">
                    @if($propiedad->imagen)
                        <img src="{{ asset('storage/' . $propiedad->imagen) }}" alt="{{ $propiedad->titulo }}">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}" alt="Sin imagen">
                    @endif
                    <div class="card-badge">Oferta</div>
                </div>

                <div class="card-body">
                    <h5>{{ $propiedad->titulo }}</h5>
                    <p><i class="fas fa-map-marker-alt text-danger"></i> {{ $propiedad->ubicacion }}</p>
                    <p class="price">$ {{ number_format($propiedad->precio, 2) }}</p>
                    <p class="description">{{ Str::limit($propiedad->descripcion, 100) }}</p>
                    <a href="#" class="btn-view">Ver más</a>
                </div>
            </div>
        </div>
        @empty
            <p class="text-center">No hay propiedades disponibles.</p>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="mt-3 text-center">
        {{ $propiedades->links() }}
    </div>
</div>

<!-- Estilos profesionales -->
<style>
/* Grid de tarjetas */
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.col-card {
    flex: 1 1 calc(33% - 20px);
    box-sizing: border-box;
}

/* Tarjetas */
.card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    background-color: #fff;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

/* Imagen */
.card-image {
    position: relative;
}

.card-image img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    display: block;
}

/* Badge */
.card-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: #ff5a5f;
    color: white;
    padding: 5px 10px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: bold;
}

/* Body */
.card-body {
    padding: 15px;
}

.card-body h5 {
    margin: 0 0 8px;
    color: #222;
}

.card-body p {
    margin: 4px 0;
    color: #555;
}

.card-body .price {
    color: #28a745;
    font-weight: bold;
    margin: 5px 0;
}

.card-body .description {
    font-size: 0.9rem;
    color: #777;
}

/* Botón */
.btn-view {
    display: inline-block;
    padding: 6px 18px;
    margin-top: 8px;
    background-color: #007bff;
    color: white;
    border-radius: 25px;
    text-decoration: none;
    font-size: 0.9rem;
}

.btn-view:hover {
    background-color: #0056b3;
}
</style>



    <!-- Listado de propiedades -->
    <div class="row mt-4">
        @forelse($propiedades as $propiedad)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($propiedad->imagen)
                        <img src="{{ asset('storage/' . $propiedad->imagen) }}" class="card-img-top" alt="{{ $propiedad->titulo }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}" class="card-img-top" alt="Sin imagen" style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $propiedad->titulo }}</h5>
                        <p class="card-text"><strong>Ubicación:</strong> {{ $propiedad->ubicacion }}</p>
                        <p class="card-text text-success"><strong>Precio:</strong> ${{ number_format($propiedad->precio, 2) }}</p>
                        <p class="card-text">{{ Str::limit($propiedad->descripcion, 80) }}</p>
                    </div>

                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary btn-sm">Ver más</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No hay propiedades disponibles.</p>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="mt-3">
        {{ $propiedades->links() }}
    </div>
</div>

         <!--SECCION RESERVAS-->  <!--Roles: TODOS-->    
         <div id="reservas-section" class="content-section">
            <div class= "breadcrumb">
                <i class="fas fa-home"></i>
                <span>Escritorio</span>
                <i class="fas fa-chevron-right"></i>
                   <span>Real Estate</span> 
                </div>
               <div class="section-header">
                <h1>
                    <i class="fas fa-box"></i>
                    Seccion de Reservas
                </h1>
               </div>  
               </div> 
         <!--SECCION DE PROPIEDADES DESTACADAS-->  <!--Rol:Todos--> 
          <div id="destacadas-section" class="content-section">
            <div class= "breadcrumb">
                <i class="fas fa-home"></i>
                <span>Escritorio</span>
                <i class="fas fa-chevron-right"></i>
                   <span>Real Estate</span> 
                </div>
               <div class="section-header">
                <h1>
                    <i class="fas fa-building"></i>
                    Seccion de Propiedades destacadas
                </h1>
               </div>  
               </div> 
          <!--SECCION DE USUARIOS-->    <!--Rol: todos-->  
          <div id="usuarios-section" class="content-section">
            <div class="breadcrumb">
                <i class="fas fa-home"></i>
                <span>Escritorio</span>
                <i class="fas fa-chevron-right"></i>
                   <span>Real Estate</span> 
                </div>
                <div class="section-header">
                <h1>     
                    <i class="fas fa-user"></i>
                    Seccion de clientes y agentes propietarios   
                 </h1>
               </div>  
               </div>
          <!--SECCION DE REPORTES-->   <!--Rol: Agente vendedor y propietario-->
          <div id="reportes-section" class="content-section">
            <div class="breadcrumb">
                <i class="fas fa-home"></i>
                 <span>Escritorio</span>
                <i class="fas fa-chevron-right"></i>
                   <span>Real Estate</span> 
                </div>
                <div class="section-header">
                <h1>     
                     <i class="fas fa-file-alt"></i>
                     Seccion de reportes
                </h1>  
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