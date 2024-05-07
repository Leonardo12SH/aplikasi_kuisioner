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
                    <div class="col-sm-12 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title text-bold">Daftar Kuisioner Saya</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Kuisioner</th>
                                                <th>Kuisioner ID</th>
                                                <th>Passcode</th>
                                                <th>View</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user_id = $_SESSION['id'];
                                            $i = 1;
                                            $select_query = "select * from person_and_quiz where person_id=$user_id";
                                            $result = mysqli_query($con, $select_query);

                                            while ($row = mysqli_fetch_array($result)) { ?>


                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['quiz_name']; ?></td>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['password']; ?></td>
                                                    <td> <a href="lihat_kuis.php?id=<?php echo $row['id']; ?>" class="btn btn-success">View</a></td>
                                                    <td class="">
                                                        <a href="menu_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <a href="?hapus=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>

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