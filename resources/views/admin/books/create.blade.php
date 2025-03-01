@php use App\Enums\BookTypeEnum; @endphp
@extends('layouts.admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление новой книги</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('books.index')}}">Книги</a></li>
                            <li class="breadcrumb-item active">Добавление новой книги</li>
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

            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="card card-teal w-50">
                        <div class="card-header">
                            <h3 class="card-title">Добавление книги</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('books.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">

                                    <label for="title" class="form-label">Название книги</label>
                                    <input name="title" type="text" class="form-control" id="title"
                                           placeholder="Название" value="{{old('title')}}">
                                </div>
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror

                                <div class="form-group">
                                    <label>Автор книги</label>
                                    <select name="author_id" class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-teal" style="width: 100%;">
                                        @foreach($authors as $author)
                                            <option {{ $author->id == old('author_id') ? ' selected' : '' }}
                                                    value="{{$author->id}}">{{$author->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('author_id')
                                    <div class="text-danger ">{{$message}}</div>
                                    @enderror

                                    <div class="form-group pt-2">
                                        <label>Выбор жанра</label>
                                        <div class="select2-teal">
                                            <select name="genre_ids[]" class="select2" multiple="multiple"
                                                    data-placeholder="Жанры" data-dropdown-css-class="select2-teal"
                                                    style="width: 100%;">
                                                @foreach($genres as $genre)
                                                    <option
                                                        {{ is_array( old('genre_ids')) && in_array($genre->id, old('genre_ids')) ?  ' selected' : ''}} value="{{$genre->id}}">{{$genre->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Тип издания книги</label>
                                    <select name="type" class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-teal" style="width: 100%;">
                                        @foreach(BookTypeEnum::cases() as $type)
                                            <option {{ $type->value  == old('type') ? ' selected' : '' }}
                                                    value="{{$type->value }}">{{$type->label()}}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <div class="text-danger ">{{$message}}</div>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div align="center" class="card-footer">
                                <button type="submit" class="btn btn-success bg-teal ">Добавить</button>
                            </div>
                        </form>
                    </div>

                    <!-- ./col -->
                </div>

            </div>
            <!-- /.card -->


        </section>
    </div>

@endsection
