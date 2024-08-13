<?php 
  session_start();
  include "koneksi.php";

  // Cek tersediaan username
  $username = htmlspecialchars($_POST['username2']);
  $sql = "SELECT * FROM masyarakat WHERE username = '$username' ORDER BY username";
  $query = mysqli_query($koneksi, $sql);
  if(mysqli_num_rows($query)>0){
    $_SESSION['info'] = 'Gagal Disimpan';

  }else{
    $sql1 = "SELECT * FROM masyarakat WHERE username = '$username' ORDER BY username";
    $query1 = mysqli_query($koneksi, $sql1);
    if(mysqli_num_rows($query1)>0){
      $_SESSION['info'] = 'Gagal Disimpan';
      header("location:index.php");
    }else{
      // Cek tersediaan email
      $email = $_POST['email'];
      $sql2 = "SELECT * FROM masyarakat WHERE email = '$email' ORDER BY email";
      $query2 = mysqli_query($koneksi, $sql2);
      if(mysqli_num_rows($query2)>0){
        $_SESSION['info'] = 'Gagal Disimpan';
        header("location:index.php");
      }else{
        $nik 	= $_POST['nik'];
        $sql3 = "SELECT * FROM masyarakat WHERE nik = '$nik' ORDER BY nik";
        $query2 = mysqli_query($koneksi, $sql2);
        if(mysqli_num_rows($query2)>0){
          $_SESSION['info'] = 'Gagal Disimpan';
          header("location:index.php");
        }else{
          $nama 		= $_POST['nama'];
          $password = md5(htmlspecialchars($_POST['password2']));
          $telp 		= $_POST['telp'];
          $alamat 	= $_POST['alamat'];
          $gender   = $_POST['gender'];
          if($gender=="L"){
            $photo = "male.png"; 
          }else{
            $photo = "female.png"; 
          }

          $sql = "INSERT INTO masyarakat(nik, nama, username, password, email, telp, alamat, jabatan, gender) VALUES('$nik', '$nama', '$username', '$password', '$email', '$telp', '$alamat', 'masyarakat', '$gender')";
          mysqli_query($koneksi, $sql);
          $_SESSION['nik']      = $nik;
          $_SESSION['username'] = $username;
          $_SESSION['nama']     = $nama;
          $_SESSION['photo']    = $photo;
          $_SESSION['jabatan']  = "masyarakat";
          $_SESSION['id_login'] = "sudahLogin";
          $_SESSION['jabatan']  = "masyarakat";
          $_SESSION['info']     = "Disimpan";
          header("location:index.php");
        }
      }
    }
  }
?>