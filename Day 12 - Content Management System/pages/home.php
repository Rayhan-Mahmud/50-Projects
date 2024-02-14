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

            <form action="action.php" method="POST" enctype="multipart/form-data">
              <h4 class="text-center text-success">
                  <?php echo isset($message) ? $message : '' ?>
              </h4>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Product Name</label>
                <div class="col-md-9">
                  <input type="text" name="name" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Product Price</label>
                <div class="col-md-9">
                  <input type="number" name="price" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Stock Amount</label>
                <div class="col-md-9">
                  <input type="number" name="stock" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Description</label>
                <div class="col-md-9">
                  <textarea name="description"  class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Product Image</label>
                <div class="col-md-9">
                  <input type="file" name="image" >
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label"></label>
                <div class="col-md-9">
                  <input type="submit" name="btn" class="btn btn-outline-success btn-block" value="Create New Product">
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

</section>
<?php include 'includes\footer.php';?>

