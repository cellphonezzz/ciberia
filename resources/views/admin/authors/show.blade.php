@extends('layouts.admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Автор {{ $author->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('authors.index')}}">Список авторов</a></li>
                            <li class="breadcrumb-item active">Автор {{ $author->name }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <div>
                <a href="{{route('authors.index')}}" class="btn btn-success bg-teal mb-3">Вернуться назад</a>
            </div>

            <div class="container-fluid ">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="card w-75 ">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead align="center">
                                <tr>
                                    <th>ID</th>
                                    <th>Автор</th>
                                    <th>Количество книг</th>
                                    <th colspan="2">Действия</th>


                                </tr>
                                </thead>
                                <tbody align="center">
                                    <tr>
                                        <td>{{$author->id}}</td>
                                        <td>{{$author->name}}</td>
                                        <td>{{$author->books->count()}}</td>
                                        <td><a href="{{route('authors.edit', $author->id)}}"><i class="fa-solid fa-pen text-teal"></i></a> </td>
                                        <td>

                                            <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" value="Delete" class="btn-outline-primary border-0 bg-transparent text-danger"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>




                                </tbody>
                            </table>
                        </div>


                        <!-- /.card-body -->
                    </div>


                    <!-- ./col -->
                </div>


            </div>

        </section>
    </div>

@endsection
