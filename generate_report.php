<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
<head><?php include 'head.php'; ?></head>
<body>

    <div id="wrapper">
        <?php include 'sidebar.php'; ?>
        <div id="page-wrapper" style="background-color: #fff !important;">
        <div class="row"><?php include 'header.php'; ?></div>
        <div class="wrapper wrapper-content animated fadeInRight" >
            <h2 style="color: white;">Charts</h2>
            <div class="row">
                <div class="col-lg-10" style="background-color: #1482eb;margin: auto;float: unset;padding: 10px;">
                    <h2 style="margin-top: 10px;color: white;"><i class="fas fa-tachometer-alt"></i> Dashboard</h2>
                </div>
                <div class="col-lg-10" style="margin: auto;float: unset;margin-top: 20px;">
                    <a href="dashboard.php"><button class="btn" style="background-color: black;color: #fff;">DASHBOARD <i class="fas fa-chart-bar"></i></button></a>
                </div>

              
               <!--  <div class="col-lg-4" style="margin-top: 10rem;">
                    <div class="ibox-content" style="border: unset;">
                        <canvas id="pie" width="600" height="400"></canvas>
                    </div>
                </div>
                <div class="col-lg-4" style="margin-top: 10rem;">
                    <div class="ibox-content"  style="border: unset;">
                        <canvas id="bar" width="600" height="400"></canvas>
                    </div>
                </div>
                <div class="col-lg-4" style="margin-top: 10rem;">
                 <div class="ibox-content" style="border: unset;">
                        <canvas id="marksChart" width="600" height="400"></canvas>
                    </div>
                </div> -->
                 <select id="coffeesales">
                    <option value="0, 0">test</option>
                    <option value="1, 2">coffe</option>
                    <option value="4, 6">espresso</option>
                    <option value="9, 10">cappucino</option>                    
                </select>


                <select id="coffeesales2">
                    <option value="0, 0">test</option>
                    <option value="10, 20">coffe</option>
                    <option value="40, 60">espresso</option>
                    <option value="90, 100">cappucino</option>                    
                </select>
                <div class="container">
                  <div class="controls">
                    <select name="chartType" id="chartType" onchange="updateChartType()">

         <option value="doughnut">Doughnut</option>
                      <option value="bar">Bar</option>
                      <option value="radar">Radar</option>

                    

                    </select>
    <!--                 <button onclick="randomizeData()">Randomize Data!</button> -->
                  </div>
                  <div class="col-lg-10">
                    <canvas id="myChart" width="600" height="400"></canvas>
                  </div>    
                </div>
            </div>
        </div>
        </div>
        </div>


       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


 
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Morris -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

  

    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>


<script type="text/javascript">
    // Define data set for all charts
let dataBaby = [0, 0];
let dataBaby2 = [0, 0];


myData = {
        labels: ["Male", "Female"],
        datasets: [
          {
            label: "Male",
            fill: false,
            backgroundColor: '#E74C3C',
            borderColor: 'rgb(190, 99, 255)',
            data: dataBaby,
          }, {
            label: "Female",
            fill: false,
            backgroundColor: '#26B99A',
            borderColor: 'rgb(190, 99, 255)',
            data: dataBaby2,
          }]
    };


myData2 = {
        labels: ["Item", "Contractual","Daily wage"],
        datasets: [
          {
            label: "College of Information and Computing Science",
            fill: false,
            backgroundColor: 'rgba(200,0,0,0.2)',
            borderColor: 'rgb(190, 99, 255)',
            data: dataBaby,
          }, {
            label: "College of Hotel and Restaurant",
            fill: false,
            backgroundColor: 'rgba(0,0,200,0.2)',
            borderColor: 'rgb(190, 99, 255)',
            data: dataBaby2,
          }]
    };

myData3 = {

        labels: ['Elementary Graduate', 'Junior High Graduate', 'Senior High Graduate', 'College Graduate', 'Masteral', 'Doctorate'],
        datasets: [
          {
            label: "High Educational Attainment",
            fill: false,
            backgroundColor: '#000080',
            borderColor: 'rgb(190, 99, 255)',
            data: dataBaby,
          }, {
            label: "lge",
            fill: false,
            backgroundColor: '#000080',
            borderColor: 'rgb(190, 99, 255)',
            data: dataBaby2,
          }]
    };


// Default chart defined with type: 'line'
Chart.defaults.global.defaultFontFamily = "monospace";
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: myData
});

// Function runs on chart type select update
function updateChartType() {
  // Since you can't update chart type directly in Charts JS you must destroy original chart and rebuild
  if (document.getElementById("chartType").value == "radar") {
   myChart.destroy();
   myChart = new Chart(ctx, {
     type: document.getElementById("chartType").value,
     data: myData2
    
   });

}else if (document.getElementById("chartType").value == "doughnut"){

     myChart.destroy();
   myChart = new Chart(ctx, {
     type: document.getElementById("chartType").value,
     data: myData
    
   });
}else if (document.getElementById("chartType").value == "bar"){

     myChart.destroy();
   myChart = new Chart(ctx, {
     type: document.getElementById("chartType").value,
     data: myData3
    
   });
}

};














const coffeesales = document.getElementById('coffeesales')
coffeesales.addEventListener('change', salesTracker)
function salesTracker(){
    console.log(coffeesales.value)
    coffeesales.value.split(',')
    myChart.data.datasets[0].data = coffeesales.value.split(',')
    myChart.update()
}

const coffeesales2 = document.getElementById('coffeesales2')
coffeesales2.addEventListener('change', salesTracker2)
function salesTracker2(){
    console.log(coffeesales2.value)
    coffeesales2.value.split(',')
    myChart.data.datasets[1].data = coffeesales2.value.split(',')
    myChart.update()
}

</script>
