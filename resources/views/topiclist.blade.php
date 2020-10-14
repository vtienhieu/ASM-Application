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
  
<a href="{{asset('asm/addtopic')}}" class="btn btn-success" role="button">Add new Topic</a>

</div>                                                                               
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>@sortablelink('TopicId')</th>
        <th>@sortablelink('TopicName')</th>
        <th>@sortablelink('Description')</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($topic as $item)
      <tr>
        <td>{{$item->TopicId}}</td>
        <td>{{$item->TopicName}}</td>
        <td>{{$item->Description}}</td>
        <td> <a href="{{asset('asm/updatetopic/'.$item->TopicId)}}">Update</a> | <a href="{{asset('asm/deletetopic/'.$item->TopicId)}}">Delete</a></td>

      </tr>
    @endforeach
    </tbody>
  </table>

  {!! $topic->appends(\Request::except('page'))->render() !!}
  </div>
</div>

</body>
</html>
