<?php
require_once 'includes/config.php';
require_once 'includes/database.php';
?>
<?php 
$page_title = "Tentang Kami";
include 'includes/header.php'; 
?>

<div class="container" style="padding-top: 100px;">
    <h1 class="text-center">Tentang <?php echo SITE_NAME; ?></h1>
    
    <div style="display: flex; align-items: center; gap: 40px; margin: 40px 0; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 300px;">
            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=600&h=400&fit=crop" alt="Tentang Kami" style="width: 100%; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
        </div>
        <div style="flex: 1; min-width: 300px;">
            <h2>Profesionalisme & Kepercayaan</h2>
            <p><?php echo SITE_NAME; ?> telah beroperasi sejak 2015 dengan fokus pada jasa servis dan perbaikan perangkat elektronik rumah tangga. Kami memiliki tim teknisi yang berpengalaman dan bersertifikat.</p>
            <p>Visi kami adalah menjadi penyedia jasa servis elektronik terpercaya dengan kualitas terbaik dan pelayanan maksimal.</p>
            <div style="margin-top: 20px;">
                <a href="services.php" class="btn-primary">Pesan Servis</a>
                <a href="layanan.php" class="btn-secondary">Lihat Layanan</a>
            </div>
        </div>
    </div>
    
    <div style="margin: 60px 0;">
        <h2 class="text-center">Visi & Misi Kami</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px;">
            <div style="background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                <h3 style="color: #3498db; display: flex; align-items: center;">
                    <i class="fas fa-eye" style="margin-right: 10px;"></i> Visi
                </h3>
                <p>Menjadi perusahaan jasa servis elektronik terdepan dengan layanan berkualitas tinggi, teknologi terkini, dan kepuasan pelanggan sebagai prioritas utama.</p>
            </div>
            <div style="background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                <h3 style="color: #27ae60; display: flex; align-items: center;">
                    <i class="fas fa-bullseye" style="margin-right: 10px;"></i> Misi
                </h3>
                <ul style="list-style-type: none; padding-left: 0;">
                    <li style="margin-bottom: 10px; padding-left: 25px; position: relative;">
                        <i class="fas fa-check" style="color: #27ae60; position: absolute; left: 0;"></i>
                        Menyediakan layanan servis yang cepat, tepat, dan berkualitas
                    </li>
                    <li style="margin-bottom: 10px; padding-left: 25px; position: relative;">
                        <i class="fas fa-check" style="color: #27ae60; position: absolute; left: 0;"></i>
                        Menggunakan sparepart original dan berkualitas
                    </li>
                    <li style="margin-bottom: 10px; padding-left: 25px; position: relative;">
                        <i class="fas fa-check" style="color: #27ae60; position: absolute; left: 0;"></i>
                        Memberikan garansi untuk setiap perbaikan
                    </li>
                    <li style="margin-bottom: 10px; padding-left: 25px; position: relative;">
                        <i class="fas fa-check" style="color: #27ae60; position: absolute; left: 0;"></i>
                        Meningkatkan kompetensi teknisi secara berkala
                    </li>
                    <li style="margin-bottom: 10px; padding-left: 25px; position: relative;">
                        <i class="fas fa-check" style="color: #27ae60; position: absolute; left: 0;"></i>
                        Memberikan harga yang transparan dan kompetitif
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div style="background-color: #f8f9fa; padding: 40px; border-radius: 10px; margin-top: 40px;">
        <h2 class="text-center">Tim Kami</h2>
        <p class="text-center" style="margin-bottom: 30px;">Tim profesional yang siap membantu permasalahan elektronik Anda</p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-top: 20px;">
            <div style="text-align: center;">
                <div style="width: 120px; height: 120px; background-color: #3498db; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-user" style="font-size: 3rem; color: white;"></i>
                </div>
                <h3>Budi Santoso</h3>
                <p style="color: #3498db; font-weight: 500;">Teknisi AC & Kulkas</p>
                <p>Pengalaman 8 tahun, spesialis pendingin ruangan</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 120px; height: 120px; background-color: #27ae60; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-user" style="font-size: 3rem; color: white;"></i>
                </div>
                <h3>Agus Wijaya</h3>
                <p style="color: #27ae60; font-weight: 500;">Teknisi Elektronik</p>
                <p>Pengalaman 6 tahun, spesialis TV & audio visual</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 120px; height: 120px; background-color: #e74c3c; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-user" style="font-size: 3rem; color: white;"></i>
                </div>
                <h3>Dewi Lestari</h3>
                <p style="color: #e74c3c; font-weight: 500;">Teknisi Komputer</p>
                <p>Pengalaman 5 tahun, spesialis laptop & komputer</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>