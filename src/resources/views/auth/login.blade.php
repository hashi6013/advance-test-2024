@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-item')
<div class="nav">
    <a class="nav-link" href="/register">register</a>
</div>


@endsection

@section('content')
<div class="login__content">
    <div class="login__heading">
        <h2 class="login__title">Login</h2>
    </div>
    <form class="form" action="/login" method="post">
        @csrf
        <!-- メールアドレス -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="email">
                    <p class="form__label--item">メールアドレス</p>
                </label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="email" id="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <!-- パスワード -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="password">
                    <p class="form__label--item">パスワード</p>
                </label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="password" name="password" id="password" placeholder="例: coachtech1106" value="{{ old('password') }}">
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- ボタン -->
        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection