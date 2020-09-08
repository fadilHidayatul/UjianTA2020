<?php 
  include_once 'aksi/get-nilai.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="mb-5">Daftar Nilai Siswa</h1>

            <!-- tb bindo -->
           <div class="row">
            <p class="h4 mb-4">Nilai Bahasa Indonesia</p>

            <table class="table">
                <thead class="bg-danger white-text">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>

                <tbody>
                <tr>
<?php
$no = 0;
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
?>
                <th scope="row"><?php $no++; echo $no ?></th>
                    <td> <?php echo $row['username']?> </td>
                    <td> <?php echo $row['nis']?> </td>
                    <td> <?php echo $row['nilai']?> </td> 
                </tr> 
<?php } ?>
                </tbody>
              </table>
            </div>

            <!-- tb bing -->
           <div class="row">
            <p class="h4 mb-4 mt-5">Nilai Bahasa Inggris</p>
            <table class="table">
                <thead class="bg-danger white-text">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>

                <tbody>
                <tr>
<?php
$no = 0;
while ($row_ing=$statement_bing->fetch(PDO::FETCH_ASSOC)) {
?>
                <th scope="row"> <?php $no++; echo $no ?> </th>
                    <td> <?php echo $row_ing['username'] ?> </td>
                    <td> <?php echo $row_ing['nis'] ?> </td>
                    <td> <?php echo $row_ing['nilai'] ?> </td>
                </tr>
<?php } ?>
                </tbody>
              </table>
            </div>

            <!-- tb mm -->
           <div class="row">
            <p class="h4 mb-4 mt-5">Nilai Matematika</p>
            <table class="table">
                <thead class="bg-danger white-text">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>

                <tbody>
                <tr>
<?php 
$no = 0;
while ($row_mm = $statement_mm->fetch(PDO::FETCH_ASSOC)) {
?>
                <th scope="row"> <?php $no++; echo $no ?> </th>
                    <td> <?php echo $row_mm['username']?> </td>
                    <td> <?php echo $row_mm['nis']?> </td>
                    <td> <?php echo $row_mm['nilai']?> </td>
<?php } ?>
                </tr>
                </tbody>
              </table>
            </div>

            <!-- tb ipa -->
            <div class="row">
            <p class="h4 mb-4 mt-5">Nilai IPA</p>
            <table class="table">
                <thead class="bg-danger white-text">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>

                <tbody>
                <tr>
<?php 
$no = 0;
while ($row_ipa = $statement_ipa->fetch(PDO::FETCH_ASSOC)) {
?>
                <th scope="row"> <?php $no++; echo $no; ?> </th>
                    <td> <?php echo $row_ipa['username'] ?> </td>
                    <td> <?php echo $row_ipa['nis'] ?> </td>
                    <td> <?php echo $row_ipa['nilai'] ?> </td>
                
                </tr>
<?php } ?>
                </tbody>
              </table>
            </div>


        </div>
    </div>
</div>
