
@extends('layouts.moderator_admin')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>

    <div class="card">
        <div class="card-header bg-dark text-light text-center"><h4> Statistiques <i class="fa fa-pie-chart"></i></h4>
           </div>
            <div class="dropdown">
                <button  type="button" class="btn btn-primary mt-2 ml-1" id="dropdownMenuButton"  onclick="myfun()">
                    <i class="fas fa-edit"></i>   Options
                </button>
              
            <div class="menu ml-1" aria-labelledby="dropdownMenuButton" style="display: none;">
            <a class="btn-primary" href="/stats/global">par catégorie</a>
            <a class="btn-primary" href="/stats/paye">par état de payement</a>
            <a class="btn-primary" href="/stats/operateur">par Opérateur réseau</a>
            <a class="btn-primary" href="/stats/localisation">par localisation</a>
            <a class="btn-primary" href="/stats/client_nbr_viste">Les clients les plus visités</a>
            
            </div>
            </div>

            <div class="change" style="display: none;">


                Tableau des Statistiques: 
                            
                <div class="table-responsive">
                <table class="table">
                    @if(count($table) < 16)
                    <tr>
                        <th> Nom </th>
                        @foreach ($table as $key)
                
                
                        <th>{{ $key->categorie }} </th>
                
                        @endforeach
                    </tr>
                
                    <tr>
                        <td> Nombre </td>
                        @foreach ($table as $key)
                
                
                        <td>{{ $key->total }} </td>
                
                        @endforeach
                    </tr>
                    @elseif(count($table) > 16 && count($table) < 48)
                    <tr>
                        <th>
                            Nom
                        </th>
                        <th>
                            Nombre de clients
                        </th>
                        <th>
                            Nombre de visites
                        </th>
                 
                        
                    </tr>
                    @foreach ($table as $key)
                
                <tr>
                <td>{{ $loop->index +1 }}  {{ $key->categorie }}</td>  <td>{{ $key->total }} 
                </tr>
                    @endforeach
                    @else
                    <tr>
                        <th>
                            Nom
                        </th>
                        <th>
                            Nombre
                        </th>
                   
                        
                    </tr>
                    @foreach ($table as $key)
                
                <tr>
                <td>{{ $loop->index +1 }}  {{ $key->categorie }}</td>  <td>{{ $key->total }} </td>
                </tr>
                    @endforeach
                
                    @endif
                </table>
                
            </div>
                  </div>
                      
                
    
            
  
<div id="can">
    <script>
        $(document).ready(function(){
                    var ctx = document.getElementById('myChart').getContext('2d');
                    
                var myChart = new Chart(ctx, {
                        type: 'pie',
                    data: {
                        labels: [@foreach ($table as $item)  '{{ $item->categorie }}', @endforeach],
                        datasets: [{
                            label: 'Valeur de productions',
                            data: [@foreach ($table as $item)  "{{ $item->total }}", @endforeach],
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
     

     <div class="table-responsive">
    
<canvas id="myChart"  ></canvas>
</div>
</div>

<div style="width:80%;" > 
    <h4>Les revenus financiers annuels sont estimés à {{ $val }}.00 DA</h4>
  <ul>
  <li> Abonnements des utilisateurs : {{ $users }}.00 DA</li> 
   <li>Advertising :{{ $ads }}.00 DA </li> 
   <button onclick="myfunction()" class="btn btn-primary"> afficher + </button>

 </ul>
     </div>

</div> 

               
  
@endsection

<script>

    function myfunction(){
        $(".change").toggle();
    }
    function myfun(){

        $('.menu').toggle(500);
    }


</script>
<style>


  #myChart{
    width: 100%;
 }  

    th,td{
        border: 1px black solid; 
    }
    .menu{
        display: flex;
        flex-direction: column;
        max-width: 200px;
        border-radius:3px;  
        background: rgb(81, 148, 255);
        transition: linear 0.5s; 
       
    }
    .menu a
    {
        text-decoration: none;
        max-width: 200px;
        padding: 8px;
        text-align: center;
        color: white;
    }

    #side_admin{
    border-radius:6px;
    padding: 0px;
    box-shadow:inset 0px 0px 2px 2px rgb(172, 225, 255) ;
}
html, body
 { height: 100% !important; }

</style>