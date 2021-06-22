

<?php  
include('connection.php');
$subid='75';
?>

<table class="table" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name Name</th>
  
      <th scope="col">Last Name</th>
      <th scope="col">Email Id</th>
    </tr>
  </thead>
  <tbody>

  <?php
                
                
                $rcsqal= "SELECT * FROM oc where courseid like '%75' and status='1'";
                $rcresulta = $conn->query($rcsqal);
                if ($rcresulta->num_rows > 0) {

                   
                    while($row = $rcresulta->fetch_assoc()) {
                        $uzzid=$row['useremail'];
                        $rcsqald= "SELECT * FROM users where email like '$uzzid'";
                        $rcresultad = $conn->query($rcsqald);;
                    if ($rcresultad->num_rows > 0) {

                        $cn='0';
                        while($row = $rcresultad->fetch_assoc()) {$cn=$cn+1; ?>
    <tr >
      <th scope="row"><?php echo $cn ?></th>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['firstname']?></td>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['lastname']?></td>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['email']?></td>
    </tr>
  <?php }} }}?>

  <?php
                
                
                $rcsqal= "SELECT * FROM user_courses where subid=$subid and type='course' ";
                $rcresulta = $conn->query($rcsqal);
                if ($rcresulta->num_rows > 0) {

                  
                    while($row = $rcresulta->fetch_assoc()) {
                        $uzid =$row['userid'];
                        echo $uzid.$subid;
                $rcsqal= "SELECT * FROM users where id=$uzid";
                    $rcresulta = $conn->query($rcsqal);
                    if ($rcresulta->num_rows > 0) {

                        $cnz='0';
                        while($row = $rcresulta->fetch_assoc()) {$cnz=$cnz+1; ?>
    <tr >
      <th scope="row"><?php echo $cnz ?></th>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['firstname']?></td>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['lastname']?></td>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['email']?></td>
    </tr>
  <?php }}}} ?>
  </tbody>
</table>