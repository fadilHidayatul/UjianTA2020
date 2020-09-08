<?php if(isset($_GET['status'])){
                    $status = $_GET['status'];
                }else{
                    $status = "";
                }

                $pesan = "";
                if($status == "nis_sudah_ada") {
                    $pesan = "Nis sudah didaftarkan";
                }else if($status == "berhasil") {
                    $pesan = "Nis Berhasil didaftarkan";
                }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                
                    <p class="h4 text-center"> <?php echo $pesan?></p>
                
                    
                    <!-- Default form register -->
                    <form class="p-5" method="POST" enctype="multipart/form-data" action="aksi/aksi-nis.php">
                        
                        <p class="h2 mb-4">Input NIS</p>

                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">NIS Siswa</p>
                            </div>
                            <div class="col-md-6">
                                <!-- NIS -->
                                <input type="text" name="nis" class="form-control mb-4" required>
                            </div>
                        </div>
                            
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Nama Siswa</p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="nama" class="form-control mb-4" required>
                            </div>
                        </div>
                        
                        <!-- Sign up button -->
                        <button class="btn btn-danger my-4 btn-block" type="submit" name="btnNis" data-toggle="modal" data-target="#exampleModal" >
                        Daftarkan Nis
                        </button>

                        
                    </form>
                    <!-- Default form register -->
                    
                </div>
            </div>
        </div>
    </div>
</div>


