@extends('layouts.app')

@section('title', 'Регистрация')


@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

                <form method="POST" action="">
                    @csrf

                    <div class="form-group">
                        <label for="password" class="col-form-label-lg">имя</label>
                        <input class="form-control" id="name" name="name" type="name" value="" placeholder="имя">
                        @error('name')
                        <div class=" alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-from-label-lg"> Ваш email</label>
                        <input class="form-control" id="email" name="email" type="text" placeholder="Email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>

                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label-lg">пароль</label>
                        <input class="form-control" id="password" name="password" type="password" value="" placeholder="пароль">
                        @error('password')
                        <div class=" alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary" type="submit" name="sendMe" value="l">Регистарция</button>
                    </div>

                </form>
        </div>
    </div>
@endsection
