<?php
include_once "fungsi/koneksi.php";
include_once "fungsi/cek-akses.php";
include_once "fungsi/kelola_kuis.php";
include 'layouts/header.php';
?>

<body>

    <div class="main-wrapper">

        <?php
        include 'layouts/navbar.php';
        include 'layouts/sidebar.php';
        ?>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="page-title mb-0">Kuisioner Saya</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="menu_kuis.php"><i class="fas fa-home"></i> Menu Kuisioner</a></li>
                                <li class="breadcrumb-item"><span>Kuisioner Saya</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-7 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <?php
                                $quiz_id = $_GET['id'];
                                $select_query = "select * from person_and_response where quiz_id=$quiz_id and status='submitted'";
                                $select_query_result = mysqli_query($con, $select_query);
                                $select_quiz_query = "SELECT quiz_name FROM person_and_quiz WHERE id = $quiz_id";
                                $select_quiz_result = mysqli_query($con, $select_quiz_query);
                                $quiz_row = mysqli_fetch_assoc($select_quiz_result);
                                $quiz_name = $quiz_row['quiz_name'];
                                $i = 1;
                                ?>
                                <h6 class="card-title text-bold">Nama Kuisioner: <?php echo $quiz_name; ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Responden</th>
                                                <th>Hasil</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($select_query_result)) {
                                                $response_id = $row['person_id'];
                                                $q = "select * from users where id=$response_id";
                                                $q_result = mysqli_query($con, $q);
                                                $row_user = mysqli_fetch_array($q_result);

                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row_user['name']; ?></td>
                                                    <td>
                                                        <div class="btn btn-primary"><a class=" text-light" href="hasil_kuis.php?id=<?php echo $row_user['id']; ?> &quiz_id=<?php echo "$quiz_id"; ?>">Lihat Hasil</a></div>
                                                    </td>
                                                    <td class="">
                                                        <a href="?hapus_responden=<?php echo $row_user['id']; ?> &quiz_id=<?php echo "$quiz_id"; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            <i class="far fa-trash-alt"></i>
                                                    </td>

                                                </tr>
                                        </tbody>
                                    <?php $i++;
                                            } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php include 'layouts/footer.php'; ?>
</body>

</html>