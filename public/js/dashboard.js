/**
 * Dashboard JS - ModernGrosir
 */
$(function () {
    // Counter Carousel
    if ($(".counter-carousel").length) {
        $(".counter-carousel").owlCarousel({
            loop: true,
            margin: 30,
            mouseDrag: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 2000,
            nav: false,
            dots: false,
            responsive: {
                0: { items: 2 },
                576: { items: 2 },
                768: { items: 3 },
                1200: { items: 4 },
            },
        });
    }

    // Sales Chart
    if ($("#sales-chart").length && window.dashboardData) {
        const categories = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
        var options = {
            series: [
                {
                    name: "Revenue",
                    data: window.dashboardData.revenue,
                }
            ],
            chart: {
                fontFamily: "inherit",
                type: "area",
                height: 300,
                toolbar: { show: false },
                background: "transparent"
            },
            plotOptions: {},
            legend: { show: false },
            dataLabels: { enabled: false },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.4,
                    opacityTo: 0.05,
                    stops: [0, 100]
                }
            },
            stroke: {
                curve: "smooth",
                width: 2,
            },
            xaxis: {
                categories: categories,
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: {
                    style: { colors: "#adb5bd" }
                }
            },
            yaxis: {
                labels: {
                    style: { colors: "#adb5bd" },
                    formatter: function(val) {
                        return "Rp " + (val / 1000).toFixed(0) + "k";
                    }
                }
            },
            tooltip: {
                theme: (document.documentElement.getAttribute('data-bs-theme') === 'dark' ? "dark" : "light"),
            },
            colors: ["var(--bs-primary)", "var(--bs-success)"],
            grid: {
                show: true,
                borderColor: "rgba(0,0,0,0.1)",
                strokeDashArray: 1,
                position: "back",
            },
        };

        // Add Profit line if available
        if (window.dashboardData.profit) {
            options.series.push({
                name: "Gross Profit",
                data: window.dashboardData.profit,
            });
        }

        var chart = new ApexCharts(document.querySelector("#sales-chart"), options);
        chart.render();
    }
});
