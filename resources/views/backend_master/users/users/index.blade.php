 @extends('backend_master.index')
 @section('content')
     <section>
         <nav class="pb-2" style="display: flex">
             {{--   @can('role view') --}}
             <a href=" {{ url('/panel/dashboard/users/create') }}">
                 <button type="submit" class="btn  btn-outline-secondary      btn-md mb-2  " style="font-size: 15px;"><i
                         class="bi bi-plus-circle me-2 " onclick="this.classList.toggle('button--loading')"></i> Create
                     Users</button>
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

                                 <h5 class="card-title"> <span>All of User</span></h5>
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
                             @php
                             $i=1;
                         @endphp

                             <table class="table table-hover   striped">
                                 <thead>
                                     <tr>
                                         <th scope="col" id="col">No</th>
                                         <th scope="col" id="col">User Name</th>
                                         <th scope="col" id="col">Email</th>
                                         <th scope="col" id="col">Role</th>
                                         <th scope="col" id="col">User_type</th>
                                         <th scope="col" id="col">Create_at</th>
                                         <th scope="col" id="col">Update_at</th>
                                         <th scope="col" id="col">Action</th>
                                     </tr>
                                 </thead>
                                 @foreach ($users as $user)
                                     <tbody>
                                         <tr>
                                             <td class="col" id="column">{{ $i++ }}</td>
                                             <td class="col" id="column">{{ $user->name }}</td>
                                             <td class="col" id="column">{{ $user->email }}</td>
                                             <td class="col" id="column">
                                                 @foreach ($user->roles as $role)
                                                     <span class="badge bg-secondary">{{ $role->name }}</span>
                                                 @endforeach
                                             </td>
                                             <td class="col" id="column">{{ $user->user_type }}</td>


                                             <td class="col" id="column">
                                                 {{ $user->created_at->format('d/M/Y') }}
                                             </td>
                                             <td class="col" id="column">
                                                 {{ Carbon\Carbon::parse($user->update_at)->format('d/M/Y') }}
                                             </td>
                                             <td class="col">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <a href="{{ url('/panel/dashboard/users/edit/' . $user->id) }}"><i
                                                                class="bi bi-pencil-square  btn btn-sm btn-outline-success btn-outline-success"></i>
                                                        </a>
                                                        <button type="submit" value="{{ $user->id }}" id="btnDelete"
                                                            class="btn btn-sm btn-outline-danger "
                                                            style="border-radius: 5px ;margin: 0px 6px 0px 5px;"> <a
                                                            href="" value="{{ $user->id }}"></a><i
                                                                class="bi bi-trash"></i>
                                                        </button>
                                                        <a href="{{ url('/panel/dashboard/users/view/' . $user->id) }}"><i
                                                                class="bi bi-eye    btn btn-sm btn-outline-warning btn-outline-success"></i>
                                                        </a>

                                                    <a href="{{ url('panel/dashboard/user/' .$user->id) }}"
                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;"
                                                        class="btn btn-sm btn-outline-primary btn-outline-{{ $user->status ? 'primary' : 'danger' }}">{{ $user->status ? 'Active' : ' Inactive' }}</a>
                                                </div>
                                            </td>
                                         </tr>
                                     </tbody>
                                 @endforeach
                             </table>
                             @include('backend_master.users.users.modal')
                             <div class="pagination">
                                {{ $users->links('pagination::bootstrap-5') }}
                            </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </section>
 @endsection
