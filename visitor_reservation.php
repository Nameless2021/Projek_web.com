<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menangkap data dari formulir reservasi
    $full_name = $_POST['full_name'] ?? '';
    $occupation = $_POST['occupation'] ?? '';
    $address = $_POST['address'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $reservation_date = $_POST['reservation_date'] ?? '';

    // Validasi jika semua input telah diisi
    if (empty($full_name) || empty($occupation) || empty($address) || empty($phone_number) || empty($gender) || empty($reservation_date)) {
        // Jika ada data yang kosong, tampilkan pesan error
        $error_message = "Mohon lengkapi semua kolom.";
    } else {
        // Simpan data reservasi ke dalam array (simulasi database atau implementasi sesuai kebutuhan)
        $reservation = array(
            "full_name" => $full_name,
            "occupation" => $occupation,
            "address" => $address,
            "phone_number" => $phone_number,
            "gender" => $gender,
            "reservation_date" => $reservation_date,
            "status" => "Pending" // Status default reservasi
        );

        // Simpan data reservasi ke dalam file atau database, ini hanya simulasi
        // Di sini kita menggunakan file untuk menyimpan data reservasi
        $reservations = [];
        if (file_exists('reservations.json')) {
            $json_data = file_get_contents('reservations.json');
            $reservations = json_decode($json_data, true);
        }

        // Tambahkan reservasi baru ke dalam array
        $reservations[] = $reservation;

        // Simpan array reservasi ke dalam file JSON
        file_put_contents('reservations.json', json_encode($reservations, JSON_PRETTY_PRINT));

        // Pesan bahwa reservasi berhasil diterima
        $message = "Terima kasih, " . htmlspecialchars($full_name) . ". Kami akan mengirimkan pesan konfirmasi setelah reservasi Anda disetujui.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservasi Event Perpustakaan Keliling</title>
    <link rel="stylesheet" href="reservasii.css">
</head>
<body>
    <<div class="reservation-form-container">
        <h2>RESERVASI EVENT PERPUSTAKAAN KELILING</h2>
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php elseif (isset($message)): ?>
            <p style="color: green;"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="full_name">No. Anggota</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>

            <div class="form-group">
                <label for="occupation">Event</label>
                <input type="text" id="occupation" name="occupation" required>
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" id="address" name="address" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Nomor Telepon</label>
                <input type="text" id="phone_number" name="phone_number" required>
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <input type="text" id="gender" name="gender" required>
            </div>

            <div class="form-group">
                <label for="reservation_date">Tanggal Reservasi</label>
                <input type="date" id="reservation_date" name="reservation_date" required>
            </div>

            <div class="form-group">
                <label for="captcha">Captcha</label>
                <div class="captcha-container">
                    <input type="text" id="captcha" name="captcha" required>
                    <input type="text" id="captcha_input" name="captcha_input" required>
                </div>
            </div>

            <button type="submit">Reservasi</button>
        </form>
    </div>
</body>
</html>
