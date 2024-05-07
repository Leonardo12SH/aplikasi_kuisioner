<?php
$conn = mysqli_connect("localhost", "root", "", "quizzer") or die(mysqli_error($conn));

$user = $_SESSION['id'];
$DataLogin = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='$user'"));
$username = $DataLogin['name'];

?>
<div class="header-outer">
    <div class="header">
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
        <a id="toggle_btn" class="float-left" href="javascript:void(0);">
            <img src="assets/img/sidebar/icon-21.png" alt="">
        </a>

        <ul class="nav user-menu float-right">
            <!-- <li class="nav-item dropdown d-none d-sm-block">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <img src="assets/img/sidebar/icon-22.png" alt="">
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span>Notifications</span>
                    </div>
                    <div class="drop-scroll">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media">
                                        <span class="avatar">
                                            <img alt="John Doe" src="assets/img/user-06.jpg" class="img-fluid rounded-circle">
                                        </span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">John Doe</span> is now following you </p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media">
                                        <span class="avatar">T</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> sent you a message.</p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media">
                                        <span class="avatar">L</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Misty Tison</span> like your photo.</p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media">
                                        <span class="avatar">G</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Rolland Webber</span> booking appoinment for meeting.</p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media">
                                        <span class="avatar">T</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> like your photo.</p>
                                            <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="activities.html">View all Notifications</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-sm-block">
                <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><img src="assets/img/sidebar/icon-23.png" alt=""> </a>
            </li> -->
            <li class="nav-item dropdown has-arrow">
                <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle" src="assets/img/user-06.jpg" width="30" alt="Admin">
                        <span class="status online"></span></span>
                    <span><?php echo $username ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="setting.php">Settings</a>
                    <a class="dropdown-item" href="fungsi/logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="setting.php">Settings</a>
                <a class="dropdown-item" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>