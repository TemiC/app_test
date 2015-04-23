<?php

  require_once("connection.php");

  if ($user) {
    try {
    $user_profile = $facebook->api('/me'); 
    // La photo de profil
    $user_picture = $facebook->api('/me/picture?redirect=false&height=128&type=normal&width=128'); 
    // La photo de couverture
    $user_cover = $facebook->api('/me?fields=cover');  
  } 
  catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

?>
 
<!doctype html>
<html>
  <head>
    <title>Ma première application Facebook</title>   
    <meta charset="UTF-8">
  </head>
  <body>
 
    <?php if ($user): ?>
      <div>
        <!-- On affiche les informations de l'utilisateur -->                
        <h1>Vos informations publiques</h1>    
        <table>
          <thead>
            <tr>
              <th>Paramètre</th>
              <th>Valeur</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>ID</td>
                <td><?php echo $user_profile['id']; ?></td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td><?php echo $user_profile['first_name']; ?></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td>
                  <?php echo $user_profile['last_name']; ?>
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