<div>
  <h3>Employee Details</h3>
  <table class="table ">
    <thead>
      <tr>
         <th class="text-center">D.ID</th>
        <th class="text-center">E.Name</th>
        <th class="text-center">Salary</th>
        <th class="text-center">Licence number</th>
         <th class="text-center">Vehicle number</th>
       <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT tbl_dilivery_person.ID,tbl_user.Name,tbl_dilivery_person.Salary,tbl_dilivery_person.Lience_No,tbl_dilivery_person.Vehicle_No from tbl_dilivery_person inner join tbl_user on tbl_dilivery_person.User_ID=tbl_user.ID ";
      $result=$conn-> query($sql);
    
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["ID"]?></td>
      <td><?=$row["Name"]?></td>
      <td><?=$row["Salary"]?></td>
      <td><?=$row["Lience_No"]?></td>
      <td><?=$row["Vehicle_No"]?></td>


      <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
      <td><button class="btn btn-danger" style="height:40px" onclick="sizeDelete('<?=$row['ID']?>')">Delete</button></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Employee
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Employee Record</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addSizeController.php" method="POST">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" required>
            </div>
              <div class="form-group">
              <label for="Emasil">Email:</label>
              <input type="email" class="form-control" name="email" required>
            </div>
              <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>
              <div class="form-group">
              <label for="salary">Salary:</label>
              <input type="text" class="form-control" name="salary" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Employee</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   