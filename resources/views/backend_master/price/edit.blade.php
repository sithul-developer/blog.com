@extends('backend_master.index')
@section('content')
    <div class="pagetitle">
        <h1>Form Layouts</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Layouts</li>
            </ol>
        </nav>
    </div> <!-- End Page Title -->
    <section class="section">


        <div class="row">
            <div class="col-lg-7">
                <div class="card m-0 pt-3">
                    <div class="card-body">
                        <form action="{{ url('/panel/dashboard/prices/update/'.$price->id ) }}" method="POST" class="row g-3"
                            enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="col-12">
                                <label for="NameCategory" class="form-label">Effect Date Time *<span
                                        class="text-danger ">*</span></label>
                                <input type="datetime-local" value="{{ $price->time_effect }}" class="form-control" id="time_effect" name="time_effect"
                                    required>
                                @if ($errors->has('time_effect'))
                                    <div class="text-danger text-left " style="font-size:12px">
                                        {{ $errors->first('time_effect') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <label for="NameCategory" class="form-label">Compay Name<span
                                        class="text-danger ">*</span></label>
                                <input type="text" value="{{ $price->compay_name }}"  class="form-control" id="compay_name" name="compay_name" required>
                                @if ($errors->has('compay_name'))
                                    <div class="text-danger text-left " style="font-size:12px">
                                        {{ $errors->first('compay_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12  mt-3">
                                <label for="NameCategory" class="form-label">Products<span
                                        class="text-danger ">*</span></label>
                                <select class="form-select"  aria-label="Default select example" id="product_name" value="{{ $price->product_name }}"
                                    name="product_name" required>
                                 
                                    <option {{ $price->product_name == 'ម៉ាសូត' ? 'selected' : '' }} value='ម៉ាសូត'>ម៉ាសូត </option>
                                    <option {{ $price->product_name == 'សាំងធម្មតា' ? 'selected' : ''  }} value='សាំងធម្មតា'>សាំងធម្មតា</option>
                                    <option {{ $price->product_name == 'សាំងស៊ុបពែ' ? 'selected' : ''  }} value='សាំងស៊ុបពែ'>សាំងស៊ុបពែ</option>
                                </select>
                                @if ($errors->has('product_name'))
                                    <div class="text-danger text-left " style="font-size:12px">
                                        {{ $errors->first('product_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <label for="NameCategory" class="form-label">Orders<span
                                        class="text-danger ">*</span></label>
                                <select class="form-select" aria-label="Default select example" id="order"
                                    name="order" required>
                                    <option selected="" disabled="" value=""><span style="font-size:14px">Selete
                                            Order</p>
                                    </option>
                                    <option  {{ $price->order == '0' ? 'selected' : '' }} value="0">1-BVM</option>
                                    <option  {{ $price->order == '1' ? 'selected' : '' }} value="1">2-TELA </option>
                                    <option  {{ $price->order == '2' ? 'selected' : '' }} value="2">3-CALTEX</option>
                                    <option  {{ $price->order == '3' ? 'selected' : '' }} value="3">4-TOTAL</option>
                                    <option  {{ $price->order == '4' ? 'selected' : '' }} value="4">5-PTT</option>
                                    <option  {{ $price->order == '5' ? 'selected' : '' }} value="5">6-SOKIMEX</option>
                                </select>
                                @if ($errors->has('order'))
                                    <div class="text-danger text-left " style="font-size:12px">
                                        {{ $errors->first('order') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 mt-3">
                                <label for="validationCustom04" class="form-label">Exchange Currency Rate<span
                                        class="text-danger">*</span></label>
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon1" style="font-size: 13px">KHR</span>
                                    <input type="number " value="{{ $price->price_khr }}" class="form-control" name="price_khr" id="price_khr"
                                        oninput="KhCurrency(this)" placeholder="--- Please input selling price in KHR --- "
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                @if ($errors->has('price_khr'))
                                    <div class="text-danger text-left " style="font-size:12px">
                                        {{ $errors->first('price_khr') }}
                                    </div>
                                @endif
                                <div class="input-group pt-3">
                                    <span class="input-group-text" id="basic-addon1" style="font-size: 13px">USD</span>
                                    <input type="number " value="{{ $price->price_usd }}"  class="form-control" name="price_usd" id="price_usd"
                                        oninput="UsCurrency(this)"
                                        placeholder=" --- Please input selling price in USD ---- " aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                                @if ($errors->has('price_usd'))
                                    <div class="text-danger text-left " style="font-size:12px">
                                        {{ $errors->first('price_usd') }}
                                    </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <div class="text-left d-flex pt-3">
                                    <button type="submit" class="btn btn-secondary  btn-sm mx-4"><a
                                            href="{{ route('prices.index') }}" style="color:whitesmoke "><i
                                                class="bi bi-arrow-clockwise" class="spinner-border"></i>Back To Lists
                                        </a></button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "
                                            style="margin-right: 10px "></i>Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    
    <script>
        function UsCurrency(input) {
            // Get the input value and remove any non-numeric characters
            let inputValue = input.value.replace(/[^0-9.]/g, '');

            // Format the number as currency using toLocaleString()
            let formattedValue = parseFloat(inputValue).toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });

            // Update the input value with the formatted currency
            input.value = formattedValue;
        }

        function KhCurrency(input) {
            // Get the input value and remove any non-numeric characters
            let inputValue = input.value.replace(/[^0-9.]/g, '');

            // Format the number as currency using toLocaleString()
            let formattedValue = parseFloat(inputValue).toLocaleString('en-KH', {
                style: 'currency',
                currency: 'KHR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            });

            // Update the input value with the formatted currency
            input.value = formattedValue;
        }

        $(document).ready(function() {
            $(document).on('click', '#btn_dalete ', function() {
                var users_id = $(this).val();
                /*   alert(category_id) */
                $('#deletetModal').modal('show')
                $('#delete_id').val(users_id);
            });
        });


        $(document).ready(function() {
            $(document).on('click', '#btn_store ', function() {
                $('#store_Modal').modal('show')
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#btn_show ', function() {
                var users_id = $(this).val();
                /*   alert(category_id) */
                $('#Show_Modal').modal('show')
                $('#update_id').val(users_id);
            });
        });
    </script>

@endsection
