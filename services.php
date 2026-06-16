<?php
require_once 'includes/config.php';
require_once 'includes/database.php';

// Get all services
$services_query = "SELECT * FROM services ORDER BY name ASC";
$services_result = mysqli_query($conn, $services_query);

// Simpan ke array
$services = [];
while($service = mysqli_fetch_assoc($services_result)) {
    $services[] = $service;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service_id = mysqli_real_escape_string($conn, $_POST['service_id']);
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_phone = mysqli_real_escape_string($conn, $_POST['customer_phone']);
    $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);
    $problem_description = mysqli_real_escape_string($conn, $_POST['problem_description']);
    $order_date = date('Y-m-d', strtotime($_POST['order_date']));
    
    $insert_query = "INSERT INTO orders (service_id, customer_name, customer_phone, customer_email, customer_address, problem_description, order_date) 
                     VALUES ('$service_id', '$customer_name', '$customer_phone', '$customer_email', '$customer_address', '$problem_description', '$order_date')";
    
    if (mysqli_query($conn, $insert_query)) {
        $success = "Pesanan berhasil dibuat! Kami akan menghubungi Anda dalam 1x24 jam.";
    } else {
        $error = "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

// Get selected service if any
$selected_service = null;
if (isset($_GET['service_id'])) {
    $service_id = mysqli_real_escape_string($conn, $_GET['service_id']);
    $service_query = "SELECT * FROM services WHERE id = '$service_id'";
    $service_result = mysqli_query($conn, $service_query);
    $selected_service = mysqli_fetch_assoc($service_result);
}
?>
<?php 
$page_title = "Pesan Servis";
include 'includes/header.php'; 
?>

<div class="container" style="padding-top: 100px;">
    <h1 class="text-center">Pesan Layanan Servis</h1>
    <p class="text-center section-subtitle">Isi form berikut untuk memesan jasa servis elektronik</p>
    
    <?php if (isset($success)): ?>
    <div class="alert alert-success">
        <?php echo $success; ?>
        <a href="index.php" class="btn-primary btn-sm" style="float: right;">Kembali ke Beranda</a>
    </div>
    <?php endif; ?>
    
    <?php if (isset($error)): ?>
    <div class="alert alert-error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <div class="form-container">
        <form method="POST" action="">
            <div class="form-group">
                <label for="service_id">Pilih Layanan Servis *</label>
                <select name="service_id" id="service_id" class="form-control" required>
                    <option value="">-- Pilih Jenis Servis --</option>
                    <?php foreach($services as $service): ?>
                    <option value="<?php echo $service['id']; ?>" <?php echo ($selected_service && $selected_service['id'] == $service['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($service['name']); ?> (Rp <?php echo number_format($service['price'], 0, ',', '.'); ?>)
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label for="customer_name">Nama Lengkap *</label>
                    <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="customer_phone">Telepon/WhatsApp *</label>
                    <input type="tel" name="customer_phone" id="customer_phone" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="customer_email">Email</label>
                <input type="email" name="customer_email" id="customer_email" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="customer_address">Alamat Lengkap *</label>
                <textarea name="customer_address" id="customer_address" class="form-control" rows="3" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="problem_description">Deskripsi Kerusakan/Keluhan *</label>
                <textarea name="problem_description" id="problem_description" class="form-control" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="order_date">Tanggal Servis Diinginkan *</label>
                <input type="date" name="order_date" id="order_date" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn-primary" style="width: 100%; padding: 15px; font-size: 1.1rem;">
                    <i class="fas fa-paper-plane"></i> Kirim Pesanan
                </button>
            </div>
            <p style="text-align: center; margin-top: 10px; color: #666; font-size: 0.9rem;">
                <i>* Wajib diisi</i>
            </p>
        </form>
    </div>
    
    <div style="margin-top: 40px;">
        <h3>Informasi Penting</h3>
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-top: 20px;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 15px;">
                <div style="display: flex; align-items: flex-start;">
                    <i class="fas fa-phone" style="color: #3498db; margin-right: 10px; margin-top: 3px;"></i>
                    <div>
                        <strong>Konfirmasi</strong>
                        <p style="margin: 5px 0 0 0;">Teknisi akan menghubungi Anda untuk konfirmasi dan penjadwalan</p>
                    </div>
                </div>
                <div style="display: flex; align-items: flex-start;">
                    <i class="fas fa-money-bill-wave" style="color: #27ae60; margin-right: 10px; margin-top: 3px;"></i>
                    <div>
                        <strong>Estimasi Harga</strong>
                        <p style="margin: 5px 0 0 0;">Estimasi harga bisa berubah setelah diagnosa di tempat</p>
                    </div>
                </div>
                <div style="display: flex; align-items: flex-start;">
                    <i class="fas fa-credit-card" style="color: #e74c3c; margin-right: 10px; margin-top: 3px;"></i>
                    <div>
                        <strong>Pembayaran</strong>
                        <p style="margin: 5px 0 0 0;">Pembayaran dilakukan setelah servis selesai</p>
                    </div>
                </div>
                <div style="display: flex; align-items: flex-start;">
                    <i class="fas fa-shield-alt" style="color: #9b59b6; margin-right: 10px; margin-top: 3px;"></i>
                    <div>
                        <strong>Garansi</strong>
                        <p style="margin: 5px 0 0 0;">Garansi servis berlaku 30 hari untuk kerusakan yang sama</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>