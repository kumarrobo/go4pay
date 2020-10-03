
<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales'],
          ['JAN',  51000],
          ['FEB',  14170],
          ['MAR',  64660],
          ['APR',  33030],
          ['MAY',  23030],
          ['JUN',  15030],
          ['JUL',  42030],
          ['AUG',  16030],
        ]);

        var options = {
          title: 'Transaction Per Month',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/user/Distributor/ReportChart.blade.php ENDPATH**/ ?>