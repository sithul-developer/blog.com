@php
    use App\Models\Promotionals;
    $getPromotional = Promotionals::where('order', 0)
        ->where('options', 2)
        ->where('status',0)
        ->get();
    $getTitle = Promotionals::where('order', 0)
        ->where('options', 2)
        ->get();
@endphp
@if ($getPromotional->count() > 0)
    @foreach ($getPromotional as $promotional)
        <p style="color:#F1BE48 ; font-family: Khmer OS Siemreap ; font-weight: 700;"> {!! $promotional->title !!} </p>
        <div class="row gy-4 ">
            <img src='{{ $promotional->getImage() }}'class='img-fluid services-img' alt="" />
        </div>
    @endforeach
@endif
