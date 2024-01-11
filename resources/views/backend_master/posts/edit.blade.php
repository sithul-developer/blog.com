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

    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-0 pt-3">
                    <div class="card-body">
                        <div class="row g-3  ">
                            <form action="{{ url('/panel/dashboard/posts/update/' . $posts->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <div class="row">
                                    <div class="col-8">
                                        <div class="col-12 ">
                                            <label for="NameCategory" class="form-label">Title<span
                                                    class="text-danger ">*</span></label>
                                            <input type="text" value="{{ $posts->title }}" name="title" id="title"
                                                placeholder="Please enter title" class="form-control ">
                                            @if ($errors->has('title'))
                                                <div class="text-danger text-left " style="font-size:14px">
                                                    {{ $errors->first('title') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-12 pt-3">
                                            <label for="NameCategory" class="form-label">Sub_Title<span
                                                    class="text-danger ">*</span></label>
                                            <input type="text" value="{{ $posts->sub_title }}" name="sub_title"
                                                id="sub_title" placeholder="Enter Sub_Title" class="form-control  ">
                                            @if ($errors->has('sub_title'))
                                                <div class="text-danger text-left " style="font-size:14px">
                                                    {{ $errors->first('sub_title') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-12 pt-3">
                                            <label for="NameCategory" class="form-label">Category<span
                                                    class="text-danger ">*</span></label>

                                            <select class="form-select" name="category_id" id="validationCustom04">
                                                <option selected="" disabled="" value="">Choose...</option>

                                                @foreach ($categories as $item)
                                                    <option value='{{ $item->id }}'
                                                        {{ $item->id == $posts->category_id ? 'selected' : '' }}>
                                                        {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <div class="text-danger text-left " style="font-size:14px">
                                                    {{ $errors->first('category_id') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-12 pt-3">
                                            <label for="validationCustom04" class="form-label">Description <span
                                                    class="text-danger">*</span></label>
                                            <textarea value="{{ $posts->description }}" name="description" id="description" placeholder="Description"
                                                class="form-control  "> {{ $posts->description }}</textarea>
                                            @if ($errors->has('description'))
                                                <div class="text-danger text-left " style="font-size:14px">
                                                    {{ $errors->first('description') }}
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="col-12">
                                            <label for="NameCategory" class="form-label">Photo <span
                                                    class="text-danger ">*</span></label>
                                            <div class="card">
                                                <div class="card-body">

                                                    <div class="d-grid gap-2 mt-4">
                                                        {{--   <input type="file" value="{{ old('image') }}"
                                                            name="image" id="image" placeholder="Course Category"
                                                            class="form-control @error('image') is-invalid @enderror has-validation "
                                                            onchange="readURL(this);" required> --}}
                                                        <button class=" upload-btn mb-3 btn btn-primary" type="button"
                                                            style="display: flex;
                                                        justify-content: center;
                                                        align-items: center;">
                                                            <i class="bx bxs-cloud-download " style="font-size:25px"></i>
                                                            <span style="font-size: 15px">Choose File</span></button>
                                                        {{--     <button class=" upload-btn mb-3 btn btn-primary" type="button"
                                                            style="display: flex;
                                                        justify-content: center;
                                                        align-items: center;">
                                                            <i class="bx bxs-cloud-download " style="font-size:25px"></i> <span
                                                                style="font-size: 15px">Choose File</span></button> --}}
                                                    </div>


                                                    <input type = "file" class = "visually-hidden" name="image"
                                                        id = "upload-input">
                                                    {{--  @if (!empty($posts->getImage()))
                                                        <img id="blah" src="{{ $posts->getImage() }}" alt="your image"
                                                            class="pt-1" />
                                                    @endif --}}
                                                    <div class ="upload-wrapper pt-2">
                                                        <div class = "upload-container">
                                                            <div class = "upload-img">
                                                                @if (!empty($posts->getImage()))
                                                                    <img id="blah" class="w-100"
                                                                        src="{{ $posts->getImage() }}" alt="your image"
                                                                        class="pt-1" />
                                                                @endif
                                                                <i class=" " style="font-size:25px"></i>
                                                            </div>
                                                            <p class = "upload-text"></p>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('image'))
                                                        <div class="text-danger text-left " style="font-size:14px">
                                                            {{ $errors->first('image') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            {{--  <div class="img_slider">
                                                <img id="blah" class="text-sm" src="{{ asset('./media/image slider.png') }}"
                                                    alt="image" style="width: 150p; height: 150px;font-size:14px  " />
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="cards">
                                        <label for="NameCategory" class="form-label">Content <span
                                                class="text-danger ">*</span></label>
                                        <textarea id="editor" name="content"> {{ $posts->content }}</textarea>
                                        @if ($errors->has('content'))
                                            <div class="text-danger text-left " style="font-size:14px">
                                                {{ $errors->first('content') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="modal-footer pt-3">
                                    <div class="text-left d-flex">
                                        <button class="btn btn-secondary  btn-sm mx-2"><a
                                                href="{{ route('posts.index') }}" style="color:whitesmoke "><i
                                                    class="bi bi-arrow-clockwise" style="margin-right: 10px "
                                                    class="spinner-border"></i>Back To Lists
                                            </a></button>

                                        <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "a
                                                style="margin-right: 10px "></i>Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        // ckedit
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            toolbar: {
                items: [

                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                    'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                    '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            ckfinder: {
                uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            },

            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            placeholder: 'Welcome to CKEditor 5!',
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            fontSize: {
                options: [10, 12, 'default', 14, 18, 20, 22],
                supportAllValues: true
            },

            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            htmlEmbed: {
                showPreviews: true
            },
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                        '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                        '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                        '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },

            removePlugins: [

                'CKBox',
                'CKFinder',
                'EasyImage',

                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',

                'MathType'
            ]
        });

        /////

        $(document).ready(function() {
            $(document).on('click', '#btn_dalete ', function() {
                var users_id = $(this).val();
                $('#deletetModal').modal('show')
                $('#delete_id').val(users_id);
            });
        });


        $(document).ready(function() {
            $('.upload-container').add('.upload-btn').click(function() {
                $('#upload-input').trigger('click');
            });

            $('#upload-input').change(event => {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onloadend = () => {
                    $('.upload-text').text(file.name);
                    $('.upload-img img').attr('aria-label', file.name);
                    $('.upload-img img').attr('src', reader.result);

                }
            })

        });


        /*   $(document).ready(function() {
              $(document).on('click', '#btn_store ', function() {
                  $('#store_Modal').modal('show')
              });
          }); */

        /*  $(document).ready(function() {
             $(document).on('click', '#btn_show ', function() {
                 var users_id = $(this).val();
                 $('#Show_Modal').modal('show')
                 $('#update_id').val(users_id);
             });
         }); */


        ///

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        /////
    </script>

@endsection

