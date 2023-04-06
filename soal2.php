<?php
if(!isset($_POST['submit'])){
    echo '<form method="post" action="">
            Nama Anda : <input type="text" name="nama">
            <input type="submit" name="submit" value="SUBMIT">
          </form>';
} elseif(!isset($_POST['umur'])){ 
    $nama = $_POST['nama'];
    echo '<form method="post" action="">
            Umur Anda : <input type="text" name="umur">
            <input type="hidden" name="nama" value="'.$nama.'">
            <input type="submit" name="submit" value="SUBMIT">
          </form>';
} elseif(!isset($_POST['hobi'])){
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    echo '<form method="post" action="">
            Hobi Anda : <input type="text" name="hobi">
            <input type="hidden" name="nama" value="'.$nama.'">
            <input type="hidden" name="umur" value="'.$umur.'">
            <input type="submit" name="submit" value="SUBMIT">
          </form>';
} else {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $hobi = $_POST['hobi'];
    echo "Nama Anda: $nama <br>";
    echo "Umur Anda: $umur <br>";
    echo "Hobi Anda: $hobi <br>";
}
?>
