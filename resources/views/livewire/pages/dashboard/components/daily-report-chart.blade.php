<div class="">
    <div class="relative">
        <div wire:ignore class="bg-white shadow-md rounded-lg hover:-translate-y-1 duration-700 ease-in-out">
            <div class="max-h-[40vh]">
                <div class="dailyReport h-[90%]"></div>
            </div>
        </div>
        <div class="{{ $fetching_chart ? 'absolute top-0 left-0 right-0 bottom-0 h-full text-center items-center bg-gray-700/20 rounded-lg' : 'hidden' }}">
            <div class="x-8 py-4 rounded-lg mt-28">
                <i class="fa fa-spinner fa-spin text-7xl"></i>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                // drawChart()
            });


            function drawChart(series) {
                // console.log(series);
                $('.dailyReport').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: 'Daily Report Chart',
                        align: 'left'
                    },
                    xAxis: {
                        categories: @json($categories),
                        title: {
                            text: null
                        },
                        gridLineWidth: 1,
                        lineWidth: 0
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Amount (Tsh.)',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        },
                        gridLineWidth: 0
                    },
                    tooltip: {
                        valueSuffix: ' Tsh.'
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: '50%',
                            dataLabels: {
                                enabled: true
                            },
                            groupPadding: 0.1
                        },
                        series: {
                            colorByPoint: true
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: series
                });
            }

            document.addEventListener('livewire:init', () => {

                Livewire.on('redraw_chart', (data) => {
                    drawChart(data)
                })


            })
        </script>
    </div>
</div>
