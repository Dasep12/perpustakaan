<!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog" style="width:800px">
                     <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" id="btn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                   <h4 class="modal-title" id="myModalLabel">Daftar Buku</h4>
                             </div>
                        <div class="modal-body">
                 <table id="lookup2" class="table">
                    <thead>
                   <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                    </tr>
                 </thead>
             <tbody>
        <?php
                //Data mentah yang ditampilkan ke tabel 
            $query = mysqli_query($koneksi,'SELECT * FROM user');
                $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr class="pilih2"  data-nama="<?php echo $data['admin']; ?>" data-email="<?php echo $data['email']; ?>" data-telepon="<?php echo $data['no_telepon']; ?>">
                        <td><?= $no++; ?></td>
                        <td><?php echo $data['admin']; ?></td>
                        <td><?php echo $data['no_telepon']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                    </tr>
                <?php
            }
        ?>
        </tbody>
    </table>  
        </div>
            </div>
                </div>
                    </div>


<script type="text/javascript">
//            jika dipilih, nim akan masuk ke input dan modal di tutup
        $(document).on('click', '.pilih2', function (e) {
            document.getElementById("nama_peminjam").value = $(this).attr('data-nama');
            document.getElementById("no_telepon").value = $(this).attr('data-telepon');
            document.getElementById("email").value = $(this).attr('data-email');
        $('#myModal2').modal('hide');
        });


        //tabel lookup mahasiswa
        $(function () {
        $("#lookup2").dataTable();
        });

</script>
    </div>  
        </div>