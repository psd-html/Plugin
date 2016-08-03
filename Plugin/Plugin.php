<?php
class Plugin extends plxPlugin {
 
    public function __construct($default_lang){
    # Appel du constructeur de la classe plxPlugin (obligatoire)
    parent::__construct($default_lang);

    # Pour accéder à une page d'administration
    $this->setAdminProfil(PROFIL_ADMIN,PROFIL_MANAGER);
    # Personnalisation du menu admin
    $this->setAdminMenu('Titre du plugin', 1, 'Légende du lien');
    
    # Pour accéder à une page de configuration
    $this->setConfigProfil(PROFIL_ADMIN,PROFIL_MANAGER);
    # Déclaration des hooks
    $this->addHook('ThemeEndHead', 'ThemeEndHead');
    $this->addHook('ThemeEndBody', 'ThemeEndBody');
    $this->addHook('Plugin', 'Plugin'); //hook pour l'affichage manuel
    } 
    
    public function ThemeEndHead() { ?>
    
        <link rel="stylesheet" href="<?php echo PLX_PLUGINS ?>Plugin/APP/style.min.css">

     <?php
    }
    
    public function Plugin() {?>
      
      <!-- code du plugin -->

      <?php
    }

    public function ThemeEndBody(){ 

    $script = $this->getParam('script');

        if ($script == 'true') { echo'<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>';}
 
    }
      
} // class Plugin
?>
