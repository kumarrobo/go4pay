    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Payment Mode' , 'aMOUNT'],
          ['JAN'          ,       150000],
          ['FEB'          ,       200000],
          ['MAR'          ,       100000],
          ['APR'          ,       1100000],
          ['MAY'          ,       1500000],
          ['JUN'          ,       700000],
          ['JUL'          ,       100000],
          ['AUG'          ,       600000],
          ['SEP'          ,       70000],
          ['OCT'          ,       90000],
          ['NOV'          ,       45000],
          ['DEC'          ,       900000]
        ]);

        var options = {
          title: 'Monthly Transaction By Payment Mode',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechartdonutmonthly'));

        chart.draw(data, options);
      }
    </script>
  <div id="piechartdonutmonthly" style="width: 100%; height: 500px;"></div>
