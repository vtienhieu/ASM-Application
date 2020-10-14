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
<h2><a href="{{asset('asm/trainingmenu')}}" >Homepage</a></h2>
  <!-- Search form -->
<div class="md-form mt-0">
  
<form method="GET" action="searchcourse">
  <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search">
    <input type="submit" value="Submit">
    {{csrf_field()}}
  </form>
  <a href="{{asset('asm/addcource')}}" class="btn btn-success" role="button">Add new Course</a>

</div>                                                                               
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('name')</th>
        <th>@sortablelink('Description')</th>
        <th>@sortablelink('Credit')</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($unscource as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->Description}}</td>
        <td>{{$item->Credit}}</td>
        <td>{{$item->TutorName}}</td>
        <td> <a href="{{asset('asm/updatecourse/'.$item->id)}}">Update</a> | <a href="{{asset('asm/deletecourse/'.$item->id)}}">Delete</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $unscource->links() }}

  </div>
</div>

</body>
</html>
