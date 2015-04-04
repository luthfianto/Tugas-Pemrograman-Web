<!DOCTYPE html>

<html>
<head>
    <title>CRUD</title>
        
    <script>
    function updateTextInput(val){document.getElementById('textInput').value=val;}
    </script>
</head>


<body>
    
    <?php
    
    //Include penyambung database    
    include "dbconnect.php";
    
    //Isi database
    if (isset($_POST['enter'])){
        
    $sql= "INSERT INTO students (name, major)
        VALUES
        ('$_POST[name]','$_POST[major]')";
        
    if (!mysqli_query($connection,$sql))
        {
            die('Error: ' . mysqli_error($connection));
        }    
    }
    
    // Fungsi delete
    if (isset($_GET['delete'])){
        $delete = $_GET['delete'];
        mysqli_query($connection,"DELETE FROM students WHERE id='$delete'");
    }    

// mysqli_close($connection); // Tutup gak ya

?>
    
    
    <form action="index.php" method="post">
        Nama: <input type="text" name="name">
        Prodi: <input type="text" name="major">
        <input type="submit" name="enter">
    </form>
  
    <br>

<?php 
 if (!isset($_POST['submit'])){   

    $table = mysqli_query($connection,"SELECT * FROM students");
    
    echo "<table border='1'>
    
    <tr>
    <th>id</th>
    <th>Nama</th>
    <th>Prodi</th>
    <th>Hapus?</th>
    </tr>";
    
    while ($row = mysqli_fetch_array($table))
        {
            echo "<tr>";
            echo "<td>" . $row['id']                                     . "</td>";
            echo "<td>" . $row['name']                                   . "</td>";
            echo "<td>" . $row['major']                                  . "</td>";
            echo "<td>" . '<a href="?delete='.$row['id'].'"> Hapus!</a>' . "</td>";
            echo "</tr>";
        }
          echo "</table>";
       
}

?>
     <br>
   
       <form action="index.php" method="post">
    <input type="submit" value="Buka form update" name="updatebutton">
    </form>
    
<?php
    // Tampilkan form update    
    if (isset($_POST['updatebutton']))
        include "update.php";
    
    //Fungsi update    
    if (isset($_POST['updatelisting'])){
        $update = $_POST['update'];
    mysqli_query($connection,"UPDATE students SET name='$_POST[name]', major='$_POST[major]'
    WHERE id='$update'");
    ?>
    
        
    <script>
        parent.window.location.href="index.php";
    </script>
    
    <?php
    }
    
?>

</body>
</html>
