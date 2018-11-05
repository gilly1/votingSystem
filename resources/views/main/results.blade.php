@extends('layouts.app')

@section('content')

<div class="container">
    <div id="fb-root"></div>

        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1&appId=478025866047431&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        @include('admin/inc/message')

            <div class="row">
                @foreach($categories as $cat)
                    <div class="col-lg-6 col-md-12">
                        <div class="card" style="margin-top:10px; max-width: calc(100% - 1px);width: 600px;">
                            <h3 class="card-header" style="background-color:rgba(0,0,255,.4)">{{$cat->cat_name}}</h3>
                            <canvas id={{$cat->cat_name}}></canvas>
                        </div>
                    </div>
                @endforeach
            </div>

        <div class="fb-comments" data-href="https://localhost:8000/results" data-width="500px" data-numposts="10"></div>
</div>

@include('footer')

@endsection



<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript">


$(document).ready(function(){

    var chart=new Array();
    chart=window.bargraph;

    //console.log(chart[0]);
    
    for(var i=0;i<chart.length;i++){
        for(var j=0;j<chart[i].length;j++){

            var maxi= Math.round((Math.max.apply(Math,chart[2][j])+5)/10)*10 ;
            new Chart(document.getElementById(chart[0][j]), {
                type: 'horizontalBar',
                data: {
                labels: chart[1][j],
                responsive: true,
                datasets: [ 
                    {
                    label: "votes",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: chart[2][j]
                    }
                ]
                },
                options: {
                    legend: {
                      position: 'top',
                      labels: {
                        fontFamily: 'Poppins'
                      }
          
                    },
                    scales: {
                      xAxes: [{
                        ticks: {
                          beginAtZero: true,
                          max:maxi,
                          fontFamily: "Poppins"
          
                        }
                      }],
                      yAxes: [{
                        ticks: {
                          fontFamily: "Poppins"
                        }
                      }]
                    }
                  }
            });


        }
    }
    

});
  


</script>