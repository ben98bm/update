<?php
require_once('connexion.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu msa</title>

    <!-- aos css cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- google fonts cdn link  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;500&family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
    
<!-- header section starts  -->

<header>
    
    <a href="#" class="logo"><img src="images/logo-img.png" alt=""></a>
    <h1>
        
    <div class="clock"></div>
    
    </h1>

    <div id="menu-bar" class="fas fa-hamburger"></div>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="#home">Accueil</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#order">Commande</a></li>
            <li><a href="#liste">Liste commandes</a></li>
        </ul>
       
    </nav>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content" data-aos="fade-right">
        <h3>La Bonne Nourriture Offre Un Grand Sourire</h3>
        <p class="heading">Menu du jour <span> MSA SENEGAL </span></p>
    </div>

    <div class="image" data-aos="fade-up">
        <img class="mySlides" src="images/thiboudieune.jpg" alt="">
    </div>

</section>

<!-- home section ends -->

<section class="menu" id="menu">

<h1 class="heading"> Notre Délicieux <span>Menu</span></h1>
<h6 class="heading"><span>Spécialité Du Jour</span></h6>
<ul class="list" data-aos="fade-down">
    <li class="btn active" data-src="images/img7.jpeg">Déjeuner</li>
</ul>

<div class="row" data-aos="fade-right">

    <div class="image" data-aos="fade-left">
        <img src="images/Pael.jpg" id="menu-img" alt="">
    </div>

    <div class="content">
        <div class="info">
            <h3> <span>01.</span> Chez Baba DIENG </h3>
            <p>Thiep Diaga</p>
            <p>Thiou Kandia</p>
        </div>
        <div class="info">
            <h3> <span>02.</span> Chez Léger </h3>
            <p>Thiou carry Yapp</p>
            <p>Steak frite</p>
        </div>
        <div class="info">
            <h3> <span>Etat des commandes</span></h3><br>
            <marquee><h3><span>Commande en attentes...</span></h3></marquee>
        </div>
        
    </div>

</div>

</section>

<!-- order section starts  -->

<section class="order" id="order">

<h1 class="heading"> Passer une <span>commande</span> </h1>

<div class="row">
    
<?php
            if(isset($_POST['submit'])){ //Si le bouton a été enclenché
                if(isset($_POST['nom'], $_POST['presta'], $_POST['reservation'])){
                    
                    if($_POST['nom']!="" && $_POST['presta']!="" && $_POST['reservation']!=""){
                        
                        //Enregistrement en base de données
                        $nom = $_POST['nom'];
                        $presta = $_POST['presta'];
                        $reservation = $_POST['reservation'];
                        
                        
                        
                            $insertion = "INSERT INTO repas(nom, prestataire, reservation) VALUES('$nom','$presta', '$reservation')";
                        $execute = $cne -> query ($insertion);
                        if ($execute== true){
                               echo "<h3 align ='center'><font color='#F7CA3E'>Commande enregistrée avec succés!</font></h3>";
                        }else{
                            
                            echo "<h3 align ='center'><font color='#F7CA3E'>Désolez, la commande n'a pas pu être enregistrée!</font></h3>";
                        }
                    }
                }   
            }
        ?> 
    
    <form method="post" action="" data-aos="fade-right">
        <input type="text" name="nom" placeholder="Prénom Nom" class="box">
        <input type="text" name="presta" placeholder="Prestataire" class="box">
        <input type="text" name="reservation" placeholder="Votre commande" class="box">
        <input type="submit" name="submit" value="Commander maintenant" class="btn">
        <input type="reset" value="Réinitialiser la commande"
     accesskey="r" class="btn">
    </form>

    <div class="image" data-aos="fade-left">
        <img src="images/salade-maison.jpg" alt="">
    </div>

</div>

</section>

<!-- order section ends -->
    
    <section class="liste" id="liste">
        <h1 class="heading"> Liste des <span>commandes</span> </h1>
        <div class="row">
           
      <h2>Chez Baba DIENG</h2>
      <div class="table-responsive">
           <?php   
	$connexion = mysqli_connect("localhost","root","","commande");
    $query="SELECT * From repas where prestataire ='Baba Dieng' OR prestataire ='Baba DIENG' OR prestataire ='Babadieng' OR prestataire ='MADAME DIENG' OR prestataire = 'Baba'";
	$query_run= mysqli_query($connexion, $query);

		  ?>
          
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              
              
              <th scope="col">Id de la commande</th>
              <th scope="col">Nom et Prenom</th>
              <th scope="col">Prestataire</th>
              <th scope="col">Commande</th>
              
            </tr>
          </thead>
          <tbody>
          
              
               <?php      
					if(mysqli_num_rows($query_run)>0){
						
					while($row = mysqli_fetch_assoc($query_run)){	
					?>
					
                  <tr>  
					
                 
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['prestataire']; ?></td>
                    <td><?php echo $row['reservation']; ?></td>
                    
                  </tr>
					
                 	<?php
                        
					}	
						
					} else
					
					{
						
                        echo "<h2 align ='center'><font color='#45a049'>Désolez, la table est vidée!</font></h2>";
                        
					}
              
					?>
              
          </tbody> 
        </table>
       
      </div>
        </div>
<br>
        
        <div class="row">
           
      <h2>Chez Leger</h2>
      <div class="table-responsive">
           <?php   
	$connexion = mysqli_connect("localhost","root","","commande");
    $query="SELECT * From repas WHERE prestataire IN ('léger', 'leger')";
	$query_run= mysqli_query($connexion, $query);

		  ?>
          
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              
              <th scope="col">Id de la commande</th>
              <th scope="col">Nom et Prenom</th>
              <th scope="col">Prestataire</th>
              <th scope="col">Commande</th>
              
            </tr>
          </thead>
          <tbody>
          
              
               <?php      
					if(mysqli_num_rows($query_run)>0){
						
					while($row = mysqli_fetch_assoc($query_run)){	
					?>
					
                  <tr>  
					
                
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['prestataire']; ?></td>
                    <td><?php echo $row['reservation']; ?></td>
                    
                  </tr>
					
                 	<?php
                        
					}	
						
					} else
					
					{
						
                        echo "<h2 align ='center'><font color='#45a049'>Désolez, la table est vidée!</font></h2>";
                        
					}
              
					?>
              
          </tbody> 
        </table>
       
      </div>
        </div>

</section>

<!-- footer section starts  -->

<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>contact info</h3>
            <p> <i class="fas fa-map-marker-alt"></i> Thies / Senegal, </p>
            <p> <i class="fas fa-envelope"></i> seckmaodomalick0@gmal.com </p>
            <p> <i class="fas fa-phone"></i> +221 77 795 16 98 </p>
        </div>

        <div class="box">
            <h3>Liens vers </h3>
            <a href="#home">Accueil</a>
            <a href="#menu">menu</a>
            <a href="#order">Commande</a>
            <a href="#liste">Liste Commandes</a>
        </div>

        <div class="box">
            <h3>Suivez-nous</h3>
            <a href="https://www.instagram.com/" target="_blank">instagram</a>
            <a href="https://www.facebook.com/pt221" target="_blank">facebook</a>
            <a href="#" target="_blank">twitter</a>
            <a href="#">linkedin</a>
        </div>

    </div>

    <h1 class="credit">conçu par <a href="https://www.facebook.com/pt221" target="_blank">Pout Tech 221</a> Tous droits réservés. </h1>

</div>

<!-- footer section ends -->




<div class="loader-container">
    <img src="images/loader.gif" alt="">
</div>






<!-- aos js cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- initializing aos  -->

<script>

    AOS.init({
        delay:400,
        duration:1000
    })

</script>

    <!--script type="text/javascript" src="https://click123.ca/dist/js/snow.js"></script-->
</body>
</html>