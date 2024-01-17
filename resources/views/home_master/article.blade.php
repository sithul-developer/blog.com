@extends('home_master.layouts.index')
@section('content')
    <!-- ======= Service Details Section ======= -->
    <div class="container ">
        <h3
            style="font-size: 20px;
color: #007B5F;
background: #f1be48;
padding: 13px 10px;
margin-bottom: 25px;
font-family: Khmer OS Siemreap;">
            @if ($article->category_id == 3)
                ព័ត៌មានអំពី ប៊ីវីអឹម
            @else
                ព័ត៌មានប្រេងជាតិ និងអន្ដរជាតិសំខាន់ៗ
            @endif
        </h3>
        <div class="row gy-4" data-aos="fade-up">
            <div class="col-lg-12">
                <img src="{{ $article->getImage() }}" alt="" class="img-fluid services-img">
                <h3>{{ $article->title }}</h3>
                <h6>{{ $article->sub_title }}</h6>
                <figure class="mb-4"><img src="{{ $article->getImageContent() }}" alt="image description">
                </figure>
                <p>
                    {!! $article->content !!}
                </p>
            </div>
        </div>
    </div>
@endsection
