
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">

    <!-- Title -->
    <title>Login</title>

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


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

    {{-- icon title --}}
    <link rel="shortcut icon" href="{{ asset('/images/zyro-image.png') }}" type="image/x-icon">

</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="#">profit_counter</a>
            </div>
            <p class="auth-description">Silahkan login menggunakan akun anda.<br>Belum mempunyai akun? <a href="{{ route('register.index') }}">Register</a></p>

            <div class="auth-credentials">
                <form action="{{ route('login.proces') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="shadow-sm form-control @error('email')
                           is-invalid 
                        @enderror" name="email" id="signInEmail" aria-describedby="signInEmail" required placeholder="Masukan Email" value="{{ old('email') }}">
                        <label for="signInEmail" class="form-label">Email address </label>
                        @error('email')
                            <div class="feedback-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" class="shadow-sm form-control" id="signInPassword" aria-describedby="signInPassword" required placeholder="Masukan Password" name="password">
                        <label for="signInPassword" class="form-label">Password</label>
                    </div>
                    <div class="form-group mt-5 text-center">
                        <button type="submit" class="float-start btn btn-primary w-30">Log in</button>  <a class="float-end text-xs " href="{{ route('forgot.index') }}">Lupa password?</a>
                    </div>
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
    {{-- Sweet-alert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    {{-- span error --}}
    <script>
        @if (Session::has('error'))
        const Toast = Swal.mixin({
           toast: true,
           position: 'top-end',
           showConfirmButton: false,
           timer: 3000,
           timerProgressBar: true,
           didOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
           })
           Toast.fire({
           icon: 'error',
           title: '{{ Session::get('error') }}'
           })
        @endif
      </script>

      {{-- span --}}
    <script>
        @if (Session::has('notice'))
        const Toast = Swal.mixin({
           toast: true,
           position: 'top-end',
           showConfirmButton: false,
           timer: 3000,
           timerProgressBar: true,
           didOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
           })
           Toast.fire({
           icon: 'info',
           title: '{{ Session::get('notice') }}'
           })
        @endif
      </script>

    {{-- span --}}
    <script>
        @if (Session::has('status'))
        const Toast = Swal.mixin({
           toast: true,
           position: 'top-end',
           showConfirmButton: false,
           timer: 3000,
           timerProgressBar: true,
           didOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
           })
           Toast.fire({
           icon: 'info',
           title: '{{ Session::get('status') }}'
           })
        @endif
      </script>
</body>
</html>
