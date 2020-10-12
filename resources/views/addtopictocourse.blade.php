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
  <h2>Add topic to course</h2>
  <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>       
  <!-- Search form -->
<div class="md-form mt-0">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post">
 
  <div class="form-group">
    <label for="exampleFormControlSelect1">Course</label>
    <select class="form-control" id="exampleFormControlSelect1" name="CourceID">
    @foreach($course as $cour)
    <option value="{{$cour->id}}">{{$cour->name}}</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Topic</label>
    <select class="form-control" id="exampleFormControlSelect1" name="TopicID">
    @foreach($topic as $top)
    <option value="{{$top->TopicId}}">{{$top->TopicName}}</option>
    @endforeach
    </select>
  </div>
  <div class="col-12 mb-4">
                <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
              </div>
              
              {{csrf_field()}}
</form>
  </div>
</div>

</body>
</html>
