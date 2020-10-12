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
  <h2>Detail</h2>
  <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>       
  <!-- Search form -->
<div class="md-form mt-0">

</div>
                                                                                
  <div class="table-responsive">          
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Topic</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
    @if($roleID == $item->trainerID)
      <tr>
        <td>{{$item->trainerID}}</td>
        <td>{{$item->TrainerName}}</td>
        <td>{{$item->TopicName}}</td>
        <th>{{$item->Description}}</th>
      </tr>
    @endif
    @endforeach
    </tbody>
  </table>

  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>ID Course</th>
        <th>Course Name</th>
        <th>Description</th>
        <th>Credit</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data2 as $item2)
      <tr>
        <td>{{$item2->id}}</td>
        <td>{{$item2->name}}</td>
        <td>{{$item2->Description}}</td>
        <th>{{$item2->Credit}}</th>
      </tr>
    @endforeach
    </tbody>
  </table>


  </div>
</div>

</body>
</html>
