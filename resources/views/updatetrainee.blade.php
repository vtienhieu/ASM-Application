<!DOCTYPE html>
<html>
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

<h1>Add Trainee</h1>

<div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form method="POST">
    <label for="fname">Trainee Name</label>

    <input type="text" id="fname" name="traineeName" placeholder="Your name.." value="{{$trainee->TraineeName}}">

    <label for="lname">Address</label>
    <input type="text" id="lname" name="address" placeholder="Your Email.." value="{{$trainee->Address}}">
    <input type="submit" value="Submit">
    {{csrf_field()}}
  </form>
</div>

</body>
</html>