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
  <h2><a href="{{asset('asm/logout')}}" class="btn btn-success" role="button">Logout</a>
  <h2><a href="{{asset('asm/updatetrainer/'.$id)}}" class="btn btn-success" role="button">Update profile</a>
</h2>

<div class="md-form mt-0">

</div>
   <h3>ID: {{$st->trainerID}}</h3>  
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
        <td>{{$item->trainerID}}</td>
        <td>{{$item->TrainerName}}</td>
        <td>{{$item->TopicName}}</td>
        <th>{{$item->Description}}</th>
        <th><a href="{{asset('asm/trainerdetail/'.$item->TopicId)}}">Detail</a></th>
      </tr>
    @endforeach
    </tbody>
  </table>


  </div>
</div>

</body>
</html>
