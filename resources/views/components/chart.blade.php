@props(['data'])

@once
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush
@endonce

<div class="grid p-6 justify-center justify-items-center bg-white border-b border-gray-200">
    <h1 class="mt-0 text-blue-900">{{Str::title($slot)}}</h1>
    <canvas id="{{ $slot }}" style="width:100%;max-width:400px"></canvas>
</div>

@push('end_scripts')
    <script>
        var arr = {!! $data !!}
        var ctx = document.getElementById('{{ $slot }}').getContext('2d');
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
                        'rgb(24, 90, 219)',
                        'rgb(10, 25, 49)',
                        'rgb(255, 201, 71)',
                        'rgb(0, 173, 181)',
                        'rgb(232, 69, 69)',
                        'rgb(236, 239, 164)',
                    ]
                ,
                    hoverOffset: 4
                }]
            }
        });
    </script>
@endpush
