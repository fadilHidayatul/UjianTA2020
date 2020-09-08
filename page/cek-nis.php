<?php 
  include_once 'aksi/get-nis.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="mb-5 text-center">NIS Siswa Terdaftar</h1>

            <!-- tb bindo -->
           <div class="row">

            <table class="table">
                <thead class="red ligthen-1 white-text">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    
                  </tr>
                </thead>

                <tbody>
                <tr>
<?php 
    $count = 0;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
?>
                <th scope="row"> <?php $count++; echo $count; ?> </th>
                    <td> <?php echo $row['nama_siswa'] ?> </td>
                    <td> <?php echo $row['nis'] ?> </td>
                </tr> 
<?php } ?> 
                </tbody>
              </table>
            </div>





        </div>
    </div>
</div>
