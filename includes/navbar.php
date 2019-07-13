<?php $status = $_SESSION['status'];
if($status=='admin'){?>
                      <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="index.php"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>
                                  <li>
                                    <a href="#" class="sidebar-nav-menu"><span class="sidebar-nav-ripple animate" style="height: 220px; width: 220px; top: -89px; left: -27px;"></span><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-inbox sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Surat Masuk</span></a>
                                    <ul>
                                        <li>
                                            <a href="inbox.php">[+] Tambah Data</a>
                                        </li>
                                        <li>
                                            <a href="view-inbox.php">Lihat Data</a>
                                        </li>
                                    </ul>
                                </li>
                                  <li>
                                    <a href="#" class="sidebar-nav-menu"><span class="sidebar-nav-ripple animate" style="height: 220px; width: 220px; top: -89px; left: -27px;"></span><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-inbox sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Disposisi</span></a>
                                    <ul>
                                        <li>
                                            <a href="view-disposisi.php">Lihat Data</a>
                                        </li>
                                    </ul>
                                </li>
                                  <li>
                                    <a href="#" class="sidebar-nav-menu"><span class="sidebar-nav-ripple animate" style="height: 220px; width: 220px; top: -89px; left: -27px;"></span><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-envelope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Surat Keluar</span></a>
                                    <ul>
                                        <li>
                                            <a href="outbox.php">[+] Tambah Data</a>
                                        </li>
                                        <li>
                                            <a href="view-outbox.php">Lihat Data</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="laporan.php"><i class="fa fa-file-archive-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Laporan</span></a>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><span class="sidebar-nav-ripple animate" style="height: 220px; width: 220px; top: -89px; left: -27px;"></span><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-inbox sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data User</span></a>
                                    <ul>
                                        <li>
                                            <a href="user.php">[+] Tambah Data</a>
                                        </li>
                                        <li>
                                            <a href="view-user.php">Lihat Data</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <?php
}else{ ?>
                  <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="index.php"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>
                                  <li>
                                    <a href="#" class="sidebar-nav-menu"><span class="sidebar-nav-ripple animate" style="height: 220px; width: 220px; top: -89px; left: -27px;"></span><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-inbox sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Surat Masuk</span></a>
                                    <ul>
                                        <li>
                                            <a href="view-inbox.php">Lihat Data</a>
                                        </li>
                                    </ul>
                                </li>
                                 
                                  <li>
                                    <a href="#" class="sidebar-nav-menu"><span class="sidebar-nav-ripple animate" style="height: 220px; width: 220px; top: -89px; left: -27px;"></span><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-envelope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Surat Keluar</span></a>
                                    <ul>
                                        <li>
                                            <a href="view-outbox.php">Lihat Data</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="laporan.php"><i class="fa fa-file-archive-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Laporan</span></a>
                                </li>
                            </ul>
<?php }

 ?>