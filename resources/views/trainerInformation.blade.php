<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Table</h2>
  <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>       
  <!-- Search form -->
<div class="md-form mt-0">

</div>
   <h3>ID: {{$st->id}}</h3>  
   <h3>Trainer Name: {{$st->TrainerName}}</h3>                                                                               
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Topic</th>
        <th>Description</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->TrainerName}}</td>
        <td>{{$item->TopicName}}</td>
        <th>{{$item->Description}}</th>
        <th><a href="{{asset('trainerdetail/'.$item->TopicId)}}">Detail</a></th>
      </tr>
    @endforeach
    </tbody>
  </table>


  </div>
</div>

</body>
</html>
