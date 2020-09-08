<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card">
                <div class="card-body">
                    
                    <!-- Default form register -->
                    <form class="p-5" method="POST" enctype="multipart/form-data">
                        
                        <p class="h2 mb-5">Cek Soal</p>
                        <!-- matpel -->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Mata Pelajaran</p>
                            </div>
                            <div class="col-md-9">
                                <!-- opt matpel -->
                                <select name="id-matpel-chk" class="browser-default custom-select mb-4" required>
                                    <option selected>Pilih Mata Pelajaran</option>
                                    <option value="1">1. Bahasa Indonesia</option>
                                    <option value="2">2. Bahasa Inggris</option>
                                    <option value="3">3. Matematika</option>
                                    <option value="4">4. IPA</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Sign up button -->
                        <button class="btn btn-danger my-4 btn-block" type="submit" name="btnCheckSoal">Cek Soal</button>
                    </form>
                    <!--End  Default form -->
<?php
    include_once 'aksi/get-soal.php';
?>
                </div>
            </div>
        </div> 
            <!-- card get soal--> 

       
            <table class="table">
                <thead class="red ligthen-1 white-text">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Soal</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Jawaban a</th>
                    <th scope="col">Jawaban b</th>
                    <th scope="col">Jawaban c</th>
                    <th scope="col">Jawaban d</th>
                    <th scope="col">Kunci Jawaban</th>
                  </tr>
                </thead>
                
                <tbody>
                <tr>
<?php
$count = 0;
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?> 
                <th scope = "row"> <?php $count++; echo $count; ?> </th>
                    <td> <?php echo $row['txt_soal']?> </td>
                    <td> <img height="150" width="150px" 
                    src = <?php echo $row['image_soal'] ?> > 
                    </td>

                    <td> <?php echo $row['jawab_a']?> </td>
                    <td> <?php echo $row['jawab_b']?> </td>
                    <td> <?php echo $row['jawab_c']?> </td>
                    <td> <?php echo $row['jawab_d']?> </td>
                    <td> <?php echo $row['kunci']?> </td>
                </tr> 
<?php
}
?>
                </tbody>
            </table>

            
    </div>
</div>
