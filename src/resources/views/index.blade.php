@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2 class="contact-form__title">Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <!-- お名前 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="last_name">
                    <span class="form__label--item">お名前</span>
                </label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__group-layout--name">
                    <div class="form__input--name">
                        <input type="text" name="last_name" id="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                    </div>
                    <div class="form__input--name">
                        <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                    </div>
                </div>
                <div class="form__error-layout--name">
                    <div class="form__error">
                        @error('last_name')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form__error">
                        @error('first_name')
                        {{ $message }}
                        @enderror
                    </div>

                </div>
                
            </div>
        </div>
        <!-- 性別 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <label>
                        <input type="radio" name="gender" value="1" checked>男性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="2" @if(old('gender') == "2") checked @endif>女性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="3" @if(old('gender') == "3") checked @endif>その他
                    </label>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- メールアドレス -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="email">
                    <span class="form__label--item">メールアドレス</span>
                </label>
                <span class="form__label--required">※</span>
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
        <!-- 電話番号 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="tel">
                    <span class="form__label--item">電話番号</span>
                </label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__group-layout--tel">
                    <div class="form__input--tel">
                        <input type="tel" name="tel1" id="tel" placeholder="080" value="{{ old('tel1') }}">
                    </div>
                    <span>-</span>
                    <div class="form__input--tel">
                        <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                    </div>
                    <span>-</span>
                    <div class="form__input--tel">
                        <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                    </div>
                </div>
                <div class="form__error-layout--tel">
                    <div class="form__error">
                        @error('tel1')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form__error">
                        @error('tel2')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form__error">
                        @error('tel3')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <!-- 住所 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="address">
                    <span class="form__label--item">住所</span>
                </label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" id="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 建物名 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="building">
                    <span class="form__label--item">建物名</span>
                </label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" id="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
                <div class="form__error">
                    @error('building')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- お問い合わせの種類 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="content">
                    <span class="form__label--item">お問い合わせの種類</span>
                </label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select">
                    <select name="category_id" id="content">
                        @foreach ($categories as $category)
                        <option hidden value="null">選択してください</option>
                        <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->content }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- お問い合わせ内容 -->
        <div class="form__group">
            <div class="form__group-title">
                <label for="detail">
                    <span class="form__label--item">お問い合わせ内容</span>
                </label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" id="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- ボタン -->
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection
