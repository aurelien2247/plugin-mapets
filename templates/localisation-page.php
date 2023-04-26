<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Projet-Collier Pour Chien</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/wp-content/themes/Projet-CollierPourChien/assets/css/style.css">
  <link rel="stylesheet" href="/wp-content/plugins/admin_templates/css/custom.css">
	<script src="https://kit.fontawesome.com/cfa8de8fe8.js" crossorigin="anonymous"></script>
</head>
<header>
	<!-- Haut de page -->
	<nav class="header">
		<img  class="logo" src="/wp-content/themes/Projet-CollierPourChien/image/logo.png">
		<?php connexion_utilisateur(); ?>
	</nav>

	<script type="text/javascript">
		const navSlide = () => {
			const burger = document.querySelector('.burger');
			const nav = document.querySelector('.nav-links');
			const navLinks = document.querySelectorAll('.nav-links li')
			
			burger.addEventListener('click',()=>{

				nav.classList.toggle('nav-active');

			navLinks.forEach((link, index) => {
				if(link.style.animation) {
					link.style.animation = '';
				} else {
					link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 +0.5}s`;
				}
			});
		});
	}
		navSlide();
	</script>
</header>
<body>  
<?php
$user = wp_get_current_user();
if ( in_array( 'author', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ) {
?>
  <div class="box-left">
	<?php collar(); ?>
    <?php animal();?>
  </div>
  <div class="box-right">
    <?php recap(); ?>
  </div><br><br><br><br><br><br><br><br><br><br><br><br>

<?php
} else {
	// L'utilisateur actuel n'est pas administrateur
	echo '
    <div id="acount-box">
        <h1>Erreur:</h1>
        <p class="inscription"> Afin de pouvoir avoir accès à cette page il est nécéssaire d\'avoir des roles de professionel</a>.
        <br>Si vous pensez qu\'il y a erreur contacter l\'équipe de developpement ou l\'administrateur du site</a>.
        <br><br> Cette page vous permeteras de pouvoir créer des animaux et de leur y assigner un collier.</p>
    </div>';
}
?>
</body>
<?php get_footer(); ?>
<script src="/wp-content/themes/Projet-CollierPourChien/assets/js/main.js"></script>
</html>