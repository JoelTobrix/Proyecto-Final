<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria MJB</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
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
                    <button class="dropdown-btn">
                        Real State
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="main-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <ul>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <i class="fas fa-home"></i>
                            <span>Escritorio</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-file-alt"></i>
                            <span>Páginas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-blog"></i>
                            <span>Blog</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-building"></i>
                            <span>Real Estate</span>
                            <i class="fas fa-chevron-right expand-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-comments"></i>
                            <span>Consults</span>
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
        </main>
    </div>
</body>
</html>