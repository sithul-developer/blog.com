@extends('backend_master.index')
@section('content')
    {{-- <div class="pagetitle">
        <h1>Form Layouts</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Layouts</li>
            </ol>
        </nav>
    </div> --}}
    <!-- End Page Title -->
    <section class="section">
        <div class="card">
            <!-- Bordered Tabs -->
            <div class="card-body  " style="overflow-x:auto;">
                <nav class="pt-4 pb-2" style="display: flex">
                    {{--    @can('role-list') --}}
                    <a href=" {{ url('/panel/dashboard/promotional/create') }}">
                        <button type="submit" class="btn  btn-outline-secondary btn-md mb-2  " style="font-size: 15px;"><i
                                class="bi bi-plus-circle me-2 " onclick="this.classList.toggle('button--loading')"></i> Add
                            Promotional
                        </button></a>
                    {{--  @endcan --}}
                    <form class="search-form d-flex align-items-center" action="{{ route('promotional.search') }}"
                        method="POST" style="position: absolute; right: 28px;}">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Searah everthing"
                                aria-describedby="basic-addon2">
                            <button type="submit" class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i>
                            </button>
                        </div>
                        <button type="submit" class="input-group-text mx-3" id="basic-addon2"> <span><i
                                    class="bi bi-arrow-clockwise"></i> </span></button>
                    </form>
                </nav>
                @php
                    $i = 1;
                @endphp
                <div class="card-body" style="overflow-x:auto;">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col" id="col">NO</th>
                                <th scope="col" id="col">Preview</th>
                                <th scope="col" id="col">Title</th>
                                <th scope="col" id="col">order</th>
                                <th scope="col" id="col">options</th>
                                <th scope="col" id="col">Status</th>
                                <th scope="col" id="col">Created At</th>
                                <th scope="col" id="col">Update_at</th>
                                <th colspan="col" id="col">
                                    Action</th>
                            </tr>
                        </thead>
                        @if ($promotionals->count() > 0)
                            @foreach ($promotionals as $promotional)
                                <tbody>
                                    <tr>
                                        <td class="col" id="column">
                                            {{ $i++ }}</td>
                                        <td scope="row">
                                            <img src='{{ $promotional->getImage() }}'
                                                style="width: 85px; height: 48px; border-radius: px; "
                                                alt="{{ $promotional->image }}" />
                                        </td>
                                        <td class="col" id="column">
                                            <p class="textSort">
                                                @if (empty($promotional->title))
                                                    No data available
                                                @else
                                                    {{ $promotional->title }}
                                                @endif
                                            </p>
                                        </td>
                                        <td class="col" id="column">
                                            @if ($promotional->order == '0')
                                                <p>1- Top </p>
                                            @else
                                                @if ($promotional->order == '1')
                                                    2- Center
                                                @else
                                                    @if ($promotional->order == '2')
                                                        <p>3- Buttom </p>
                                                    @else
                                                        <p>4- Empty Order </p>
                                                    @endif
                                                @endif
                                            @endif

                                        </td>
                                        <td class="col" id="column">
                                            @if ($promotional->options == '0')
                                                <p>1- Slider </p>
                                            @else
                                                @if ($promotional->options == '1')
                                                    2- Footer
                                                @else
                                                    <p>3- Promotional </p>
                                                @endif
                                            @endif
                                        </td>
                                        <td class="col" id="column">

                                            <a href="{{ url('/panel/dashboard/promotional/' . $promotional->id) }}">
                                                <button
                                                    class="badge  text-white btn btn-{{ $promotional->status ? 'danger' : 'primary' }}">{{ $promotional->status ? 'Inactive' : 'Active' }}
                                                </button> </a>
                                        </td>
                                        <td class="col" id="column">
                                            {{ $promotional->created_at->diffForHumans() }}
                                        </td>
                                        <td class="col" id="column">
                                            {{ $promotional->updated_at->diffForHumans() }}
                                        </td>
                                        <td class="col" style=" ">
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <a
                                                    href="{{ url('/panel/dashboard/promotional/edit/' . $promotional->id) }}"><i
                                                        class="bi bi-pencil-square  btn btn-sm btn-outline-success btn-outline-success"></i>
                                                </a>
                                                <button type="submit" value="{{ $promotional->id }}" id="btn_dalete"
                                                    class="btn btn-sm btn-outline-danger "
                                                    style="border-radius: 5px ;margin: 0px 6px 0px 5px;">
                                                    <a href="" value="{{ $promotional->id }}">
                                                    </a><i class="bi bi-trash"></i>
                                                </button>
                                                <a
                                                    href="{{ url('/panel/dashboard/course_category/view/' . $promotional->id) }}"><i
                                                        class="bi bi-eye    btn btn-sm btn-outline-success btn btn-outline-warning"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @else
                            <p
                                style="display: flex;
                                                justify-content: center;
                                                position: absolute;
                                                bottom: 0;
                                                margin: 12px -1px 9px;
                                                left: 43%;    font-family: Krasar, sans-serif;">
                                No results found.</p>
                        @endif
                    </table>
                    @include('backend_master.promotional.modal')
                    <div class="pagination">
                        {{ $promotionals->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
