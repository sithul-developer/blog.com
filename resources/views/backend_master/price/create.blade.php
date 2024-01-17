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
                        <form action="{{ route('prices.store') }}" method="POST" class="row g-3"
                            enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}

                            <div class="col-12">
                                <label for="NameCategory" class="form-label">Effect Date Time *<span
                                        class="text-danger ">*</span></label>
                                <input type="datetime-local" class="form-control" id="time_effect" name="time_effect"
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
                                <input type="text" class="form-control" id="compay_name" name="compay_name" required>
                                @if ($errors->has('compay_name'))
                                    <div class="text-danger text-left " style="font-size:12px">
                                        {{ $errors->first('compay_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <label for="NameCategory" class="form-label">Products<span
                                        class="text-danger ">*</span></label>
                                <select class="form-select" aria-label="Default select example" id="product_name"
                                    name="product_name" required>
                                    <option selected="" disabled="" value=""><span style="font-size:14px">Selete
                                            Product</p>
                                    </option>
                                    <option value="DEISEL">DEISEL </option>
                                    <option value="REGULAR 92">REGULAR 92</option>
                                    <option value="SUPER 95">SUPER 95</option>
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
                                <select class="form-select" aria-label="Default select example" id="order_price"
                                    name="order_price" required>
                                    <option selected="" disabled="" value=""><span style="font-size:14px">Selete
                                            Order</p>
                                    </option>
                                    <option value="0">1</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="3">4</option>
                                    <option value="4">5</option>
                                    <option value="5">6</option>
                                </select>
                                @if ($errors->has('order_price'))
                                    <div class="text-danger text-left " style="font-size:12px">
                                        {{ $errors->first('order_price') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 mt-3">
                                <label for="validationCustom04" class="form-label">Exchange Currency Rate<span
                                        class="text-danger">*</span></label>
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon1" style="font-size: 13px">KHR</span>
                                    <input type="number " class="form-control" name="price_khr" id="price_khr"
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
                                    <input type=" number " class="form-control" name="price_usd" id="price_usd"
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
                                            href="{{ url('panel/dashboard/prices') }}" style="color:whitesmoke "><i
                                                class="bi bi-arrow-clockwise" class="spinner-border"></i>Back To Lists
                                        </a></button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "
                                            style="margin-right: 10px "></i>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

 {{--    <script>
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
    </script> --}}
@endsection
