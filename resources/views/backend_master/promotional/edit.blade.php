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
        <div class="row g-3 needs-validation">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pt-4">
                        <form action="{{ url('/panel/dashboard/promotional/update/' . $promotional->id) }}" method="POST"
                            class="row g-3 " style="padding-top: 10px;" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="row pt-4">
                                <div class="col-7">
                                    <div class="col-12">
                                        <div class="cards">
                                            <label for="NameCategory" class="form-label">Title <span
                                                    class="text-danger ">*</span></label>
                                            <textarea id="editor" name="title" hidden> {{ $promotional->title }}</textarea>
                                            @if ($errors->has('title'))
                                                <div class="text-danger text-left " style="font-size:14px">
                                                    {{ $errors->first('title') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="col-12">
                                        <label for="NameCategory" class="form-label">Options<span
                                                class="text-danger ">*</span></label>
                                        <select class="form-select" aria-label="Default select example" id="options"
                                            value="{{ $promotional->options }}" name="options" required>
                                            <option {{ $promotional->options == '0' ? 'selected' : '' }} value='0'>1-
                                                Slider </option>
                                            <option {{ $promotional->options == '1' ? 'selected' : '' }} value='1'>2-
                                                Footer</option>
                                            <option {{ $promotional->options == '2' ? 'selected' : '' }} value='2'>3-
                                                Promotional</option>
                                        </select>
                                        @if ($errors->has('order'))
                                            <div class="text-danger text-left " style="font-size:14px">
                                                {{ $errors->first('order') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 pt-3">
                                        <label for="NameCategory" class="form-label">Order<span
                                                class="text-danger ">*</span></label>
                                        <select class="form-select" aria-label="Default select example" id="order"
                                            value="{{ $promotional->order }}" name="order" required>
                                            <option {{ $promotional->order == '0' ? 'selected' : '' }} value='0'>1-
                                                Top </option>
                                            <option {{ $promotional->order == '1' ? 'selected' : '' }} value='1'>2-
                                                Content</option>
                                            <option {{ $promotional->order == '2' ? 'selected' : '' }} value='2'>3-
                                                Buttom</option>
                                            <option {{ $promotional->order == '2' ? 'selected' : '' }} value='2'>4-
                                                Empty Order </option>
                                        </select>
                                        @if ($errors->has('order'))
                                            <div class="text-danger text-left " style="font-size:14px">
                                                {{ $errors->first('order') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12 pt-3">
                                        <input type = "file" class = "visually-hidden" name="image" id = "upload-input">
                                        <label for="NameCategory" class="form-label">Photo <span
                                                class="text-danger ">*</span></label>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-grid gap-2 pt-3 ">
                                                    <button type="button" class="upload-btn mb-3 btn btn-primary"
                                                        id="filebutton"><span
                                                            style="display: flex;
                                                                justify-content: center;
                                                                align-items: center;">
                                                            <i class="bx bxs-cloud-download "
                                                                style="font-size:25px"></i><span
                                                                style="font-size: 16px ;padding-left: 5px;   font-family: Krasar, sans-serif;">
                                                                Choose File</span>

                                                </div>

                                                <div class ="upload-wrapper pt-2">
                                                    <div class = "upload-container">
                                                        <div class = "upload-img">
                                                            @if (!empty($promotional->getImage()))
                                                                <img id="blah" class="w-100"
                                                                    src="{{ $promotional->getImage() }}" alt="your image"
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

                                    </div>
                                    <div class="modal-footer">
                                        <div class="text-left d-flex">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                style="margin-right: 10px ; " data-bs-dismiss="modal"> <a
                                                    href="{{ route('promotional.index') }}"
                                                    style="margin-right: 10px ;color:whitesmoke "><i
                                                        class="bi bi-arrow-clockwise"
                                                        style="margin-right: 10px ;color:whitesmoke "
                                                        class="spinner-border"></i> Back To List
                                                </a></button>
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "a
                                                    style="margin-right: 10px "></i>Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bordered Tabs -->
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

                    '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code',
                    'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',

                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed',

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
    </script>
@endsection
