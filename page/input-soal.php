<?php
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
    }else {
        $status = "";
    }

    $pesan = "";
    if ($status == "berhasil") {
        $pesan = "Soal berhasil ditambahkan";
    }else if ($status == "gambar") {
        $pesan = "Gambar terlalu besar";
    }else if ($status == "format") {
        $pesan = "Format tidak didukung";
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <p class="h4 text-center"> <?php echo $pesan?></p>

                    <!-- Default form register -->
                    <form class="p-5" method="POST" enctype="multipart/form-data" action="aksi/add-soal.php">
                        
                        <p class="h2 mb-5">Input Soal</p>
                        <!-- matpel -->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Mata Pelajaran</p>
                            </div>
                            <div class="col-md-6">
                                <!-- opt matpel -->
                                <select name="id-matpel" class="browser-default custom-select mb-4" required>
                                    <option selected>Pilih Mata Pelajaran</option>
                                    <option value="1">1. Bahasa Indonesia</option>
                                    <option value="2">2. Bahasa Inggris</option>
                                    <option value="3">3. Matematika</option>
                                    <option value="4">4. IPA</option>
                                </select>
                            </div>
                        </div>
                        <!-- upload gambar -->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Gambar soal</p>
                            </div>

                            <div class="col-md-9">    
                            <div class="input-group">
                                
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                                
                            </div>
                            </div>
                        </div>
                        <!--teks soal-->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Teks soal</p>
                            </div>

                            <div class="col-md-9">    
                                <div class="form-group">
                                    <textarea class="form-control" name="teks" id="exampleFormControlTextarea3" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>
                        <!--jawaban A-->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Jawaban A</p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="A" class="form-control mb-4" required>
                            </div>
                        </div>
                        <!--jawaban B-->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Jawaban B</p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="B" class="form-control mb-4" required>
                            </div>
                        </div>
                        <!--jawaban C-->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Jawaban C</p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="C" class="form-control mb-4" required>
                            </div>
                        </div>
                        <!--jawaban D-->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Jawaban D</p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="D" class="form-control mb-4" required>
                            </div>
                        </div>
                        <!--kunci-->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Kunci</p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="kunci" class="form-control mb-4" placeholder="teks kunci harus sama dengan teks soal" required>
                            </div>
                        </div>


                        
                        
                        <!-- Sign up button -->
                        <button class="btn btn-danger my-4 btn-block" type="submit" name="btnSoal">Tambahkan Soal</button>

                        <!-- Social register -->


                    </form>
                    <!-- Default form register -->
                </div>
            </div>
        </div>
    </div>
</div>
