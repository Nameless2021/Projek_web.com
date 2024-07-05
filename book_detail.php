<?php
session_start();
$books = array(
    array(
        "id" => 1,
        "title" => "Harry Potter and the Philosopher's Stone",
        "category" => "fiction",
        "author" => "J.K. Rowling",
        "summary" => "A young wizard's journey at Hogwarts.",
        "image" => "Harry_potter1.png",
        "description" => "Harry Potter's life changes forever when he receives his letter of acceptance to Hogwarts School of Witchcraft and Wizardry.",
        "edition" => "Cetakan Pertama",
        "publisher" => "United Kingdom : Bloomsbury Publishing, 2023",
        "physical_description" => "xi + 340 halaman : ilustrasi ; 21 x 14 cm",
        "isbn" => "9781526664587",
        "subject" => "Fiksi Asing",
        "language" => "Inggris",
        "call_number" => "823 MIL c"
    ),
    array(
        "id" => 2,
        "title" => "Harry Potter and the Chamber of Secrets",
        "category" => "fiction",
        "author" => "J.K. Rowling",
        "summary" => "The Chamber of Secrets has been opened and the heir of Slytherin is on the loose. Harry, Ron, and Hermione must uncover the truth before it's too late.",
        "image" => "Harry_potter2.png",
        "description" => "The Chamber of Secrets has been opened and the heir of Slytherin is on the loose. Harry, Ron, and Hermione must uncover the truth before it's too late.",
        "edition" => "Cetakan Kedua",
        "publisher" => "United Kingdom : Bloomsbury Publishing, 2024",
        "physical_description" => "xii + 360 halaman : ilustrasi ; 22 x 15 cm",
        "isbn" => "9781526664588",
        "subject" => "Fiksi Fantasi",
        "language" => "Inggris",
        "call_number" => "823 ROW c"
    ),
    array(
        "id" => 3,
        "title" => "Harry Potter and the Prisoner of Azkaban",
        "category" => "fiction",
        "author" => "J.K. Rowling",
        "summary" => "Sirius Black, a dangerous fugitive, has escaped from Azkaban Prison and is on the loose. Harry must confront the truth about his past.",
        "image" => "Harry_potter3.png",
        "description" => "Sirius Black, a dangerous fugitive, has escaped from Azkaban Prison and is on the loose. Harry must confront the truth about his past.",
        "edition" => "Cetakan Ketiga",
        "publisher" => "United Kingdom : Bloomsbury Publishing, 2025",
        "physical_description" => "xiii + 380 halaman : ilustrasi ; 23 x 16 cm",
        "isbn" => "9781526664589",
        "subject" => "Fiksi Petualangan",
        "language" => "Inggris",
        "call_number" => "823 ROW p"
    ),
    array(
        "id" => 4,
        "title" => "Harry Potter and the Goblet of Fire",
        "category" => "fiction",
        "author" => "J.K. Rowling",
        "summary" => "The Triwizard Tournament brings excitement and danger to Hogwarts as Harry competes against students from other wizarding schools.",
        "image" => "Harry_potter4.png",
        "description" => "The Triwizard Tournament brings excitement and danger to Hogwarts as Harry competes against students from other wizarding schools.",
        "edition" => "Cetakan Keempat",
        "publisher" => "United Kingdom : Bloomsbury Publishing, 2026",
        "physical_description" => "xiv + 400 halaman : ilustrasi ; 24 x 17 cm",
        "isbn" => "9781526664590",
        "subject" => "Fiksi Fantasi",
        "language" => "Inggris",
        "call_number" => "823 ROW g"
    ),
    array(
        "id" => 5,
        "title" => "Harry Potter and the Order of the Phoenix",
        "category" => "fiction",
        "author" => "J.K. Rowling",
        "summary" => "As Voldemort returns, Harry faces new challenges at Hogwarts while forming Dumbledore's Army to prepare for the battle ahead.",
        "image" => "Harry_potter5.png",
        "description" => "As Voldemort returns, Harry faces new challenges at Hogwarts while forming Dumbledore's Army to prepare for the battle ahead.",
        "edition" => "Cetakan Kelima",
        "publisher" => "United Kingdom : Bloomsbury Publishing, 2027",
        "physical_description" => "xv + 420 halaman : ilustrasi ; 25 x 18 cm",
        "isbn" => "9781526664591",
        "subject" => "Fiksi Fantasi",
        "language" => "Inggris",
        "call_number" => "823 ROW o"
    ),
);
// Ambil id buku dari URL
if (!isset($_GET['id'])) {
    header("Location: book_collection.php");
    exit();
}
$bookId = $_GET['id'];

// Temukan buku berdasarkan $bookId
$book = null;
foreach ($books as $b) {
    if ($b['id'] == $bookId) {
        $book = $b;
        break;
    }
}

// Jika buku tidak ditemukan, kembalikan ke halaman koleksi buku
if (!$book) {
    header("Location: book_collection.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <title>Book Detail - <?php echo $book['title']; ?></title>
    <link rel="stylesheet" href="detail_buku.css">
    <head>
    <!-- <script>
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
    </script> -->
</head>
<body>
    <?php
        if (isset($_SESSION['userid']) && $_SESSION['role'] === 'user') {
            include 'navbar_loginn.php'; // Sertakan navbar untuk pengguna sudah login
        } else {
            include 'navbar_tamu.php'; // Sertakan navbar untuk pengguna belum login
        }
        ?>
<body>
<div class="book-details">
<div class="loan-container">
        <h3>Pinjam Buku Ini</h3>
        <a href="login.php" class="loan-button">+ Peminjaman</a>
        <div class="share-container">
            <img src="bagikan_icon.png" alt="Share Icon" class="share-icon">
            <span>Bagikan</span>
        </div>
    </div>
    <h1><?php echo htmlspecialchars($book['title']); ?></h1>
    <p style=" font-size: 16px;"><strong><?php echo htmlspecialchars($book['author']); ?> - Pengarang</strong> </p>
    <p>
        <img src="kategori.png" alt="Category Icon" class="category-icon"> 
        <span class="category-name" style="font-size: 16px; text-transform: uppercase; "><?php echo ucfirst(htmlspecialchars($book['category'])); ?></span>
    </p>
    <hr>
    <h4 style="color: #002C61;">Deskripsi</h4>
    <p><?php echo htmlspecialchars($book['description']); ?></p>
    <hr>

    <p><strong>Edisi:</strong> <?php echo htmlspecialchars($book['edition']); ?></p>
        <p><strong>Penerbit:</strong> <?php echo htmlspecialchars($book['publisher']); ?></p>
        <p><strong>Deskripsi Fisik:</strong> <?php echo htmlspecialchars($book['physical_description']); ?></p>
        <p><strong>ISBN:</strong> <?php echo htmlspecialchars($book['isbn']); ?></p>
        <p><strong>Subjek:</strong> <?php echo htmlspecialchars($book['subject']); ?></p>
        <p><strong>Bahasa:</strong> <?php echo htmlspecialchars($book['language']); ?></p>
        <p><strong>Call Number:</strong> <?php echo htmlspecialchars($book['call_number']); ?></p>
    <hr>
    <p><strong>Dapat dipinjam: 5</strong></p>
    <a href="book_collection.php">Buku Rekomendasi Lainnya</a>

</div>
<div class="book-image">
    <img src="covers/<?php echo isset($book['image']) ? htmlspecialchars($book['image']) : 'default.jpg'; ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
</div>
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

</body>
</html>
