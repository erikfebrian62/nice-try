
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from polygons.space/neptune/source/templates/admin1/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Dec 2022 03:09:47 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Register</title>

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    {{-- icon title --}}
    <link rel="shortcut icon" href="{{ asset('/images/zyro-image.png') }}" type="image/x-icon">

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('assets auth/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets auth/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets auth/plugins/pace/pace.css') }}" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="{{ asset('assets auth/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets auth/css/custom.css') }}" rel="stylesheet">

</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">profit_counter</a>
            </div>
            <p class="auth-description">Silahkan mengisi data untuk registrasi.<br>Sudah mempunyai akun? <a href="{{ route('login.index') }}">Login</a></p>
            <form action="{{ route('register.proces') }}" method="POST">
                @csrf
                <div class="mb-3 form-floating">
                    <input type="text" class="shadow-sm form-control @error('name')
                       is-invalid 
                    @enderror" name="name" id="signUpUsername" aria-describedby="signUpUsername" placeholder="Enter username" required value="{{ old('name') }}">
                    <label for="signUpUsername" class="form-label">Username</label>
                    @error('name')
                        <div class="invalid-feedback">
                             {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <div class="mb-3 form-floating">
                    <input type="email" name="email" class="shadow-sm form-control @error('email')
                        is-invalid
                    @enderror" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com" required value="{{ old('email') }}">
                    <label for="signUpEmail" class="form-label">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                             {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 form-floating">
                    <input type="text" class="shadow-sm form-control @error('jenis_usaha')
                        is-invalid
                    @enderror" id="jenis_usaha" name="jenis_usaha" placeholder="usaha" required value="{{ old('jenis_usaha') }}">
                    <label for="jenis_usaha">Jenis usaha</label>
                    @error('jenis_usaha')
                        <div class="invalid-feedback">
                             {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class=" form-floating">
                    <input type="password" class="shadow-sm form-control @error('password')
                        is-invalid
                    @enderror" name="password" id="signUpPassword" aria-describedby="signUpPassword" placeholder="passsword" required>
                    <label for="signUpPassword" class="form-label">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                             {{ $message }}
                        </div>
                    @enderror
                </div> 

                <div class="form-group mt-5 text-center">
                <button type="submit" class="btn btn-primary w-50">Register <i class="ms-1 bi bi-send"></i></button>
            </form>
            </div>
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="{{ asset('assets auth/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets auth/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets auth/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets auth/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets auth/js/main.min.js') }}"></script>
    <script src="{{ asset('assets auth/js/custom.js') }}"></script>
</body>

</html>