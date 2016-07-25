<?php
session_start();

if (isset($_GET["logout"]))
{
	unset($_SESSION['user_name']);
	header("Location: login.php");
	exit();
}

if (isset($_SESSION["user_name"]))
  $sUserName = $_SESSION["user_name"];
else 
  $sUserName = "Guest";
/**
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
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('utf-8'); ?>
	<title>
		<?php echo "臺灣寶島之美"; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
    echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('style');
		echo $this->Html->script('jquery');
		echo $this->Html->script('jquery.preloader');
		echo $this->Html->script('superfish');
		echo $this->Html->script('touchTouch.jquery');
		
	?>
</head>
<body>
	<header>
	  
    <div class="container clearfix">
      <div class="row">
        <div class="span12">
          <div class="navbar navbar_">
            <div class="container">
              <h1 class="brand brand_"><?php echo $this->Html->image('logo.jpg'); ?></h1>
              <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
            <div class="nav-collapse nav-collapse_  collapse">
              <ul class="nav sf-menu">
                <li class="active"><?php echo $this->Html->link('首頁', array('controller' => 'posts', 'action' => 'index')); ?></li>
                <li><a href="https://lab-stevehong0615.c9users.io/ProjectAlbum/Home/index">美景導覽</a></li>
                <li><a href="https://lab-stevehong0615.c9users.io/ProjectAlbum/Home/contact">連絡站長</a></li>
                <?php if ($sUserName == "Guest"): ?>
                <li><a href="https://lab-stevehong0615.c9users.io/kataklimt/login.php">登入</a></li>
                <?php else: ?>
                <li><a href="https://lab-stevehong0615.c9users.io/kataklimt/secret.php">會員中心</a></li>
                <li><a href="https://lab-stevehong0615.c9users.io/kataklimt/login.php?logout=1">登出</a></li>
                <?php endif; ?>
              </ul>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <div id="container">
		<div id="header">
			<h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php //echo $this->Html->link(
					//$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					//'http://www.cakephp.org/',
					//array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				//);
			?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
  <?php //<script type="text/javascript" src="js/bootstrap.js"></script> ?>
<body>
</html>
