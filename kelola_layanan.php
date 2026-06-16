<?php
require_once 'includes/config.php';
require_once 'includes/database.php';

// Handle edit mode
$edit_mode = false;
$edit_data = null;

if (isset($_GET['edit'])) {
    $edit_id = mysqli_real_escape_string($conn, $_GET['edit']);
    $edit_query = "SELECT * FROM services WHERE id = '$edit_id'";
    $edit_result = mysqli_query($conn, $edit_query);
    
    if (mysqli_num_rows($edit_result) > 0) {
        $edit_mode = true;
        $edit_data = mysqli_fetch_assoc($edit_result);
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete']);
    $delete_query = "DELETE FROM services WHERE id = '$id'";
    
    if (mysqli_query($conn, $delete_query)) {
        $success = "Layanan berhasil dihapus!";
    } else {
        $error = "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

// Handle form submission for BOTH add and edit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    
    if ($edit_mode && isset($_POST['service_id'])) {
        // UPDATE existing service
        $service_id = mysqli_real_escape_string($conn, $_POST['service_id']);
        $update_query = "UPDATE services SET 
                        name = '$name',
                        description = '$description',
                        price = '$price',
                        image_url = '$image_url',
                        category = '$category',
                        duration = '$duration'
                        WHERE id = '$service_id'";
        
        if (mysqli_query($conn, $update_query)) {
            $success = "Layanan berhasil diperbarui!";
            $edit_mode = false;
        } else {
            $error = "Terjadi kesalahan: " . mysqli_error($conn);
        }
    } else {
        // INSERT new service
        $insert_query = "INSERT INTO services (name, description, price, image_url, category, duration) 
                         VALUES ('$name', '$description', '$price', '$image_url', '$category', '$duration')";
        
        if (mysqli_query($conn, $insert_query)) {
            $success = "Layanan berhasil ditambahkan!";
        } else {
            $error = "Terjadi kesalahan: " . mysqli_error($conn);
        }
    }
}

// Get all services for manage view
$services_query = "SELECT * FROM services ORDER BY created_at ASC";
$services_result = mysqli_query($conn, $services_query);

// Check if we're in manage mode - HANYA JIKA action=manage DAN TIDAK SEDANG EDIT
$manage_mode = (isset($_GET['action']) && $_GET['action'] == 'manage' && !isset($_GET['edit']));
?>
<?php 
// Tentukan judul halaman
if ($edit_mode) {
    $page_title = "Edit Layanan";
} elseif ($manage_mode) {
    $page_title = "Kelola Layanan";
} else {
    $page_title = "Tambah Layanan";
}
include 'includes/header.php'; 
?>

<div class="container admin-container">
    <h1 class="text-center"><?php echo $page_title; ?></h1>
    
    <?php if (isset($success)): ?>
    <div class="alert alert-success">
        <?php echo $success; ?>
        <a href="kelola_layanan.php?action=manage" class="btn-primary btn-sm" style="float: right;">Lihat Semua Layanan</a>
    </div>
    <?php endif; ?>
    
    <?php if (isset($error)): ?>
    <div class="alert alert-error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <?php if ($edit_mode || !$manage_mode): ?>
    <!-- Form Tambah/Edit Layanan -->
    <div class="form-container" style="max-width: 800px;">
        <form method="POST" action="">
            <?php if ($edit_mode): ?>
                <input type="hidden" name="service_id" value="<?php echo $edit_data['id']; ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label for="name">Nama Layanan *</label>
                <input type="text" name="name" id="name" class="form-control" 
                       value="<?php echo $edit_mode ? htmlspecialchars($edit_data['name']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="category">Kategori *</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Air Conditioner" <?php echo ($edit_mode && $edit_data['category'] == 'Air Conditioner') ? 'selected' : ''; ?>>Air Conditioner</option>
                    <option value="Laundry" <?php echo ($edit_mode && $edit_data['category'] == 'Laundry') ? 'selected' : ''; ?>>Laundry</option>
                    <option value="Refrigerator" <?php echo ($edit_mode && $edit_data['category'] == 'Refrigerator') ? 'selected' : ''; ?>>Refrigerator</option>
                    <option value="Television" <?php echo ($edit_mode && $edit_data['category'] == 'Television') ? 'selected' : ''; ?>>Television</option>
                    <option value="Computer" <?php echo ($edit_mode && $edit_data['category'] == 'Computer') ? 'selected' : ''; ?>>Computer</option>
                    <option value="Fan" <?php echo ($edit_mode && $edit_data['category'] == 'Fan') ? 'selected' : ''; ?>>Fan</option>
                    <option value="Kitchen" <?php echo ($edit_mode && $edit_data['category'] == 'Kitchen') ? 'selected' : ''; ?>>Kitchen</option>
                    <option value="Other" <?php echo ($edit_mode && $edit_data['category'] == 'Other') ? 'selected' : ''; ?>>Lainnya</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="description">Deskripsi Layanan *</label>
                <textarea name="description" id="description" class="form-control" rows="4" required><?php echo $edit_mode ? htmlspecialchars($edit_data['description']) : ''; ?></textarea>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label for="price">Harga (Rp) *</label>
                    <input type="number" name="price" id="price" class="form-control" min="0" 
                           value="<?php echo $edit_mode ? $edit_data['price'] : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="duration">Durasi Servis *</label>
                    <input type="text" name="duration" id="duration" class="form-control" 
                           value="<?php echo $edit_mode ? htmlspecialchars($edit_data['duration']) : ''; ?>" placeholder="Contoh: 2-3 Jam" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="image_url">URL Gambar *</label>
                <input type="url" name="image_url" id="image_url" class="form-control" 
                       value="<?php echo $edit_mode ? htmlspecialchars($edit_data['image_url']) : ''; ?>" required>
                <small>Gunakan URL gambar dari Unsplash atau sumber lain</small>
            </div>
            
            <div class="text-center" style="margin-top: 30px;">
                <button type="submit" class="btn-primary" style="width: 200px;">
                    <i class="fas fa-save"></i> <?php echo $edit_mode ? 'Update Layanan' : 'Simpan Layanan'; ?>
                </button>
                <a href="kelola_layanan.php?action=manage" class="btn-secondary" style="margin-left: 10px;">Batal</a>
            </div>
        </form>
    </div>
    
    <?php elseif ($manage_mode): ?>
    <!-- Tabel Kelola Layanan -->
    <div class="admin-actions">
        <a href="kelola_layanan.php" class="btn-primary"><i class="fas fa-plus-circle"></i> Tambah Layanan Baru</a>
    </div>
    
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Layanan</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($services_result) > 0): ?>
                    <?php while($service = mysqli_fetch_assoc($services_result)): ?>
                    <tr>
                        <td><?php echo $service['id']; ?></td>
                        <td>
                            <strong><?php echo htmlspecialchars($service['name']); ?></strong>
                            <p style="font-size: 0.9rem; color: #666; margin-top: 5px;">
                                <?php echo substr(htmlspecialchars($service['description']), 0, 80); ?>...
                            </p>
                        </td>
                        <td><?php echo htmlspecialchars($service['category']); ?></td>
                        <td>Rp <?php echo number_format($service['price'], 0, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($service['duration']); ?></td>
                        <td>
                            <a href="kelola_layanan.php?edit=<?php echo $service['id']; ?>" class="btn-edit btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="kelola_layanan.php?action=manage&delete=<?php echo $service['id']; ?>" 
                               class="btn-delete btn-sm"
                               onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 30px;">
                            <p>Belum ada layanan tersedia.</p>
                            <a href="kelola_layanan.php" class="btn-primary">Tambah Layanan Pertama</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>