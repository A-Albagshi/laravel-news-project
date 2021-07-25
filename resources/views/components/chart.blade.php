@props(['data'])

@once
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush
@endonce

<div class="grid p-6 justify-center justify-items-center bg-white border-b border-gray-200">
    <canvas id="{{ $slot }}" style="width:100%;max-width:400px"></canvas>
</div>

@push('end_scripts')
    <script>
        var arr = {!! $data !!}
        var ctx = document.getElementById('{{ $slot }}').getContext('2d');
        // const data = ;
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: arr.map((item) => {
                    return item.name
                }),
                datasets: [{
                    label: '{{ $slot }}',
                    data: arr.map((item) => {
                        return item.count
                    }),
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            }
        });
    </script>
@endpush
