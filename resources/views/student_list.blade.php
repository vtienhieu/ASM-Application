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


<form method="GET" action="searchtrainee">
  <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search">
    <input type="submit" value="Submit">
    {{csrf_field()}}
  </form>
  <a href="{{asset('asm/addtrainee')}}" class="btn btn-success" role="button">Add new trainees</a>

</div>                                                                               
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('TraineeName')</th>
        <th>@sortablelink('Address')</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($trainees as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->TraineeName}}</td>
        <td>{{$item->Address}}</td>
        <td> <a href="{{asset('asm/updatetrainee/'.$item->id)}}">Update</a> | <a href="{{asset('asm/deletetrainee/'.$item->id)}}">Delete</a></td>

      </tr>
    @endforeach
    </tbody>
  </table>

  {!! $trainees->appends(\Request::except('page'))->render() !!}
  </div>
</div>

</body>
</html>
