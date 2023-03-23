<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: educations.php' );
  die();
  
}

if( isset( $_POST['school'] ) )
{
  
  if( $_POST['school'] and $_POST['qualification'] )
  {
    
    $query = 'UPDATE educations SET
      school = "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
      qualification = "'.mysqli_real_escape_string( $connect, $_POST['qualification'] ).'",
      detail = "'.mysqli_real_escape_string( $connect, $_POST['detail'] ).'",
      start_date = "'.mysqli_real_escape_string( $connect, $_POST['start_date'] ).'",
      end_date = "'.mysqli_real_escape_string( $connect, $_POST['end_date'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been updated' );
    
  }

  header( 'Location: educations.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM educations
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: educations.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Education</h2>

<form method="post">
  
  <label for="school">School:</label>
  <input type="text" name="school" id="school" value="<?php echo htmlentities( $record['school'] ); ?>">
    
  <br>

  <label for="qualification">Qualification:</label>
  <input type="text" name="qualification" id="qualification" value="<?php echo htmlentities( $record['qualification'] ); ?>">
    
  <br>

  <label for="detail">Detail:</label>
  <input type="text" name="detail" id="detail" value="<?php echo htmlentities( $record['detail'] ); ?>">
    
  <br>
  
  
  <label for="start_date">Start Date:</label>
  <input type="date" name="start_date" id="start_date" value="<?php echo htmlentities( $record['start_date'] ); ?>">
    
  <br>

  <label for="end_date">End Date:</label>
  <input type="date" name="end_date" id="end_date" value="<?php echo htmlentities( $record['end_date'] ); ?>">
    
  <br>
  
  
  <input type="submit" value="Update Education">
  
</form>

<p><a href="educations.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>