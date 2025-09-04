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

            <!--Boton notificaciones-->
    <div class="notification-wrapper">
    <!-- Campana -->
    <a href="#" class="header-btn" id="notificationToggle">
        <i class="fas fa-bell"></i>
        <span class="badge">0</span>
    </a>

    <!-- Mini bandeja (vacía por ahora) -->
    <div class="notification-dropdown" id="notificationDropdown">
        <div class="dropdown-header">Notificaciones</div>
        <div class="dropdown-body">
            <p class="empty">No hay notificaciones</p>
        </div>
        <div class="dropdown-footer">
            <a href="#">Ver todas</a>
        </div>
    </div>
</div>

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
                    <li class="nav-item" id="propiedad-nav">
                    <a href="#" class="nav-link" onclick="showSection('propiedad', this)">   
                     <i class="fas fa-home"></i>
                            <span>Asignar nueva propiedad</span>
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
                    @if(in_array($usuario->rol_id, [2]))
                   <li class="nav-item" id="citas-nav">
                       <a href="#" class="nav-link" onclick="showSection('citas',this)">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Citas pendientes</span>
                        <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li> @endif



                   @if(in_array($usuario->rol_id, [1]))
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

            <!-- SECCIÓN AGENTES VENDEDORES(Ejemplo adicional) -->
            <div id="blog-section" class="content-section">
                <div class="breadcrumb">
                    <i class="fas fa-home"></i>
                    <span>Escritorio</span>
                    <i class="fas fa-chevron-right"></i>
                    <span>Agentes vendedores</span>
                </div>
                <div class="section-header">
                    <h1>
                        <i class="fas fa-blog"></i>
                        Agentes vendedores
                    </h1>
                    <p>Asignar agente vendedor</p>
                </div>
                <!-- Aquí irían los artículos del blog -->
                <div class="coming-soon">
                    <i class="fas fa-blog" style="font-size: 64px; color: #bdc3c7; margin-bottom: 20px;"></i>
                    <h3>Sección en desarrollo</h3>
                    <p>La gestión de blog estará disponible próximamente</p>
                </div>
            </div>

             <!-- SECCIÓN ASIGNAR PROPIEDADES -->
<div id="propiedad-section" class="content-section">
    <div class="breadcrumb">
        <span>Escritorio</span>
        <i class="fas fa-chevron-right"></i>
        <span>Asignar propiedad</span>
    </div>
    <div class="section-header">
        <h1>
            <i class="fas fa-home"></i>
            Propiedades y terrenos
        </h1>
        <p>Asignar propiedad</p>
    </div> 

    <!-- FORMULARIO DE REGISTRO -->
    <div class="card mt-4">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('propiedades.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required maxlength="100">
                    @error('titulo') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="ubicacion">Ubicación</label>
                    <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="{{ old('ubicacion') }}" required maxlength="100">
                    @error('ubicacion') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio') }}" required>
                    @error('precio') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required maxlength="255">{{ old('descripcion') }}</textarea>
                    @error('descripcion') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" required>
                    @error('imagen') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option value="disponible" {{ old('estado')=='disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="reservada" {{ old('estado')=='reservada' ? 'selected' : '' }}>Reservada</option>
                    </select>
                    @error('estado') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar Propiedad</button>
            </form>
        </div>
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
  <!-- SECCION CITAS PENDIENTES -->
<div id="citas-section" class="content-section"> 
    <div class="breadcrumb mb-3">
        <i class="fas fa-calendar-alt"></i>
        <span>Escritorio</span>
        <i class="fas fa-chevron-right"></i>
        <span>Real Estate</span>  
    </div>

    <div class="section-header mb-4">
        <h1><i class="fas fa-calendar-alt"></i> Sección de Citas Pendientes</h1>
    </div>

    @if($citas->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Propiedad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita->nombre }}</td>
                        <td>{{ $cita->correo }}</td>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $cita->propiedad ? $cita->propiedad->titulo : 'Sin propiedad' }}</td>
                       <td>
                       @if($cita->estado === 'aceptada')
                       <span class="badge bg-success">Aceptada</span>
                       @elseif($cita->estado === 'rechazada')
                    <span class="badge bg-danger">Rechazada</span>
                       @else
                     <span class="badge bg-warning text-dark">Pendiente</span>
                      @endif
                    </td>

                        <td>
                            <!-- Formulario para aceptar -->
                            <form action="{{ route('citas.aceptar', $cita->idCita) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Aceptar</button>
                            </form>

                            <!-- Formulario para rechazar -->
                            <form action="{{ route('citas.rechazar', $cita->idCita) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Rechazar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay citas pendientes.</p>
    @endif
</div>


 
  <!-- SECCION CATALOGO -->
<div id="catalogo-section" class="content-section">
    <!-- Breadcrumb -->
    <div class="breadcrumb mb-3">
        <i class="fas fa-home"></i>
        <span>Escritorio</span>
        <i class="fas fa-chevron-right"></i>
        <span>Real Estate</span>  
    </div>

    <div class="section-header mb-4">
        <h1><i class="fas fa-book"></i> Sección de Catálogo</h1>
    </div>

  <!-- Listado de propiedades -->
<div class="row mt-4">
    @forelse($propiedades as $index => $propiedad)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($propiedad->imagen)
                    <img src="{{ asset('storage/' . $propiedad->imagen) }}" class="card-img-top" alt="{{ $propiedad->titulo }}" style="height: 200px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/no-image.jpg') }}" class="card-img-top" alt="Sin imagen" style="height: 200px; object-fit: cover;">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $propiedad->titulo }}</h5>
                    <p><strong>Ubicación:</strong> {{ $propiedad->ubicacion }}</p>
                    <p class="text-success"><strong>Precio:</strong> ${{ number_format($propiedad->precio, 2) }}</p>
                    <p>{{ Str::limit($propiedad->descripcion, 80) }}</p>
                </div>

                <div class="card-footer text-center">
                    <!-- Botón que abre el modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPropiedad{{ $index }}">
                        Ver más
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal de propiedad -->
        <div class="modal fade" id="modalPropiedad{{ $index }}" tabindex="-1" aria-labelledby="modalPropiedadLabel{{ $index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPropiedadLabel{{ $index }}">{{ $propiedad->titulo }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        @if($propiedad->imagen)
                            <img src="{{ asset('storage/' . $propiedad->imagen) }}" class="img-fluid rounded mb-3" alt="{{ $propiedad->titulo }}">
                        @else
                            <img src="{{ asset('images/no-image.jpg') }}" class="img-fluid rounded mb-3" alt="Sin imagen">
                        @endif

                        <p><strong>Ubicación:</strong> {{ $propiedad->ubicacion }}</p>
                        <p><strong>Precio:</strong> ${{ number_format($propiedad->precio, 2) }}</p>
                        <p><strong>Descripción:</strong> {{ $propiedad->descripcion }}</p>
                    </div>
                    <div class="modal-footer">
                        <!-- Botón para abrir modal de agendar cita (corregido) -->
                        <button type="button" 
                                class="btn btn-success" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalCita{{ $index }}" 
                                data-bs-dismiss="modal">
                            Agendar cita
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Agendar Cita -->
         <div class="modal fade" id="modalCita{{ $index }}" tabindex="-1" aria-labelledby="modalCitaLabel{{ $index }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCitaLabel{{ $index }}">Agendar cita para {{ $propiedad->titulo }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('citas.store') }}">
                           @csrf
                       <input type="hidden" name="propiedad_id" value="{{ $propiedad->idPropiedad }}">
    
                        <div class="mb-3">
                         <label for="nombreCita{{ $propiedad->idPropiedad }}" class="form-label">Nombre</label>
                         <input type="text" class="form-control" id="nombreCita{{ $propiedad->idPropiedad }}" name="nombre" required>
                               </div>
                         <div class="mb-3">
             <label for="emailCita{{ $propiedad->idPropiedad }}" class="form-label">Correo</label>
        <input type="email" class="form-control" id="emailCita{{ $propiedad->idPropiedad }}" name="correo" required>
    </div>
    <div class="mb-3">
        <label for="fechaCita{{ $propiedad->idPropiedad }}" class="form-label">Fecha</label>
        <input type="date" class="form-control" id="fechaCita{{ $propiedad->idPropiedad }}" name="fecha" required>
    </div>
    <div class="mb-3">
        <label for="horaCita{{ $propiedad->idPropiedad }}" class="form-label">Hora</label>
        <input type="time" class="form-control" id="horaCita{{ $propiedad->idPropiedad }}" name="hora" required>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enviar cita</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    </div>
               </form>

            </div>
        </div>
    </div>
</div>

    @empty
        <p class="text-center">No hay propiedades disponibles.</p>
    @endforelse
</div>
</div>




<!-- Estilos profesionales -->
<style>
 * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .main-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 3rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Grid de tarjetas mejorado */
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        /* Tarjetas mejoradas */
        .property-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
        }

        .property-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        /* Imagen mejorada */
        .card-image {
            position: relative;
            height: 240px;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .property-card:hover .card-image img {
            transform: scale(1.1);
        }

        /* Badge mejorado */
        .card-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .badge-oportunidad {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            box-shadow: 0 4px 15px rgba(255,107,107,0.4);
        }

        .badge-nuevo {
            background: linear-gradient(135deg, #00d2ff, #3a7bd5);
            color: white;
            box-shadow: 0 4px 15px rgba(0,210,255,0.4);
        }

        .badge-disponible {
            background: linear-gradient(135deg, #11998e, #38ef7d);
            color: white;
            box-shadow: 0 4px 15px rgba(17,153,142,0.4);
        }

        /* Body mejorado */
        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .card-location {
            display: flex;
            align-items: center;
            color: #718096;
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .card-location::before {
            content: "📍";
            margin-right: 0.5rem;
        }

        .card-price {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.75rem;
        }

        .card-description {
            color: #4a5568;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .card-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .card-area, .card-type {
            font-size: 0.85rem;
            color: #718096;
            font-weight: 500;
        }

        /* Botón mejorado */
        .btn-view {
            width: 100%;
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102,126,234,0.4);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 2rem;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .close {
            position: absolute;
            right: 1.5rem;
            top: 1.5rem;
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            color: #718096;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #2d3748;
        }

        .modal-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .modal-price {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
        }

        .modal-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .detail-item {
            padding: 1rem;
            background: #f7fafc;
            border-radius: 10px;
            text-align: center;
        }

        .detail-label {
            font-size: 0.8rem;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .detail-value {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2d3748;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .properties-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .main-title {
                font-size: 2rem;
                margin-bottom: 2rem;
            }
            
            .modal-content {
                margin: 10% auto;
                width: 95%;
                padding: 1.5rem;
            }
        }
</style>



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
    <div class="breadcrumb">
        <i class="fas fa-home"></i>
        <span>Escritorio</span>
        <i class="fas fa-chevron-right"></i>
        <span>Real Estate</span> 
    </div>
    
    <div class="section-header">
        <h2>
            <i class="fas fa-building"></i>
            Sección de Propiedades Destacadas
        </h2>
    </div>

    <!-- Contenedor con los cards -->
    <div id="cards-container" class="cards-grid">
        <!-- Card Propiedades Destacadas -->
        <div class="page-card">
            <div class="page-icon destacadas">
                <i class="fas fa-building"></i>
            </div>
            <div class="page-content">
                <h3>Propiedades Destacadas</h3>
                <p>Catálogo completo de todas las propiedades más vendidas</p>
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
                    VER
                </button>
            </div>
        </div>

        <!-- Card Propiedades Registradas -->
        <div class="page-card">
            <div class="page-icon registradas">
                <i class="fas fa-list"></i>
            </div>
            <div class="page-content">
                <h3>Propiedades Registradas</h3>
                <p>Sección de propiedades registradas en el sistema</p>
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
                <!-- Botón que mostrará CRUD -->
                <button class="btn-view" id="btn-admin">
             <i class="fas fa-external-link-alt"></i>
            Administrar
            </button>

            </div>
        </div>
    </div>

    <!-- Contenedor para el CRUD (invisible al inicio) -->
    <div id="administrar-container" style="display:none; margin-top:20px;"></div>
</div>

<!-- Script para mostrar tabla CRUD y botón regresar -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    let btnAdmin = document.getElementById('btn-admin');
    let cardsContainer = document.getElementById('cards-container');
    let administrarContainer = document.getElementById('administrar-container');

    btnAdmin.addEventListener('click', function() {
        // Ocultar cards
        cardsContainer.style.display = 'none';

        // Mostrar contenedor CRUD
        administrarContainer.style.display = 'block';

        // Cargar tabla CRUD via fetch
        fetch('{{ route("propiedades.administrar") }}')
            .then(response => response.text())
            .then(html => {
                // Añadimos botón regresar arriba de la tabla
                administrarContainer.innerHTML = `
                    <button id="btn-regresar" class="btn btn-secondary" style="margin-bottom:10px;">Regresar</button>
                    ${html}
                `;

                // Botón regresar
                document.getElementById('btn-regresar').addEventListener('click', function() {
                    // Mostrar cards
                    cardsContainer.style.display = 'flex';
                    // Ocultar CRUD
                    administrarContainer.style.display = 'none';
                    administrarContainer.innerHTML = '';
                });
            })
            .catch(error => console.error('Error al cargar propiedades:', error));
    });
});
</script>



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
                    Seccion de Agentes propietarios   
                 </h1>
               </div>  
               <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agentes as $agente)
                    <tr>
                        <td>{{ $agente->nombre }}</td>
                        <td>{{ $agente->apellido }}</td>
                        <td>{{ $agente->direccion }}</td>
                        <td>{{ $agente->telefono }}</td>
                        <td>{{ $agente->correo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // 🔹 Dropdown del perfil
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

        // 🔹 Dropdown de notificaciones (campana)
        const toggleBtn = document.getElementById('notificationToggle');
        const dropdown = document.getElementById('notificationDropdown');

        if (toggleBtn && dropdown) {
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
            });

            document.addEventListener('click', function(e) {
                if (!e.target.closest('.notification-wrapper')) {
                    dropdown.style.display = 'none';
                }
            });
        }
    });

    // 🔹 Función para cambiar entre secciones
    function showSection(sectionName, clickedElement) {
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


    <!-- Bootstrap JS (para que los modales funcionen) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>