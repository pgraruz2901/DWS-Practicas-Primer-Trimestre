<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $titulo; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/estilos/principal5.css" />

	<link rel="icon" type="image/png" href="/imagenes/favicon.png" />
	<?php
	if (isset($this->textoHead))
		echo $this->textoHead;
	?>
</head>

<body>
	<div id="todo">
		<header>
			<div class="logo">
				<a href="/index.php"><img src="/imagenes/logo.png" width="50px" height="50px" /></a>
			</div>
			<div class="titulo">
				<a href="/index.php">
					<h1>PROYECTO FRAMEWORK PEDROSA</h1>
				</a>
			</div>

		</header><!-- #header -->
		<nav id="submenu">
			<ul><?php echo CHTML::link("Practicas 1", Sistema::app()->generaURL(["practicas1", "miindice"])); ?></ul>
			<ul><?php echo CHTML::link("Practicas 2", Sistema::app()->generaURL(["practicas2", "index"])); ?></ul>
		</nav>
		<div class="barraMenu">
			<ul>
				<?php
				if (isset($this->menuizq)) {
					foreach ($this->menuizq as $opcion) {
						if ($opcion !== $this->menuizq[0]) {
							echo CHTML::dibujaEtiqueta("p");
							echo ">   ";
							echo " ";
							echo CHTML::dibujaEtiquetaCierre("p");
						}

						echo CHTML::dibujaEtiqueta(
							"li",
							array(),
							"",
							false
						);
						echo CHTML::css("padding", "40px");
						echo CHTML::link(
							$opcion["texto"],
							$opcion["enlace"]
						);
						echo CHTML::dibujaEtiquetaCierre("li");
						echo CHTML::dibujaEtiqueta("br") . "\r\n";
					}
				}

				?>
			</ul>
		</div>


		<div class="contenido">
			<aside>
				<ul>
					<?php
					if (isset($this->menuizq)) {
						foreach ($this->menuizq as $opcion) {
							echo CHTML::dibujaEtiqueta(
								"li",
								array(),
								"",
								false
							);
							echo CHTML::link(
								$opcion["texto"],
								$opcion["enlace"]
							);
							echo CHTML::dibujaEtiquetaCierre("li");
							echo CHTML::dibujaEtiqueta("br") . "\r\n";
						}
					}

					?>
				</ul>
			</aside>
			<article>
				<?php echo $contenido; ?>
			</article><!-- #content -->

		</div>
		<footer>
			<h2><span>Copyright:</span> <?php echo Sistema::app()->autor ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
		</footer><!-- #footer -->

	</div><!-- #wrapper -->
</body>

</html>