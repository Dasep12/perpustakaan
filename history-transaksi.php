<!-- TABLE STYLES-->
<link href="datatables/dataTables.bootstrap-1.css" rel="stylesheet" />
<!--Pagination -->

<!--Untuk menampilkan modal -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="datatables/jquery.dataTables.js"></script>
<script src="datatables/dataTables.bootstrap.js"></script>

<!--Kalender -->
<link rel="stylesheet" type="text/css" href="calender/jquery-ui.css">
<script type="text/javascript" src="calender/jquery-ui.min.js"></script>

<div class="sub-list-book">
    <h4>Riwayat Transaksi </h4>
        </div>
            <div class="list-book">
                <div class="list-transaksi">
            <form method="POST" action="" name="view">
                <li>
                    <input type="text" class="form-control" id="datepicker" name="tanggal_awal" placeholder=<?=date('Y-m-d') ?>>
                </li>
                <li>
                    <label>Sampai</label>
                </li>   
                <li>    
                    <input type="text" name="tanggal_kedua" class="form-control" id="datepicker1" placeholder=<?= date('Y-m-d') ?>>
                </li>
                <li>
                    <button name="view" class="btn btn-warning ">View</button>
                </li>
            </form>   
                </div>
                    <?php include 'tabel-transaksi.php'; ?>
                        <script>
                            $("#datepicker").datepicker({
                                 dateFormat : 'yy-mm-dd'
                            });
                            $("#datepicker1").datepicker({
                                 dateFormat : 'yy-mm-dd'
                            });
                    </script>
                <script>
                        $(document).ready(function () {
                            $('#example').dataTable();
                        });
            </script>
    </div>