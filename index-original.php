<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>
<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Anthony Ho | Full-Stack Developer</title>
  
  <link href="styles.css" type="text/css" rel="stylesheet">
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>

  <h1>Anthony Ho - Full-Stack Developer</h1>

  <?php

  $query = 'SELECT *
    FROM projects
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );

  ?>

  <p>There are <?php echo mysqli_num_rows($result); ?> projects in the database!</p>

  <hr>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <div>

      <h2><?php echo $record['title']; ?></h2>
      <?php echo $record['content']; ?>

      <?php if($record['photo']): ?>

        <p>The image can be inserted using a base64 image:</p>

        <img src="<?php echo $record['photo']; ?>" width="800px">

        <p>Or by streaming the image through the image.php file:</p>

        <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>&width=100&height=100">

      <?php else: ?>

        <p>This record does not have an image!</p>

      <?php endif; ?>

    </div>

    <hr>

  <?php endwhile; ?>

  <br>

  <h2>My Skills</h2>

  <?php

  $query = 'SELECT * 
    FROM skills
    ORDER BY percent DESC';
    $result = mysqli_query($connect, $query);

    ?>

    <?php while($record = mysqli_fetch_assoc($result)): ?>
    
      <h3><?php echo $record['name']; ?></h3>

      <p>Percent: <?php echo $record['percent']; ?></p>

      <div style="background-color: grey;">
        <div style="background-color: red; height: 20px; width:<?php echo $record['percent']; ?>%;"></div>
      </div>

    <?php endwhile; ?>

</body>
</html>
