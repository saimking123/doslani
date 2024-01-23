
<?php
include("connection.php");
include("head_foot.php");
?>

<br><br><br><br><br><br>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_coupon"><span class="glyphicon glyphicon-plus"></span> Generate Coupon</button>


    <div class="modal fade" id="form_coupon" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<form action="save_coupon.php" method="POST">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Coupon Code</label>
								<input type="text" class="form-control" name="coupon" id="coupon" readonly="readonly" required="required"/>
								<br />
								<button id="generate" class="btn btn-success" type="button"><span class="glyphicon glyphicon-random"></span> Generate</button>
							</div>
							<div class="form-group">
								<label>Discount</label>
								<input type="number" class="form-control" name="discount" min="10" required="required"/>
							</div>
						</div>
					</div>
                    <?php
    $query = "SELECT * FROM user";
    $connectquery = mysqli_query($conn, $query);

    if (!$connectquery) {
    die("Query failed: " . mysqli_error($conn));
    }
    ?>
  
  <div class="form-group">
    <label for="category">Choose a category</label>
    <select name="user" class="form-control">
      <option value="select category" disabled>select user</option>
        <?php
        while ($row = mysqli_fetch_assoc($connectquery)) {
            $Customername = $row['name'];
            $Customerid = $row['id'];
            ?>
            <option value='<?php echo $Customerid ?>'><?php echo $Customername ?></option>
        <?php
        }
        ?>
    </select>
</div>

					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>



    <!-- fetch the copens and distibute in the users -->

    <?php

    ?>

    <table class="table">
        <thead>
            <tr>
                <th>copen_id</th>
                <th>Copen_code</th>
                <th>discount</th>
                <th>Valid</th>
                <th>Users</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * from coupon"
            ?>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <script type="text/javascript">
	$(document).ready(function(){
		$('#generate').on('click', function(){
			$.get("get_coupon.php", function(data){
				$('#coupon').val(data);
			});
		});
	});
</script>