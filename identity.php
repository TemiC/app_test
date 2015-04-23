<?php

  session_start();
  // Afficher les erreurs à l'écran
  ini_set('display_errors', 1);
  // Afficher les erreurs et les avertissements
  error_reporting(e_all);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="content-language" content="fr" />
    <title> Quiz me ! </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
    <div id="container">
      <div id="parent">
        <img src= "images/404.jpeg" width="100" height="100" alt="quiz" title="logo" vspace="5" hspace="5"/>
      </div>
      <h1> QUIZ WE FOUND 404 FAN </h1>
      <?php

      require_once("connectionSave.php");
      // try {
       //$user_picture = $facebook->api('/me');
        // La photo de profil
       $user_picture = $facebook->api('/me/picture'); 
        // La photo de couverture
      $user_cover = $facebook->api('/me?fields=cover');  

      } 
      catch (FacebookApiException $e) {
        error_log($e);
      }*/
    ?>
      <div>
        <!-- On affiche les informations de l'utilisateur -->                
        <h1>Merci d'avoir participé à notre QUIZ</h1>    
        <table>
          <thead>
            <tr>
              <th>Paramètre</th>
              <th>Valeur</th>
            </tr>
          </thead>
          <tbody>
          <tr>
                <td>Prénom</td>
                <td><?php echo $_SESSION['fname']; ?></td>
            </tr>
            <tr>
                <td>ID</td>
                <td><?php echo $_SESSION['id_fb'];?></td>
            </tr>
            
            <tr>
                <td>Nom</td>
                <td>
                  <?php echo $_SESSION['lname']; ?>
                </td>
            </tr> 
            <tr>
                <td>Email</td>
                <td>
                  <?php echo $_SESSION['email']; ?>
                </td>
            </tr>    
            <tr>
                <td>Genre</td>
                <td>
                  <?php echo $_SESSION['genre']; ?>
                </td>
            </tr>    
            <tr>
                <td>Photo de profil</td>
                <td>
                  <img src="<?php echo $user_picture['data']['url'] ?>" />
                </td>
            </tr>  
            <tr>
                <td>Photo de couverture</td>
                <td>
                  <img src="<?php echo $user_cover['cover']['source'] ?>" />
                </td>
            </tr>  
          </tbody>
        </table>
      </div>       
 </div>
  </body>
</html>