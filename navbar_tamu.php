<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="navbar_tamu.css">
</head>
<body>
    <header>
        <a href="index.php">
            <img src="logo.png" alt="Library Logo" class="logo">
        </a>  
        <div class="header-search">
            <form action="search.php" method="get" class="search-form">
                <input type="text" name="book_title" placeholder="Cari Judul/Pengarang/ISBN...">
            </form>
        </div>
        <div class="header-links">
            <a href="login.php" class="log-button">Masuk</a>    
            <a href="register.php" class="reg-button">Daftar</a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="book_collection.php">Koleksi Buku</a></li>
            <li><a href="login.php?redirect=visitor_reservation.php">Reservasi Kunjungan</a></li>
            <li><a href="login.php?redirect=e_resources.php">E-Resources</a></li>
            <li><a href="literacy_agenda.php">Agenda Literasi</a></li>
            <li><a href="pusling_schedule.php">Jadwal Pusling</a></li>
            <li><a href="library_location.php">Lokasi Perpustakaan</a></li>
        </ul>
    </nav>
</body>
</html>
