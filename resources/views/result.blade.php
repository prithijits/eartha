{{-- @extends('master') --}}
<!DOCTYPE HTML>
<html>
<head>
  <link href="{{('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{('public/assets/css/style.css')}}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
 <body>

  <section id="hero">
    <div class="hero-container">
      <br><br>
      <h5 id="fastest">Fastest Asteroid Id Is - <?php echo $fastestAseroidId; ?></h5>
      <h5 id="fastest">Fastest Asteroid Speed Is - <?php echo $fastestAseroid; ?> KM/H</h5>
      <h5 id="closest">Closest Asteroid Id is - <?php echo $closestAseroidId;  ?></h5>
      <h5 id="closest">Closest Asteroid Distance is - <?php echo $closestAseroid; ?> KM</h5>
      <br>
      <canvas class="py-4 px-4" id="flowchart" style="width:100%;max-width:750px; background-color: white; opacity: 70%;"></canvas>
      <hr>    
    </div>
  </section>

 <script src="{{asset('js/app.js')}} "></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

    <script>
        var astroid = <?php  echo json_encode($neo_count_by_date_arry_values); ?>;
        var astroidsappeardate = <?php  echo json_encode($neo_count_by_date_arry_keys); ?>;
      
        var value = document.getElementById('flowchart').getContext('2d');
        var flowchart = new Chart(value, {
            type: 'line',
            data: {
                labels:astroidsappeardate,
                datasets: [
                    {
                        label: 'Number of Asteroids Is',
                        lineTension:0,
                        data: astroid,
                        borderColor: [
                            'rgba(0, 35, 255, 0.5)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 3
                    }
                ]
            },
            options: {
              legend: {display: false},
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    

  <script src="{{('public/assets/js/main.js')}}"></script>  
</body>


</html>