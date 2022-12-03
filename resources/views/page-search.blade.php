<x-layout-home>

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
<main>
<div class="container" style="margin-top:20px;">
    <div class="row ng-scope" style="width: 850px; margin:auto;">
            <div class="col-md-12 col-md-pull-12">
                    @if(count($foods) == 0)
                    <section class="search-result-item">
                        <a class="image-link" href="#"><img class="image" src="https://laravel.com/img/logomark.min.svg">
                        </a>
                        <div class="search-result-item-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="search-result-item-heading">Không tìm thấy</a></h4>
                                    <p class="info"></p>
                                    <p class="description"></p>
                                </div>
                                <div class="col-sm-3 text-align-center">
                                    <p class="value3 mt-sm"></p>
                                    <p class="fs-mini text-muted">PER WEEK</p><a class="btn btn-primary btn-info btn-sm" href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                    @foreach($foods as $item)
                    <section class="search-result-item">
                        <a class="image-link" href="#"><img class="image" src="{{ asset('/images/'.$item->food_Image. '') }}">
                        </a>
                        <div class="search-result-item-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h2 class="search-result-item-heading"><?php echo htmlentities($item->food_name); ?></h2>
                                    <p class="info"></p>
                                    <p class="description"><?php echo htmlentities($item->food_description); ?></p>
                                </div>
                                <div class="col-sm-3 text-align-center">
                                    <p class="value3 mt-sm">$<?php echo htmlentities($item->food_price); ?></p>
                                    <p class="fs-mini text-muted"></p><a href="/add-Cart?id=<?php echo htmlentities($item->id); ?>&name=<?php echo htmlentities($item->food_name);?>&price=<?php echo htmlentities($item->food_price);?>&quantity=1&image=<?php echo htmlentities($item->food_Image);?>"><button type="button" class="btn btn-sm btn-outline-secondary">Thêm Giỏ hàng</button></a>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endforeach
            
                    <div style="margin-top:20px;">
                            <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                <a class="page-link" href="view-search?key=<?php echo $key?>&page=1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Đầu</span>
                                </a>
                                </li>
                                @for($page = 1; $page <= $foods->lastPage(); $page++)
                                <li class="page-item <?php if($foods->currentPage() == $page) echo "active";?>"><a class="page-link" href="view-search?key=<?php echo $key?>&page=<?php echo $page?>">{{$page}}</a></li>
                                @endfor
                                <li class="page-item">
                                <a class="page-link" href="view-search?key=<?php echo $key?>&page=<?php echo $foods->lastPage()?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Cuối</span>
                                </a>
                                </li>
                            </ul>
                            </nav>
                    </div>
            </div>
    </div>
</div>
<main>
<div class='banner-search codepro-ads-all'>
    <div id='codepro-ads-left'>
    	<img width="400px;" height="500px;" src="{{ asset('/images/banner1.jpeg') }}" alt="">
    </div>
    <div id='codepro_ads_right'>
     <img width="400px;" height="500px;" src="{{ asset('/images/banner1.jpeg') }}" alt="">
    </div>
</div>

</x-layout-home>