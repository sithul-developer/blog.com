@php
    use App\Models\Promotionals;
    $getFooter = Promotionals::where('order', 3 )
    ->where('options', 1)
    ->get();
  /*   dd($getFooter); */
@endphp



<footer id="footer" class="footer " class="" style="background: #F1BE48 ;">
    <div class="container-fluid ">

          @foreach ($getFooter as $promotional)
            <div class="row gy-4">
                <img src='{{ $promotional->getImage() }}' style="width: 85px; height: 48px; border-radius: px; "
                    alt="" />
            </div>
        @endforeach

    </div>
</footer>
<footer id="footer" class="footer p-1 " class="" style="background: #F1BE48 ;">
    <div class="container mt-4">
        <div class="copyright">
            © Copyright <strong><span>Logis</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
    <footer>
