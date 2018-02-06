<body>

    <?php $this->getView('user', 'main', 'header', ''); ?>
	<?php $this->getView('user', 'main', 'menu', ''); ?>
	
    Hello Admin !!!
    
    <?php $this->getView('user', 'main', 'footer', ''); ?>
    <script src="<?= $this->link($this->getProject() . $this->getController() . '/script.php'); ?>"></script>
    
</body>
