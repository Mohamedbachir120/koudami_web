
@extends('layouts.ar_client')


@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
       

<div class="card column align-items-center  w-100">
    <div class="card-header bg-dark text-light text-center">
        <h4> أرقام البروفايل <i class="fa fa-pie-chart"></i></h4>
       </div>



      
            <script>
                $(document).ready(function(){
                            var ctx = document.getElementById('myChart').getContext('2d');
                            
                        var myChart = new Chart(ctx, {
                                type: 'bar',
                            data: {
                                labels: [@foreach ($tab as $item => $value)  '{{ $item }}', @endforeach],
                                datasets: [{
                                    label: 'ارقام البروفايل',
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
    <button onclick="myfunction()" class="btn btn-primary">تفاصيل اكثر </button>

    <div class="change" style="display: none;">


        :جدول الاحصاء 
                    
        <table class="table">
           
            <tr>
                
                <th>
                    العدد
                </th>
                <th>
                    الصنف
                </th>
                
            </tr>
            @foreach ($tab as $key=>$value)
        
        <tr>
            <td>{{ $value }} </td> <td>  {{ $key }} </td>  
        </tr>
            @endforeach
        
        
        </table>
        
        
          </div>
             

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
      .change{
          text-align: right;
      }  
</style>
<script>

function myfunction(){
        $(".change").toggle(500);
    }
</script>