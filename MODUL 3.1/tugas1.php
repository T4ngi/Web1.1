<?php

// Namespace
namespace App;

// Trait yang dapat digunakan oleh beberapa kelas
trait CatatanTrait {
    public function catat($pesan) {
        echo "<span style='font-size: 18px;'>[Catatan]: " . $pesan . "</span><br>";
    }
}

// Kelas abstrak untuk Pengguna
abstract class Pengguna {
    // Properti
    protected $nama;
    protected $email;

    // Konstruktor
    public function __construct($nama, $email) {
        $this->nama = $nama;
        $this->email = $email;
    }

    // Metode abstrak
    abstract public function dapatkanPeran();

    // Magic Method __toString
    public function __toString() {
        return "<span style='font-size: 18px;'>Pengguna: {$this->nama}, Email: {$this->email}</span>";
    }
}

// Kelas Admin yang mewarisi Pengguna
class Admin extends Pengguna {
    use CatatanTrait;

    // Implementasi metode abstrak dapatkanPeran
    public function dapatkanPeran() {
        return "Admin";
    }

    // Metode khusus Admin
    public function buatPostingan($judul) {
        $this->catat("Admin '{$this->nama}' halo '{$judul}'");
        return "<span style='font-size: 18px;'>selamat '{$judul}' datang    !</span>";
    }
}

// Kelas Anggota yang juga mewarisi Pengguna
class Anggota extends Pengguna {
    use CatatanTrait;

    // Implementasi metode abstrak dapatkanPeran
    public function dapatkanPeran() {
        return "Anggota";
    }

    // Metode khusus Anggota
    public function bacaPostingan($judul) {
        $this->catat("Anggota '{$this->nama}' membaca postingan user '{$judul}'");
        return "<span style='font-size: 18px;'>Membaca postingan user: '{$judul}'</span>";
    }
}

// Membuat objek Admin dan Anggota untuk pengujian
$admin = new Admin("Coba", "Coba@contoh.com");
$anggota = new Anggota("Uji", "Uji@contoh.com");

// Menampilkan informasi pengguna dan peran mereka
echo "<div style='font-size: 18px;'>"; // Membungkus dengan <div> untuk ukuran font global
echo $admin . "<br>";
echo "Peran: " . $admin->dapatkanPeran() . "<br>";
echo $admin->buatPostingan("Pengenalan OOP di PHP") . "<br><br>";

echo $anggota . "<br>";
echo "Peran: " . $anggota->dapatkanPeran() . "<br>";
echo $anggota->bacaPostingan("Pengenalan OOP di PHP") . "<br>";
echo "</div>";

?>
