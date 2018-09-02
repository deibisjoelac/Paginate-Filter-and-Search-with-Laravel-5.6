<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>

<body>
    <div class="container mt-5">
        <div class="row m-2">
            <div class="col-md-10 ">
                <h4>Páginación , búsqueda y Filtrado con Laravel 5.6 - Bootstrap 4 - @byDeibis</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form class="form-inline">
                            <div class="form-group col-md-7">
                                <span class="m-2"> Mostrar </span>
                                <select name="paginate" class="form-control" onchange="this.form.submit()">
                                        <option value="5" 
                                            {{ request('paginate')==5? 'selected' : '' }}>
                                            5
                                        </option>
                                        <option value="10" 
                                            {{ request('paginate')==10? 'selected' : '' }} >
                                            10
                                        </option>
                                        <option value="20" 
                                            {{ request('paginate')==20? 'selected' : '' }} >
                                            20
                                        </option>
                                        <option value="50" 
                                            {{ request('paginate')==50? 'selected' : '' }} >
                                            50
                                        </option>
                                </select>
                                <span class="m-2"> Registros  </span>
                                <span class="m-2">  | | </span>
                                <span class="m-2"> Ordenar Por </span>
                                    <select name="ordercolumn" class="form-control" onchange="this.form.submit()">
                                        <option value="id" 
                                            {{ request('ordercolumn')=='id'? 'selected' : '' }}>
                                            Id
                                        </option>
                                        <option value="name" 
                                            {{ request('ordercolumn')=='name'? 'selected' : '' }}>
                                            Nombre
                                        </option>
                                        <option value="email" 
                                            {{ request('ordercolumn')=='email'? 'selected' : '' }}>
                                            Email
                                        </option>
                                    </select>
                                <span class="m-2"></span>
                                <select name="order" class="form-control" onchange="this.form.submit()">
                                    <option value="ASC" 
                                        {{ request('order')=='ASC'? 'selected' : '' }}>
                                        ASC
                                    </option>
                                    <option value="DESC"
                                        {{ request('order')=='DESC'? 'selected' : '' }}>
                                        DESC
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" name="query" 
                                    placeholder="Ingrese termino a búscar" 
                                    value="{{ request('query')  }}" 
                                    class="form-control m-1"
                                    onchange="this.form.submit()"> 
                                <input type="submit" value="Búscar" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-hover w-100">
                            <thead>
                                <tr class="row">
                                    <th class="col-1">Id</th>
                                    <th class="col-2">Nombre</th>
                                    <th class="col-2">Email</th>
                                    <th class="col-7">Biografía</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($usuarios as $user)
                                <tr  class="row">
                                    <td scope="row" class="col-1">{{ $user->id}}</td>
                                    <td class="col-2">{{ $user->name}}</td>
                                    <td class="col-2">{{ $user->email}}</td>
                                    <td class="col-7">{{ $user->bio}}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="row">
                            <div class="col-md-4">
                                <span>Mostrando {{ $usuarios->count()}} registros de {{$usuarios->total()}}</span>
                            </div>
                            <div class="col-md-8">
                                {!! $usuarios->appends(request()->query())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    // Remove Query String URL Browser
    var uri = window.location.toString();
        if (uri.indexOf("?") > 0) {
            var clean_uri = uri.substring(0, uri.indexOf("?"));
            window.history.replaceState({}, document.title, clean_uri);
        }

</script>

</html>