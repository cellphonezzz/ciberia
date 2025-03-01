@extends('layouts.admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Админ панель</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Главная</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-teal ">
                            <div class="inner">
                                <h3>{{count($authors)}}</h3>

                                <p>Список авторов</p>
                            </div>
                            <div class="icon">
                                <i class="ion fa-regular fa-user "></i>
                            </div>
                            <a href="{{route('authors.index')}}" class="small-box-footer">Подробнее <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-teal ">
                            <div class="inner">
                                <h3>{{count($books)}}</h3>

                                <p>Список книг</p>
                            </div>
                            <div class="icon">
                                <i class="ion fa-solid fa-book"></i>
                            </div>
                            <a href="{{route('authors.index')}}" class="small-box-footer">Подробнее <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-teal ">
                            <div class="inner">
                                <h3>{{count($genres)}}</h3>

                                <p>Список жанров</p>
                            </div>
                            <div class="icon">
                                <i class="ion fa-solid fa-images"></i>
                            </div>
                            <a href="{{route('authors.index')}}" class="small-box-footer">Подробнее <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card -->
        </section>
    </div>

@endsection
