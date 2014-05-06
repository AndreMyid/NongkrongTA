<?
session_start();
include "../librari/inc.koneksi.php"; //perhatikan bagian ini, apakah database sudah terkoneksi dengan baik?
//bila sudah terkoneksi dengan baik deklarasi variable
$user=$_POST['uname_admin']; 
$pass=$_POST['pswd_admin']; 

if($user == "") { //Jika nilai input dalam keadaan kosong/tidak terisi/null maka:
  echo "<b>User ID</b> belum diisi! tolong diisi.";
  include "login.php";
} else if(strlen(trim($pass))<=5) { //jika jumlah input password kurang dari 5
  echo "<b>Password</b> minimal 6 digit! tolong diperbaiki.";
  include "login.php";
} else { //jika "2 Validasi" diatas terlewati, lakukan pengecekan
  $periksa="Select*from admin where uname_admin='$user' AND pswd_admin='$pass'";
  $query=mysql_query($periksa) or die (mysql_error());
  $hasil=mysql_num_rows($query) or die (mysql_error());
  
  if($hasil>=1){
    //jika sukses, buatkan sesi
    $_SESSION['uname_admin']=$user;
    //redirect ke index.php
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    exit;
  } else {
    //jika gagal
    echo "<b>User dan Password</b> tidak dikenali!";
    include "login.php";
  }
}

  /*----------------------------
  | PHP diatas merupakan salah 1 contoh fungsi cek_admin pada saat menjalankan halaman "login.php"
  | Namun jika pada halaman login.php menggunakan onSubmit="MM_validateForm"
  | Setidaknya ada JS(JavaScript) yg ikut berperan, misalkan seperti berikut
  
  <script type="text/JavaScript">
  function MM_validateForm() {
    var i,p,q,nm,test,num,min,max,errors='',args=MM_valida teForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { 
      test=args[i+2]; val=MM_findObj(args[i]);
      if (val) { nm=val.name; 
        if ((val=val.value)!="") {
          if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
            if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
          } else if (test!='R') { num = parseFloat(val);
            if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
            if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
            } 
          } 
        } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; 
      }
    }
    if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
  }
  </script> 

  /*
  | Semoga dapat membantu
  | ^.^v
  */
?>
