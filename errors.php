<?php if(sizeof($errors) > 0 ): ?>
 
  <div class="error">
  	
  	<?php foreach ($errors as $value): ?>	

  		<p> <?php echo $value ; ?> </p>
  		
  	<?php endforeach ?>

  </div>


<?php endif ?>	