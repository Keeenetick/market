@extends('layouts.app')

@section('content')

<div class="container">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Имя продовца</th>
      <th scope="col">Продукт</th>
      <th scope="col">Цена</th>
      <th scope="col">Картинки</th>
      <th scope="col">Удалить пост</th>
      <th scope="col">Одобрить</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($allproducts as $item)
    <tr>
      <th scope="row">{{$item->user_name}}</th>

      <td>{{$item->title}}</td>
      <td>{{$item->price}}</td>
      <td> <img class="card-img-top" style="size:height: 20px;width: 100px" src="{{asset('/storage/'.$item->image)}}"></td>
     <td>{!!Form::open(['method' => 'DELETE', 'route' => ['destroyfromadmin', $item->id]])!!}
         {!!Form::submit('Удалить', ['class'=>'btn btn-danger btn-xs'])!!}
         {!!Form::close()!!}</td>
          <td >{!!Form::open(['method' => 'POST', 'route' => ['published', $item->id]])!!} 
         {!!Form::submit('Одобрить', ['class'=>'btn btn-success btn-xs'])!!}
         {!!Form::close()!!}</td>
      
    </tr>
    @endforeach
  </tbody>
</div>

@endsection