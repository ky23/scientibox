<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Scientibox');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $this->Html->script(array(
		'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
		'canvas-loader.min',
		'https://maps.googleapis.com/maps/api/js?sensor=false',
		'cakebootstrap',
		'bootstrap.min',
		'jquery-ui.min'
		));
	echo $this->Html->css(array(
		// 'cake.generic',
		'bootstrap.min',
		'jquery.inputfile',
		'jquery-ui.min',
		'jquery-ui.structure.min',
		'jquery-ui.theme.min',
		'style',
		));
	echo $this->Html->meta('icon');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>
<body>
	<!-- Header -->
	<header> 
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="glyphicon glyphicon-align-justify"></span>
					</button>
					<div class="logo">
						<?php 
						echo $this->Html->link($this->Html->image('logo.png', array('alt' => 'smse logo', 'border' => '0')),
							array('controller' => 'home', 'action' => 'index'), array('target' => '_self', 'escape' => false, 'id' => 'logo'));
							?>
							<h2>Scientibox</h2>
						</div> <!-- end of logo -->
					</div> <!-- end of navbar-collapse -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'index') && $this->params['controller'] == 'home') ? 'active' : 'inactive' ?>">
								<?php echo $this->Html->link('Accueil',
								array('controller' => 'home', 'action' => 'index'));?>
								<div class="trapez1" style="visibility: <?php echo (!empty($this->params['action']) && ($this->params['action'] == 'index') && $this->params['controller'] == 'home') ? 'visible' : 'hidden' ?>"></div>
							</li>
							<li><a href="#">Comment ça marche?</a></li>
							<li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'contact') && $this->params['controller'] == 'home') ? 'active' : 'inactive' ?>">
								<?php echo $this->Html->link('Nous contacter',
								array('controller' => 'home', 'action' => 'contact'));?>
								<div class="trapez3" style="visibility: <?php echo (!empty($this->params['action']) && ($this->params['action'] == 'contact') && $this->params['controller'] == 'home')?'visible' :'hidden' ?>"></div>
							</li>
						</ul>
					</div> <!-- end of navbar-collapse -->
					<?php 
					if ($logged_in) {
						echo $this->element('logout'); 
					} else {
						echo $this->Html->link('Admin', array('controller' => 'admins', 'action' => 'login'), array('id' => 'admin-button', 'class' => 'btn btn-default'));
					}
					?>
				</div> <!-- end of container-fluid -->
			</nav>
		</header>
		<!-- Main body -->
		<div class="container">
			<div id="content">
				<div id="canvasloader-container" class="wrapper"> 
					<h4 id="loading">Chargement...</h4>
				</div>
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div> <!-- end of content -->
		</div> <!-- end of container -->
		<!-- Footer -->
		<footer>
			<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
				<div class="container">
					<p>&copy;2014 - Copyright Scientipôle Initiative.</p>
					<ul class="footer-brand">
						<li class="<?php echo (!empty($this->params['action']) && ($this->params['action'] == 'about') && $this->params['controller'] == 'main') ? 'active' : 'inactive' ?>">
							<?php echo $this->Html->link('A propos',
							array('controller' => 'home', 'action' => 'about'));?>
						</li>
						<li><?php echo $this->Html->link('CGU',
						array('controller' => 'home', 'action' => 'cgu'));?>
					</li>
				</ul>
			</div>
		</nav>
	</footer>
	<?php echo $this->Html->script(array(
		'datepicker.js',
		'jquery.inputfile',
		'loader',
		'script'
		));?>
		<!-- Print out cached javascripts -->
		<?php echo $this->Js->writeBuffer(); ?>
	</body>
	</html>
