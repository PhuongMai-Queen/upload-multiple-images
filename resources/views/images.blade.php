<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fukuro - Upload Multiple Images</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        h2 {
            margin: 50px 0;
        }
        section {
            flex-grow: 1;
        }
        .file-drop-area {
            position: relative;
            display: flex;
            align-items: center;
            width: 450px;
            max-width: 100%;
            padding: 25px;
            border: 1px dashed #343A40;
            border-radius: 3px;
            transition: 0.2s;
            margin: 0 auto;
        }
        .file-drop-area.is-active {
             background-color: rgba(255, 255, 255, 0.05);
         }
        .fake-btn {
            flex-shrink: 0;
            background-color: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            padding: 8px 15px;
            margin-right: 10px;
            font-size: 12px;
            text-transform: uppercase;
        }
        .file-msg {
            font-size: small;
            font-weight: 300;
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            cursor: pointer;
            opacity: 0;
        }
        .file-input:focus {
             outline: none;
         }
        .button {
            outline: none;
            border: none;
            text-decoration: none;
            color: white;
            width: 120px;
            height: 50px;
            background: #4caf50e3;
            position: relative;
            margin: 30px;
            padding: 12px;
            font-size: 18px;
            border-radius: 10px;
            box-shadow: 0 15px 0 0 #4caf50, 0 0 20px 0 #bbb;
            transition: all 0.2s;
        }
        .button:focus {
            outline: none;
            border: none !important;
        }
        .button:active{
            top: 8px;
            box-shadow: 0px 7px 0px 0px #4caf50;
        }
        footer{
            background-color: #EEEEEE;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                    <strong> Album</strong>
                </a>
                <a href="/images" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i> <span style="font-size: 15px">Upload</span>
                </a>
            </div>
        </div>
    </header>
    <main>
        <div class="album py-5 bg-light">
            <div class="container mt-4">
                @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
                <form method="post" action="/images" enctype="multipart/form-data">
                    @csrf

                    <div class="file-drop-area">
                        <span class="fake-btn">Choose files</span>
                        <span class="file-msg">or drag and drop files here</span>
                        <input class="file-input" type="file" name="images[]" multiple accept="image/*">
                    </div>

                    <div data-type="loading" class="img-loading" style="color:#218838; display:none;">
                            @if ($errors->has('files'))
                                @foreach ($errors->get('files') as $error)
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $error }}</strong>
                            </span>
                                @endforeach
                            @endif
                        </div>

                    <div class="form-group text-center mt-3">
                        <button type="submit" class="button">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="text-muted py-5">
        <div class="container">
            <p class="mb-1">&copy; Copyright 2021 by Fukuro.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>



    <script type="text/javascript">

        var $fileInput = $('.file-input');
        var $droparea = $('.file-drop-area');

        // highlight drag area
        $fileInput.on('dragenter focus click', function() {
            $droparea.addClass('is-active');
        });

        // back to normal state
        $fileInput.on('dragleave blur drop', function() {
            $droparea.removeClass('is-active');
        });

        // change inner text
        $fileInput.on('change', function() {
            var filesCount = $(this)[0].files.length;
            var $textContainer = $(this).prev();

            if (filesCount === 1) {
                // if single file is selected, show file name
                var fileName = $(this).val().split('\\').pop();
                $textContainer.text(fileName);
            } else {
                // otherwise show number of files
                $textContainer.text(filesCount + ' files selected');
            }
        });

    </script>
</body>
</html>
