<?php include 'includes\header.php';?>
<?php ?>
if(!isset($_SESSION['id'])){
    header('Location: login.php');
}
<?php ?>

  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="card-header text-center">
              <h3>Edit Product Form</h3>
            </div>
            <div class="card-body">
              <h4 class="text-success text-center" >
                <?php echo isset($message) ?  $message :''?>
              </h4>
              <form action="action.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">Product Name</label>
                  <div class="col-md-9">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">Product Price</label>
                  <div class="col-md-9">
                    <input type="number" name="price" class="form-control" value="<?php echo $price; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">Stock Amount</label>
                  <div class="col-md-9">
                    <input type="number" value="<?php echo $stock; ?>" name="stock" class="form-control" >
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">Product Description</label>
                  <div class="col-md-9">
                    <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">Product Image</label>
                  <div class="col-md-9">
                    <input type="file" name="image" class="form-control-file">
                    <img src="<?php echo $image; ?>" alt="" height="100" width="120">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 col-form-label"></label>
                  <div class="col-md-9">
                    <input type="submit" name="updateBtn" class="btn btn-outline-info btn-block" value="Update Product Info">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include 'includes\footer.php';?>