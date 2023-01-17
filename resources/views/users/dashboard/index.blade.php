@extends('users.layouts.main')

@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
      <div class="card radius-10 border-start border-0 border-3 border-info">
         <div class="card-body">
             <div class="d-flex align-items-center">
                 <div>
                     <p class="mb-0 text-secondary">Modal Hari Ini</p>
                     <h4 class="my-1 text-info">{{ $data->sum('modal') }}</h4>
                     <p class="mb-0 font-13">+2.5% from last day</p>
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
                    <p class="mb-0 text-secondary">Keuntungan Hari Ini</p>
                    <h4 class="my-1 text-success">Rp 84,245</h4>
                    <p class="mb-0 font-13">+5.4% from last day</p>
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
                    <p class="mb-0 text-secondary">Keuntungan Bulanan</p>
                    <h4 class="my-1 text-danger">Rp 34.6%</h4>
                    <p class="mb-0 font-13">-4.5% from last Month</p>
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
                    <p class="mb-0 text-secondary">Keuntungan Tahunan</p>
                    <h4 class="my-1 text-warning">Rp 8.4K</h4>
                    <p class="mb-0 font-13">+8.4% from last Year</p>
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