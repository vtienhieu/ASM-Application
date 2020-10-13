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
  
  <form method="POST" action="search">
  <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search">
    <input type="submit" value="Submit">
    {{csrf_field()}}
  </form>
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