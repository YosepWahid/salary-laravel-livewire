<div>

    <div class="card-body">
        <h3>Chart Salaries</h3>
        <div class="row justify-content-between">
            <div class="col-lg-5 col-md-7 col-sm-6">
                <canvas id="chartpiesuper"></canvas>
            </div>



            <div class="col-lg-5 col-md-5 col-sm-6">
                @can('Year Super Chartpie Salary')
                    <div class="mb-3">
                        <select class="form-select" wire:model="year" wire:change='changeYearDataSalary'>
                            @foreach ($years as $item)
                                <option value="{{ $item->year }}">{{ $item->year }}</option>
                            @endforeach
                        </select>
                    </div>
                @endcan

                @can('Data Super Chartpie Salary')
                    <div class="mb-3">
                        @if ($status == 0)
                            <button class="btn btn-sm btn-primary mb-1" wire:click="changeData">Full Data</button>
                        @elseif ($status == 2 || $status == 3)
                            <button class="btn btn-sm btn-primary mb-1" wire:click="changeData" disabled>Full
                                Data</button>
                        @elseif($status == 1)
                            <button class="btn btn-sm btn-danger mb-1" wire:click="changeData">Hide Data</button>
                        @endif

                        @if ($status == 0)
                            <button class="btn btn-sm btn-primary mb-1" wire:click="changeDataToHight">High
                                Data</button>
                        @elseif ($status == 1 || $status == 3)
                            <button class="btn btn-sm btn-primary mb-1" wire:click="changeDataToHight" disabled>High
                                Data</button>
                        @elseif($status == 2)
                            <button class="btn btn-sm btn-danger mb-1" wire:click="changeDataToHight">High
                                Data</button>
                        @endif

                        @if ($status == 0)
                            <button class="btn btn-sm btn-primary mb-1" wire:click="changeDataToLow">Low Data</button>
                        @elseif ($status == 1 || $status == 2)
                            <button class="btn btn-sm btn-primary mb-1" wire:click="changeDataToLow" disabled>Low
                                Data</button>
                        @elseif($status == 3)
                            <button class="btn btn-sm btn-danger mb-1" wire:click="changeDataToLow">Low Data</button>
                        @endif
                    </div>
                @endcan



                <p style="text-align: justify">
                    This is chart pie salaries For Employee , Viewing Salary in Month.
                </p>
                <p style="text-align: justify">
                    Note : The default view chart on this year.
                </p>
            </div>


        </div>

    </div>
</div>

@push('script')
    <script>
        // variable
        let ctx2 = document.getElementById('chartpiesuper');

        let dataSuper = {!! $data !!}

        // chart
        let myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: dataSuper.month,
                datasets: [{
                    label: 'Data Gaji Karyawan Perbulan',
                    data: dataSuper.total,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(100, 255, 86)',
                        'rgb(187, 54, 235)',
                        'rgb(255, 156, 99)',
                    ],
                    hoverOffset: 4,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        align: 'start',
                        pointStyle: 'circle',
                    },
                },
            }
        });

        Livewire.on('changeSalariesSuper', event => {
            let data = JSON.parse(event);
            myChart2.data.labels = (data.month);
            myChart2.data.datasets[0].data = (data.total);
            myChart2.update();
        })
    </script>
@endpush
