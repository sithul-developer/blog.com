@extends('backend_master.index')
@section('content')
    @php
        use App\Models\Posts;
        use App\Models\User;
        use App\Models\Category;
        use Spatie\Permission\Models\Permission;

        $CountUser = User::where('Is_deleted', 1)->count();
        $CountPost = Posts::where('Is_deleted', 1)->count();
        $CountCate = Category::where('Is_deleted', 1)->count();
        $CountPer = Permission::where('Is_deleted', 1)->count();
        /*  $count = permissions::count(); // Get total post count
 $CountCate = Category::where('Is_deleted', 1)->count(); */
    @endphp
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
                <h5 class="card-title"></h5>

                <div class="accordion" id="accordionExample">
                    {{-- Trash Category --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Trash of Category <span class="badge bg-danger badge-number"
                                    style="margin: 0 10px">{{ $CountCate }}</span>
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
                                                                <form method="POST"
                                                                    action="{{ route('trash.restore_cate') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="category_id"
                                                                        value="{{ $item->id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-outline-warning "
                                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;">
                                                                        <i class="bi bi-arrow-90deg-up"></i> Re-Store
                                                                    </button>
                                                                </form>


                                                                <form method="POST"
                                                                    action="{{ route('trash.delete_cate', ['id' => $item->id]) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm" role="button"
                                                                        type="submit"> <i class="bi bi-trash"></i>
                                                                        Delete</button>
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
                    {{-- Trash Permission --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour ">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                Trash of Permission <span class="badge bg-danger badge-number"
                                    style="margin: 0 10px">{{ $CountPer }}</span>
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card">
                                    <div class="card-body" style="overflow-x:auto;">
                                        <h5 class="card-title"> <span>Trash of Permission </span></h5>
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
                                                                    action="{{ route('trash.restore_per') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="text" name="per_id"
                                                                        value="{{ $item->id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-outline-warning "
                                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;">
                                                                        <i class="bi bi-arrow-90deg-up"></i> Re-Store
                                                                    </button>
                                                                </form>

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
                    {{-- Trash User --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive ">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                Trash of User<span class="badge bg-danger badge-number"
                                    style="margin: 0 10px">{{ $CountUser }}</span>
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
                                                                    action="{{ route('trash.restore_user') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $item->id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-outline-warning "
                                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;">
                                                                        <i class="bi bi-arrow-90deg-up"></i> Re-Store
                                                                    </button>
                                                                </form>
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
                    {{-- Trash Posts --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix ">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Trash of Posts
                                <span class="badge bg-danger badge-number"
                                    style="margin: 0 10px">{{ $CountPost }}</span>
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card">
                                    <div class="card-body" style="overflow-x:auto;">
                                        <h5 class="card-title"> <span>Trash of Posts </span></h5>
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col"id="col">No</th>
                                                    <th scope="col"id="col">Title</th>
                                                    <th scope="col"id="col">Category</th>
                                                    <th scope="col"id="col">Create_at</th>
                                                    <th scope="col"id="col">Update_at</th>
                                                    <th scope="col"id="col">Action</th>
                                                </tr>
                                            </thead>
                                            @foreach ($posts as $item)
                                                <tbody>
                                                    <tr>
                                                        <td class="col">{{ $item->id }}</td>
                                                        <td class="col">{{ $item->title }}</td>
                                                        <td class="col">{{ $item->category->name ?? 'None' }}</td>
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
                                                                    action="{{ route('trash.restore_post') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="post_id"
                                                                        value="{{ $item->id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-outline-warning "
                                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;">
                                                                        <i class="bi bi-arrow-90deg-up"></i> Re-Store
                                                                    </button>
                                                                </form>
                                                                <form method="POST"
                                                                    action="{{ route('trash.delete_post', ['id' => $item->id]) }}">
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
    @endsection
