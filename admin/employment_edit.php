<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: employment.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['name'] )
  {
    
    $query = 'UPDATE employment SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      location = "'.mysqli_real_escape_string( $connect, $_POST['location'] ).'",
      startDate = "'.mysqli_real_escape_string( $connect, $_POST['startDate'] ).'",
      endDate = "'.mysqli_real_escape_string( $connect, $_POST['endDate'] ).'",
      experience = "'.mysqli_real_escape_string( $connect, $_POST['experience'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Job has been updated' );
    
  }

  header( 'Location: employment.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM employment
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: employments.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Employment</h2>

<form method="post">

  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">

  <br>
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
    
  <br>
  
  <label for="location">Location:</label>
  <input type="text" name="location" id="location" value="<?php echo htmlentities( $record['location'] ); ?>">

  <br>

    <label for="startDate">Start Date:</label>
  <input type="date" name="startDate" id="startDate" value="<?php echo htmlentities( $record['startDate'] ); ?>">

  <br>

    <label for="endDate">End Date:</label>
  <input type="date" name="endDate" id="endDate" value="<?php echo htmlentities( $record['endDate'] ); ?>">

  <br>

    <label for="experience">Experience:</label>
  <textarea type="text" name="experience" id="experience" rows="5"><?php echo htmlentities( $record['experience'] ); ?></textarea>
  
  <script>

  ClassicEditor
    .create( document.querySelector( '#experience' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <input type="submit" value="Edit Job">
  
</form>

<p><a href="employment.php"><i class="fas fa-arrow-circle-left"></i> Return to Employment List</a></p>


<?php

include( 'includes/footer.php' );

?>