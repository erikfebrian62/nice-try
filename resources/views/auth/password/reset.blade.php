<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Reset Password</title>
</head>
<body>
    <section class="vh-100" style="background-color: #656f1f;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <form action="{{ route('reset.proces') }}" method="POST">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- email --}}   
                    <div class="form-floating mb-3">
                      <input type="email" name="email" id="email" value="{{ old('email', $request->email) }}" class="form-control @error('email')
                      is-invalid
                  @enderror" placeholder="Masukan Email" required>
                      <label for="email">Masukan Email</label>
                      @error('email')
                            {{ $message }}
                      @enderror
                    </div>

                    {{-- password --}}
                    <div class="form-floating mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password" required autofocus>
                        <label for="password">Password Baru</label>
                    </div>

                    {{-- konfirmasi password --}}
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password')
                        is-invalid
                    @enderror" placeholder="Masukan password" required>
                        <label for="password_confirmation">Password Konfirmasi</label>
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning w-30 float-end">Reset Password</button>
                    </div>

                  </form>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
{{-- boostrap.js --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>