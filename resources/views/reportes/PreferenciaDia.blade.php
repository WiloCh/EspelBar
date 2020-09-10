@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <p>Selecionar un Bar</p><br>
            <form method="GET">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Bar: </label>
                    </div>
                    @csrf
                    <select name="id" class="custom-select" id="bar_id">
                        @foreach($bares as $bar)
                        <option value="{{$bar->id}}">{{$bar->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group-append">
                    <input name="submit" type="submit" class="btn btn-outline-secondary" value="Button">
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<div class="container">
<html>

<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dinosaur', 'Length'],
          @foreach($preferencias as $preferencia)
          ['{{$preferencia->nombre}}',
          '{{$preferencia->contador}}'],
          @endforeach]);

        var options = {
          title: 'Preferencias por Día',
          legend: { position: 'none' },
        };

        var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>

<body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
</body>

</html>
</div>
@endsection