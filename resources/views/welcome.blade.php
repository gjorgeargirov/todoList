<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Styles -->
    <style></style>
</head>
<body class="container bg-dark-subtle d-flex justify-content-center my-2"
      style="background-image:
      url('https://images.unsplash.com/photo-1553894506-d9ff27d44a90?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80')
">
<div class="row card bg-success p-2 text-dark bg-opacity-50" style="width: 45rem;">
    {{--    <img src="..." class="card-img-top" alt="...">--}}
    <div class="card-body px-0 py-2">
        <h4 class="card-title">Todo List</h4>
        {{--        <p class="card-text">This is todo list you can use for free.</p>--}}
    </div>
    <ul class="list-group list-group-flush">
        @foreach($listItems as $listItem)
            @if($listItem->is_complete != 1)
                <li class="list-group-item bg-secondary rounded-2">
                    <div class="row me-1">
                        <div class="col-1">
                            <form class="d-inline-block" action="{{ route('markComplete', $listItem->id) }}"
                                  method="post"
                                  accept-charset="UTF-8">
                                {{csrf_field()}}
                                <input class="form-check-input " type="checkbox" id="checkboxNoLabel" value=""
                                       aria-label="..." onchange="submit();"
                                       style="width: 30px; height: 30px;">
                            </form>
                        </div>
                        <div class="col-2 text-end m-0 p-0">
                            <p class="d-inline-block m-2 text-white">{{ date('d.m.Y', strtotime($listItem->due_date))}}
                                |
                            </p>
                        </div>
                        <div class="col-9">
                            @if($listItem->is_complete != 1)
                                <p class="d-inline-block my-2 text-white">{{$listItem->name}}</p>
                            @endif
                        </div>
                    </div>


                </li>
            @endif
        @endforeach
    </ul>
    <button class="btn btn-dark w-25 my-2">Completed {{count($listItemsCompleted)}}</button>
    @if(true)
        @foreach($listItems as $listItem)
            @if($listItem->is_complete == 1)

                <ul class="list-group list-group-flush ">

                    <li class="list-group-item bg-secondary rounded-2">
                        <div class="row me-1">
                            <div class="col-1">
                                <form class="d-inline-block" action="{{ route('deleteItem', $listItem->id) }}"
                                      method="post"
                                      accept-charset="UTF-8">
                                    {{csrf_field()}}

                                    <button class="">❌</button>
                                </form>
                            </div>
                            <div class="col-2 text-end m-0 p-0">
                                <p class="d-inline-block m-2 text-white">{{ date('d.m.Y', strtotime($listItem->due_date))}}
                                    |</p>
                            </div>
                            <div class="col-9">
                                @if($listItem->is_complete == 1)
                                    <p class="d-inline-block my-2 text-white"
                                       style="text-decoration: line-through">{{$listItem->name}}</p>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <div class="card-body">
                    <form action="{{ route('saveItem') }}" method="post" accept-charset="UTF-8">
                        {{csrf_field()}}
                        <div class="input-group ">
                            <input type="date" name="dueDate" id="dueDate" class="" placeholder="@"
                                   aria-label=""
                                   aria-describedby="basic-addon1">
                            <input type="text" name="listItem" id="listItem" class="form-control" placeholder="Add task"
                                   aria-label=""
                                   aria-describedby="basic-addon1">
                        </div>
                    </form>
                </div>
            @endif
</div>
</body>
</html>
