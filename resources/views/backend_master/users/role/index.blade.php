@extends('backend_master.index')
@section('content')
    <section>
        <nav class="pb-2" style="display: flex">
           {{--  @can('Create. Price') --}}
                <a href=" {{ url('/panel/dashboard/role/create') }}">
                    <button type="submit" class="btn  btn-outline-secondary      btn-md mb-2  " style="font-size: 15px;"><i
                            class="bi bi-plus-circle me-2 " onclick="this.classList.toggle('button--loading')"></i> Create
                        Roles</button>
                </a>
            {{-- @endcan --}}
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
                                <h5 class="card-title"> <span>All of Video</span></h5>
                                {{-- <form class="search-form d-flex  align-items-center" action="{{ route('course.search') }}"
                                    method="get" style="position: absolute ; right:0px ;top:13px ">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search"
                                            placeholder="Searah everthing" aria-describedby="basic-addon2">
                                        <button type="submit" class="input-group-text" id="basic-addon2"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <button type="submit" class="input-group-text mx-3" id="basic-addon2">
                                        <i class="bi bi-arrow-clockwise"></i> </button>
                                </form> --}}
                            </div>

                            <table class="table table-hover   striped">
                                <thead>
                                    <tr>
                                        <th scope="col" id="col">No</th>
                                        <th scope="col" id="col">Role_Name</th>
                                        <th scope="col" id="col">Permission</th>
                                        <th scope="col" id="col">Guard_name</th>
                                        <th scope="col" id="col">Create_at</th>
                                        <th scope="col" id="col">Update_at</th>

                                        <th scope="col" id="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($roles as $role)
                                    <tbody>
                                        <tr>
                                            <td class="col" id="column">{{ $role->id }}</td>
                                            <td class="col" id="column">{{ $role->name }}</td>
                                            <td class="col" id="column">
                                                @foreach ($role->permissions as $permission)
                                                    <span class="badge bg-secondary">{{ $permission->name }}</span>
                                                @endforeach
                                            </td>
                                            <td class="col" id="column">{{ $role->guard_name }}</td>

                                            <td class="col" id="column">
                                                {{ $role->created_at->format('d/M/Y') }}
                                            </td>
                                            <td class="col" id="column">
                                                {{ Carbon\Carbon::parse($role->update_at)->format('d/M/Y') }}
                                            </td>
                                            <td class="col" id="column">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">

                                                    <a href="{{ url('/panel/dashboard/role/edit/' . $role->id) }}"><i
                                                            class="bi bi-pencil-square  btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>
                                                    <button type="submit" value="{{ $role->id }}" id="btnDelete"
                                                        class="btn btn-sm btn-outline-danger "
                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;" <a
                                                        href="" value="{{ $role->id }}"></a><i
                                                            class="bi bi-trash"></i>
                                                    </button>
                                                    <a
                                                        href="{{ url('/panel/dashboard/course_category/view/' . $role->id) }}"><i
                                                            class="bi bi-eye    btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            @include('backend_master.users.role.modal')
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '#btnDelete ', function() {
                    var role = $(this).val();
                    $('#deletetModal').modal('show')
                    $('#deleteid').val(role);
                });
            });
        </script>
    </section>
@endsection
