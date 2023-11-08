@extends('backend_master.index')
@section('content')
    <section>
        <nav class="pb-2" style="display: flex">
            @can('role view')
                <a href=" {{ url('/panel/dashboard/courses/create') }}">
                    <button type="submit" class="btn  btn-outline-secondary      btn-md mb-2  " style="font-size: 15px;"><i
                            class="bi bi-plus-circle me-2 " onclick="this.classList.toggle('button--loading')"></i> Add
                        Courses</button></a>
            @endcan

            <form class="search-form d-flex align-items-center" method="POST" action="#"
                style="position: absolute; right: 28px;}">
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

                            <h5 class="card-title"> <span>All of Courses </span></h5>
                            <table class="table  table-hover   striped ">
                                <thead>
                                    <tr>

                                        <th scope="col"id="col">No</th>
                                        <th scope="col"id="col">Image</th>
                                        <th scope="col"id="col">Course </th>
                                        <th scope="col"id="col">Title</th>
                                        <th scope="col"id="col">Description </th>
                                        <th scope="col"id="col">Prices</th>
                                         <th scope="col"id="col">Catgory</th>
                                        <th scope="col"id="col">Status</th>
                                        <th scope="col"id="col">Create_at</th>
                                        <th scope="col"id="col">Update_at</th>
                                        <th scope="col"id="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($courses as $course)
                                    <tbody>
                                        <tr>
                                            <td class="col" id="column">{{ $course->id }}</td>
                                            <td scope="row" ><img
                                                    src='{{ $course->getImage() }}'style="width: 50px; height: 50px;"
                                                    alt="image">
                                            </td>
                                            <td class="col" id="column">{{ $course->name }}</td>
                                            <td class="col"id="column"
                                                style="display: -webkit-box;-webkit-box-orient: vertical;overflow: hidden; width: 480px;">
                                                {{ $course->title }}</td>
                                            <td class="col" id="column">{{ $course->description }}</td>
                                            <td class="col" id="column">{{ $course->prices }}</td>
                                             <td class="col" id="column" >{{ $course->category->name ?? 'None' }}</td>
                                            <td class="col" id="column">

                                                <a href="{{ url('/panel/dashboard/courses/' .$course->id) }}" <button
                                                    class="badge  text-white  btn btn-{{ $course->status ? 'danger' : 'primary' }}">{{ $course->status ? 'Inactive' : 'Active' }}
                                                    </button> </a>
                                            </td>
                                            <td class="col" id="column" >
                                                {{ $course->created_at->format('d/M/Y') }}
                                            </td>
                                            <td class="col" id="column">
                                                {{ Carbon\Carbon::parse($course->update_at)->format('d/M/Y') }}
                                            </td>
                                            <td class="col" >

                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="{{ url('/panel/dashboard/courses/edit/' .$course->id) }}"><i
                                                            class="bi bi-pencil-square  btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>

                                                    <button type="submit" value="{{ $course->id }}" id="btnDelete"
                                                        class="btn btn-sm btn-outline-danger "
                                                        style="border-radius: 5px ;margin: 0px 6px 0px 5px;" <a
                                                        href="" value="{{ $course->id }}"></a><i
                                                            class="bi bi-trash"></i>
                                                    </button>
                                                    <a
                                                        href="{{ url('/panel/dashboard/course_category/view/' . $course->id) }}"><i
                                                            class="bi bi-eye    btn btn-sm btn-outline-success btn-outline-success"></i>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>
                            <!-- End Table with stripped rows -->
                            @include('backend_master.courses.modal')
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

        <style>
            #column{
                color: #707070
            }
            thead {
                border: 1px solid #f2f2f2;
                padding: 10px;
            }

            .col {
                text-align: center;



            }

            #col {
                padding: 20px;
                color: #565454

            }

            th {
                font-size: 0.80rem;
                font-family: Krasar, sans-serif;
                text-align: center;
            }

            td {
                font-size: 0.85rem;
                font-family: Krasar, sans-serif;
            }

            .form-label {
                font-family: Krasar, sans-serif;
                font-size: 16px;
            }

            .form-control {
                /*   padding: .575rem .75rem; */
                font-size: 0.85rem;

            }

            .form-select {

                padding: .575rem 2.25rem 0.585rem .75rem;
                font-size: 0.85rem;

            }

            .button {
                position: relative;
                padding: 8px 16px;
                background: #009579;
                border: none;
                outline: none;
                border-radius: 2px;
                cursor: pointer;
            }

            .button:active {
                background: #007a63;
            }

            .button__text {
                font: bold 20px "Quicksand", san-serif;
                color: #ffffff;
                transition: all 0.2s;
            }

            .button--loading .button__text {
                visibility: hidden;
                opacity: 0;
            }

            .button--loading::after {
                content: "";
                position: absolute;
                width: 16px;
                height: 16px;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                margin: auto;
                border: 4px solid transparent;
                border-top-color: #ffffff;
                border-radius: 50%;
                animation: button-loading-spinner 1s ease infinite;
            }

            @keyframes button-loading-spinner {
                from {
                    transform: rotate(0turn);
                }

                to {
                    transform: rotate(1turn);
                }
            }
        </style>
    </section>
@endsection