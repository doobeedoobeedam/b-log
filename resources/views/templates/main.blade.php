<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/img/logo.png" type="image/png">
    <title>b-l0g | {{ $title }}</title>

    <!-- FontAwesome JS -->
    <script defer src="/assets/plugins/fontawesome/js/all.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/assets/plugins/trix/trix.css">
    <script type="text/javascript" src="/assets/plugins/trix/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"],
        trix-toolbar .trix-button--icon-increase-nesting-level,
        trix-toolbar .trix-button--icon-decrease-nesting-level {
            display: none;
        }

        .img-preview {
            width: 200px !important; 
            height: 110px !important;
        }
    </style>
</head>

<body>

    @include('templates/alert')

    <div class="page-wrapper">
        <header></header>
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    @include('templates/navbar')

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            // imgPreview.style.width = '200px';
            // imgPreview.style.height = '110px';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        };

        // Post's Category
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/createSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

    <script type="text/javascript" src="/assets/plugins/popper.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
