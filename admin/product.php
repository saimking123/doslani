<?php
include("connection.php");
include("head_foot.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ADD PRODUCT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <br><br><br>
    <br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <center><h2>Insert form</h2></center>
                
  <form method="POST"  action="insert.php" name="colourform" id="colourform" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">product name</label>
      <input type="text" class="form-control" name="product_name" placeholder="Enter product name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">product price</label>
      <input type="text" class="form-control"  name="product_price" placeholder="Enter product price">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">product quantity</label>
    <input type="number" class="form-control" name="quantity" placeholder="Enter product quantity">
  </div>

  <div class="form-group">
    <label for="inputAddress">product popularity</label>
    <input type="number" class="form-control" name="popularity" placeholder="Enter 1 and 0 only">
  </div>

  
  <!-- <div class="form-group"> -->
  <div class="color-container">
    <div class="color-input" style="display:flex; margin:10px; column-gap:10px">
        <input type="color" name="color[]">
        <button class="add-color">Add another</button>
    </div>
</div>

<?php
$query = "SELECT * FROM category";
$connectquery = mysqli_query($conn, $query);

if (!$connectquery) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<div class="form-group">
    <label for="category">Choose categories</label>
    <select name="weigth[]" id="categories" class="form-control" multiple size="4">
        <option value="select category" disabled>select category</option>
        <?php
        while ($row = mysqli_fetch_assoc($connectquery)) {
            $categoryName = $row['category_name'];
            $categoryId = $row['category_id'];
            ?>
            <option value='<?php echo $categoryId ?>'><?php echo $categoryName ?></option>
            <?php
        }
        ?>
    </select>
</div>



<!-- for weight -->
<style>
  input[type="number"] {
    appearance: textfield;
    -webkit-appearance: textfield;
    -moz-appearance: textfield;
}
</style>
<div class="form-group">
    <label for="category">Choose categories</label>
    <div class="row">
  <div class="customer_records">
  <input name="weigth[]" type="number" placeholder="weigth">
    
    <a class="extra-fields-customer" href="#">Add More weigth</a>
  </div>

  <div class="customer_records_dynamic"></div>

</div>
   
</div>
<script>
  
$('.extra-fields-customer').click(function() {
  $('.customer_records').clone().appendTo('.customer_records_dynamic');
  $('.customer_records_dynamic .customer_records').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.single').append('<a href="#" class="remove-field btn-remove-customer">Remove Customer</a>');
  $('.customer_records_dynamic > .single').attr("class", "remove");
  
  $('.customer_records_dynamic input').each(function() {
    var count = 0;
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count );
    count++;
  });

});

$(document).on('click', '.remove-field', function(e) {
  $(this).parent('.remove').remove();
  e.preventDefault();
});
</script>
<!-- end weight portion -->


    <!-- <div class="color-container">
    <div class="color-input" style="display:flex; margin:10px; column-gap:10px">
        <input type="text" name="Weight[]">
    </div>
</div> -->
       
<!-- </div> -->




  <div class="form-group">
    <label for="inputAddress">product description</label>
    <input type="text" class="form-control" name="description" placeholder="Enter product description">
  </div>

  <div class="form-group">
    <label for="inputAddress">fully product description</label>
    <textarea rows="4" cols="50" type="massage" class="form-control" name="fullydescription" placeholder="Enter fully product description"></textarea>
  </div>
  
        

  <?php
    $query = "SELECT * FROM category";
    $connectquery = mysqli_query($conn, $query);

    if (!$connectquery) {
    die("Query failed: " . mysqli_error($conn));
    }
    ?>
  
  <div class="form-group">
    <label for="category">Choose a category</label>
    <select name="category" class="form-control">
      <option value="select category" disabled>select category</option>
        <?php
        while ($row = mysqli_fetch_assoc($connectquery)) {
            $categoryName = $row['category_name'];
            $categoryId = $row['category_id'];
            ?>
            <option value='<?php echo $categoryId ?>'><?php echo $categoryName ?></option>
        <?php
        }
        ?>
    </select>
</div>



  <div class="form-group">
    <label for="">image</label>
    <input type="file" name="productimageinput" class="form-control" >
  </div>

  
  <div class="form-group">
    <label for="inputAddress">gallery image</label>
  <input type="file"  name="imageinput[]"  class="form-control" multiple>
  </div>
 
  <button type="submit" class="btn btn-primary" name="insertproduct">Add product</button>
</form>

</div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#colorForm").submit(function(e) {
      e.preventDefault(); // prevent the default form submission

      var selectedColors = $('#favcolors').val();

      $.ajax({
        type: 'POST',
        url: "action_page.php",
        data: { favcolors: selectedColors },
        dataType: "json",
        beforeSend: function() {
          // Perform actions before sending the request
        },
        success: function(data) {
          // Handle the response from the server
          console.log(data);
        },
        error: function(xhr, status, error) {
          // Handle errors
          console.error(xhr.responseText);
        }
      });
    });
  });

            </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  

</body>
</html>

<script src="jquery.min.js"></script>
<script>
    $(document).ready(function(){
        let addButton = $('.add-color');
        let colorContainer = $('.color-container');
        //To Add Another Color;
        $(addButton).on('click' , function(e){
            e.preventDefault();
            let InputData = `
            <div class="color-input" style="display:flex; margin:10px; column-gap:10px">
        <input type="color" name="color[]">
        <button class="remove-color">Remove</button>
        </div> `;

           $(colorContainer).append(InputData);
        });
        // To Remove Color Container
        $(document).on('click' , '.remove-color' , function(e){
            e.preventDefault();
            $(this).closest('.color-input').remove();
        })
        
    })
</script>

<!-- for add color  -->
<script>
    $(document).ready(function(){
        let addButton = $('.add-color');
        let colorContainer = $('.color-container');
        //To Add Another Color;
        $(addButton).on('click' , function(e){
            e.preventDefault();
            let InputData = `
            <div class="color-input" style="display:flex; margin:10px; column-gap:10px">
        <input type="color" name="Weight[]">
        <button class="remove-color">Remove</button>
        </div> `;

           $(colorContainer).append(InputData);
        });
        // To Remove Color Container
        $(document).on('click' , '.remove-color' , function(e){
            e.preventDefault();
            $(this).closest('.color-input').remove();
        })
        
    })
</script>

<!-- for add  weigth -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#weigth').select2(); // Assuming you have included the Select2 library
    });
</script>