<?php
function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('/', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[0] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[2];
}

include "../config.php";
$nisn = $_POST['nisn']; //get the nama value from form
$q = "SELECT * from tb_student where nisn = '$nisn' "; //query to get the search result
$result = mysqli_query($koneksi, $q); //execute the query $q
$num_rows = mysqli_num_rows($result);

if ($num_rows == 0)
  include "no-result.php";
else
  echo "
    <div class='well' style='margin-bottom: 50px;'>
    <p align='center'><img src='images/logo.png' height='75' /></p>
    <h4 align='center' style='margin: 15px 0 -10px 0;'><b>SISTEM INFORMASI</br>STATUS KELULUSAN SISWA</b></h4>
    <hr>
    <div align='center' class='alert alert-dismissable alert-danger'><h4><b>DETAIL STATUS KELULUSAN</b></h4></div>";
echo "<table min-width='100' class='table table-striped table-bordered'>";
while ($data = mysqli_fetch_array($result)) {  //fetch the result from query into an array
  echo "
  <tr class='success'>
    <td colspan='4' align='center'><font color='#000000' size='4' style='font-weight: bold;';><b>IDENTITAS PESERTA DIDIK</b></td>
  </tr>
  <tr><td>Nama Lengkap</td>
    <td colspan='3'><font style='text-transform: capitalize;'><strong>:  " . $data['name'] . "</strong></font></td>
  </tr>

  <tr class='secondary'><td width='250'>NISN </td>
    <td width='480'><strong>:  " . $data['nisn'] . "</strong></td>
  </tr>
  
  <tr><td>Kelas</td>
    <td colspan='3'><strong>:  " . $data['kelas'] . "</strong></td>
  </tr>
  
  <tr class='secondary'><td>Tempat/ Tgl. Lahir</td>
    <td colspan='3'><font style='text-transform: uppercase;'><strong>:  " . $data['addresse'] . ", " . tgl_indo($data['tgllhr']) . "</strong></font></td>
  </tr>
  
  <tr><td>Asal Sekolah</td>
    <td colspan='3'><font style='text-transform: capitalize;'><strong>: " . $data['sekolah'] . "</strong></font></td>
  </tr>

  <tr class='success'>
    <td colspan='4' align='center'><font color='#000000' size='4' style='font-weight: bold;';>STATUS KELULUSAN DINYATAKAN</td>
  </tr>
  <tr class='warning'>
    <td colspan='4' align='center'><font color='#0066FF' size='6' style='text-transform: uppercase;'><b>" . $data['ket'] . "</b></td>
  </tr>
  <tr class='success'>
    <td colspan='4' align='center'><b>Apapun hasil yang didapat, semoga ini adalah yang terbaik, tetap semangat dan optimis.</b></td>
  </tr>

  <tr class='secondary'>
    <td colspan='4'></td>
  </tr>
  <tr class='danger'>
    <td colspan='4' align='center'>
    <b>Catatan:</b> Jika ada perbedaan data pengumuman online dan manual,</br>maka yang menjadi acuan 
    adalah dokumen asli Kelulusan yang telah disahkan, <i></br>ditandatangani oleh Kepala Sekolah <b>" . $data['sekolah'] . "</b> dan 
    diberi cap basah sekolah</i>.
    </td>
  </tr>
  </table>";

  echo "
    <div class='form-group' style='margin-bottom: -10px;'>
      <p align='center'>
        <a href='model/caridata.php' class='btn btn-success'>
          BACK
        </a>
        <a href='controller/print.php?no=" . $data['no'] . "' class='btn btn-danger' target='_blank' rel='noopener noreferrer'>
        PRINT
      </a>
      </p>
    </div>";
}
