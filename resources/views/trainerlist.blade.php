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
<h2><a href="{{asset('trainingmenu')}}" >Homepage</a></h2>
  <!-- Search form -->
<div class="md-form mt-0">
  
<a href="{{asset('addtrainer')}}" class="btn btn-success" role="button">Add new Trainer</a>

</div>                                                                               
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>@sortablelink('trainerID')</th>
        <th>@sortablelink('TrainerName')</th>
        <th>@sortablelink('email')</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($trainer as $item)
      <tr>
        <td>{{$item->trainerID}}</td>
        <td>{{$item->TrainerName}}</td>
        <td>{{$item->email}}</td>
        <td> <a href="{{asset('updatetrainer/'.$item->trainerID)}}">Update</a> | <a href="{{asset('deletetrainer/'.$item->trainerID)}}">Delete</a></td>

      </tr>
    @endforeach
    </tbody>
  </table>

  {!! $trainer->appends(\Request::except('page'))->render() !!}
  </div>
</div>

</body>
</html>
