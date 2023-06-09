<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel= "stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mbd-ui-kit/3.3.0/mbd.min.js"></script>
</head>
<body class="bg-info">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3> To-do List </h3>
                <form action="{{route('store')}}" method= "POST"  autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-conrol" placeholder="Add your new todo ">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
                {{-- if tasks count --}}
                @if (count($todolist))
                <ul class="list-group list-group-flush mt-3"> 
                    @foreach ($todolist as $todolist)
                    <li class="list-group-item">
                        <form action="{{route('destroy', $todolist->id)}}" method="POST">
                            {{$todolist ->content}}
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>
                        </form>
                        <form action= "/todolist" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $todolist->id }}"  placeholder="Edit">
                            <input type="text" name="content"  placeholder="Edit" style="float: right;" required>
                            <button class="btn btn-primary btn-sm" > <i class="fas fa-user-edit"></i>  </button>
                          </form>
                        </li>
                        @endforeach
                </ul>
                @else
                <p class="text-center mt-3"> No Tasks! </p>
                @endif
            <div>
                <a href= {{url('/dashboard')}}> <button style="additive-symbols: unset" > Dashboard </button> </a>
            </div>
    </div>
</body>
</html>