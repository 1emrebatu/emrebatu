<!DOCTYPE html>
<html>
<head>
	<title>Klaros Silver - Sepetim</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="descprition" content="Takı Dünyası.">
	<meta name="author" content="Emre BATU">
	<meta name="keywords" content="takı, gümüş bileklik, gümüş kolye">

	<link href="css/bootstrap.min.css"  rel="stylesheet">
	<link href="css/merve.css" rel="stylesheet">


	
</head>

<body>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>



<?php 

include("conn.php"); 

ob_start();

echo 'Sepetinizde ('.count(@$_COOKIE['urun']).') adet ürün var </br>';

$urunler ="";


if (isset($_GET['bosalt']) and @$_COOKIE['urun']!=""){
				foreach (@$_COOKIE['urun'] as $key => $value) {
					setcookie('urun['.$key.']', $key, time() - 86400);
					header('Location:'.$_SERVER['HTTP_REFERER']);
				}
			}

if (@$_COOKIE['urun']!=""){
	foreach ($_COOKIE['urun'] as $v) {
	   $urunler=$urunler.$v.',';

	}
}

$urunler=rtrim($urunler,",");



$sql = "SELECT * FROM urun WHERE urun_kodu in (".$urunler.")";
$result = $conn->query($sql);


?>

</br>
<a href="?bosalt=true">Sepeti Boşalt</a>
<a href="index.php">Alışverişe Devam Et</a>

<div class="container">
  <h2>Sepetiniz</h2>
  <p>Tüm siparişleriniz için kargo ücretsiz!</p>            
  

<?php
if (@$result->num_rows > 0) {
	echo '
	<form>
	<table class="table table-bordered">
  <thead>
      <tr>
        <th style="width:300px">Ürün Adı</th>
        <th style="width: 60px">Miktar</th>
        <th>Fiyat</th>
        <th>Tutar</th>
      </tr>
    </thead>
     <tbody>
     	<script>var toplam = 0;</script>
     ';
     		$sira=0;
     		$toplam=0;
			while($row = $result->fetch_assoc()) {
				echo'
		
		<tr>
        <td><span style="font-size:17px">'.$row["adi"].'</span><span style="font-size:11px"> (';echo $row["urun_kodu"].')</span></td>
        <td>    <input type="number" id="miktar'.$sira.'" name="miktar" min="1" max="999" style="width:50px" onKeyPress="if(this.value.length==3) return false;" value=1 />
		</td>
        <td><span id="fiyat'.$sira.'">'.$row["fiyati"].'</span></td>
        <td>
        	<p id="pfiyat'.$sira.'"></p>
	        <p id="pmiktar'.$sira.'"></p>
	        <p id="ptutar'.$sira.'" onchange="geneltoplam()"></p>
	        <p id="ptoplam">0</p>
	        <script>
	        
					document.getElementById("miktar'.$sira.'").addEventListener("change", hesapla);  
			     	function hesapla(){

				     	var fiyat'.$sira.' = document.getElementById("fiyat'.$sira.'").innerText;
			       		var miktar'.$sira.' = document.getElementById("miktar'.$sira.'").value;
				     	document.getElementById("pfiyat'.$sira.'").innerText = fiyat'.$sira.';
				        document.getElementById("pmiktar'.$sira.'").innerText = miktar'.$sira.';
				     	var tutar'.$sira.' = fiyat'.$sira.' * miktar'.$sira.';
				        document.getElementById("ptutar'.$sira.'").innerText = tutar'.$sira.';
			        }
			    hesapla();
	        </script>
        </td>

      </tr>

      </form>
      ';		
$sira+=1;
				}
			}else{
				echo "Sepetiniz Boş";
			}




$conn->close();

?>


    </tbody>
  </table>
  <p id="demo"></p>
</div>	

<?php 
echo '<script>
var myObject = {
	toplam:0,
    
    topla: function(gelentoplam,tutar) {
    			this.toplam=gelentoplam+tutar;
    			return this.toplam;
    		}
    }
var aa=0;
for (i=0;i<'.$sira.';i++){
gaa=document.getElementById("ptutar'.$sira.'").innerText;
aa=aa+gaa;
}
var a=myObject.topla(20,5);
document.getElementById("demo").innerHTML = gaa;
</script>
';

?>

</body>
</html>