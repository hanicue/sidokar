 <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">

                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="img/placeholders/avatars/user.png" alt="avatar">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">
                                        <strong>Halo - "<?php echo $_SESSION['username']; ?>"</strong>
                                    </li>
                                    <li>
                                        <a href="gantipassword.php">
                                            <i class="fa fa-setting fa-fw pull-right"></i>
                                           Ganti Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="logout.php">
                                            <i class="fa fa-power-off fa-fw pull-right"></i>
                                           Keluar
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>