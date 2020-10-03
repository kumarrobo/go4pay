    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Payment Mode' , 'Hours per Day'],
          ['Credit Card'  ,       15],
          ['Debit Card'   ,       2],
          ['Net Bankng'   ,       0],
          ['Paytm'        ,       2],
          ['Paytm Wallet' ,       7]
        ]);

        var options = {
          title: 'Transaction By Payment Mode',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechartdonut'));

        chart.draw(data, options);
      }
    </script>
  <div id="piechartdonut" style="width: 100%; height: 500px;"></div>
