@php
    use App\Models\Promotionals;
    $getPromotional_buttom = Promotionals::where('order', 2)
        ->where('options', 2)
        ->get();
    /*   dd($getFooter); */
@endphp

@foreach ($getPromotional_buttom as $promotional)
<h3>Corporis temporibus maiores provident</h3>

    <div class="row gy-4">
        <img src='{{ $promotional->getImage() }}'class='img-fluid services-img' alt="" />
    </div>
    
    
@endforeach





