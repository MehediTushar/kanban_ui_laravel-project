<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>user task</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>

<body>
    <div class="container">

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <form action="{{route('add.status')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="input-group mt-4">
                            <input type="text" class="form-control" name="status" id="status">
                            <input type="submit" name="submit" class="btn btn-primary ">
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="column" ondrop="drop(event)" ondragover="allowDrop(event)" style="background-color:rgb(245, 241, 241);">
                <h2>To Do</h2>
                @if (count($all_status)>0)
                @foreach ($all_status as $all_statuss)
                <p draggable="true" ondragstart="drag(event)" id="<?php echo $all_statuss->id?>" width="88" height="31">{{ $all_statuss->status }}</p>
                @endforeach

            @endif
            </div>
            <div class="column" ondrop="drop(event)" ondragover="allowDrop(event)" style="background-color:rgb(252, 250, 250);">
                <h2>In Progress</h2>

            </div>
            <div class="column" ondrop="drop(event)" ondragover="allowDrop(event)" style="background-color:rgb(255, 253, 253);">
                <h2>Done</h2>

            </div>


        </div>

    </div>






    <script src="{{asset('js/app.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>

</html>
