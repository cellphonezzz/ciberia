@extends('layouts.admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Список книг</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Список книг</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <div>
                <a href="{{route('books.create')}}" class="btn btn-success bg-teal mb-3">Добавить книгу</a>
            </div>

            <div class="container-fluid ">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="mb-3">
                    @if ($authors->isNotEmpty() && $genres->isNotEmpty())
                        <form method="GET" action="{{ route('books.index') }}">

                            <div class="form-group">
                            <input class="form-control mb-1" type="text" name="search" placeholder="Поиск по названию" value="{{ request('search') }}">

                            <select name="author_id" class="form-control select2 select2-danger" data-dropdown-css-class="select2-teal">

                                <option value="">Выберите автора</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="genre_id" class="form-control select2 select2-danger" data-dropdown-css-class="select2-teal">
                                <option value="">Выберите жанр</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                                        {{ $genre->title }}
                                    </option>
                                @endforeach
                            </select>

                            <button class="btn bg-teal" type="submit">Найти</button>
                            </div>
                        </form>
                    @else
                        <p>Нет доступных авторов или жанров.</p>
                    @endif

                    </div>


                    <div>
                        <a class="ml-1 btn bg-teal" href="{{ route('books.index', ['sort_by' => 'title', 'sort_order' => request('sort_order') == 'desc' ? 'asc' : 'desc']) }}">
                            Сортировать по названию книги
                            {{ request('sort_order') == 'desc' ? '▲' : '▼' }}
                        </a>
                    </div>


                    <div class="card w-100 ">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead align="center">
                                <tr>
                                    <th>ID</th>
                                    <th>Название книги</th>
                                    <th>Автор книги</th>
                                    <th>Жанр</th>
                                    <th>Дата загрузки</th>
                                    <th colspan="3">Действия</th>


                                </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($books as $book)
                                    <tr>
                                        <td>{{$book->id}}</td>
                                        <td>{{$book->title}}</td>
                                        <td>{{$book->author->name}}</td>
                                        <td>{{ $book->genres->pluck('title')->implode(', ')}}</td>
                                        <td>{{$book->created_at->format('d.m.Y H:i')}}</td>
                                        <td><a href="{{route('books.show', $book->id)}}"><i class="fa-solid fa-eye text-teal"></i></a> </td>
                                        <td><a href="{{route('books.edit', $book->id)}}"><i class="fa-solid fa-pen text-teal"></i></a> </td>
                                        <td>

                                            <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" value="Delete" class="btn-outline-primary border-0 bg-transparent text-danger"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>


                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3 m-auto">
                            {{ $books->links() }}
                        </div>


                        <!-- /.card-body -->
                    </div>


                    <!-- ./col -->
                </div>


            </div>

        </section>
    </div>

@endsection
