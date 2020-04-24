<?php
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Hasil_Check_Up'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../../mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4-L', 10.5, 'arial'); // Membuat file mpdf baru

ob_start();
?>
<style>
    table{margin: auto;}
    td,th{padding: 15px; width: 150px}
    h3{text-align: center}
    th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style>
        <?php
                      include "../../koneksi.php";
                      $no=0;
                      $id = $_GET['id'];
                      $perintah="SELECT app_pasien.nama AS nama_user, app_pasien.kepala_keluarga, app_pasien.telp, app_pasien.alamat, app_pengurus.nama AS nama_dokter, app_pengurus.rumah_sakit, app_pengurus.id AS id_pengurus, app_pasien.id AS id_pasien, app_jadwal.id, app_checkup.tanggal_cek, app_checkup.gambar, app_checkup.keluhan, app_checkup.tekanan_darah, app_checkup.berat_badan, app_checkup.umur_kehamilan, app_checkup.hasil, app_checkup.tinggi_fundus, app_checkup.letak_janin, app_checkup.denyut_jantung, app_checkup.tindakan, app_checkup.nasehat, app_checkup.tanggal_kembali
                        FROM app_checkup
                        INNER JOIN app_jadwal ON app_checkup.id_jadwal = app_jadwal.id
                        INNER JOIN app_pengurus ON app_checkup.id_pengurus = app_pengurus.id
                        INNER JOIN app_pasien ON app_checkup.id_pasien = app_pasien.id WHERE app_checkup.id_jadwal = '$id'"; // $ perintah Berguna sebagai variabel penampung //
                      $hasil=mysql_query($perintah);
                      while ($row=mysql_fetch_array($hasil))
                      {
                      ?>
            <section class="content">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Detail Hasil Check Up</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table width="100%">
                                                    <tbody >
                                                        <tr>
                                                            <td>
                                                                <p>Nama Pemeriksa : <strong>Dr. <?php echo $row['nama_dokter']?></strong></p>
                                                                <p>Rumah Sakit : <strong><?php echo $row['rumah_sakit']?></strong></p>
                                                                <p>Tanggal Check Up : <strong><?php echo $row['tanggal_cek']?></strong></p>
                                                            </td>
                                                            <td>
                                                            </td>

                                                            <td>
                                                            </td>
                                                            <td style="padding-left: 50px;">
                                                                <p>Nama Pasien : <strong>Ibu <?php echo $row['nama_user']?></strong></p>
                                                                <p>Nomor Telefon : <strong><?php echo $row['telp']?></strong></p>
                                                                <p>Alamat : <strong><?php echo $row['alamat']?></strong></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                <div class="col-xs-12">
                                    <div class="box-header" style="text-align: center;">
                                        <?php 
                                      if ($row['gambar'] != ''){
                                        ?>
                                            <img src="<?php echo $row['gambar'];?>" style="width: 200px; text-align: center; align-content: center;">
                                            <?php
                                      } else {
                                      }
                                      ?>
                                                <p style="text-align: center;">HASIL CHECK UP</p>

                                                <!-- /.box-header -->
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Keluhan Sekarang</th>
                                                            <th>Tekanan Darah</th>
                                                            <th>Berat Badan</th>
                                                            <th>Umur Kehamilan</th>
                                                            <th>Tinggi Fundus</th>
                                                            <th>Letak Janin Kep/SuLi</th>
                                                            <th>Denyut Jantung Janin</th>
                                                            <th>Hasil Lab.</th>
                                                            <th>Tindakan</th>
                                                            <th>Nasehat</th>
                                                            <th>Kapan Harus Kembali</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['keluhan']?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['tekanan_darah']?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['berat_badan']?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['umur_kehamilan']?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['tinggi_fundus']?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['letak_janin']?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['denyut_jantung']?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['hasil']?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['tindakan']?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['nasehat']?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php
                                            $date = new DateTime($row['tanggal_kembali']);
                                            echo $date->format('l, d F Y');
                                        }?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </section>

    <?php

$mpdf->setFooter('{PAGENO}');
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>