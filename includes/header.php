<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?> - <?php echo isset($page_title) ? $page_title : SITE_TAGLINE; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <a href="index.php">
                    <i class="fas fa-tools"></i>
                    <span><?php echo SITE_NAME; ?></span>
                </a>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="layanan.php">Layanan</a></li>
                <li><a href="about.php">Tentang Kami</a></li>
                <li><a href="services.php">Pesan Servis</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fas fa-cog"></i> Kelola
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="kelola_layanan.php"><i class="fas fa-plus-circle"></i> Tambah Layanan</a>
                        <a href="kelola_layanan.php?action=manage"><i class="fas fa-edit"></i> Kelola Layanan</a>
                        <a href="pesanan.php"><i class="fas fa-shopping-cart"></i> Lihat Pesanan</a>
                    </div>
                </li>
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>