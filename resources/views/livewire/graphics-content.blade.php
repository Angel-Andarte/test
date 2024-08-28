<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gráficos Estadísticos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 py-6">
                    <p>Productos mas Vendidos</p>
                    <canvas wire:ignore id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 py-6">
                    <p>Productos menos Vendidos</p>
                    <canvas wire:ignore id="myChartLead"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 py-6">
                    <p>Ingresos por día</p>
                    <canvas wire:ignore id="myChartDaylyRevenue"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 py-6">
                    <p>Ingresos por semana</p>
                    <canvas wire:ignore id="myChartweeklyRevenue"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 py-6">
                    <p>Ingresos por mes</p>
                    <canvas wire:ignore id="myChartMonthlyRevenue"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {!! json_encode($chartDataProductsSold) !!},
            });
        </script>

        <script>
            var ctx = document.getElementById('myChartLead');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {!! json_encode($chartDataProductsLeastSold) !!},
            });
        </script>

        <script>
            var ctx = document.getElementById('myChartDaylyRevenue');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {!! json_encode($dailyChartData) !!},
            });
        </script>

        <script>
            var ctx = document.getElementById('myChartweeklyRevenue');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {!! json_encode($weeklyChartData) !!},
            });
        </script>

        <script>
            var ctx = document.getElementById('myChartMonthlyRevenue');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {!! json_encode($monthlyChartData) !!},
            });
        </script>
</div>
