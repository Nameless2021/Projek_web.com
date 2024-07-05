<?php
// Pastikan untuk memulai session sebelum mengakses $_SESSION
session_start();

// Data jadwal perpustakaan keliling (simulasi dari database)
$schedules = array(
    array("tanggal" => "2024-06-25", "waktu" => "10:00 - 12:00", "lokasi" => "Lapangan Kota A", "alamat" => "Jl. Merdeka No. 123", "deskripsi" => "Kunjungan rutin mingguan", "pemesan" => "Pak Budi"),
    array("tanggal" => "2024-06-26", "waktu" => "09:00 - 11:00", "lokasi" => "Taman Kota B", "alamat" => "Jl. Pahlawan No. 456", "deskripsi" => "Kunjungan ke taman kota", "pemesan" => "Bu Siti"),
    array("tanggal" => "2024-06-27", "waktu" => "13:00 - 15:00", "lokasi" => "Sekolah C", "alamat" => "Jl. Guru No. 789", "deskripsi" => "Kunjungan ke sekolah dasar", "pemesan" => "Pak Joko"),
    array("tanggal" => "2024-06-28", "waktu" => "14:00 - 16:00", "lokasi" => "Perumahan D", "alamat" => "Jl. Anggrek No. 567", "deskripsi" => "Kunjungan ke perumahan", "pemesan" => "Bu Ani")
    // tambahkan jadwal lainnya sesuai kebutuhan
);

// Fungsi untuk menampilkan jadwal berdasarkan filter
function displaySchedules($place, $booker) {
    global $schedules;
    $found = false;
    foreach ($schedules as $schedule) {
        if (($place === '' || stripos($schedule['lokasi'], $place) !== false) &&
            ($booker === '' || stripos($schedule['pemesan'], $booker) !== false)) {
            echo "<div class='schedule'>";
            echo "<div class='schedule-content'>";
            echo "<h2>" . htmlspecialchars($schedule['tanggal']) . " - " . htmlspecialchars($schedule['waktu']) . "</h2>";
            echo "<p><strong>Lokasi:</strong> " . htmlspecialchars($schedule['lokasi']) . "</p>";
            echo "<p><strong>Alamat:</strong> " . htmlspecialchars($schedule['alamat']) . "</p>";
            echo "<p><strong>Deskripsi:</strong> " . htmlspecialchars($schedule['deskripsi']) . "</p>";
            echo "<p><strong>Pemesan:</strong> " . htmlspecialchars($schedule['pemesan']) . "</p>";
            echo "<a href='" . generateGoogleMapsUrl($schedule['alamat']) . "' target='_blank' class='maps-link'>Lihat di Google Maps</a>";
            echo "</div>";
            echo "</div>";
            $found = true;
        }
    }
    if (!$found) {
        echo "<p>No schedules found matching your criteria.</p>";
    }
}

function generateGoogleMapsUrl($alamat) {
    // Menggunakan urlencode untuk memastikan alamat yang aman untuk URL
    $mapsUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($alamat);
    return $mapsUrl;
}

$place = isset($_GET['place']) ? $_GET['place'] : '';
$booker = isset($_GET['booker']) ? $_GET['booker'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pusling Schedule</title>
    <link rel="stylesheet" href="jadwalpusling.css">
</head>
<body>
    <?php
    if (isset($_SESSION['userid']) && $_SESSION['role'] === 'user') {
        include 'navbar_loginn.php'; // Sertakan navbar untuk pengguna sudah login
    } else {
        include 'navbar_tamu.php'; // Sertakan navbar untuk pengguna belum login
    }
    ?>
    <h1>Pusling Schedule</h1>
    <form action="pusling_schedule.php" method="GET" class="schedule-search-form">
    <input type="text" name="place" placeholder="Search by Place" value="<?php echo htmlspecialchars($place); ?>">
    <input type="text" name="booker" placeholder="Search by Booker" value="<?php echo htmlspecialchars($booker); ?>">
    <input type="submit" value="Search">
</form>


    <div class="schedule-list">
        <?php
        // Panggil fungsi untuk menampilkan jadwal berdasarkan filter
        displaySchedules($place, $booker);
        ?>
    </div>
</body>
</html>
