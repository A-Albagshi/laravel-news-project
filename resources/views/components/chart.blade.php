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
        console.log(arr[0].name)
        function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            colors=[];
            for (let i = 0; i < arr.length; i++) {
                this.colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
            }
            return colors;
        }
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
                    backgroundColor: getRandomColor(),
                    hoverOffset: 4
                }]
            }
        });
    </script>
@endpush
