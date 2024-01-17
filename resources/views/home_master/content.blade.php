@extends('home_master.layouts.index')
@section('content')

@php
    use App\Models\Posts;
    $getPostCategory = Posts::where('category_id', 5)
        ->where('status', 0)
        ->latest()
        ->paginate(3);
@endphp
<!-- ======= Main Content Section ======= -->
<h3

    style="font-size: 20px;
color: #007B5F;
background: #f1be48;
padding: 13px 10px;
margin-bottom: 25px;
font-family: Khmer OS Siemreap;">
    ព័ត៌មានអំពី ប៊ីវីអឹម </h3>
@foreach ($getPosts as $post)
    <div class="row " data-aos="fade-up" style="padding: 2px 0 35px 0;" >
        <div class="col-lg-5">
            <div class="card-img">
                <img src='{{ $post->getImage() }}'class='img-fluid ' alt="" />
            </div>
        </div>
        <div class="col-lg-7" style="position: relative">
            <h4><a href="service-details.html"
                    style="font-family: Khmer OS Siemreap;  color: #f1be48;">{{ $post->title }}</a></h4>
            <p style="font-family: Khmer OS Siemreap; color: #8d8d8d;">{{ $post->sub_title }}</p>
            <div
                style="
            bottom: 0;
            display: flex;
            align-items: center;">
                <a href=""> <i class="bi bi-eye" style="color: #f1be48; font-size:18px;"> </i> <span
                        style="color: #777777; font-size:14px; padding: 0px 15px 0px 5px;"> {{ $post->views }} View</span>
                </a>
                <a href=""> <i class="fa-solid fa-calendar-days " style="color: #f1be48; font-size:18px;"> </i> <span
                        style="color: #777777; font-size:14px;padding: 0px 15px 0px 5px;"> {{ $post->created_at->format('d-M-Y') }} </span>
                </a>
                {{-- ['article' => encrypt($article->id)]) --}}
                <a href=" {{ route('Article', ['id' => encrypt( $post->id) ]) }}" class="title">
                    <button type="submit" class="btn btn-sm text-sm"
                        style="font-family: Khmer OS Siemreap; background: #f1be48; ">អានបន្ត <i
                            class="bi bi-arrow-right"></i></button>
                </a>

            </div>
        </div>
    </div>
@endforeach
{{-- pagination Section  --}}
<div class="card-footer">
    <div class="pagination">
        {{ $getPosts->links('pagination::bootstrap-5') }}
    </div>
</div>
<!-- =======  Content of Category Section ======= -->

<h3
    style="font-size: 20px;
font-weight: 700;
color: #007B5F;
background: #f1be48;
padding: 13px 10px;
margin-bottom: 25px;
font-family: Khmer OS Siemreap;">
    ព័ត៌មានប្រេងជាតិ និងអន្ដរជាតិសំខាន់ៗ</h3>
@foreach ($getPostCategory as $post)
    <div class="row"  data-aos="fade-up">
        <div class="col-lg-5">
            <div class="card-img">
                <img src='{{ $post->getImage() }}'class='img-fluid services-img' alt="" />
            </div>
        </div>
        <div class="col-lg-7">
            <h4><a href="service-details.html"
                    style="font-family: Khmer OS Siemreap;  color: #f1be48;">{{ $post->title }}</a></h4>
            <p style="font-family: Khmer OS Siemreap; color: #8d8d8d;">{{ $post->sub_title }}</p>
                   {{-- ['article' => encrypt($article->id)]) --}}
            <a href=" {{ route('Article', ['id' => encrypt($post->id)]) }}" class="title">
                <button type="submit" class="btn btn-sm text-sm"
                    style="font-family: Khmer OS Siemreap; background: #f1be48; ">អានបន្ត <i
                        class="bi bi-arrow-right"></i></button>
            </a>
        </div>
    </div>
@endforeach
{{-- pagination Section  --}}
<div class="card-footer">
    <div class="pagination">
        {{ $getPostCategory->links('pagination::bootstrap-5') }}
    </div>
</div>
<!-- =======  Content of Category Section ======= -->
<style>
    #textSort {
        max-height: 42px;
        width: 200px;
        margin-bottom: 10px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        -moz-line-clamp: 1;
        -moz-box-orient: vertical;
        color: #707070;
        font-size: 0.80rem;
    }

    .active>.page-link,
    .page-link.active {
        z-index: 3;
        color: var(--bs-pagination-active-color);
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .text-muted {
        --bs-text-opacity: 1;
        color: var(--bs-secondary-color) !important;
        display: none;
    }

    .page-link {
        position: relative;
        display: block;
        padding: var(--bs-pagination-padding-y) var(--bs-pagination-padding-x);
        font-size: var(--bs-pagination-font-size);
        color: #adadad;
        text-decoration: none;
        background-color: var(--bs-pagination-bg);
        border: var(--bs-pagination-border-width) solid var(--bs-pagination-border-color);
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>
@endsection