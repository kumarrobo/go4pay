    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month',   'Credit Card',     'Debit Card',     'Net Banking',  'Paytm Wallet',    'UPI', 'Paytm'],
          ['JAN',  99165,      1938,         11522,             998,           450,      614.6],
          ['FEB',  98135,      90120,        59119,             1268,          288,      682],
          ['MAR',  56157,      100167,        51187,             807,           397,      623],
          ['APR',  15439,      139110,        61115,             968,           215,      609.4],
          ['MAY',  15439,      133110,        61115,             968,           215,      609.4],
          ['JUN',  54139,      32110,        61115,             968,           215,      609.4],
          ['JUL',  35139,      53110,        61511,             968,           215,      609.4],
          ['AUG',  43136,      161291,         99629,             1026,          366,      569.6],
          ['SEP',  98136,      122691,         99629,             1026,          366,      569.6],
          ['OCT',  56136,      209291,         67729,             1026,          366,      569.6],
          ['NOV',  65136,      192221,         55629,             1026,          366,      569.6],
          ['DEC',  65136,      91000,         55629,             1026,          366,      569.6]
        ]);

        var options = {
          title : 'Monthly Transaction By Payment Mode',
          vAxis: {title: 'INR'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <div id="chart_div" style="width:90%; height: 400PX;"></div>
<?php /**PATH /var/www/html/siddiventures/resources/views/user/Distributor/ReportBarChart.blade.php ENDPATH**/ ?>