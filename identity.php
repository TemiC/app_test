<?php

  require('facebook-php-sdk-v4-4.0-dev/autoload.php'); 
  session_start();
  $appId = '1560387527551071'; 
  $appSecret = 'da15602cebc359bd7b49b4ff354950f0';
echo "test in";
// On essaye ensuite de récupérer l'utilisateur identifié au moyen de 
// la méthode getUser()
$user = $facebook->getUser();

// Si l'objet $user est défini, cela veut dire que l'utilisateur est 
// bien identifié sur facebook, reste à déterminer s'il est identifié 
// sur notre application

if ($user) {
  try {
    // On va tenter de récupérer les données de l'utilisateur au moyen 
    // de la méthode api()
    // Les données publiques
    $user_profile = $facebook->api('/me'); 
    // La photo de profil
    $user_picture = $facebook->api('/me/picture?redirect=false&height=128&type=normal&width=128'); 
    // La photo de couverture
    $user_cover = $facebook->api('/me?fields=cover');  
  } catch (FacebookApiException $e) {
    // Si l'utilisateur n'est pas authentifié sur notre application, 
    // une exception est remontée.
    error_log($e);
    $user = null;
  }
}

// En fonction du statut de connexion de l'utilisateur, on récupère 
// une URL de connexion ou de déconnexion
if ($user) {
  // On passe en paramètre l'URL absolue de la page vers laquelle 
  // l'utilisateur est redirigé après déconnexion, arbitrairement 
  // l'accueil de Facebook
  $logoutUrl = $facebook->getLogoutUrl(array(
    'next' => 'https://www.facebook.com'
  ));
} else {
  // On passe en paramètre l'URL absolue de la page vers laquelle 
  // l'utilisateur est redirigé après connexion, ici notre app
  $loginUrl = $facebook->getLoginUrl(array(
    'redirect_uri' => 'https://apps.facebook.com/demotreizepixels/'
  ));
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
    <?php endif ?>
 
    <div style="margin-top:20px;">
      <?php if ($user): ?>
        <!-- Bouton de déconnexion de l'application ET facebook -->
        <!-- 
        Pour éviter des problèmes liés à la sécurité des iframes, 
        n'oubliez pas l'attribut target="_top" 
        sur les liens de redirection. 
        -->
        <a target="_top" href="<?php echo $logoutUrl; ?>">Déconnexion</a>
      <?php else: ?>
        <!-- Bouton de connexion à l'application -->
        <!-- 
        Pour éviter des problèmes liés à la sécurité des iframes, 
        n'oubliez pas l'attribut target="_top" 
        sur les liens de redirection.
        -->
        <a target="_top" href="<?php echo $loginUrl; ?>">Connexion</a>
      <?php endif ?>
    </div>
 
  </body>
</html>