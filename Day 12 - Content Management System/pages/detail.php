<?php include 'includes\header.php'?>

<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-body">
          <img src="<?php echo $productInfo['image'] ?>" alt="" class="w-100" " />
        </div>
      </div>

      <div class="col-md-6">
        <div class="card card-body">
          <h2 class="card-title"><?php echo $productInfo['name'] ?></h2>
          <h3 class="card-title">$<?php echo $productInfo['price'] ?></h3>
          <h5 class="card-title">Quantity: <?php echo $productInfo['stock'] ?></h5>
          <h5 class="card-title"><?php echo $productInfo['description'] ?></h5>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include 'includes\footer.php'?>

