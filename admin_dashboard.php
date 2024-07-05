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
    <title>User Dashboard</title>
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
    </script></script>
</head>
<body>
    <header>
        <a href="user_dashboard.php">
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
                    <a href="user_settings.php">Settings</a>
                    <a href="delete_account.php">Delete Account</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="book_collection.php">Koleksi Buku</a></li>
            <li><a href="visitor_reservation.php">Reservasi Kunjungan</a></li>
            <li><a href="e_resources.php">E-Resources</a></li>
            <li><a href="literacy_agenda.php">Agenda Literasi</a></li>
            <li><a href="pusling_schedule.php">Jadwal Pusling</a></li>
            <li><a href="library_location.php">Lokasi Perpustakaan</a></li>
        </ul>
    </nav>
    <section>
        <!-- <h2>Popular Books</h2> -->
        <div class="additional-content"></div>
    <div class="overlay-container">
        <h3 class="recommendation-title">Rekomendasi Buku</h3>
        <h4 class="recommendation-subtitle">Tingkatkan literasi membacamu hari ini!</h4>
    <!-- <div class="carousel-container"> -->
        <!-- <div class="carousel"> -->
            <div class="books-wrapper">
                <div class="book">
                <a href="book_detail.php?id=1">
                    <img src="Harry_potter1.png" alt="Harry Potter Book1">
                    <div class="book-details">
                        <h5 class="book-title">Harry Potter and the Philosopher's Stone</h5>
                        <div class="caption">The first book in the Harry Potter series.</div>
                        <a href="book_detail.php?id=1" class="read-more">Read More</a>
                    </div>
                </div>
                <div class="book">
                <a href="book_detail.php?id=2">
                    <img src="Harry_potter2.png" alt="Harry Potter Book2">
                    <div class="book-details">
                        <h5 class="book-title">Harry Potter and the Chamber of Secrets</h5>
                        <div class="caption">The second book in the Harry Potter series.</div>
                        <a href="book_detail.php?id=2" class="read-more">Read More</a>
                    </div>
                </div>
                <div class="book">
                <a href="book_detail.php?id=3">
                    <img src="Harry_potter3.png" alt="Harry Potter Book3">
                    <div class="book-details">
                        <h5 class="book-title">Harry Potter and the Prisoner of Azkaban</h5>
                        <div class="caption">The third book in the Harry Potter series.</div>
                        <a href="book_detail.php?id=3" class="read-more">Read More</a>
                    </div>
                </div>
                <div class="book">
                <a href="book_detail.php?id=4">
                    <img src="Harry_potter4.png" alt="Harry Potter Book4">
                    <div class="book-details">
                        <h5 class="book-title">Harry Potter and the Goblet of Fire</h5>
                        <div class="caption">The fourth book in the Harry Potter series.</div>
                        <a href="book_detail.php?id=4" class="read-more">Read More</a>
                    </div>
                </div>
                <div class="book">
                <a href="book_detail.php?id=5">
                    <img src="Harry_potter5.png" alt="Harry Potter Book5">
                    <div class="book-details">
                        <h5 class="book-title">Harry Potter and the Order of the Phoenix</h5>
                        <div class="caption">The fifth book in the Harry Potter series.</div>
                        <a href="book_detail.php?id=5" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="scripts.js"></script>
     </div>
     <h3 class="main-topic-title">TOPIK UTAMA</h3>
     <div class="news-container">
        <div class="news-box">
            <img src="berita1.jpg" alt="News Image 1">
            <div class="news-content">
                <h4>ASN Disperpus Parepare Lolos Final Pustakawan Berprestasi Tingkat Nasional</h4>
                <div class="news-meta">HS - 22 MEI 2024</div>
                <p>DISPERPUSPAREPARE, NEWS - Pustakawan Dinas Perpustakaan Kota Parepare, Hery, S.I.P., M.I.P. lolos melaju ke babak final dalam ajang pemilihan Pustakawan Berprestasi Tingkat Nasional Tahun... </p>
                <a href="news_detail.php?id=1">Baca Selengkapnya</a>
            </div>
        </div>
        <div class="news-box">
            <img src="news_image2.jpg" alt="News Image 2">
            <div class="news-content">
                <h4>Judul Berita 2</h4>
                <p>Ringkasan berita 2 yang menarik dan informatif...</p>
                <a href="news_detail.php?id=2">Baca Selengkapnya</a>
            </div>
        </div>
        <div class="news-box">
            <img src="news_image3.jpg" alt="News Image 3">
            <div class="news-content">
                <h4>Judul Berita 3</h4>
                <p>Ringkasan berita 3 yang menarik dan informatif...</p>
                <a href="news_detail.php?id=3">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
        
    </section>
    <section class="ebook-container">
    <div class="ebook-content">
        <h3>Perpustakaan Berbasis Layanan Digital (PELITA)</h3>

    <div class="icon-container">
        <div class="ebook-icon ">
            <img src="ebook.png" alt="Icon E-Book">
        </div>
        <div class="file-icon">
            <img src="file.png" alt="Icon file">
        </div>
    </div>
    </div>
    </section>
    <section class="service-center">
    <div class="text-layanan">
        <h3 style="color: black;   margin-top: 50px; margin-left: 60px; font-size: 30px; font-weight: 900;">Menemukan Masalah?</h3>
        <h3 style="color: #002C61; margin-top: -9px; margin-left: 60px; font-size: 30px; font-weight: 900;">Kami Siap Membantu</h3>
    </div>
    <div class="service-box">
        <h3 style=" margin-top: 10px;">Hubungi Kami</h3>
    </div>
    <div class="service-box-faq">
        <h3 style="color: #002C61; margin-top: 10px;">FAQ</h3>
    </div>
</section>
<footer>
    <div class="footer-container">
        <div class="footer-logo">
            <img src="logo.png" alt="Logo Perpustakaan">
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

</form>
</body>
</html>
