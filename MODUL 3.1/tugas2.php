<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bilangan</title>
</head>
<body>

    <h2>Masukkan Angka</h2>
    <form method="POST">
        <label for="number">Masukkan bilangan bulat positif:</label>
        <input type="number" id="number" name="number" min="1" required>
        <button type="submit">Cetak</button>
    </form>

    <h3>Hasil:</h3>
    <div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil nilai input dari form
            $n = intval($_POST["number"]);

            // Fungsi cetakBilangan
            function cetakBilangan($n) {
                for ($i = 1; $i <= $n; $i++) {
                    if ($i % 4 == 0 && $i % 6 == 0) {
                        echo "PemrogramanWebsite 2024<br>";
                    } elseif ($i % 5 == 0) {
                        echo "2024<br>";
                    } elseif ($i % 4 == 0) {
                        echo "Pemrograman<br>";
                    } elseif ($i % 6 == 0) {
                        echo "Website<br>";
                    } else {
                        echo $i . "<br>";
                    }
                }
            }

            // Panggil fungsi dengan nilai input
            cetakBilangan($n);
        }
        ?>
    </div>

</body>
</html>
