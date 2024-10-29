@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid py-4">
            @include('layouts.flash')
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="pir" class="w-100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="temperature" class="w-100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="humidity" class="w-100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="gas" class="w-100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer2')
        </div>
    </main>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        getData();
        setInterval(function() {
            getData();
        }, 10000);

    });

    let initialized = false;
    let chartObjects = [];

    function getData() {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.live.data1') }}",
            beforeSend: function() {},
            success: function(response) {
                let index = 0;
                response.forEach(element => {
                    if (!initialized) {
                        let chart = new Chart(document.getElementById(element.id).getContext(
                            "2d"), {
                            type: 'line',
                            data: {
                                labels: element.labels,
                                datasets: [{
                                    label: element.title,
                                    data: element.data,
                                    borderColor: ['black'],
                                    borderWidth: 2,
                                    pointRadius: 5,
                                }],
                            },
                            options: {
                                responsive: false,
                                scales: {
                                    x: {
                                        display: false
                                    }
                                }
                            },
                        });
                        chartObjects.push(chart);
                    } else {
                        chartObjects[index].data = {
                            labels: element.labels,
                            datasets: [{
                                label: element.title,
                                data: element.data,
                                borderColor: ['black'],
                                borderWidth: 2,
                                pointRadius: 5,
                            }],
                        };
                        chartObjects[index].update('none');
                    }

                    index++;
                });
                initialized = true;
            }
        });
    }
</script>
@endsection
