@extends('home')
@section('content')
    <div class="row">
        <div class="col-6">
            <p>Jumlah Permintaan vehicle</p>
            <div class="box box-warning">
                <div class="box-body">
                    <div style="margin-bottom: 35px;">
                        <canvas id="chartvehicle"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <p>Status laporan permintaan vehicle</p>
            <div style="margin-bottom: 35px;">
                <canvas id="status"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('chart')
    <script>
        var data = @json($dtvehicle);

        var labels = [];
        var values = [];

        data.forEach(function(item) {
            labels.push(item.vehicle);
            values.push(item.total);
        });

        var dtstatus = @json($status)

        var lstatus = []
        var vstatus = []

        dtstatus.forEach(function(each) {
            var label = each.approved
            var value = each.tstatus

            if (label === 0) {
                label = "pending"
            } else if (label === 1) {
                label = "approved"
            }

            lstatus.push(label)
            vstatus.push(value)
        })

        var chartvehicle = new Chart(document.getElementById('chartvehicle'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total ',
                    data: values,
                    backgroundColor: 'rgba(67,130,137,0.3)',
                    borderColor: 'rgba(67,130,137,0.3)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var status = new Chart(document.getElementById('status'), {
            type: 'bar',
            data: {
                labels: lstatus,
                datasets: [{
                    label: 'Total ',
                    data: vstatus,
                    backgroundColor: 'rgba(67,130,137,0.3)',
                    borderColor: 'rgba(67,130,137,0.3)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
