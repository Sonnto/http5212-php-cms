<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['school'] ) )
{
  
  if( $_POST['school'] and $_POST['qualification'] )
  {
    
    $query = 'INSERT INTO educations (
        school,
        qualification,
        detail,
        start_date,
        end_date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['qualification'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['detail'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['start_date'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['end_date'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: educations.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Education</h2>

<form method="post">
  
  <label for="school">School:</label>
  <input type="text" name="school" id="school">
    
  <br>

  <label for="qualification">Qualification:</label>
  <input type="text" name="qualification" id="qualification">

  <br>
  
  <label for="detail">Detail:</label>
  <textarea type="text" name="detail" id="detail" rows="10"></textarea>

  <br>

  <label for="start_date">Start Date:</label>
  <input type="date" name="start_date" id="start_date">

  <br>

  <label for="end_date">End Date:</label>
  <input type="date" name="end_date" id="end_date">
      
  
  <br>
  
  
  <input type="submit" value="Add Education">
  
</form>

<p><a href="educations.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>