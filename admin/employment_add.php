<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['name'] )
  {
    
    $query = 'INSERT INTO employment (
        title,
        name,
        location,
        startDate,
        endDate,
        experience
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['location'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['startDate'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['endDate'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['experience'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Job has been added' );
    
  } else {
    set_message( 'Error, something went wrong and the job was not added.');
  }
  
  header( 'Location: employment.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Job</h2>

<form method="post">
  
  <label for="title">Title/Position:</label>
  <input type="text" name="title" id="title"/>

  <br>
  
    <label for="name">Company Name:</label>
  <input type="text" name="name" id="name"/>
    
  <br>
  
  <label for="location">Location:</label>
  <input type="text" name="location" id="location"/>

  <br>

    <label for="startDate">Start Date:</label>
  <input type="date" name="startDate" id="startDate"/>

  <br>

    <label for="endDate">End Date:</label>
  <input type="date" name="endDate" id="endDate"/>

  <br>

    <label for="experience">Experience:</label>
  <textarea type="text" name="experience" id="experience" rows="5"></textarea>
  
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
  
  <input type="submit" value="Add Job">
  
</form>

<p><a href="employment.php"><i class="fas fa-arrow-circle-left"></i> Return to Employment List</a></p>


<?php

include( 'includes/footer.php' );

?>