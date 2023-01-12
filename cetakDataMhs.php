<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Image('img\logo_smkn2_sragen.png', 40, 6, 30, 20);
$pdf->Cell(190, 7, 'SMK NEGERI 2 SRAGEN', 0, 1, 'C');
$pdf->Image('img\logo_jateng.png', 145, 6, 20, 20);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(190, 7, 'Jl. Dr. Sutomo No.4, Kebayan 1, Sragen Kulon, ', 0, 1, 'C');
$pdf->Cell(190, 4, 'Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57212 ', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 20, 'DAFTAR SISWA SMKN 2 SRAGEN', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetXY(10, 40); // 15 adalah posisi x dan 50 adalah posisi y
$pdf->Cell(10, 7, '', 0, 2);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(12, 6, 'No', 1, 0);
$pdf->Cell(50, 6, 'Nama Siswa', 1, 0);
$pdf->Cell(30, 6, 'NIS', 1, 0);
$pdf->Cell(25, 6, 'Kelas', 1, 0);
$pdf->Cell(55, 6, 'Jurusan', 1, 0);
$pdf->Cell(15, 6, 'Gender', 1, 1);
$pdf->SetFont('Arial', '', 10);
include 'fitur.php';
$siswa = mysqli_query($conn, "SELECT * FROM siswa");
$i = 1;
while ($row = mysqli_fetch_array($siswa)) {
    $pdf->Cell(12, 6, $i, 1, 0);
    $pdf->Cell(50, 6, $row['Nama'], 1, 0);
    $pdf->Cell(30, 6, $row['NIS'], 1, 0);
    $pdf->Cell(25, 6, $row['Kelas'], 1, 0);
    $pdf->Cell(55, 6, $row['Jurusan'], 1, 0);
    $pdf->Cell(15, 6, $row['Jenis_Kelamin'], 1, 1);
    $i++;
}
$pdf->Output();
