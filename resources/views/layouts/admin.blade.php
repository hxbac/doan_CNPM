<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang quản trị</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/backend.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/remixicon/fonts/remixicon.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css') }}">


    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/ylkuyyuu2rf3zujr9cq1s09glx041qzempny5is893lc5jb3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>

        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | link image table mergetags | code | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight ',
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    /*
                    Note: Now we need to register the blob in TinyMCEs image blob
                    registry. In the next release this part hopefully won't be
                    necessary, as we are looking to handle it internally.
                    */
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
                };

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

    </script>
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        @include('components.admin-sidebar')

        @include('components.admin-header')

        <div class="content-page">
            @yield('content')
        </div>
    </div>
    <!-- Wrapper End-->

    @include('components.admin-footer')

    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('admin/assets/js/backend-bundle.min.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('admin/assets/js/table-treeview.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('admin/assets/js/customizer.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('admin/assets/js/chart-custom.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('admin/assets/js/slider.js') }}"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/moment.min.js') }}"></script>

    <script>
        // $(document).ready(function () {
        //     $('.dataTable').DataTable({
        //         "language": {
        //             "search": "Tìm kiếm:",
        //             "paginate": {
        //                 "previous": "Trước",
        //                 "next": "Sau",
        //             },
        //             "emptyTable": "Không có bản ghi",
        //             "zeroRecords": "Không có bản ghi"
        //         },
        //         "pageLength": 5
        //     });
        // });
    </script>
</body>

</html>
