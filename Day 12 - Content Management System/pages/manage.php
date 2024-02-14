<?php include 'includes\header.php';?>

<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header text-center">
            <h3>Add Product Form</h3>
          </div>
          <div class="card-body">
            <h3 class="text-center text-success">
              <?php
                if (isset($_SESSION['message'])) {
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                }
              ?>
            </h3>
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Stock Amount</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($products as $product){ extract($product)?>
                <tr>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $price; ?></td>
                  <td><?php echo $stock; ?></td>
                  <td><img src="<?php echo $image; ?>" width="50" height="50" alt=""></td>
                  <td>
                    <a href="action.php?status=edit&id=<?php echo $id; ?>" class="btn btn-outline-success">Edit</a>
                    <a href="action.php?status=delete&id=<?php echo $id; ?>" class="btn btn-outline-danger">Delete</a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes\footer.php';?>
