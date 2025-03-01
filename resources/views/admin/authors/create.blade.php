@extends('layouts.admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление нового автора</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('authors.index')}}">Авторы</a></li>
                            <li class="breadcrumb-item active">Добавление нового автора</li>
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

            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="card card-teal w-50">
                        <div class="card-header">
                            <h3 class="card-title">Добавление автора</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('authors.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">

                                    <label for="name" class="form-label">Имя автора</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Фамилия, инициалы" value="{{old('name')}}">
                                </div>
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
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
