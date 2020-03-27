@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Articulo</div>

                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                      </div>
                    @endif

                    <form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Titulo *</label>
                        <input type="text" name="title" value="{{old("title")}}" class="form-control" required />
                      </div>
                      <div class="form-group">
                        <label>Imagen</label>
                        <input type="file" name="file" />
                      </div>
                      <div class="form-group">
                        <label>Contenido *</label>
                        <textarea name="body" rows="6" class="form-control" required >{{old("body")}}</textarea>
                      </div>
                      <div class="form-group">
                        <label>Contenido embebido</label>
                        <textarea name="iframe" class="form-control" >{{old("iframe")}}</textarea>
                      </div>
                      <div class="form-group">
                        @csrf
                        <input type="submit" value="Enviar" class="btn btn-success" />
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
