document.addEventListener("DOMContentLoaded", function () {
    // Monthly Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: window.reportData.months,
            datasets: [{
                label: 'Monthly Sales (₦)',
                data: window.reportData.sales,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        }
    });

    // Top Items Chart
    const topItemsCtx = document.getElementById('topItemsChart').getContext('2d');
    new Chart(topItemsCtx, {
        type: 'bar',
        data: {
            labels: window.reportData.topItems,
            datasets: [{
                label: 'Orders',
                data: window.reportData.itemSales,
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        }
    });

    // PDF Download Button
    document.getElementById("downloadReport").addEventListener("click", () => {
        const element = document.querySelector(".container");
        const options = {
            margin: 0.3,
            filename: `Admin_Report_${window.reportData.date}.pdf`,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        };
        html2pdf().set(options).from(element).save();
    });
});
