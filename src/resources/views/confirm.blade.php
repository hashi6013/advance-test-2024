@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2 class="confirm__title">Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <!-- お名前 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly>
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly>
                        {{ $contact['last_name'] }}
                        &nbsp;
                        {{ $contact['first_name'] }}
                    </td>
                </tr>
                <!-- メールアドレス -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly>
                        @if ($contact['gender'] == '1')
                        {{'男性'}}
                        @elseif ($contact['gender'] == '2')
                        {{'女性'}}
                        @else
                        {{'その他'}}
                        @endif
                    </td>
                </tr>
                <!-- メールアドレス -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" readonly>
                        {{ $contact['email'] }}
                    </td>
                </tr>
                <!-- 電話番号 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}" readonly>
                        <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}" readonly>
                        <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}" readonly>
                        {{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}
                    </td>
                </tr>
                <!-- 住所 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="address" value="{{ $contact['address'] }}" readonly>
                        <!-- 住所 -->
                        {{ $contact['address'] }}
                    </td>
                </tr>
                <!-- 建物名 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" readonly>
                        {{ $contact['building'] }}
                    </td>
                </tr>
                <!-- お問い合わせの種類 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly>
                        @if ($contact['category_id'] == '1')
                        {{'商品のお届けについて'}}
                        @elseif($contact['category_id'] == '2')
                        {{'商品の交換について'}}
                        @elseif($contact['category_id'] == '3')
                        {{'商品トラブル'}}
                        @elseif($contact['category_id'] == '4')
                        {{'ショップへのお問い合わせ'}}
                        @else
                        {{'その他'}}
                        @endif
                    </td>
                </tr>
                <!-- お問い合わせ内容 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" readonly>
                        {{ $contact['detail'] }}
                    </td>
                </tr>
            </table>
        </div>
        <div class="form-button">
            <button class="form-button__submit" type="submit">送信</button>
            <button class="form-button__submit--back" type="submit" name="back" value="back">修正</button>
        </div>
    </form>
</div>

@endsection


