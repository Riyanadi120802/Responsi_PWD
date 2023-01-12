<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "responsi_pwd");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambahSiswa($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["NIS"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $jk = htmlspecialchars($data["jk"]);

    $query = "INSERT INTO siswa
				VALUES
			  ('','$nama', '$nis', '$kelas', '$jurusan', '$jk')
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahOrg($data)
{
    global $conn;

    $nama = htmlspecialchars($data["Nama"]);
    $jml = htmlspecialchars($data["jml"]);
    $query = "INSERT INTO organisasi
				VALUES ('','$nama', '$jml')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($nis)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id_Siswa = $nis");
    return mysqli_affected_rows($conn);
}

function hapusGuru($kode)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM guru WHERE Kode_Guru = $kode");
    return mysqli_affected_rows($conn);
}

function hapusOrg($kode)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM organisasi WHERE id_org = $kode");
    return mysqli_affected_rows($conn);
}

function jumlahSiswa($nama)
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM $nama";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["COUNT(*)"];
        }
    }
    // $conn->close();
}

function ubahSiswa($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $jk = htmlspecialchars($data["jk"]);

    $query = "UPDATE siswa SET
                Nama = '$nama',
                NIS = '$nis',
                Kelas = '$kelas',
                Jurusan = '$jurusan',
                Jenis_Kelamin = '$jk' WHERE id_Siswa = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahGuru($data)
{
    global $conn;

    $id = $data["id"];
    $nip = htmlspecialchars($data["nip"]);
    $nama = htmlspecialchars($data["nama"]);

    $query = "UPDATE guru SET
                Nama = '$nama',
                NIP = '$nip' WHERE Kode_Guru = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahOrg($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nip = htmlspecialchars($data["jml"]);

    $query = "UPDATE organisasi SET
                Nama = '$nama',
                Jumlah_Anggota = '$nip' WHERE id_org = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cariMhs($keyword)
{
    $query = "SELECT * FROM siswa
				WHERE
			  Nama LIKE '%$keyword%' OR
			  NIS LIKE '%$keyword%' OR
			  Kelas LIKE '%$keyword%' OR
			  Jurusan LIKE '%$keyword%' OR
              Jenis_Kelamin LIKE '%$keyword%'
			";
    return query($query);
}

function cariOrg($keyword)
{
    $query = "SELECT * FROM organisasi
				WHERE Nama LIKE '%$keyword%' OR Jumlah_Anggota LIKE '%$keyword%' ";
    return query($query);
}

function daftar($data)
{
    global $conn;
    $user = strtolower(stripslashes($data["username"]));
    $pass = mysqli_real_escape_string($conn, $data["password"]);
    $pass2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM  user WHERE username = '$user'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('Username .'$user'. sudah terdaftar');
                </script>";
        return false;
    }


    if ($pass != $pass2) {
        echo "<script>
                alert('Password tidak sesuai!');
            </script>";
        return false;
    }

    //enkripsi
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$user', '$pass')");

    return mysqli_affected_rows($conn);
}

function cek_session()
{
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location : index.php");
    } else {
        header("Location : login.php");
        exit;
    }
}

function cariGuru($keyword)
{
    $query = "SELECT * FROM guru
				WHERE
			  NIP LIKE '%$keyword%' OR
			  Nama LIKE '%$keyword%'
			";
    return query($query);
}

function tambahGuru($data)
{
    global $conn;

    $nama = htmlspecialchars($data["Nama"]);
    $nip = htmlspecialchars($data["NIP"]);
    $query = "INSERT INTO guru
				VALUES
			  ('','$nip', '$nama')
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function awal($key)
{
    global $conn;
    $query = "SELECT username FROM user WHERE id_user = $key";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["username"];
        }
    }
    return query($query);
}
