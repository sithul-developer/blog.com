@php
    use App\Models\Promotionals;
    use App\Models\Price;

    $getSlider = Promotionals::where('options', 0)
        ->where('status', 0)
        ->get();



@endphp

@foreach ($getSlider as $promotional)
    {{-- <div class="row gy-4">
    <img src='{{ $promotional->getImage() }}' style="width: 85px; height: 48px; border-radius: px; "
        alt="" />
</div> --}}


    <section id="hero" style="background-image: url({{ $promotional->getImage() }});"
        class="hero d-flex align-items-center">
        
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center ">
                    <h2 data-aos="fade-up" class="px-3">Your Lightning Fast Delivery Partner</h2>
                    <p data-aos="fade-up" data-aos-delay="100" class="px-3">Facere distinctio molestiae nisi fugit tenetur repellat non
                        praesentium nesciunt optio quis sit odio nemo quisquam. eius quos reiciendis eum vel eum
                        voluptatem eum maiores eaque id optio ullam occaecati odio est possimus vel reprehenderit</p>


                </div>

                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="{{url('/assets_frontend/img/hero-img.svg')}}" class="img-fluid mb-3 mb-lg-0 " alt=" imge">
                </div>

            </div>
        </div>
    </section>
@endforeach
