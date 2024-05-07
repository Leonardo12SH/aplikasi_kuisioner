<?php
include_once "fungsi/koneksi.php";
include_once "fungsi/cek-akses.php";
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
                            <h3 class="page-title mb-0">Data Responden</h3>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumb mb-0 p-0 float-right">
                                <li class="breadcrumb-item"><a href="menu_kuis.php"><i class="fas fa-home"></i> Menu Kuisioner</a></li>
                                <li class="breadcrumb-item"><span>Data Responden</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title text-bold">Daftar Data Responden</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Kuisioner</th>
                                                <th class="text-center">Jumlah Responden</th>
                                                <th class="text-center">Kesimpulan</th>
                                                <th class="text-center">Responden</th>
                                                <!-- <th>Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user_id = $_SESSION['id'];
                                            $i = 1;
                                            $select_query = "SELECT pq.id, pq.quiz_name, COUNT(par.id) AS jumlah_responden 
                                                FROM person_and_quiz pq 
                                                LEFT JOIN person_and_response par ON pq.id = par.quiz_id 
                                                WHERE pq.person_id = $user_id 
                                                GROUP BY pq.id, pq.quiz_name";
                                            $result = mysqli_query($con, $select_query);

                                            while ($row = mysqli_fetch_array($result)) { ?>


                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['quiz_name']; ?></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-info">
                                                            <?php echo $row['jumlah_responden']; ?>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn btn-warning"><a href="kesimpulan.php?id=<?php echo $row['id']; ?>" class="text-light">Kesimpulan</a></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn btn-primary"><a href="data_responden.php?id=<?php echo $row['id']; ?>" class="text-light">Responden</a></div>
                                                    </td>

                                                    <!-- <td class="">
                                                        <a href="?hapus_responden=
                                                        <?php //echo $row['id']; 
                                                        ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </td> -->

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