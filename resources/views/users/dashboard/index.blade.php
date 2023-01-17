@extends('users.layouts.main')

@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
      <div class="card radius-10 border-start border-0 border-3 border-info">
         <div class="card-body">
             <div class="d-flex align-items-center">
                 <div>
                     <p class="mb-0 text-secondary">Capital</p>
                     <h4 class="my-1 text-info">Rp {{ $data->sum('modal') }}</h4>
                        @php
                            $day = date('D');
                        @endphp
                     <p class="mb-0 font-13">From {{ $day }}</p>
                 </div>
                 <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bxs-wallet'></i>
                 </div>
             </div>
         </div>
      </div>
    </div>
    <div class="col">
     <div class="card radius-10 border-start border-0 border-3 border-success">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0 text-secondary">Net Profit</p>
                    <h4 class="my-1 text-success">Rp {{ $data->sum('laba') }}</h4>
                    @php
                        $day = date('D');
                    @endphp
                    <p class="mb-0 font-13">From {{ $day }}</p>
                </div>
                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-dollar-circle'></i>
                </div>
            </div>
        </div>
     </div>
   </div>
   <div class="col">
     <div class="card radius-10 border-start border-0 border-3 border-danger">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0 text-secondary">Net Profit</p>
                    <h4 class="my-1 text-danger">Rp {{ $month->sum('laba') }}</h4>
                    @php
                        $month = date('M');
                    @endphp
                    <p class="mb-0 font-13">From Month {{ $month }}</p>
                </div>
                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
                </div>
            </div>
        </div>
     </div>
   </div>
   <div class="col">
     <div class="card radius-10 border-start border-0 border-3 border-warning">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0 text-secondary">Net Profit</p>
                    <h4 class="my-1 text-warning">Rp {{ $year->sum('laba') }}</h4>
                    @php
                        $year = date('Y');
                    @endphp
                    <p class="mb-0 font-13">From Year {{ $year }}</p>
                </div>
                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bxs-bar-chart-alt-2'></i>
                </div>
            </div>
        </div>
     </div>
   </div> 
 </div><!--end row-->

 <div class="row justify-conten-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart" height="100px"></canvas>
            </div>
        </div>
    </div>
 </div>
@endsection
@push('js')
{{-- grafik chart --}}
    <script>
        $(document).ready(function () {
            var labels =  {{ Js::from($bulan) }};
            var product =  {{ Js::from($laba) }};
        
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Grafik Laba Bersih',
                    backgroundColor: 'rgb(0, 204, 0)',
                    borderColor: 'rgb(0, 204, 0)',
                    data: product,
                }]
            };
        
            const config = {
                type: 'line',
                data: data,
                options: {}
            };
        
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        });
    </script>

    <script>
        @if (Session::has('success'))
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
           title: '{{ Session::get('success') }}'
           })
        @endif
    </script>


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
@endpush