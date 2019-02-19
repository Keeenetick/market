@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Разместите ваше обьявление</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" >
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('delete') }}
                        </div>
                    @endif

                    {!! Form::open(['route' => 'store','files'=>true]) !!}
                       <div class="form-group row">
                        <div class="col-sm-10">
                          <input  name="title" class="form-control" id="colFormLabel" placeholder="Заголовок поста"><br>
                        </div>

                        <div class="col-sm-10">
                          <textarea name="description"></textarea><br>
                        </div>
                        <div class="col-sm-10">
                            <input type="file" name = "image" class="form-control-file" id="exampleFormControlFile1"><br>
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                        <div class="col-sm-10">
                          <input  name="price" class="form-control" placeholder="Укажите цену"><br>
                        </div>
                        <div class="col-sm-10">
                           <button type="submit" name = "submit" class="btn btn-success">Создать объявление</button>
                        </div>
                    {!!Form::close()!!}
                </div>

            </div>
        </div>
    </div>
</div><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ваши объявления</div>

                <div class="card-body">
                   
                    @foreach($products as $product)
                        <p>{{$product->title}}</p>
                        <p>{!! $product->description !!}</p>
                        <p>{{ $product->price }}$</p>
                       <a href="{{route('show',$product->id)}}"><img class="card-img-top" src="{{asset('/storage/'.$product->image)}}"><hr></a>
                      
                        {!!Form::open(['method' => 'DELETE', 'route' => ['destroy', $product->id]])!!}
                        {!!Form::submit('Удалить', ['class'=>'btn btn-danger btn-xs'])!!}
                        {!!Form::close()!!}
                    @endforeach

                    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
