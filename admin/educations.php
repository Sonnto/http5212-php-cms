<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM educations
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Education has been deleted' );
  
  header( 'Location: educations.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM educations
  ORDER BY start_date DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Educations</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">School</th>
    <th align="center">Qualification</th>
    <th align="center">Detail</th>
    <th align="center">Start Date</th>
    <th align="center">End Date</th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <!--<img src="image.php?type=project&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">-->
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['school'] ); ?>
        <!--<small><?php echo $record['content']; ?></small>-->
      </td>
      <td align="center"><?php echo $record['qualification']; ?></td>
      <td align="center"><?php echo ( $record['detail'] ); ?></td>
      <td align="center"><?php echo ( $record['start_date'] ); ?></td>
      <td align="center"><?php echo ( $record['end_date'] ); ?></td>
      <!--<td align="center"><a href="educations_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>-->
      <td align="center"><a href="educations_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="educations.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this education?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="educations_add.php"><i class="fas fa-plus-square"></i> Add Education</a></p>


<?php

include( 'includes/footer.php' );

?>