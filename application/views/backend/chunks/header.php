<header class="main-header">
    <!-- Logo -->
    <a href="manager/perfil/editar" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>B</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">be<strong>ur</strong>er</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="manager/perfil/editar" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
					
							<img src="assets/images/logos/favicon.ico" class="user-image" alt="User Image">
						
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?= ucfirst($this->manager['user']['perfil'])?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="assets/images/logos/favicon.ico" class="img-circle" alt="User Image">

                            <p>
                                <?= ucfirst($this->manager['user']['perfil'])?>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="manager/perfil/editar" class="btn btn-default btn-flat">Mis datos</a>
                            </div>
                            <div class="pull-right">
                                <a href="manager/login?logout=1" class="btn btn-default btn-flat">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul> 
        </div>
    </nav>
</header>