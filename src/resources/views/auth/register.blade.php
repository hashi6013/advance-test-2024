@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-item')
<div class="nav">
    <a class="nav-link" href="/login">login</a>
</div>

@endsection

@section('content')
<div class="register__content">
    <div class="register__heading">
        <h2 class="register__title">Register</h2>
    </div>
    <form class="form" action="/register" method="post">
        @csrf
        <!-- お名前 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="name">
                    <p class="form__label--item">お名前</p>
                </label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" id="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
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
            <button class="form__button-submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection