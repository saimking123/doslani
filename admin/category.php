<?php
include("connection.php");
include("head_foot.php");

if(isset($_POST['categorybtn']))
{
    $name= $_POST["category_name"];
    $filename = $_FILES["category_image"]["name"];
    $tmpname = $_FILES["category_image"]["tmp_name"];
    $location = "../categroyimage/";
    $saveimg = $location . $filename;
    if (move_uploaded_file($tmpname, $saveimg)) {
        $insertquery = "INSERT INTO category(category_name,category_image)Values('".$name."','".$saveimg."')";

        // var_dump($insertquery);

        $insertqueryconnect = mysqli_query($conn, $insertquery);
    }
    if($insertqueryconnect)
    {
        echo "Record has been inserted";
    }
    else{
        echo "data not inserted";
    }
}
?>
<br><br><br><br>

  <h2>Category insert</h2>
    <form method="POST" style="margin-bottom:8rem" enctype="multipart/form-data">

        <input type="text" placeholder="Enter yout category" name="category_name" class="form-control" >
        <br>
        <input type="file" placeholder="Enter category image" name="category_image" class="form-control" >
        <br>
        <button type="submit" name="categorybtn" style="background-color:blue;color:white">Add Category</button>

    </form>









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
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>



    <script type="text/javascript">
	$(document).ready(function(){
		$('#generate').on('click', function(){
			$.get("get_coupon.php", function(data){
				$('#coupon').val(data);
			});
		});
	});
</script>