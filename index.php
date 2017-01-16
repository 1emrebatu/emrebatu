<!DOCTYPE html>
<html>
<head>
	<title>Klaros Silver</title>
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="descprition" content="Takı Dünyası.">
	<meta name="author" content="Emre BATU">
	<meta name="keywords" content="takı, gümüş bileklik, gümüş kolye">

	<link href="css/bootstrap.min.css"  rel="stylesheet">
	<link href="css/merve.css" rel="stylesheet">


	
</head>

<body>



<?php 

ob_start();
include("conn.php"); 
$sql = "SELECT * FROM urun WHERE aktif=1";
$result = $conn->query($sql);
?>


<!--<nav id="nav-1">

  <a class="link-1" href="#">Kadın</a>
  <a class="link-1" href="#">Erkek</a>

    <a class="link-1" href="#">Hakkımızda</a>
    <a class="link-1" href="#">İletişim</a>
     <a class="link-1" href="#">Ana Sayfa</a>


<div style="float: right"><a href="sepet.php" style="color:#FFFFFF"><button class="btn btn-success" type="button">Sepetim <span class="badge">
	<?php 
		/*if (isset($_COOKIE['urun'])){
			echo count($_COOKIE['urun']);
		}else{
			echo'BOŞ';
		}*/
	?>
</span></a>
</button></div>
</nav>-->
<div class="row" style="background-color: #ab9375; height: 30px; color:#FFFFFF; text-align: center;line-height: 30px; font-size: 16px"><div class="container">Tüm Ürünlerde Ücretsiz Kargo!</div></div>
<div class="row">
<nav class="navbar navbar-findcond">
    <div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<span class="navbar-brand banner">Klaros Silver</span>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> Sepetim <span class="badge">
						
						<?php 
							if (isset($_COOKIE['urun'])){
								echo count($_COOKIE['urun']);
							}else{
								echo'BOŞ';
							}
						?>	

					</span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="sepet.php"><i class="fa fa-fw fa-tag"></i> <?php if (@$_COOKIE['urun']!=""){
										foreach (@$_COOKIE['urun'] as $v) {
										   @$urunler=$urunler.$v.'</br>';

										}
									}
									echo $urunler;
									?></a></li>
						<!--<li></li>-->
						
					</ul>
				</li>
				<li class="active"><a href="#">Ana Sayfa <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Erkek <span class="sr-only"></span></a></li>
				<li><a href="#">Kadın <span class="sr-only"></span></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Yönetim <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
							<li>
								 <form class="navbar-form" role="search">
				                    <div class="form-group" style="margin-top: 3px;">
				                        <input type="email" class="form-control" name="email" placeholder="e-mail" autofocus>
				                    </div>
				                    <div class="form-group" style="margin-top: 3px;">
				                        <input type="password" class="form-control" name="password" placeholder="şifre">
				                    </div>
				                    <button type="submit" class="btn btn-default" style="margin-top: 3px;">Giriş</button>
				                </form>
							</li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-right search-form" role="search" id="search">
				<input type="text" class="form-control" placeholder="Ürün Ara" />
			</form>
		</div>
	</div>
</nav>
</div>


<div class="row" style="margin-top: 5px">
<div class="container" style="margin-top: 0px">

	<div class="row">

	<div class="thumbnails">

	<?php 
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			        /* echo "id: " . $row["id"]. " - Name: " . $row["adi"]. " " . $row["fiyati"]. "<br>"; */

			    echo '
					  <div class="col-md-4">
		              <div class="thumbnail">
		                <img src="'.$row["urun_resim1"].'" alt="ALT NAME">
		                <div class="caption">
		                  <span id="urun_adi">'.$row["adi"].' </span><span>('. $row["urun_kodu"].')</span>

		                  <h4 id="fiyat">'. $row["fiyati"].' TL</h4>
		                  '.(isset($_COOKIE['urun'][$row["urun_kodu"]]) ? '<a href="?cikart='.$row["urun_kodu"].'" class="btn btn-primary btn-block">Sepetten Çıkart</a>':'<a href="?ekle='.$row["urun_kodu"].'" class="btn btn-primary btn-block">Sepete Ekle</a>').'
		                </div>
		              </div>
		            </div>
				';

			}
			} else {
			    echo "Aranan kriterde ürün mevcut değildir.";
			}
			$conn->close();

			/*if (isset($_COOKIE['urun'])){
				echo 'Sepetinizde <a href="sepet.php"><span class="badge">'.count($_COOKIE['urun']).'</span></a> adet ürün var ';
			}else{
				echo 'Sepetiniz henüz boş';
			} */


			if (isset($_GET['ekle'])){
				$urun_id = $_GET['ekle'];
				setcookie('urun['.$urun_id.']', $urun_id, time() + 86400);
				header('Location:'.$_SERVER['HTTP_REFERER']); /*GÜVENLİK KONTROLLERİNİ YAP */
			}

			if (isset($_GET['cikart'])){
				setcookie('urun['.$_GET['cikart'].']', $_GET['cikart'], time() - 86400);
				header('Location:'.$_SERVER['HTTP_REFERER']); /*GÜVENLİK KONTROLLERİNİ YAP */
			}

	?>





              
        </div>
	</div>
</div>
</div>

<div class="footer">

<img src="img/social_media/Facebook.png" id="social_icon">
<img src="img/social_media/Twitter.png" id="social_icon" >
<img src="img/social_media/Instagram.png" id="social_icon">
<img src="img/social_media/Whatsapp.png" id="social_icon">

</div>




<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script>
			// For Demo purposes only (show hover effect on mobile devices)
			[].slice.call( document.querySelectorAll('a[href="#"') ).forEach( function(el) {
				el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			} );
		</script>

</body>