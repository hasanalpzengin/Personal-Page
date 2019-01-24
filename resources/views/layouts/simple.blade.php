<!DOCTYPE html>
<html>
<head>
    <meta name="google-site-verification" content="WgtPzL1DIUoOSzlea1-A052gtF0C2gSnswwWfi-vgzY" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Hasan Alp Zengin, Computer Engineer with Software Passion. You can find more information about me in my webpage">
    <meta name="keywords" content="Developer, Hasan Alp Zengin, Zengin, Hasan Alp, Hasan, Alp, IoT, AI, Mobile Application, Web Developlement, Development, Computer, Engineering">
    <title>Hasan Alp Zengin | @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    @yield('external_resources')
</head>
    <body>
        <header>
            <nav class="navbar navbar-dark navbar-expand-md bg-primary">
            <div class="navbar-header">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapseNav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
                <div class="collapse navbar-collapse" id="collapseNav">
                    <ul class="navbar-nav mx-md-auto">
                        <li class="nav-item mx-2"><a class="nav-link" href="/"><span><i class="fas fa-home"></i></span> Home</a></li>
                        <li class="nav-item mx-2"><a class="nav-link" href="/cv"><span><i class="fas fa-file"></i></span> CV</a></li>
                        <li class="nav-item mx-2"><a class="nav-link" href="/skills"><span><i class="fas fa-briefcase"></i></span> Skills</a></li>
                        <li class="nav-item mx-2"><a class="nav-link" href="/projects"><span><i class="fas fa-project-diagram"></i></span> Projects</a></li>
                        <li class="navbar-brand mx-1">Hasan Alp Zengin</li>
                        <li class="nav-item mx-2"><a class="nav-link" href="/blogs"><span><i class="fas fa-th-large"></i></span> Blog</a></li>
                        <li class="nav-item mx-2"><a class="nav-link" href="/about"><span><i class="fas fa-info"></i></span> About Me</a></li>
                        <li class="nav-item mx-2"><a class="nav-link" href="/contact"><span><i class="fas fa-envelope"></i></span> Contact</a></li>
                    </ul>
                </div>
                    @if(Session::has('username'))
                        <ul class="list-group" id="admin-menu">
                            <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            <li class="list-group-item"><a href="/profile"><i class="fas fa-user-edit"></i> Edit Profile</a></li>
                            <li class="list-group-item"><a href="/users"><i class="fas fa-users"></i> Users</a></li>
                            <li class="list-group-item"><a href="/users/new"><i class="far fa-plus-square"></i> Add User</a></li>
                            <li class="list-group-item"><a href="/skills/new"><i class="far fa-plus-square"></i> Add Skill</a></li>
                            <li class="list-group-item"><a href="/categories/new"><i class="far fa-plus-square"></i> Add Category</a></li>
                            <li class="list-group-item"><a href="/cv/upload"><i class="fas fa-file"></i> Update Resume</a></li>
                            <li class="list-group-item"><a href="/blogs/new"><i class="fas fa-folder-plus"></i> Add Blog</a></li>
                            <li class="list-group-item"><a href="/logs"><i class="fas fa-history"></i> Logs</a></li>
                        </ul>
                        <div class="profile float-right text-white"><i class="fas fa-user"></i> {{ Session::get('username') }}</div>
                    @else
                        <div class="login float-right"><a href="/login" class="text-white link"><i class="fas fa-sign-in-alt"></i> Login</a></div>
                    @endif
            </nav>
        </header>
        <section>
            <div class="container" style="min-height: 800px !important;">
                @yield('content')
            </div>
            @if(Session::has('username'))
                <div class="admin-panel card">
                    <div class="card-title text-center py-1 text-white bg-primary" id="admin-toolbar"><b>Admin Panel</b></div>
                    <div class="card-body p-2 text-white" id="admin-panel">
                        @yield('admin-panel')
                    </div>
                </div>
            @endif
        </section>
        <footer class="footer text-white text-center bg-dark p-3 mt-3 pt-4">
            <b>Hasan Alp Zengin</b> @ All rights are free #support #opensource
        </footer>
    </body>
</html>