<h1><?php echo $heading; ?></h1>
<?php foreach($listings as $listing): ?>
   <h1><?php echo $listing["title"]; ?></h1>
   <p><?php echo $listing["description"]; ?></p>
<?php endforeach; ?>