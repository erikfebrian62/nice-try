<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Forgot Password</title>
</head>
<body>
    <section class="vh-100" style="background-color: #6d756b;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <h3 class="mb-5">Reset Password</h3>
                  <p class="fw-bold">lupa kata sandi? Tenang. Beri tahu kami alamat email Anda dan kami akan mengirimi Anda tautan reset password melalui email.</p>

                  <form action="{{ route('forgot.proces') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                      <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Masukan Email" aria-label="Recipient's username" aria-describedby="basic-addon2" required autofocus >
                      <button type="submit" class="input-group-text" id="basic-addon2">Kirim</button>
                    </div>
                  </form>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
 {{-- Sweet-alert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
{{-- boostrap.js --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    {{-- span --}}
    <script>
        @if (Session::has('notif'))
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
           icon: 'success',
           title: '{{ Session::get('notif') }}'
           })
        @endif
      </script>
</body>
</html>