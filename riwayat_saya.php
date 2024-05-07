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
                    <div class="col-sm-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title text-bold">Riwayat Responen Saya</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Kuisioner</th>
                                                <th class="text-center">Kuisioner ID</th>
                                                <th>Passcode</th>
                                                <!-- <th>View</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user_id = $_SESSION['id'];
                                            $select_query = "select * from person_and_response where person_id=$user_id and status='submitted'";
                                            $select_query_result = mysqli_query($con, $select_query);
                                            if (mysqli_num_rows($select_query_result) == 0) {
                                                echo "<script>alert('You have not responded to any quiz yet.Join one.');
	                         location.href='join_quiz.php';
			                   </script>";
                                            }
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($select_query_result)) {
                                                $quiz_id = $row['quiz_id'];
                                                $q = "select * from person_and_quiz where id=$quiz_id";
                                                $q_result = mysqli_query($con, $q);
                                                $row_user = mysqli_fetch_array($q_result);

                                            ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row_user['quiz_name']; ?></td>
                                                    <td class="text-center"><?php echo $row_user['id']; ?></td>
                                                    <td><?php echo $row_user['password']; ?></td>
                                                    <!-- <td> <a href="lihat_hasil_saya.php?id=
                                                    <?php //echo $row_user['id']; 
                                                    ?> &quiz_id=
                                                    <?php //echo "$quiz_id"; 
                                                    ?>" class="btn btn-success">View</a></td> -->

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