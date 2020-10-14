<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h3>Add Course</h3>
<a href="{{asset('viewcource')}}" class="btn btn-info" role="button">Back</a>

<div>
  <form method="POST">
    <label for="fname">Cource</label>

    <input type="text" id="fname" name="courcename" placeholder="Cource name..">

    <label for="lname">Description</label>
    <input type="text" id="lname" name="description" placeholder="Description..">
    <label for="lname">Credit</label>
    <input type="text" id="lname" name="credit" placeholder="Credit..">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Categories</label>
    <select class="form-control" id="exampleFormControlSelect1" name="cate">
      @foreach($cate as $ct)
      <option value="{{$ct->id}}">{{$ct->name}}</option>
      @endforeach
    </select>
  </div>
    <input type="submit" value="Submit">
    {{csrf_field()}}
  </form>
</div>

</body>
</html>
