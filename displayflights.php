<?php
$inputloc1 = $_GET["inputloc1"]; 
$inputloc2 = $_GET["inputloc2"]; 

$data = exec("python python_scripts/RIPPyret.py '$inputloc1' '$inputloc2' 0.5");

#[sorted_travel_paths, sorted_overall, sorted_distance, sorted_turbulence, Morning, Afternoon,Evening, Night]

// Removing the outer list brackets
$data =  substr($data,1,-1);

// Removing the outer list brackets
$data =  substr($data,1,-1);

$myArr = array();
// Will get a 3 dimensional array, one dimension for each list
$myArr =explode('],', $data);

// Removing last list bracket for the last dimension
if(count($myArr)>1)
$myArr[count($myArr)-1] = substr($myArr[count($myArr)-1],0,-1);

// Removing first last bracket for each dimenion and breaking it down further
foreach ($myArr as $key => $value) {
 $value = substr($value,1);
 $myArr[$key] = array();
 $myArr[$key] = explode(',',$value);
}

$flight_strings = array();
$turbulences = array();
$wait_times = array(60, 20, 1, 100, 50);
$avg_ratings = array(100, 90, 80, 60, 10);
$travel_times = array();
$morning_waits = array();
$afternoon_waits = array();
$evening_waits = array();
$night_waits = array();

$flight_strings[] = substr($myArr[0][0], 0, -1);
$travel_times[] = ((float) substr($myArr[2][0], 1))*100;
$turbulences[] = ((float) substr($myArr[3][0], 1))*100;
$morning_waits[] = ((float) substr($myArr[4][0], 1))*25;
$afternoon_waits[] = ((float) substr($myArr[5][0], 1))*25;
$evening_waits[] = ((float) substr($myArr[6][0], 1))*25;
$night_waits[] = ((float) substr($myArr[7][0], 1))*25;

for ($x = 1; $x < count($myArr[0]); $x++) {
  $flight_strings[] = substr($myArr[0][$x], 2, -1);
  $travel_times[] = (float) $myArr[2][$x] * 100;
  $turbulences[] = (float) $myArr[3][$x] * 100;
  $morning_waits[] = (float) $myArr[4][$x] * 25;
  $afternoon_waits[] = (float) $myArr[5][$x] * 25;
  $evening_waits[] = (float) $myArr[6][$x] * 25;
  $night_waits[] = (float) $myArr[7][$x] * 25;
}

echo '<main role="main" class="container">';
echo '<div class="row">
<div class="col-3">
<div class="list-group" id="list-tab" role="tablist">
  <a class="list-group-item list-group-item-action active" id="list-flight0-list" data-toggle="list" href="#list-flight0" role="tab" aria-controls="flight0">1.  ';
echo $flight_strings[0];
echo '</a>';

for ($x = 1; $x < count($flight_strings); $x++) {
  echo '<a class="list-group-item list-group-item-action" id="list-flight'.$x.'-list" data-toggle="list" href="#list-flight'.$x.'" role="tab" aria-controls="flight'.$x.'">'.($x+1).'.  '.$flight_strings[$x].'</a>';
}

echo '</div></div><div class="col-9"><div class="tab-content" id="nav-tabContent"><div class="tab-pane fade show active" id="list-flight0" role="tabpanel" aria-labelledby="list-flight0-list">';

echo '<div class="starter-template">'.$flight_strings[0].'</div>';

  echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Flight Turbulence</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-info" role="progressbar" style="width: '.$turbulences[0].'%" aria-valuenow="'.$turbulences[0].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
<div class="col-md-3"><h6 class="progress-label">Airport Wait Time</h6></div>
<div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar" role="progressbar" style="width: '.$morning_waits[0].'%; background-color:#2364AA !important" aria-valuenow="'.$morning_waits[0].'" aria-valuemin="0" aria-valuemax="100"></div>
<div class="progress-bar" role="progressbar" style="width: '.$afternoon_waits[0].'%; background-color:#EA7317 !important" aria-valuenow="'.$afternoon_waits[0].'" aria-valuemin="0" aria-valuemax="100"></div>
<div class="progress-bar" role="progressbar" style="width: '.$evening_waits[0].'%; background-color:#FEC601 !important" aria-valuenow="'.$evening_waits[0].'" aria-valuemin="0" aria-valuemax="100"></div>
<div class="progress-bar" role="progressbar" style="width: '.$night_waits[0].'%; background-color:#56544F !important" aria-valuenow="'.$night_waits[0].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Avg Airport Rating</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-success" role="progressbar" style="width: '.$avg_ratings[0].'%" aria-valuenow="'.$avg_ratings[0].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Total Travel Time</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-danger" role="progressbar" style="width: '.$travel_times[0].'%" aria-valuenow="'.$travel_times[0].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div></div>';

for ($x = 1; $x < count($flight_strings); $x++) {
  echo '<div class="tab-pane fade" id="list-flight'.$x.'" role="tabpanel" aria-labelledby="list-flight'.$x.'-list">';
  echo '<div class="starter-template">'.$flight_strings[$x].'</div>';
  echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Flight Turbulence</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-info" role="progressbar" style="width: '.$turbulences[$x].'%" aria-valuenow="'.$turbulences[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
<div class="col-md-3"><h6 class="progress-label">Airport Wait Time</h6></div>
<div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
  <div class="progress-bar" role="progressbar" style="width: '.$morning_waits[$x].'%; background-color:#2364AA !important" aria-valuenow="'.$morning_waits[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar" role="progressbar" style="width: '.$afternoon_waits[$x].'%; background-color:#EA7317 !important" aria-valuenow="'.$afternoon_waits[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar" role="progressbar" style="width: '.$evening_waits[$x].'%; background-color:#FEC601 !important" aria-valuenow="'.$evening_waits[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar" role="progressbar" style="width: '.$night_waits[$x].'%; background-color:#56544F !important" aria-valuenow="'.$night_waits[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Avg Airport Rating</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-success" role="progressbar" style="width: '.$avg_ratings[$x].'%" aria-valuenow="'.$avg_ratings[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div>';

echo '<div class="row">
  <div class="col-md-3"><h6 class="progress-label">Total Travel Time</h6></div>
  <div class="col-md-8"><div class="progress" style="margin-bottom:22px;">
<div class="progress-bar bg-danger" role="progressbar" style="width: '.$travel_times[$x].'%" aria-valuenow="'.$travel_times[$x].'" aria-valuemin="0" aria-valuemax="100"></div>
</div></div></div></div>';
}
echo '</div></div>';
echo '</main>';
?>
