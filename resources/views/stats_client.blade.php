
@extends('layouts.client')


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

@section('content')
<div class="card column align-items-center  w-100">
                <div class="card-header bg-dark text-light text-center w-100"><h3><i class="fa fa-pie-chart"></i> Statistiques</h3></div>
            
            <script>
                $(document).ready(function(){
                            var ctx = document.getElementById('myChart').getContext('2d');
                            
                        var myChart = new Chart(ctx, {
                                type: 'bar',
                            data: {
                                labels: [@foreach ($tab as $item => $value)  '{{ $item }}', @endforeach],
                                datasets: [{
                                    label: 'Valeur de productions',
                                    data: [@foreach ($tab as $item => $value)  {{ $value }}, @endforeach],
                                    backgroundColor: [
                                        'rgba(255, 99, 132 )',
                                        'rgba(54, 162, 235 )',
                                        'rgba(255, 206, 86 )',
                                        'rgba(75, 192, 192 )',
                                        'rgba(153, 102, 255 )',
                                        'rgba(255, 100, 64 )',
                                        'rgba(255, 159, 12 )',
                                        'rgba(255, 159, 64 )',
                                        'rgba(30, 159, 64 )',
                                        'rgba(60, 159, 64 )',
                                        'rgba(10, 70, 64 )',
                                        'rgba(64, 10, 70 )',
                                        'rgba(10, 140, 0 )',
                                        'rgba(10, 59, 140 )',
                                        'rgba(10, 21, 13 )',
                                        'rgba(100, 100, 103 )',
                                        'rgba(50, 25, 23 )',
                                        'rgba(36, 58, 0 )',
                                        'rgba(10, 200, 0 )',
                                        'rgba(10, 0, 200 )',
                                        'rgba(10, 150, 0 )',
                                        'rgba(10, 0,26 )',
                                        'rgba(10, 17, 205 )',
                                        'rgba(178, 88, 0 )',
                                        'rgba(132, 14, 0 )',
                                        'rgba(169, 0, 155 )',
                                        'rgba(100, 100, 25 )',
                                        'rgba(91, 25, 0 )',
                                        'rgba(10, 70, 15 )',
                                        'rgba(10, 39, 11 )',
                                        'rgba(10, 27, 38 )',
                                        'rgba(38, 38, 0 )',
                                        'rgba(100, 12, 24 )',
                                        'rgba(75, 0, 64 )',
                                        'rgba(55, 64, 0 )',
                                        'rgba(230, 0, 69 )',
                                        'rgba(208, 0,110 )',
                                        'rgba(10, 0,106 )',
                             
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                        });
                
                </script>
             

           
    <canvas id="myChart" style="max-width: 500px; max-height:400px;" ></canvas>
    <button onclick="myfunction()" class="btn btn-primary my-3"> <i class="fa fa-plus"></i> </button>

    <div class="change" style="display: none">


        Tableau des Statistiques: 
                    
        <table class="table table-hover my-2">
            <thead class="thead-dark">
              <tr>
                  <th>Option</th>
                  <th>Stats</th>
              </tr>
            <tr>
              <td> Nombre de Clic sur like  </td>
              <td> {{ Auth::user()->liked->count() }} Clic</td>
            </tr>
            <tr>
              <td>Aimés par   </td>
              <td> {{ Auth::user()->liked_by->count() }} Personnes</td>
            </tr>
            <tr>
              <td>Nombre de commentaire postés   </td>
              <td> {{ Auth::user()->posts->count()}} Commentaires  </td>
              
            </tr>
            <tr>
              <td>Nombre de commentaire reçus   </td>
              <td> {{ Auth::user()->comments->count()}} Commentaires  </td>
              
            </tr>
            <tr>
              <td>Nombre de visites </td>
              <td> {{ Auth::user()->nbr_visite }} visites</td>
            </tr>
            <tr>
              <td>Nombre de quittances envoyés </td>
              <td>{{ Auth::user()->messages->count() }} quittances</td>
            </tr>
            <tr>
            <td>Nombre de messages envoyés</td>
            <td>{{ Auth::user()->sended->count() }}</td>
            </tr>
            <tr>
              <td>Nombre de messages reçus</td>
              <td>{{ Auth::user()->received->count() }}</td>
             
            </tr>
            </thead>

          </table>

        
          </div>
             
</div>   
    
     
 
    
@endsection


<style>
    th,td{
        border: 1px black solid; 
    }
    #can{
        display: flex;
        flex-direction: row;
        align-items: center;
        align-content: space-around;
        }

        li{
        list-style: none;
    }
    .elem{
        padding: 5px;
        background: rgb(243, 243, 243);
        border-radius: 10px;
        margin: 5px;
     
    }
  
 
  .dropdown-menu{
      background: linear-gradient(rgb(172, 225, 255),white) !important;
      min-width: 100% !important;
  }
  #side_admin{
      border-radius:6px;
      padding: 0px;
      box-shadow:inset 0px 0px 2px 2px rgb(172, 225, 255) ;
  }
  @media screen and (max-width: 650px) {
  }
</style>
<script>

function myfunction(){
        $(".change").toggle(500);
    }
</script>