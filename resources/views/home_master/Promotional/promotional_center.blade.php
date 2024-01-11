@php
    use App\Models\Promotionals;
    $getPromotional_center = Promotionals::where('order', 1)
        ->where('options', 2)
        ->get();
    /*   dd($getFooter); */
@endphp
{{-- @if ($getPromotional_center->count() > 0) --}}
<h3 style="    font-size: 20px;
color: #007B5F;
background: #f1be48;
padding: 13px 10px;
margin-bottom: 25px;
font-family: Khmer OS Siemreap;"> ចំណេះដឹងទូទៅ</h3>
@foreach ($getPromotional_center as $promotional)

    <div class="row gy-4">
        <img src='{{ $promotional->getImage() }}'class='img-fluid services-img' alt="" />
    </div>
  
@endforeach
{{-- @endif --}}