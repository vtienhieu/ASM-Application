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
  
<a href="{{asset('register')}}" class="btn btn-success" role="button">Register new account</a>

</div>                                                                               
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('name')</th>
        <th>@sortablelink('roleID')</th>
        <th>@sortablelink('email')</th>
        <th>@sortablelink('password')</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($account as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->roleID}}</td>
        <td>{{$item->email}}</td>
        <td>******</td>
        <td><a href="{{asset('updateaccount/'.$item->id)}}">Update</a> | <a href="{{asset('deleteaccount/'.$item->id)}}">Delete</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $account->links() }}

  </div>
</div>

</body>
</html>
