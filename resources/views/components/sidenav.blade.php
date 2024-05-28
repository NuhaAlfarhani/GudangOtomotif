<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">
                        LIST
                    </div>
                    
                    <a class="nav-link" href="/">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-warehouse">
                            </i>
                        </div>

                        Stock Barang
                    </a>

                    <a class="nav-link" href="/masuk">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-people-arrows">
                            </i>
                        </div>
                        
                        Barang Masuk
                    </a>

                    <a class="nav-link" href="/keluar">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-truck">
                            </i>
                        </div>
                        
                        Barang Keluar
                    </a>            
                </div>
            </div>

            <div class="sb-sidenav-footer">
                <div class="small">
                    Logged in as:
                </div>
                
                HINO ARISTA CIKARANG
            </div>
        </nav>
    </div>

    @yield('content')

</div>