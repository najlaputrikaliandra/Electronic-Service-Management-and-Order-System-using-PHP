<?php
require_once 'includes/config.php';
require_once 'includes/database.php';

// Get all services without limit
$query = "SELECT * FROM services ORDER BY created_at ASC";
$result = mysqli_query($conn, $query);
?>
<?php 
$page_title = "Semua Layanan Servis";
include 'includes/header.php'; 
?>

<div class="container" style="padding-top: 100px;">
    <h1 class="text-center">Semua Layanan Servis</h1>
    <p class="text-center section-subtitle">Pilih layanan servis yang sesuai dengan kebutuhan Anda</p>
    
    <div class="services-grid" style="margin-top: 40px;">
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
                    <div style="margin-top: 15px;">
                        <a href="services.php?service_id=<?php echo $service['id']; ?>" class="btn-service">Pesan Servis</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px; background-color: #f8f9fa; border-radius: 10px;">
                <i class="fas fa-tools" style="font-size: 3rem; color: #ddd; margin-bottom: 20px;"></i>
                <h3>Belum ada layanan tersedia</h3>
                <p>Silahkan tambahkan layanan pertama Anda.</p>
                <a href="kelola_layanan.php" class="btn-primary" style="margin-top: 20px;">Tambah Layanan</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>