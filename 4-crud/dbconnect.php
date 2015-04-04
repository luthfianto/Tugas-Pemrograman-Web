<?php

    //Buat koneksi
    $connection=mysqli_connect("localhost", "root", "");
    
    //Cek koneksi
    if (mysqli_connect_errno($connection))
        echo "Gagal menyambung ke database: " . mysqli_connect_error();            
    
    //Buat database
    $sql="CREATE DATABASE IF NOT EXISTS test";
    if(mysqli_query($connection,$sql))
    {
        ?><?php
    }
    else
    {
        echo "Error: " . mysqli_error($connection);
    }
    
    //Use database
    $dbselect = mysqli_select_db($connection, "test");
    if(!$dbselect){
        die ("Error:" . mysqli_error($connection));
    }
 
    //Buat tabel bila belum ada
    $sql = "CREATE TABLE IF NOT EXISTS students(id int NOT NULL AUTO_INCREMENT, name VARCHAR(30), major VARCHAR(30), PRIMARY KEY (id))";
    if(mysqli_query($connection,$sql))
    {
        //
    }
    else{
        echo "Error: " . mysqli_error($connection);
    }
    
     //mysqli_close($connection); // Tutup ga ya?

?>