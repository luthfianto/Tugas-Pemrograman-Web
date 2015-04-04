<?php ?>

<!--Form update -->
    <form action="index.php" method="post">
    <label for="update">Update id:</label>

    <select name="update">
    	<?php 
    		include "dbconnect.php";
    		$table = mysqli_query($connection,"SELECT id FROM students");
    	    while ($row = mysqli_fetch_array($table)){
	            echo "<option>" . $row['id']. "</option>";
	        }
    	?>
    </select>
    Nama: <input type="text" name="name"><br>
    Prodi: <input type="text" name="major"><br>
    <input type="submit" name="updatelisting" value="Update">
    </form>
