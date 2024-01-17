@extends('backend_master.index')
@section('content')
    <section>
        <nav class="pb-2" style="display: flex">
            {{-- @can('role view') --}}
            <a href=" {{ url('/panel/dashboard/posts/create') }}">
                <button type="submit" class="btn  btn-outline-secondary      btn-md mb-2  " style="font-size: 15px;"><i
                        class="bi bi-plus-circle me-2 " onclick="this.classList.toggle('button--loading')"></i> Add Content</button></a>
            {{-- @endcan --}}

            <form class="search-form d-flex align-items-center" action="{{ route('posts.search') }}" method="GET"
                style="position: absolute; right: 28px;">

                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Searah everthing"
                        aria-describedby="basic-addon2">
                    <button type="submit" class="input-group-text" id="basic-addon2"> <span><i class="bi bi-search"></i>
                        </span></button>
                </div>
                <button type="submit" class="input-group-text mx-3" id="basic-addon2"> <span><i
                            class="bi bi-arrow-clockwise"></i> </span></button>
            </form>
        </nav>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5 class="card-title" style="margin-left:20px"> <span></span></h5>
                        <div class="card-body" style="overflow-x:auto;">
                            @php
                                $i=1;
                            @endphp
                            <table class="table  table-hover   striped ">
                                <thead>
                                    <tr>
                                        <th scope="col" id="col">No</th>
                                        <th scope="col" id="col">Image</th>
                                        <th scope="col" id="col">Content </th>
                                        <th scope="col" id="col">Title </th>
                                        <th scope="col" id="col">Sub_Title</th>
                                        <th scope="col" id="col">Catgory</th>
                                        <th scope="col" id="col">Description </th>
                                     {{--    <th scope="col" id="col">Status</th> --}}
                                        <th scope="col" id="col">viwes</th>
                                        <th scope="col" id="col" >Update_at</th>
                                        <th scope="col" id="col">Create_at</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th colspan="6" id="col"
                                            style="position: absolute; width: 120px; right: 0px;">
                                            Action</th>
                                    </tr>
                                </thead>
                                @if ($posts->count() > 0)

                                    @foreach ($posts as $post)
                                        <tbody>
                                            <tr>
                                                <td class="col" id="column">{{ $i++ }}</td>
                                                <td scope="row">
                                                    <img src='{{ $post->getImage() }}'
                                                        style="width: 85px; height: 48px; border-radius: px; "
                                                        alt="{{ $post->image }}" />
                                                </td>
                                                <td class="col" id="column">
                                                    <p class="textSort"> {{ $post->content  }}</p>
                                                </td>
                                                <td class="col" id="column">
                                                    <p class="textSort"> {{ $post->title }}</p>
                                                </td>
                                                <td class="col" id="column">
                                                    <p class="textSort"> {{ $post->sub_title }}</p>
                                                </td>
                                                <td class="col" id="column">{{ $post->category->name ?? 'None' }}</td>

                                                <td class="col" id="column">
                                                    <p class="textSort">
                                                        {{ $post->description }}
                                                    </p>
                                                </td>
                                         
                                             {{--    <td class="col" id="column">
                                                </td> --}}
                                                <td class="col" id="column">
                                                    <p class="textSort">
                                                        {{ $post->views }}
                                                    </p>
                                                </td>
                                                <td class="col" id="column">
                                                    {{ $post->created_at->diffForHumans() }}
                                                </td>
                                                <td class="col" id="column">
                                                    {{ $post->updated_at->diffForHumans()}}
                                                </td>
                                                <td class="col"
                                                    style=" position: absolute; width: 230px; right: 0px; padding: 18px;">
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <a href="{{ url('/panel/dashboard/posts/edit/' . $post->id) }}"><i
                                                                class="bi bi-pencil-square  btn btn-sm btn-outline-success btn-outline-success"></i>
                                                        </a>
                                                        <button type="submit" value="{{ $post->id }}" id="btnDelete"
                                                            class="btn btn-sm btn-outline-danger "
                                                            style="border-radius: 5px ;margin: 0px 6px 0px 5px;"> <a
                                                            href="" value="{{ $post->id }}"></a><i
                                                                class="bi bi-trash"></i>
                                                        </button>
                                                       {{--  <a
                                                            href="{{ url('/panel/dashboard/category/view/' . $post->id) }}"><i
                                                                class="bi bi-eye    btn btn-sm btn-outline-success btn btn-outline-warning"></i>
                                                        </a> --}}
                                                        <a href="{{ url('/panel/dashboard/posts/' . $post->id) }}"><button style="border-radius: 5px ;margin: 0px 6px 0px 5px;"
                                                            class="btn btn-sm   btn btn-outline-{{ $post->status ? 'danger' : 'success' }}">{{ $post->status ? 'Inactive' : 'Active' }}
                                                            </button> </a>
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
                                left: 43%;">
                                        No results found.</p>
                                @endif
                            </table>
                            <!-- End Table with stripped rows -->
                            @include('backend_master.posts.modal')
                            <div class="pagination">
                                {{ $posts->links('pagination::bootstrap-5') }}
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
                    var courses_id = $(this).val();
                    $('#deletetModal').modal('show')
                    $('#deleteid').val(courses_id);
                });
            });
        </script>
     
    </section>
@endsection
