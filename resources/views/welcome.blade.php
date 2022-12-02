
<x-layout-home>
<main>

  <section style='background-image: url("{{asset("/images/catering-2778755__340.jpg")}}"); color: #fff;' class="py-5 text-center">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">

        <h1 class="fw-light">Khách hàng phản hồi tại đây</h1>
        <div class="feedback">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Phản hồi</button>
            </div>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php 
            foreach ($foods as $item) {?>
                  <div class="col">
          <div class="card shadow-sm">
            <img src="{{ asset('/images/'.$item->food_Image. '') }}" width="100%" height="225" alt="">
            <div class="card-body">
              <p class="card-text"><?php echo htmlentities($item->food_name); ?></p>
              <p><?php echo htmlentities($item->food_description); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Thêm Giỏ hàng</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
            <?php } ?>
      
       
      </div>
    </div>
  </div>

  <x-from-feedback/>
</main>

</x-layout-home>