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
    <section>
        <nav class="pb-2" style="display: flex">
            @can('Create. Price')
                <a href=" {{ url('/panel/dashboard/prices/create') }}">
                    <button type="submit" class="btn  btn-outline-secondary  btn-md mb-2  " style="font-size: 15px;"><i
                            class="bi bi-plus-circle me-2 " onclick="this.classList.toggle('button--loading')"></i>Create
                        Prices</button>
                </a>
            @endcan
            <form class="search-form d-flex align-items-center" action="{{ url('/panel/dashboard/import-excel') }}"
                method="POST" enctype="multipart/form-data" style="position: absolute;
                right: 36px;
                z-index: 1;
                top: 173px;">
                @csrf
                <input class="form-control" type="file" name="excel_file" style="margin-right: 10px;">
                <button type="submit" class="btn bg-warning btn-sm"><i class="bi bi-database-fill-down "></i></button>
            </form>
            @if ($errors->has('excel_file'))
                <div class="text-danger text-left " style="font-size:12px">
                    {{ $errors->first('excel_file') }}
                </div>
            @endif

            {{--  <form class="search-form d-flex align-items-center" method="POST" action="#"
                style="position: absolute; right: 28px;">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Searah everthing"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i> </span>
                </div>
            </form> --}}
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="overflow-x:auto;">
                            <h5 class="card-title">
                                <form action="{{ url('panel/dashboard/prices/delete_all') }}" method="POST">
                                    {{ csrf_field() }}
                            </h5>
                            @php
                            $i = 1;
                        @endphp
                            <table class="table  table-hover striped ">
                                <thead>
                                    <tr>
                                        <th scope="col" id="col"><input type="checkbox"  id="select-all"></th>
                                        <th scope="col" id="col">No</th>
                                        <th scope="col" id="col">Compay</th>
                                        <th scope="col" id="col">Product </th>
                                        <th scope="col" id="col">Price KH </th>
                                        <th scope="col" id="col">Price USD </th>
                                     {{--    <th scope="col" id="col">Status </th> --}}
                                        <th scope="col" id="col">Date </th>

                                        <th scope="col" id="col">Create_at</th>
                                        <th scope="col" id="col">Update_at</th>
                                        {{--    <th scope="col" id="col">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prices as $price)
                                        <tr>
                                            <td class="col" id="column"> <input type="checkbox" name="selected[]"
                                                    value="{{ $price->id }}">
                                            </td>
                                            <td class="col" id="column">{{  $i++}}</td>
                                            <td class="col" id="column">{{ $price->compay_name }}</td>
                                            <td class="col" id="column"
                                                style="font-size:14px;font-family: Krasar, sans-serif;">
                                                {{ $price->product_name }}</td>
                                            <td class="col" id="column">{{ $price->price_khr }}</td>
                                            <td class="col" id="column">{{ $price->price_usd }}</td>
                                         {{--    <td class="col" id="column"> <a
                                                    href="{{ url('/panel/dashboard/courses/' . $price->id) }}"> <button
                                                        type="button"
                                                        class=" badge  text-white  btn btn-{{ $price->status ? 'danger' : 'primary' }}">
                                                        {{ $price->status ? 'Inactive' : 'Active' }}
                                                    </button> </a> </td> --}}
                                            <td class="col" id="column">{{ $price->time_effect }}
                                            </td>
                                            <td class="col" id="column">{{ $price->created_at->diffForHumans() }}
                                            </td>
                                            <td class="col" id="column">
                                                {{ Carbon\Carbon::parse($price->updated_at)->diffForHumans() }}</td>
                                            {{--  <td class="col" id="column">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="{{ url('/panel/dashboard/prices/edit/' . $price->id) }}">
                                                        <i
                                                            class="bi bi-pencil-square  btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>

                                                    <button type="submit" value="{{ $price->id }}" id="btnDelete"
                                                        class="btn btn-sm btn-outline-danger "
                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;"> <a
                                                            href="" value="{{ $price->id }}"></a><i
                                                            class="bi bi-trash"></i>
                                                    </button>
                                                    <a
                                                        href="{{ url('/panel/dashboard/course_category/view/' . $price->id) }}"><i
                                                            class="bi bi-eye    btn btn-sm btn-outline-success btn btn-outline-warning"></i>
                                                    </a>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                                <button type="submit" class="btn btn-sm btn-outline-secondary"
                                    style="margin: -46px 1px 0 0;"> Delete
                                    Selected</button>
                            </table>
                            </form>
                            <!-- End Table with stripped rows -->
                            @include('backend_master.price.modal')
                         
                            <div class="pagination">
                                {{ $prices->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
