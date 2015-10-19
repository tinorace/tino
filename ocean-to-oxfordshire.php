<!DOCTYPE php>
<html>
<head>
	<?php include 'includes/metatags.php'; ?>
	<?php include 'includes/iphone.php'; ?>
  <title>Tino Race</title>
<script type="text/javascript" src="js/get-css.js"></script>
<link type="text/css" rel="stylesheet" href="css/plugins.css">
<?php include 'includes/scripts-both.php'; ?>
<?php include 'includes/scripts-desktop.php'; ?>
	</head>
	
<body>
<div id="container">
  <div id="header">
   <div id="home"><a href="./"><img src='../Tino/img/tino-logo.png' alt='tinorace.co.uk' width='150px'></a>
<a href="./"><img src='../Tino/img/logo.png' alt='tinorace.co.uk' width='300px'></a></div>
<h1><a href="./">Tino Race</a></h1>
   <?php include 'includes/nav-bar.php'; ?>
  </div>
  
  <div id="summary">
  <?php include 'includes/about-summary.php'; ?>
    </div>
 
	<div id="sidebar-1">
   <?php include 'includes/sidebar.php'; ?>
   <div id="div3_example" style="margin:10px 0 30px 0; width:205px; height:230px;"></div>
	</div>
   <div id="content">
 <?php include 'content/content-ocean-to-oxfordshire.php'; ?>

</div>

  <div id="footer">
    <?php include 'includes/footer.php'; ?>
  </div>
</div>
</body>
</html>
