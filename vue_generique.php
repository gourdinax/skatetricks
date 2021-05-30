 <?php 

	class vueGenerique{

		function __construct() {
			ob_start();
			ob_implicit_flush(0);
		}

		function getAffichage() {
			return ob_get_clean();
		}

	}

?>