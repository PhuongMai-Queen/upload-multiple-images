<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Album Fukuro</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <style>
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

            <div class="album bg-light">
                <div class="container pt-4 pb-5">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
                        @foreach ($images as $image)
                        <div class="col mt-3">
                            <div class="card shadow-sm">
                                <img src="{{ $protocol.'/'.$_SERVER['SERVER_NAME'].$image->path }}" width="100%" height="225">
                                <div class="card-body">
                                    <p class="card-text"><a href="{{ $protocol.'/'.$_SERVER['SERVER_NAME'].$image->path }}">{{ $protocol.'/'.$_SERVER['SERVER_NAME'].$image->path }} </a></p>
{{--                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                        <div class="btn-group">--}}
{{--                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
{{--                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
{{--                                        </div>--}}
{{--                                        <small class="text-muted">9 mins</small>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </main>

        <footer class="text-muted py-5">
        <div class="container">
{{--            <p class="float-end mb-1">--}}
{{--                <a href="#">Back to top</a>--}}
{{--            </p>--}}
            <p class="mb-1">&copy; Copyright 2021 by Fukuro.</p>
        </div>
    </footer>
    </body>
</html>
