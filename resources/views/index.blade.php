@extends('layouts.base')
@section('content')

<section class="pt-0 poster-section">
    <div class="poster-image slider-for custome-arrow classic-arrow">
        <div>
            <img src="assets/images/furniture-images/poster/1.png" class="img-fluid blur-up lazyload" alt="">
        </div>
    </div>


    <div class="left-side-contain">
        <div class="banner-left">
            <h2>                        Zábava pro vás i celou rodinu</h2>
            <h2><span>       Deskové hry nejen z česka </span></h2>

            <h2></h2>
            <p class="poster-details mb-0">           Unikátní sady za skvělou novoroční cenu.</p>
        </div>
    </div>

</section>

<!-- category section start -->
<section class="category-section ratio_40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title title-2 text-center">
                    <h2>Naše kategorie</h2>
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-xxl-2 col-lg-3">
                <div class="category-wrap category-padding category-block theme-bg-color">
                    <div>
                        <span>Kategorie</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10 col-lg-9">
                <div class="category-wrapper category-slider1 white-arrow category-arrow">
                    @foreach ($categories as $category)
                        <div>
                            <a href="/shop?categories={{$category->id}}" class="category-wrap category-padding">
                                <img src="assets/images/fashion/category/2.jpg" class="bg-img blur-up lazyload" alt="category image">
                                <div class="category-content category-text-1">
                                    <h3 class="theme-color">{{$category->name}}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category section end -->
<!-- category section start -->
<section class="category-section ratio_40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title title-2 text-center">
                    <h2>Značky</h2>
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-xxl-2 col-lg-3">
                <div class="category-wrap category-padding category-block theme-bg-color">
                    <div>
                        <span>Značky</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10 col-lg-9">
                <div class="category-wrapper category-slider1 white-arrow category-arrow">
                    @foreach ($brands as $brand)
                        <div>
                            <a href="/shop?brands={{$brand->id}}" class="category-wrap category-padding">
                                <img src="assets/images/fashion/category/21.jpg" class="bg-img blur-up lazyload" alt="brand image">
                                <div class="category-content category-text-1">
                                    <h3 class="theme-color">{{$brand->name}}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category section end -->


@endsection