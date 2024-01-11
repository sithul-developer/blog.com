@php
    use App\Models\Promotionals;
    use App\Models\Price;

    $getPrice = Price::where('order', 0)->get();
    $getPriceOrdre1 = Price::where('order', 1)->get();
    $getPriceOrdre2 = Price::where('order', 2)->get();
    $getPriceOrdre3 = Price::where('order', 3)->get();
    $getPriceOrdre4 = Price::where('order', 3)->get();
    $getPriceOrdre5 = Price::where('order', 5)->get();

@endphp


<section id="featured-services" class="featured-services"
    style="
    padding: 25px 0;
    overflow: hidden;
    ;border:#f1be48;
">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column justify-content-center ">
                <div class="row " data-aos="fade-up" data-aos-delay="400">
                    <div class="section-header"
                        style="text-align: center;
                        padding: 14px 0px 7px 0;
                    margin: 8px 6px 18px 0;
                    position: relative;
                    background: #f1be48;">
                        {{--     <span>Our Services</span> --}}
                        <h3 style="color: #007B5F; font-size: 20px;font-family: Khmer OS Siemreap; font-weight: 700;">
                            តម្លៃប្រេងលក់រាយ (ក្នុង ១លីត្រ)</h3>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                        <div class="stats-item  text-center   h-100">
                            <span class="mx-2"   style="
                            font-size: 20px;
                            border-bottom: 2px solid gray;
                            margin: 0;
                            font-weight: 700;
                            color: #007b5f;
                        ">BVM</span>
                            <ul style="list-style-type:none ;padding: 0;">
                                @foreach ($getPriceOrdre1 as $price)
                                    <li data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                                        <div>
                                            <p
                                                style="
                                            font-size: 14px;
                                            margin-bottom: 3px;
                                            padding-top: 10px;font-family: Khmer OS Siemreap;color:#f1be48;
                                            ">
                                                {{ $price->product_name }}</p>
                                            <div>
                                                <h6 style="font-size: 12px ">{{ $price->price_khr }}</h6>
                                                <h6 style="font-size: 12px">{{ $price->price_usd }} </h6>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                        <div class="stats-item text-center h-100"
                            style="width: 100%;
                    padding: 0px;     ">
                            <span class="mx-2" style="
                            font-size: 20px;
                            border-bottom: 2px solid gray;
                            margin: 0;
                            font-weight: 700;
                            color: #007b5f;
                        " >TELA</span>
                            <ul style="list-style-type:none ;padding: 0;">
                                @foreach ($getPrice as $price)
                                    <li data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                                        <div>
                                            <p
                                                style="
                                            font-size: 14px;
                                            margin-bottom: 3px;
                                            padding-top: 10px;font-family: Khmer OS Siemreap;color:#f1be48
                                            ">
                                                {{ $price->product_name }}</p>
                                            <div>
                                                <h6 style="font-size: 12px ">{{ $price->price_khr }}</h6>
                                                <h6 style="font-size: 12px">{{ $price->price_usd }} </h6>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                        <div class="stats-item text-center h-100"
                            style="width: 100%;
                    padding: 0px;  ">
                            <span class="mx-2" style="
                            font-size: 20px;
                            border-bottom: 2px solid gray;
                            margin: 0;
                            font-weight: 700;
                            color: #007b5f;
                        " >CALTEX</span>
                            <ul style="list-style-type:none ;padding: 0;">
                                @foreach ($getPriceOrdre2 as $price)
                                    <li data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                                        <div>
                                            <p
                                                style="
                                            font-size: 14px;
                                            margin-bottom: 3px;
                                            padding-top: 10px;font-family: Khmer OS Siemreap;color:#f1be48
                                            ">
                                                {{ $price->product_name }}</p>
                                            <div>
                                                <h6 style="font-size: 12px ">{{ $price->price_khr }}</h6>
                                                <h6 style="font-size: 12px">{{ $price->price_usd }} </h6>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                        <div class="stats-item text-center h-100"
                            style="width: 100%;
                    padding: 0px;   ">
                            <span class="mx-2" style="
                            font-size: 20px;
                            border-bottom: 2px solid gray;
                            margin: 0;
                            font-weight: 700;
                            color: #007b5f;
                        " >TOTAL</span>
                            <ul style="list-style-type:none ;padding: 0;">
                                @foreach ($getPriceOrdre3 as $price)
                                    <li data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                                        <div>
                                            <p
                                                style="
                                            font-size: 14px;
                                            margin-bottom: 3px;
                                            padding-top: 10px;font-family: Khmer OS Siemreap;color:#f1be48
                                            ">
                                                {{ $price->product_name }}</p>
                                            <div>
                                                <h6 style="font-size: 12px ">{{ $price->price_khr }}</h6>
                                                <h6 style="font-size: 12px">{{ $price->price_usd }} </h6>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                        <div class="stats-item text-center h-100"
                            style="width: 100%;
                    padding: 0px;   ">
                            <span class="mx-2" style="
                            font-size: 20px;
                            border-bottom: 2px solid gray;
                            margin: 0;
                            font-weight: 700;
                            color: #007b5f;
                        " >PTT</span>
                            <ul style="list-style-type:none ;padding: 0;">
                                @foreach ($getPriceOrdre4 as $price)
                                    <li data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                                        <div>
                                            <p
                                                style="
                                            font-size: 14px;
                                            margin-bottom: 3px;
                                            padding-top: 10px;font-family: Khmer OS Siemreap;color:#f1be48
                                            ">
                                                {{ $price->product_name }}</p>
                                            <div>
                                                <h6 style="font-size: 12px ">{{ $price->price_khr }}</h6>
                                                <h6 style="font-size: 12px">{{ $price->price_usd }} </h6>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                        <div class="stats-item text-center h-100"
                            style="width: 100%;
                    padding: 0px; ">
                            <span class="mx-2" style="
                            font-size: 20px;
                            border-bottom: 2px solid #d9d9d6;
                            margin: 0;
                            font-weight: 700;
                            color: #007b5f;
                        " >SOKIMEX </span>
                            <ul style="list-style-type:none ;padding: 0;">
                                @foreach ($getPriceOrdre5 as $price)
                                    <li data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                                        <div>
                                            <p
                                                style="
                                            font-size: 14px;
                                            margin-bottom: 3px;
                                            padding-top: 10px;font-family: Khmer OS Siemreap;color:#f1be48
                                            ">
                                                {{ $price->product_name }}</p>
                                            <div>
                                                <h6 style="font-size: 12px ">{{ $price->price_khr }}</h6>
                                                <h6 style="font-size: 12px">{{ $price->price_usd }} </h6>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
