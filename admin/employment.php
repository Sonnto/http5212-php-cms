<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM employment
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'employment has been deleted' );
  
  header( 'Location: employment.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM employment
  ORDER BY date DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Employment</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="center">Title/Position<th>
    <th align="center">Company Name</th>
    <th align="center">Location</th>
    <th align="center">Start Date</th>
    <th align="center">End Date</th>
    <th align="center">Experience</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center">
        <?php echo htmlentities( $record['title'] ); ?>
        <small><?php echo $record['name']; ?></small>
      </td>
      <td align="center"><?php echo $record['location']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['startDate'] ); ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['endDate'] ); ?></td>
      <td align="center"><?php echo $record['experience']; ?></td>
      <td align="center"><a href="employment_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="employment.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this job?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="employment_add.php"><i class="fas fa-plus-square"></i> Add job</a></p>


<?php

include( 'includes/footer.php' );

?>