@extends('admin.layouts.app')

@section('content')
<div class="container">
    
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">overview</h2>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-sm-6 col-lg-4">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fa fa-address-book-o" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <h2>10368</h2>
                        <span>members online</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart1"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fa fa-anchor"></i>
                    </div>
                    <div class="text">
                        <h2>388,688</h2>
                        <span>items solid</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="text">
                        <h2>1,086</h2>
                        <span>this week</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart3"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="float-left" style="width:49%;">
    <div class="row">
        <div class="col-lg-12">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Website Visits</h3>
                    <canvas id="sales-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Candidates</h3>
                    {!! $chartjs->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="float-right" style="width:49%;">

    @for($i=0;$i<count($categories);$i++)
        <div class="row">
            <div class="col-lg-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <h3 class="title-2 m-b-40">{{$categories[$i]->cat_name}}</h3>
                        <canvas id={{$categories[$i]->cat_name}}></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endfor

</div>
</div>

@endsection

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript">


$(document).ready(function(){

    var chart=new Array();
    chart=window.bargraphs;

    //console.log(chart[0]);
    
    for(var i=0;i<chart.length;i++){
        for(var j=0;j<chart[i].length;j++){

            var maxi=Math.round((Math.max.apply(Math,chart[2][j])+5)/10)*10 ;
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