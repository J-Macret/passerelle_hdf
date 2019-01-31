<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Passerelle numérique HDF</title>

</head>

<body>
   
   <div id="slide-home">
        <!--<div id="terre"><img src="img/logo.PNG"></div>-->
      </div>
   
    <nav class="navbar navbar-dark">
        
        <button class="navbar-toggler boutton" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            
    <span class="navbar-toggler-icon"></span>
  </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a href="charte.html">Charte d'excellence</a>
                </li>
                <li class="nav-item">
                    <a href="partenaires.html">Partenaires</a>
                </li>
                <li class="nav-item">
                    <a href="formations.html">Formations</a>
                </li>
                <li class="nav-item">
                    <a href="contact.html">Contact</a>
                </li>
            </ul>

        </div>
    </nav>


    <div class="container">
        <br>
        
        <!-- Affichage des erreurs -->
        <?php if(array_key_exists('errors', $_SESSION)): ?>
            <div class="alert alert-danger">
                <?= implode('<br>', $_SESSION['errors']); ?>
            </div>
        <?php endif; ?>
        <!-- Affichage des réussites -->
        <?php if(array_key_exists('success', $_SESSION)): ?>
            <div class="alert alert-success">
                Votre email a bien été envoyé !    
            </div>
        <?php endif; ?>
        
        
        
        <form method="post" action="post_contact.php">
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="inputname">Nom :</label>
                    <input type="text" class="form-control" id="inputname" name="name" placeholder="Votre nom" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
                </div>
                <div class="form-group col-lg-6">
                    <label for="inputsurname">Prénom :</label>
                    <input type="text" class="form-control" id="inputsurname" name="surname" placeholder="Votre prenom" value="<?= isset($_SESSION['inputs']['surname']) ? $_SESSION['inputs']['surname'] : ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputmail">Email :</label>
                <input type="email" class="form-control" id="inputmail" name="mail" placeholder="votremail@exemple.com" value="<?= isset($_SESSION['inputs']['mail']) ? $_SESSION['inputs']['mail'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="inputcontact">Qui souhaitez-vous contacter ?</label>
                <select class="form-control" id="inputcontact" name="contact">
      <option value="1">AFP2I</option>
      <option value="2">FACE Artois</option>
      <option value="3">ID Formation</option>
      <option value="4">Perspectives 3D</option>
      <option value="5">ACTIF</option>
      <option value="6">SIMPLON</option>
      <option value="7">Indelab</option>
      <option value="8">FFP</option>
      <option value="9">AFPA</option>
      <option value="10">AIFOR</option>
      <option value="11">ID 6</option>
      <option value="12">ADEP</option>
      <option value="13">Mouvement associatif Hauts-de-France</option>
      <option value="14">CLUB TACTIC Artois</option>
      <option value="15">Université Lille</option>
      <option value="16">APapp</option>
      <option value="17">SyNOFDES</option>
      <option value="18">AROFESEP</option>
      <option value="19">Passeport-Formation</option>
    </select>
            </div>

            <div class="form-group">
                <label for="inputmessage">Votre message :</label>
                <textarea class="form-control" id="inputmessage" name="message" rows="10" value="<?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?>"></textarea>
            </div>
            <p>Combien font 1+3: <span style="color:#ff0000;">*</span>: <input type="text" name="captcha" size="2" /></p>

            <button type="submit" name="submit" class="btn mb-5">Envoyer</button><br>

        </form>

        <h2>Débug</h2>
        <?= var_dump($_SESSION); ?>

    </div>
<footer class="pt-4 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 ">Passerelle Numérique <br>© 2017-2018</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Partenaires principaux</h5>
                    <ul class="list-unstyled text-small">
                        <li><a href="http://www.afp2i.fr">AFP2I</a></li>
                        <li><a class="" href="https://www.fondationface.org/face-artois/">FACE Artois</a></li>
                        <li><a class="" href="http://www.id-formation.fr/">ID Formation</a></li>
                        <li><a class="" href="http://www.3d-nord.fr/">Perspectives 3D</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Ressources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="" href="cgu.html">CGU</a></li>

                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>A propos</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="" href="#">Lorem</a></li>
                        <li><a class="" href="#">IPSUM</a></li>
                    </ul>
                </div>
            </div>
        </footer>

</body>

<!-- SCRIPT -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>


<?php
unset($_SESSION['inputs']);
unset($_SESSION['errrors']); 
unset($_SESSION['success']); 
?>