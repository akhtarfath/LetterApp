<title> Surat &mdash; KMFT </title>
<?php session_start(); if($_SESSION['user-login']) { include('../../config/db_conn.php'); include('../../lib/header.php');  ?>
<div id="page-container" class="sidebar-o sidebar-dark sidebar-mini enable-page-overlay side-scroll page-header-fixed">
    <?php include('../../components/sidebar.php'); include('../../components/navbar.php');  ?>
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="block">
                <div class="block-content text-center">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h3> &mdash; Manajemen Surat </h3>
                        </div>
                        <div class="col-sm-12 p-3">
                            <a href="#" class="btn btn-success" style="width: 100%; font-size: 13px;" data-toggle="modal" data-target="#kirimSurat"> 
                                Kirim Surat 
                            </a>
                        </div>
                        <div class="col-sm-12">
                            <table class="table" id="data_table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col">No. Surat</th>
                                        <th scope="col">Isi Surat &mdash; File Surat </th>
                                        <th scope="col" class="text-center">Tanggal Batas Surat</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $result = $conn -> prepare("
                                    'SELECT * FROM surat 
                                    INNER JOIN file_surat ON file_surat.id_surat = surat.id_surat
                                    WHERE id_user = ".$_SESSION['user-login']['id_user']); ?>
                                    <?php while($row = $result->fetch()) { ?>
                                    <tr>
                                        <td scope="col" class="text-center"><?= $i ?></td> 
                                        <td scope="col">Nomor Surat</td>
                                        <td scope="col">
                                            Surat Untuk Pencairan Dana
                                            <br> &mdash; <a href="#" data-toggle="modal" data-target="#fileSurat"> 
                                                Nama File Surat 
                                                <br><small>*klik untuk melihat isi surat</small>
                                            </a>
                                        </td>
                                        <td scope="col" class="text-center"><?= date("Y/m/d") ?></td>   
                                        <td scope="col">Belum Selesai</td>
                                        <th scope="col" class="text-center">
                                            <div class="bungkus-button">
                                                <div class="col-sm-12">
                                                    <a href="?delete=<?= $i ?>" class="btn btn-danger"> Hapus </a>
                                                    <a href="?edit=<?= $i ?>" class="btn btn-primary"> Edit </a>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>

                                    <!-- File Modal -->
                                    <div class="modal fade" id="fileSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> Kirim Surat </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <embed class="embed-responsive-item" src="#"></embed>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- Modal -->
<div class="modal fade" id="kirimSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Kirim Surat </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../../process/kirim-surat.php" enctype="multipart/form-data" method="POST">
            <div class="modal-body">
                    <div class="form-group" style="display: none;">
                        <label for=""> Id User </label>
                        <input type="text" name="id_user" placeholder="id user" class="form-control" value="<?= $_SESSION['user-login']['id_user'] ?>">
                    </div>
                    <div class="form-group">
                        <label for=""> Nomor Surat </label>
                        <input type="text" name="no_surat" placeholder="masukkan nomor surat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> Batas Waktu </label>
                        <input type="date" name="tgl_surat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> Isi Surat </label>
                        <textarea name="isi_surat" class="form-control" placeholder="masukkan isi surat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for=""> Pilih Surat </label>
                        <input type="file" name="file_surat" accept="application/pdf" placeholder="masukkan file surat" style="width: 100%;">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
                <button type="submit" class="btn btn-primary"> Kirim Surat </button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include('../../lib/footer.php'); } else { header('Location: ../login/'); } ?>