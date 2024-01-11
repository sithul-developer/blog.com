@extends('backend_master.index')
@section('content')
    <section>
        <nav class="pb-2" style="display: flex">
            <button type="submit" class="btn  btn-outline-secondary      btn-md mb-2  " style="font-size: 15px;"> Trash of
                Manage
            </button>
            <form class="search-form d-flex align-items-center" method="POST" action=""
                style="position: absolute; right: 28px;}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Searah everthing"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i> </span>
                </div>
            </form>
        </nav>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Default Accordion</h5>
                <!-- Default Accordion -->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Trash of Category #3
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card">
                                    <div class="card-body" style="overflow-x:auto;">
                                        <h5 class="card-title"> <span>Trash of Category </span></h5>
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col"id="col">No</th>
                                                    <th scope="col"id="col">Name</th>
                                                    <th scope="col"id="col">Create_at</th>
                                                    <th scope="col"id="col">Update_at</th>
                                                    <th scope="col"id="col">Action</th>
                                                </tr>
                                            </thead>
                                            @foreach ($category as $item)
                                                <tbody>
                                                    <tr>
                                                        <td class="col">{{ $item->id }}</td>
                                                        <td class="col">{{ $item->name }}</td>
                                                        <td class="col" style="display: flex">
                                                            {{ $item->created_at->format('d/M/Y') }}
                                                        </td>
                                                        <td class="col">
                                                            {{ Carbon\Carbon::parse($item->update_at)->format('d/M/Y') }}
                                                        </td>
                                                        <td class="col">
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic outlined example">
                                                                {{--   <button type="submit" value="{{ $item->id }}" id="btnDelete"
                                                            class="btn btn-sm btn-outline-danger "
                                                            style="border-radius: 5px ;margin: 0px 6px 0px 5px;" <a
                                                            href="" value="{{ $item->id }}"></a><i
                                                                class="bi bi-trash"></i>
                                                        </button> --}}

                                                                <form method="POST"
                                                                    action="{{ route('trash.destroy', ['id' => $item->id]) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm" role="button"
                                                                        type="submit">Delete</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                        @include('backend_master.category.modal')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">

                        <h2 class="accordion-header" id="headingFour ">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                Trash of Permssion #3
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card">
                                    <div class="card-body" style="overflow-x:auto;">
                                        <h5 class="card-title"> <span>Trash of Category </span></h5>
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col"id="col">No</th>
                                                    <th scope="col"id="col">Permssion_Name</th>
                                                    <th scope="col"id="col">Guard_name</th>
                                                    <th scope="col"id="col">Create_at</th>
                                                    <th scope="col"id="col">Update_at</th>
                                                    <th scope="col"id="col">Action</th>
                                                </tr>
                                            </thead>
                                            @foreach ($permission as $item)
                                                <tbody>
                                                    <tr>
                                                        <td class="col">{{ $item->id }}</td>
                                                        <td class="col">{{ $item->name }}</td>
                                                        <td class="col">{{ $item->guard_name }}</td>
                                                        <td class="col" style="display: flex">
                                                            {{ $item->created_at->format('d/M/Y') }}
                                                        </td>
                                                        <td class="col">
                                                            {{ Carbon\Carbon::parse($item->update_at)->format('d/M/Y') }}
                                                        </td>
                                                        <td class="col">
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic outlined example">
                                                                <form method="POST"
                                                                    action="{{ route('trash.destroy_per', ['id' => $item->id]) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm" role="button"
                                                                        type="submit"><i
                                                                            class="bi bi-trash mx-1"></i>Delete</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                        @include('backend_master.permission.modal')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive ">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                Trash of user #4
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card">
                                    <div class="card-body" style="overflow-x:auto;">
                                        <h5 class="card-title"> <span>Trash of user </span></h5>
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col"id="col">No</th>
                                                    <th scope="col"id="col">User Name</th>
                                                    <th scope="col"id="col">Email</th>
                                                    <th scope="col"id="col">Create_at</th>
                                                    <th scope="col"id="col">Update_at</th>
                                                    <th scope="col"id="col">Action</th>
                                                </tr>
                                            </thead>
                                            @foreach ($users as $item)
                                                <tbody>
                                                    <tr>
                                                        <td class="col">{{ $item->id }}</td>
                                                        <td class="col">{{ $item->name }}</td>
                                                        <td class="col">{{ $item->email }}</td>
                                                        <td class="col" style="display: flex">
                                                            {{ $item->created_at->format('d/M/Y') }}
                                                        </td>
                                                        <td class="col">
                                                            {{ Carbon\Carbon::parse($item->update_at)->format('d/M/Y') }}
                                                        </td>
                                                        <td class="col">
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic outlined example">
                                                                <form method="POST"
                                                                    action="{{ route('trash.destroy_per', ['id' => $item->id]) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm" role="button"
                                                                        type="submit"><i
                                                                            class="bi bi-trash mx-1"></i>Delete</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                        @include('backend_master.permission.modal')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Default Accordion Example -->
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '#btnDelete ', function() {
                    var permission = $(this).val();
                    $('#deletetModalPer').modal('show')
                    $('#deleteid').val(permission);
                });
            });
        </script>
    </section>
@endsection
