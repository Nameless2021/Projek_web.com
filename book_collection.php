<?php
session_start();
$books = array(
    array(
        "title" => "Harry Potter and the Philosopher's Stone",
        "image" => "Harry_potter1.png",
        "category" => "fiction",
        "id" => 1,
        "description" => "Harry Potter's life changes forever when he receives his letter of acceptance to Hogwarts School of Witchcraft and Wizardry.",
    ),
    array(
        "title" => "Harry Potter and the Chamber of Secrets",
        "image" => "Harry_potter2.png",
        "category" => "fiction",
        "id" => 2,
        "description" => "The Chamber of Secrets has been opened and the heir of Slytherin is on the loose. Harry, Ron, and Hermione must uncover the truth before it's too late.",
    ),
    array(
        "title" => "Harry Potter and the Prisoner of Azkaban",
        "image" => "Harry_potter3.png",
        "category" => "history",
        "id" => 3,
        "description" => "Sirius Black, a dangerous fugitive, has escaped from Azkaban Prison and is on the loose. Harry must confront the truth about his past.",
    ),
    array(
        "title" => "Harry Potter and the Goblet of Fire",
        "image" => "Harry_potter4.png",
        "category" => "education",
        "id" => 4,
        "description" => "The Triwizard Tournament brings excitement and danger to Hogwarts as Harry competes against students from other wizarding schools.",
    ),
    array(
        "title" => "Harry Potter and the Order of the Phoenix",
        "image" => "Harry_potter5.png",
        "category" => "education",
        "id" => 5,
        "description" => "As Voldemort returns, Harry faces new challenges at Hogwarts while forming Dumbledore's Army to prepare for the battle ahead.",
    ),
    array(
        "title" => "Harry Potter and the Order of the Phoenix",
        "image" => "Harry_potter5.png",
        "category" => "education",
        "id" => 6,
        "description" => "As Voldemort returns, Harry faces new challenges at Hogwarts while forming Dumbledore's Army to prepare for the battle ahead.",
    ),
    array(
        "title" => "Harry Potter and the Philosopher's Stone",
        "image" => "Harry_potter1.png",
        "category" => "fiction",
        "id" => 7,
        "description" => "Harry Potter's life changes forever when he receives his letter of acceptance to Hogwarts School of Witchcraft and Wizardry.",
    ),
    array(
        "title" => "Harry Potter and the Chamber of Secrets",
        "image" => "Harry_potter2.png",
        "category" => "fiction",
        "id" => 8,
        "description" => "The Chamber of Secrets has been opened and the heir of Slytherin is on the loose. Harry, Ron, and Hermione must uncover the truth before it's too late.",
    ),
    array(
        "title" => "Harry Potter and the Prisoner of Azkaban",
        "image" => "Harry_potter3.png",
        "category" => "history",
        "id" => 9,
        "description" => "Sirius Black, a dangerous fugitive, has escaped from Azkaban Prison and is on the loose. Harry must confront the truth about his past.",
    ),
    array(
        "title" => "Harry Potter and the Goblet of Fire",
        "image" => "Harry_potter4.png",
        "category" => "education",
        "id" => 10,
        "description" => "The Triwizard Tournament brings excitement and danger to Hogwarts as Harry competes against students from other wizarding schools.",
    ),
    array(
        "title" => "Harry Potter and the Order of the Phoenix",
        "image" => "Harry_potter5.png",
        "category" => "education",
        "id" => 11,
        "description" => "As Voldemort returns, Harry faces new challenges at Hogwarts while forming Dumbledore's Army to prepare for the battle ahead.",
    ),
    array(
        "title" => "Harry Potter and the Order of the Phoenix",
        "image" => "Harry_potter5.png",
        "category" => "education",
        "id" => 12,
        "description" => "As Voldemort returns, Harry faces new challenges at Hogwarts while forming Dumbledore's Army to prepare for the battle ahead.",
    ),
    // tambahkan buku lainnya sesuai kebutuhan
);


function displayBooks($category, $search) {
    global $books;
    $found = false;
    echo '<div class="books-container">';
    foreach ($books as $book) {
        if (($category === 'all' || $book['category'] === $category) && 
            ($search === '' || stripos($book['title'], $search) !== false)) {
            echo "<div class='book'>";
            echo "<a href='book_detail.php?id={$book['id']}'>";
            echo "<img src='covers/{$book['image']}' alt='{$book['title']}'>";
            echo "</a>";
            echo "<div class='book-info'>";
            echo "<h3>{$book['title']}</h3>";
            echo "<p>{$book['description']}</p>";
            echo "<a href='book_detail.php?id={$book['id']}' class='read-more'>Read More</a>";
            echo "</div>";
            echo "</div>";
            $found = true;
        }
    }
    echo '</div>';
    if (!$found) {
        echo "<p>No books found matching your criteria.</p>";
    }
}

// Ambil kategori yang dipilih dari URL (dari form dropdown)
$category = isset($_GET['category']) ? $_GET['category'] : 'all'; // default kategori 'All'
$search = isset($_GET['search']) ? $_GET['search'] : ''; // default tanpa pencarian
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Koleksi Buku</title>
    <link rel="stylesheet" href="koleksii.css">
    <script src="koleksi.js" defer></script>
</head>
<body>
    <?php
        if (isset($_SESSION['userid']) && $_SESSION['role'] === 'user') {
            include 'navbar_loginn.php'; // Sertakan navbar untuk pengguna sudah login
        } else {
            include 'navbar_tamu.php'; // Sertakan navbar untuk pengguna belum login
        }
        ?>

    <!-- <h1>Book Collection</h1>
    <form action="book_collection.php" method="GET">
        <label for="category">Choose a category:</label>
        <select name="category" id="category">
            <option value="all" selected>All</option>
            <option value="fiction">Fiction</option>
            <option value="non-fiction">Non-Fiction</option>
            <option value="history">History</option>
            <option value="education">Education</option>
        </select>
        <label for="search">Search:</label>
        <input type="text" name="search" id="search">
        <input type="submit" value="Filter">
    </form> -->

    <!-- Button untuk advanced search -->
    <button type="button" id="advancedSearchBtn">Pencarian Lanjutan</button>
    <!-- <button type="button" id="advancedSearchBtn">Pencarian Lanjutan</button> -->

    <!-- Pop-up container untuk advanced search -->
    <div id="advancedSearchContainer" class="popup-container">
    <span id="closeAdvancedSearch" class="close-icon">×</span>
    <h3>Pencarian Lanjutan</h3>
    <form action="book_collection.php" method="GET">
    <h4>Sering Genre</h4>
    <div class="checkbox-group">
            <div class="checkbox-column">
                <label><input type="checkbox" name="genre_administrasi"> Administrasi</label>
                <label><input type="checkbox" name="genre_agama"> Agama</label>
                <label><input type="checkbox" name="genre_ekonomi"> Ekonomi</label>
                <label><input type="checkbox" name="genre_ensiklopedia"> Ensiklopedia</label>
            </div>
            <div class="checkbox-column">
                <label><input type="checkbox" name="genre_fiksi"> Fiksi</label>
                <label><input type="checkbox" name="genre_humor"> Humor</label>
                <label><input type="checkbox" name="genre_inspirasi"> Inspirasi</label>
                <label><input type="checkbox" name="genre_sejarah"> Sejarah</label>
            </div>
            </div>
        <!-- <div class="apply-filters">
            <input type="submit" value="Terapkan">
        </div> -->
    </form>
</div>
    <h2 style="margin: 20px 20px 0px 40px;">Semua Buku</h2>
    <h5 style="margin: 0px 0px 0px 40px;">Tingkatkan literasi membacamu hari ini!</h5>
    <?php
    // Panggil fungsi untuk menampilkan buku sesuai kategori dan pencarian yang dipilih
    displayBooks($category, $search);
    ?>

</body>
</html>
