<x-layout-home>


<div class="container" style="margin-top:100px;">
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
                        <h4 class="search-result-item-heading"><a href="#"><?php echo htmlentities($item->food_name); ?></a></h4>
                        <p class="info"></p>
                        <p class="description"><?php echo htmlentities($item->food_description); ?></p>
                    </div>
                    <div class="col-sm-3 text-align-center">
                        <p class="value3 mt-sm">$<?php echo htmlentities($item->food_price); ?></p>
                        <p class="fs-mini text-muted">PER WEEK</p><a class="btn btn-primary btn-info btn-sm" href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
       
        <div class="row">
          <div class="col-md-8 col-sm-8">
            {{ $foods->links() }}
          </div>
        </div>
    </div>
</div>
</div>
<!-- <div class='banner-search codepro-ads-all'>
    <div id='codepro-ads-left'>
    	<img src="{{ asset('/images/banner1.jpeg') }}" alt="">
    </div>
    <div id='codepro_ads_right'>
    <img src="{{ asset('/images/banner1.jpeg') }}" alt="">
    </div>
</div> -->
</x-layout-home>