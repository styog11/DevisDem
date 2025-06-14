<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP MVC App</title>
    <link rel="stylesheet" href="/devisdem/public/css/style.css">
    <link rel="shortcut icon" href="https://devisdem.prodemenageurs.com/assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">
    <link rel="stylesheet" href="https://devisdem.prodemenageurs.com/assets/plugins/global/plugins.bundle.css">
    <link rel="stylesheet" href="https://devisdem.prodemenageurs.com/assets/css/style.bundle.css">
    <link rel="stylesheet" href="https://devisdem.prodemenageurs.com/assets/plugins/custom/datatables/datatables.bundle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <header>
        <nav>
            <ul class="nav-list">
                <li class="drawer-toggle">
                        <span class="menu-icon" onclick="sidebarToggle()">☰</span>
                </li>
                <li><a href="/devisdem"><img src="../devisdem/public/images/logo.png" height="30" alt=""></a></li>
            </ul>
        </nav>
    </header>
    <div class="drawer-overlay" id="drawer-overlay" onclick="sidebarToggle()">
    <aside id="sidebar" class="drawer" onclick="sidebarToggle();">
        <h2>Apps</h2>
        <nav class="drawer-nav">
            <ul>
                <li<?= $_SERVER['REQUEST_URI'] == '/devisdem' ? ' class="active"' : '' ?>><a href="/devisdem/public/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li<?= $_SERVER['REQUEST_URI'] == '/devisdem/clients' ? ' class="active"' : '' ?>><a href="/devisdem/public/clients"><i class="fa fa-users"></i>Clients</a></li>
            </ul>
        </nav>
    </aside>   
    </div>
    <main>
        <?php echo $content; ?>
    </main>
    <footer>
        <div class="text-gray-900 order-2 order-md-1">
			<span class="text-muted fw-semibold me-1"><?php echo date("Y"); ?>©</span>
			<a href="/" target="_blank" class="text-gray-800 text-hover-primary">DevisDem</a>
		</div>
    </footer>
    <script src="/devisdem/public/js/script.js"></script>
    <script>
        function sidebarToggle() {
    let sideBar = document.querySelector('.drawer-overlay'); 
    if (sideBar.classList.contains('active')) {
        sideBar.classList.remove('active');
    } else {
        sideBar.classList.toggle('active');
    }
}

    </script>
</body>
</html>