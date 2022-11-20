@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- chart gaji untuk di lihat karyawan --}}
        <div class="card p-2">
            <div class="card-body">
                {{-- gaji --}}
                <h3>Dashboard Gaji Perbulan Karyawan</h3>

                <div class="row">
                    <div class="col-md-8">
                        <canvas id="myChart"></canvas>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <input type="date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-sm btn-primary">Full Data</button>
                            <button class="btn btn-sm btn-primary">Hide Data</button>
                            <button class="btn btn-sm btn-primary">Data Tinggi</button>
                            <button class="btn btn-sm btn-primary">Data Rendah</button>
                        </div>

                        <p style="text-align: justify">
                            ini adalah Chart Batang gaji karyawan yang menampilkan gaji karyawan dalam bulan, untuk
                            defaultnya akan menampilkan chart tahun ini saja .
                        </p>
                    </div>
                </div>

            </div>
        </div>


        {{-- chart total gaji karywan dalam bentuk tahun untuk karyawan --}}


        {{-- chart gaji untuk dilihat keuangan/admin --}}
    </div>
    @push('script')
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
                    datasets: [{
                        label: 'Data Gaji Karyawan Perbulan',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
