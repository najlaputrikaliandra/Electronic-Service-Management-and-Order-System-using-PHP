<?php
require_once 'includes/config.php';
require_once 'includes/database.php';

// Get all orders
$orders_query = "SELECT o.*, s.name as service_name, s.price 
                 FROM orders o 
                 JOIN services s ON o.service_id = s.id 
                 ORDER BY o.created_at ASC";
$orders_result = mysqli_query($conn, $orders_query);
?>
<?php 
$page_title = "Daftar Pesanan";
include 'includes/header.php'; 
?>

<div class="container admin-container">
    <h1 class="text-center">Daftar Pesanan Servis</h1>
    <p class="text-center section-subtitle">Semua pesanan yang masuk dari pelanggan</p>
    
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Telepon</th>
                    <th>Layanan</th>
                    <th>Tanggal Pesan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($orders_result) > 0): ?>
                    <?php while($order = mysqli_fetch_assoc($orders_result)): ?>
                    <tr>
                        <td>#<?php echo $order['id']; ?></td>
                        <td>
                            <strong><?php echo htmlspecialchars($order['customer_name']); ?></strong>
                            <?php if($order['customer_email']): ?>
                            <br><small><?php echo htmlspecialchars($order['customer_email']); ?></small>
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($order['customer_phone']); ?></td>
                        <td><?php echo htmlspecialchars($order['service_name']); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($order['order_date'])); ?></td>
                        <td>Rp <?php echo number_format($order['price'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px;">
                            <i class="fas fa-shopping-cart" style="font-size: 3rem; color: #ddd; margin-bottom: 20px;"></i>
                            <h3>Belum ada pesanan</h3>
                            <p>Belum ada pesanan yang masuk dari pelanggan.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <?php 
    // Get stats
    $total_orders = mysqli_query($conn, "SELECT COUNT(*) as count FROM orders");
    $total_orders = mysqli_fetch_assoc($total_orders)['count'];
    
    $total_revenue = mysqli_query($conn, "SELECT SUM(s.price) as total FROM orders o JOIN services s ON o.service_id = s.id");
    $total_revenue = mysqli_fetch_assoc($total_revenue)['total'] ?: 0;
    ?>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 40px;">
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;">
            <h3 style="color: #3498db;"><?php echo $total_orders; ?></h3>
            <p>Total Pesanan</p>
        </div>
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center;">
            <h3 style="color: #27ae60;">Rp <?php echo number_format($total_revenue, 0, ',', '.'); ?></h3>
            <p>Total Pendapatan</p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>