@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Отедактировать категорию</h1>
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
                <form action="{{route('user.update', $user->id)}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{$user->name ?? old('name')}}" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <input type="text" name="surname" class="form-control" value="{{$user->surname ?? old('surname')}}" placeholder="Фамилия">
                    </div>
                    <div class="form-group">
                        <input type="text" name="patronymic" class="form-control" value="{{$user->patronymic ?? old('patronymic')}}" placeholder="Отчество">
                    </div>
                    <div class="form-group">
                        <input type="text" name="age" class="form-control" value="{{$user->age ?? old('age')}}" placeholder="Возраст">
                    </div>
                    <div class="form-group">
                        <select name="gender" id="" class="custom-select form-control">
                            <option disabled selected>Пол</option>
                            <option {{$user->gender == 1 || old('gender') == 1 ? 'selected': ''}} value="1">Мужской</option>
                            <option {{$user->gender == 2 || old('gender') == 2 ? 'selected': ''}} value="2">Женский</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" value="{{$user->address ?? old('name')}}" placeholder="Адрес">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Изменить">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
