<?php
$conn = mysqli_connect("localhost", "root", "", "testdb");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['search'])) {

    $search = mysqli_real_escape_string($conn, $_POST['search']);
    
    $query = "SELECT person.*, GROUP_CONCAT(hobi.hobi SEPARATOR ', ') AS hobis 
    FROM person LEFT JOIN hobi ON person.id = hobi.person_id WHERE nama LIKE '%$search%' OR alamat LIKE '%$search%' OR hobi.hobi LIKE '%$search%' 
    GROUP BY person.id";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
} else {
    $query = "SELECT person.*, GROUP_CONCAT(hobi.hobi SEPARATOR ', ') AS hobis FROM person LEFT JOIN hobi ON person.id = hobi.person_id GROUP BY person.id";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
}

echo "<form method='POST' action=''>
        <input type='text' name='search' placeholder='Cari'>
        <button type='submit'>Search</button>
      </form>";

echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['nama'] . "</td>
            <td>" . $row['alamat'] . "</td>
            <td>" . $row['hobis'] . "</td>
          </tr>";
}
echo "</table>";

mysqli_close($conn);
?>