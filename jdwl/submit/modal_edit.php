<?php
    include "dbconfig.php";
    $id_job=$_GET['id_job'];
    $modal=mysqli_query($conn,"SELECT * FROM jobs WHERE id_job='$id_job'");
    while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Your Profile</h4>
        </div>

        <div class="modal-body">
            <form action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">

                
                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="nomor">Nomor Pekerjaan</label>
                    <input type="hidden" name="id_job"  class="form-control" value="<?php echo $r['id_job']; ?>" />
                    <input type="text" name="nomor"  class="form-control" value="<?php echo $r['nomor']; ?> " autofocus required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal"  class="form-control" value="<?php echo $r['tanggal']; ?>" required/>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="store">Store</label>
                    <select class="form-control" name="store" id="store">
                        <option>Store 1</option>
                        <option>Store 2</option>
                    </select>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="alamat">Alamat Store</label>
                    <input type="text" name="alamat"  class="form-control" value="<?php echo $r['alamat']; ?>" required/>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori" id="kategori">
                                <option>Maintenace</option>
                                <option>Standby</option>
                                <option>Problem</option>
                            </select>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan"  class="form-control" value="<?php echo $r['keterangan']; ?>"/>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">
                        Confirm
                    </button>

                    <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                        Cancel
                    </button>
                </div>

                </form>

             <?php } ?>

            </div>

           
        </div>
    </div>