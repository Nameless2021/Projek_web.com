<?php
session_start();

if (!isset($_SESSION['userid']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <script>
        let currentIndex = 0;

        function showNextImage() {
            const images = document.querySelectorAll('.carousel img');
            currentIndex = (currentIndex + 1) % images.length;
            images.forEach((img, index) => {
                img.style.transform = `translateX(-${currentIndex * 100}%)`;
            });
        }

        setInterval(showNextImage, 3000);

        function toggleDropdown() {
            const dropdown = document.getElementById('user-settings-dropdown');
            dropdown.classList.toggle('show');
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn, .dropbtn img')) {
                const dropdowns = document.getElementsByClassName('dropdown-content');
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</head>
<body>
    <header>
        <a href="admin_dashboard.php">
            <img src="logo.png" alt="Library Logo" class="logo">
        </a>
        <div class="header-links">
            <li class="search-form">
                <form action="search.php" method="get">
                    <input type="text" name="book_title" placeholder="Cari Judul/Pengarang/ISBN...">
                </form>
            </li>
            <a href="view_profile.php"><img src="profile_icon.png" alt="View Profile" class="nav-icon"></a>
            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown()">
                    <img src="gear_icon.png" alt="User Settings">
                </button>
                <div id="user-settings-dropdown" class="dropdown-content">
                    <a href="admin_settings.php">Settings</a>
                    <a href="delete_account.php">Delete Account</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="manage_books.php">Manage Books</a></li>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="manage_reservations.php">Manage Reservations</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="admin_settings.php">Settings</a></li>
            <li><a href="add_agenda.php">Add Literacy Agenda</a></li>
        </ul>
    </nav>
    <section>
        <div class="admin-dashboard">
            <h2>Admin Dashboard</h2>
            <div class="stats">
                <div class="stat-box">
                    <h3>Total Books</h3>
                    <p>1500</p>
                </div>
                <div class="stat-box">
                    <h3>Total Users</h3>
                    <p>300</p>
                </div>
                <div class="stat-box">
                    <h3>Reservations</h3>
                    <p>120</p>
                </div>
                <div class="stat-box">
                    <h3>Issues Reported</h3>
                    <p>15</p>
                </div>
            </div>
        </div>
    </section>
    <section class="recent-activities">
        <h3>Recent Activities</h3>
        <div class="activity-log">
            <p>User <strong>john_doe</strong> reserved <em>The Great Gatsby</em></p>
            <p>User <strong>jane_smith</strong> returned <em>1984</em></p>
            <p>New book <em>The Catcher in the Rye</em> added</p>
            <p>User <strong>admin</strong> updated profile</p>
        </div>
    </section>
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <img src="logo.png" alt="Library Logo">
            </div>
            <div class="footer-links">
                <div class="footer-info">
                    <h4>Informasi & Bantuan</h4>
                    <ul>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="whatsapp://send?phone=6281234567890">WhatsApp</a></li>
                        <li><a href="tentang_kami.php">Tentang Kami</a></li>
                        <li><a href="mailto:info@domain.com">Email</a></li>
                        <li><a href="kebijakan_privasi.php">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="footer-additional">
                    <h4>Syarat & Ketentuan</h4>
                    <ul>
                        <li><a href="keanggotaan.php">Keanggotaan</a></li>
                        <li><a href="peminjaman.php">Peminjaman</a></li>
                        <li><a href="pengembalian.php">Pengembalian</a></li>
                    </ul>
                </div>
                <div class="footer-shortcuts">
                    <h4>Pintasan</h4>
                    <ul>
                        <li><a href="akun.php">Akun</a></li>
                        <li><a href="buku_favorit.php">Buku Favorit</a></li>
                        <li><a href="riwayat_pinjaman.php">Riwayat Pinjaman</a></li>
                        <li><a href="aktifitas.php">Aktifitas</a></li>
                        <li><a href="riwayat_ulasan.php">Riwayat Ulasan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
