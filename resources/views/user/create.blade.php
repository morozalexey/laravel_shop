@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить категорию</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Выбранная страница</li>
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
                <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <input type="text" name="surname" class="form-control" value="{{old('surname')}}" placeholder="Фамилия">
                    </div>
                    <div class="form-group">
                        <input type="text" name="patronymic" class="form-control" value="{{old('patronymic')}}" placeholder="Отчество">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}" placeholder="Подтверждение пароля">
                    </div>
                    <div class="form-group">
                        <input type="text" name="age" class="form-control" value="{{old('age')}}" placeholder="Возраст">
                    </div>
                    <div class="form-group">
                        <select name="gender" id="" class="custom-select form-control">
                            <option disabled selected>Пол</option>
                            <option {{old('gender') == 1 ? 'selected': ''}} value="1">Мужской</option>
                            <option {{old('gender') == 2 ? 'selected': ''}} value="2">Женский</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" value="{{old('address')}}" placeholder="Адрес">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
