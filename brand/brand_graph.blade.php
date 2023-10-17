<x-app-layout>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Brand Graph</title>
  </head>
  <body><br>
      <h3 class="text-xl font-bold text-gray-900">กราฟสรุปค่ารวมของสินค้าแต่ละยี่ห้อ</h3><br>
      <canvas id="myChart" height="100px"></canvas>    
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
  <script type="text/javascript">
    
      var labels =  {{ Js::from($labels) }};
      var datas =  {{ Js::from($data) }};
    
      const data = {
          labels: labels,
          datasets: [{
              label: 'ค่ารวมของสินค้าแต่ละยี่ห้อ',
              backgroundColor: [
                'rgba(249, 231, 159)',
                'rgba(174, 214, 241)',
                'rgba(208, 236, 231 )',
                'rgba(75, 192, 192, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(201, 203, 207, 0.5)'
      ],
      borderColor: [
        'rgba(249, 231, 159)',
        'rgba(174, 214, 241)',
        'rgba(208, 236, 231 )',
        'rgba(75, 192, 192, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(201, 203, 207, 0.5)'
      ],
              data: datas,
          }]
      };
    
      const config = {
          type: 'bar',
          data: data,
          options: {}
      };
    
      const myChart = new Chart(
          document.getElementById('myChart'),
          config
      );
    
  </script>
  </html>
  </x-app-layout>
