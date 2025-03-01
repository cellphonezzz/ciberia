@extends('layouts.admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Книга {{ mb_strtolower(mb_substr($book->title, 0, 1)) . mb_substr($book->title, 1) }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('books.index')}}">Список авторов</a></li>
                            <li class="breadcrumb-item active">Книга {{ mb_strtolower(mb_substr($book->title, 0, 1)) . mb_substr($book->title, 1) }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <div>
                <a href="{{route('books.index')}}" class="btn btn-success bg-teal mb-3">Вернуться назад</a>
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
                                    <th>Название книги</th>
                                    <th>Автор книги</th>
                                    <th>Жанры книги</th>
                                    <th>Дата загрузки</th>
                                    <th colspan="2">Действия</th>


                                </tr>
                                </thead>
                                <tbody align="center">
                                    <tr>
                                        <td>{{$book->id}}</td>
                                        <td>{{$book->title}}</td>
                                        <td>{{$book->author->name}}</td>
                                        <td>{{ $book->genres->pluck('title')->implode(', ')}}</td>
                                        <td>{{$book->created_at->format('d.m.Y H:i')}}</td>
                                        <td><a href="{{route('books.edit', $book->id)}}"><i class="fa-solid fa-pen text-teal"></i></a> </td>
                                        <td>

                                            <form action="{{ route('books.destroy', $book->id) }}" method="post">
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
