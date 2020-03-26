<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ciclo Test</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-8 mx-auto">
        <div class="card border-0 shadow">
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                  - {{ $error }} <br>
                @endforeach
              </div>
            @endif
            <form action="{{route("users.store")}}" method="post">
              <div class="form-row">
                <div class="col-sm-3">
                  <input type="text" name="name" value="{{old("name") }}" class="form-control" placeholder="Nombre" />
                </div>
                <div class="col-sm-4">
                  <input type="email" name="email" value="{{old("email")}}" class="form-control" placeholder="E-Mail" />
                </div>
                <div class="col-sm-3">
                  <input type="password" name="password" value="{{old("password")}}" class="form-control" placeholder="Password" />
                </div>
                <div class="col-auto">
                  @csrf
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>
                  <form action="{{route("users.destroy",$item)}}" method="post">
                    @method("DELETE")
                    @csrf
                    <input
                        class="btn btn-sm btn-danger"
                        type="submit"
                        onclick="return confirm('Desea eliminar ....?')"
                        value="Eliminar" />
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
