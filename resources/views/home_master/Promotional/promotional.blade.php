@php
    use App\Models\Promotionals;
    $getPromotional = Promotionals::where('order', 0)
        ->where('options', 2)
        ->get();
    $getTitle = Promotionals::where('order', 0)
        ->where('options', 2)
        ->get();
    /*   dd($getFooter); */
@endphp


@if ($getPromotional->count() > 0)

    @foreach ($getPromotional as $promotional)
          <h3 class="p-0"> {!! $promotional->title !!} </h3>
        <div class="row gy-4 ">
      
            <img src='{{ $promotional->getImage() }}'class='img-fluid services-img' alt="" />
        </div>
    @endforeach
@endif
