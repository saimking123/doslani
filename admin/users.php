<?php
include("connection.php");
include("head_foot.php");
?>
 
<br><br><br><br>
 <table class="table" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>role</th>
            <th>copen_id</th>


        </tr>
    </thead>
    <tbody>
    <?php
            $query = "select * from user";
            $query_connect = mysqli_query($conn,$query);
            foreach($query_connect as $row){ ?>
    <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['password'];?></td>
            <td><?php echo $row['role'];?></td>
            <td><?php echo $row['copen_id'];?></td>  
        </tr>
        <?php
            }
            ?>
         
    </tbody>
  </table>

  </div>