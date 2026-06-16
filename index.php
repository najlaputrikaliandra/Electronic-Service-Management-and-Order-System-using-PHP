<?php
require_once 'includes/config.php';
require_once 'includes/database.php';

// Get 6 latest services for homepage
$query = "SELECT * FROM services ORDER BY created_at ASC LIMIT 6";
$result = mysqli_query($conn, $query);
?>
<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Servis Elektronik Profesional & Bergaransi</h1>
            <p>Kami menyediakan jasa servis untuk semua jenis perangkat elektronik rumah tangga dengan teknisi berpengalaman lebih dari 5 tahun.</p>
            <a href="layanan.php" class="btn-primary">Lihat Semua Layanan</a>
            <a href="services.php" class="btn-secondary">Pesan Sekarang</a>
        </div>
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=600&h=400&fit=crop" alt="Teknisi Servis">
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="features">
    <div class="container">
        <h2 class="section-title">Mengapa Memilih Kami?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-user-tie"></i>
                <h3>Teknisi Profesional</h3>
                <p>Teknisi kami bersertifikat dan berpengalaman lebih dari 5 tahun di bidang elektronik.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Bergaransi 30 Hari</h3>
                <p>Semua servis mendapatkan garansi 30 hari untuk perbaikan yang sama.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-bolt"></i>
                <h3>Cepat & Tepat</h3>
                <p>Waktu servis cepat dengan diagnosa yang akurat dan sparepart berkualitas.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-money-bill-wave"></i>
                <h3>Harga Transparan</h3>
                <p>Biaya servis transparan tanpa biaya tambahan tersembunyi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="services">
    <div class="container">
        <h2 class="section-title">Layanan Servis Unggulan</h2>
        <p class="section-subtitle">layanan servis terbaru yang kami tawarkan</p>
        
        <div class="services-grid">
            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($service = mysqli_fetch_assoc($result)): ?>
                <div class="service-card">
                    <div class="service-image">
                        <img src="<?php echo htmlspecialchars($service['image_url']); ?>" alt="<?php echo htmlspecialchars($service['name']); ?>">
                    </div>
                    <div class="service-content">
                        <h3><?php echo htmlspecialchars($service['name']); ?></h3>
                        <p><?php echo htmlspecialchars($service['description']); ?></p>
                        <div class="service-meta">
                            <span class="price">Rp <?php echo number_format($service['price'], 0, ',', '.'); ?></span>
                            <span class="duration"><i class="far fa-clock"></i> <?php echo htmlspecialchars($service['duration']); ?></span>
                        </div>
                        <a href="services.php?service_id=<?php echo $service['id']; ?>" class="btn-service">Pesan Servis</a>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                    <p>Belum ada layanan tersedia. <a href="kelola_layanan.php">Tambahkan layanan pertama</a></p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center">
            <a href="layanan.php" class="btn-primary">Lihat Semua Layanan</a>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="contact-cta">
    <div class="container">
        <h2>Siap Servis Elektronik Anda?</h2>
        <p>Jangan biarkan kerusakan mengganggu aktivitas Anda. Hubungi kami sekarang!</p>
        <div class="cta-buttons">
            <a href="tel:02112345678" class="btn-primary"><i class="fas fa-phone"></i> Telepon Sekarang</a>
            <a href="services.php" class="btn-secondary"><i class="fas fa-calendar-check"></i> Buat Janji Servis</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>