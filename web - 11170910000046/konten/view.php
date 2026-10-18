<?php
    include "koneksi.php";
    $query = "select * from register";
    $hasil = mysqli_query($mysqli, $query);
?>
<table border='1'>
    <tr>
        <td width='31'>id</td>       
        <td width='99'>Username</td>
        <td width='85'>Nama Depan</td>
        <td width='99'>Nama Belakang</td>
        
        <td width='41'>Usia</td>
        <td width='41'>Jenis Kelamin</td>

        <td width='152'>Nomer Telepon</td>
        <td width='100'>Edit</td>
        <td width='96'>Hapus</td>
    </tr>
        <?php 
            while($row = mysqli_fetch_assoc($hasil)) {
                echo "<tr>";
                echo "  <td width='31'>".$row['id']."</td>";
                echo "  <td width='82'>".$row['username']."</td>";
                echo "  <td width='85'>".$row['namadep']."</td>";
                echo "  <td width='99'>".$row['namabel']."</td>";
                
                // echo "  <td width='87'>".$row['password']."</td>";
                echo "  <td width='41'>".$row['usia']."</td>";
                echo "  <td width='41'>".$row['jk']."</td>";
                // echo "  <td width='128'>".$row['ttl']."</td>";
                // echo "  <td width='182'>".$row['email']."</td>";
                echo "  <td width='152'>".$row['notel']."</td>";
                echo "  <td width='100'><a href='index.php?p=edit&id=".$row['id']."'>edit</a></td>";
                echo "  <td width='96'><a href='edit.php?t=delete&id=".$row['id']."'>hapus</a></td>";
                echo "</tr>";
            }
        ?>

    
</table>