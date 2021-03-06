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
  
<form method="GET" action="searchcate">
  <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search">
    <input type="submit" value="Submit">
    {{csrf_field()}}
  </form>
  <a href="{{asset('asm/insert')}}" class="btn btn-success" role="button">Add new Categories</a>

</div>                                                                               
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>@sortablelink('cateID')</th>
        <th>@sortablelink('cateName')</th>
        <th>@sortablelink('description')</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($cate as $item)
      <tr>
        <td>{{$item->cateID}}</td>
        <td>{{$item->cateName}}</td>
        <td>{{$item->description}}</td>
        <td> <a href="{{asset('asm/categoriesdetail/'.$item->cateID)}}">Detail</a> | <a href="{{asset('asm/updatecate/'.$item->cateID)}}">Update</a> | <a href="{{asset('asm/deletecate/'.$item->cateID)}}">Delete</a></td>

      </tr>
    @endforeach
    </tbody>
  </table>

  {!! $cate->appends(\Request::except('page'))->render() !!}
  </div>
</div>

</body>
</html>
