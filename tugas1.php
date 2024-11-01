<?php

// Namespace
namespace App;

// Trait yang dapat digunakan oleh beberapa kelas
trait LoggerTrait {
    public function log($pesan) {
        echo "[Log]: " . $pesan . "\n";
    }
}

// Kelas abstrak untuk User
abstract class User {
    // Property
    protected $nama;
    protected $email;

    // Constructor
    public function __construct($nama, $email) {
        $this->nama = $nama;
        $this->email = $email;
    }

    // Abstract method
    abstract public function getRole();

    // Magic Method __toString
    public function __toString() {
        return "User: {$this->nama}, Email: {$this->email}";
    }
}

// Kelas Admin yang mewarisi User
class Admin extends User {
    // Menggunakan trait LoggerTrait
    use LoggerTrait;

    // Overriding method abstrak getRole
    public function getRole() {
        return "Admin";
    }

    // Method khusus Admin
    public function createPost($title) {
        $this->log("Admin '{$this->nama}' created a post with title '{$title}'");
        return "Post '{$title}' created!";
    }
}

// Kelas Member yang juga mewarisi User
class Member extends User {
    // Menggunakan trait LoggerTrait
    use LoggerTrait;

    // Overriding method abstrak getRole
    public function getRole() {
        return "Member";
    }

    // Method khusus Member
    public function readPost($title) {
        $this->log("Member '{$this->nama}' is reading the post '{$title}'");
        return "Reading post: '{$title}'";
    }
}

// Membuat objek Admin dan Member untuk pengujian
$admin = new Admin("uji", "uji@example.com");
$member = new Member("coba", "coba@example.com");

// Menampilkan informasi pengguna dan peran mereka
echo $admin . "\n";
echo "Role: " . $admin->getRole() . "\n";
echo $admin->createPost("Selamat datang") . "\n";

echo "\n";

echo $member . "\n";
echo "Role: " . $member->getRole() . "\n";
echo $member->readPost("Selamat datang") . "\n";
?>
