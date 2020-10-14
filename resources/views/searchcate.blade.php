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
  
  <form method="GET" action="searchcate">
  <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search">
    <input type="submit" value="Submit">
    {{csrf_field()}}
  </form>
  <a href="{{asset('asm/managecategories')}}" class="btn btn-info" role="button">Back to categories list</a>

</div>                                                                               
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('name')</th>
        <th>@sortablelink('description')</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($result as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->description}}</td>
        <td> <a href="{{asset('asm/updatecate/'.$item->id)}}">Update</a> | <a href="{{asset('asm/deletecate/'.$item->id)}}">Delete</a></td>

      </tr>
    @endforeach
    </tbody>
  </table>


  </div>
</div>

</body>
</html>
