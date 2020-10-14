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
  <h2><a href="{{asset('asm/logout')}}" class="btn btn-success" role="button">Logout</a></h2>
  <!-- Search form -->
<div class="md-form mt-0">
  
<a href="{{asset('asm/register')}}" class="btn btn-primary" role="button">Register new account</a>

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
        <td><a href="{{asset('asm/updateaccount/'.$item->id)}}">Update</a> | <a href="{{asset('asm/deleteaccount/'.$item->id)}}">Delete</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $account->links() }}

  </div>
</div>

</body>
</html>
