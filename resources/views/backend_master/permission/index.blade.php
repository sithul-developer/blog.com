@extends('backend_master.index')
@section('content')
    <section>
        <nav class="pb-2" style="display: flex">
            {{--   @can('role view') --}}
            <a href=" {{ url('/panel/dashboard/permission/create') }}">
                <button type="submit" class="btn  btn-outline-secondary      btn-md mb-2  " style="font-size: 15px;"><i
                        class="bi bi-plus-circle me-2 " onclick="this.classList.toggle('button--loading')"></i> Create permission</button>
            </a>
            {{--     @endcan --}}
            <form class="search-form d-flex align-items-center" method="POST" action="#"
                style="position: absolute; right: 28px;">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Searah everthing"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i> </span>
                </div>
            </form>
        </nav>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="overflow-x:auto;">
                            <div class="card-boxd ">
                                <h5 class="card-title"> <span>All of Permision</span></h5>
                            </div>
                            <table class="table table-hover striped">
                                <thead>
                                    <tr>
                                        <th scope="col" id="col">No</th>
                                        <th scope="col" id="col">Permision_Name</th>
                                        <th scope="col" id="col">Guard_name</th>
                                        <th scope="col" id="col">Create_at</th>
                                        <th scope="col" id="col">Update_at</th>
                                        <th scope="col" id="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($permissions as $permision)
                                    <tbody>
                                        <tr>
                                            <td class="col" id="column">{{ $permision->id }}</td>
                                            <td class="col" id="column">{{ $permision->name }}</td>
                                            <td class="col" id="column">{{ $permision->guard_name }}</td>
                                            <td class="col" id="column">
                                                {{ $permision->created_at->format('d/M/Y') }}
                                            </td>
                                            <td class="col" id="column">
                                                {{ Carbon\Carbon::parse($permision->update_at)->format('d/M/Y') }}
                                            </td>
                                            <td class="col" id="column">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a
                                                        href="{{ url('/panel/dashboard/permission/edit/'. $permision->id) }}"><i
                                                            class="bi bi-pencil-square  btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>
                                                    <button type="submit" value="{{ $permision->id }}" id="btnDelete"
                                                        class="btn btn-sm btn-outline-danger "
                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;" ><a
                                                        href="" value="{{ $permision->id }}"></a><i
                                                            class="bi bi-trash"></i>
                                                    </button>
                                                    <a
                                                        href="{{ url('/panel/dashboard/course_category/view/' . $permision->id) }}"><i
                                                            class="bi bi-eye    btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            @include('backend_master.permission.modal')
                            <div class="pagination">
                                {{ $permissions->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(document).on('click', '#btnDelete ', function() {
                    var permission = $(this).val();
                    $('#deletetModal').modal('show')
                    $('#deleteid').val(permission);
                });
            });
        </script>
    </section>
@endsection
