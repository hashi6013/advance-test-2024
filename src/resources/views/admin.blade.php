@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
@endsection

@section('header-item')
@if(Auth::check())
<form class="logout-form" action="/logout" method="post">
    @csrf
    <button class="logout-link">logout</button>
</form>
@endif
@endsection



@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2 class="admin__title">Admin</h2>
    </div>
    <!-- 検索機能 -->
    <form class="form" action="/admin" method="get">
        @csrf
        <div class="form__group">
            <input class="form__group-input--keyword" type="text" name="keyword" value="" placeholder="名前やメールアドレスを入力してください">
            <select name="gender" id="">
                <option hidden value="">性別</option>
                <option value="">全て</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
            <select name="category_id" id="">
                <option hidden value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
            <input class="form__group-input--date" type="date" name="until">
            <div class="form__button">
                <button class="form__button-submit" type="submit">検索</button>
            </div>
            <div class="form__button--fix">
                <button class="form__button-submit--back" type="submit" name="reset" value="reset">リセット</button>
            </div>
        </div>
    </form>

    <div class="form-sub">
        <form class="form-csv" action="/download_csv" method="get">
            <button class="csv">エクスポート</button>
        </form>
        <div class="paginate">
        {{ $contacts->appends(request()->query())->links() }}
        </div>
    </div>

    <table class="admin-table">
        <tr class="admin-table__row">
            <th class="admin-table__header">お名前</th>
            <th class="admin-table__header">性別</th>
            <th class="admin-table__header">メールアドレス</th>
            <th class="admin-table__header">お問い合わせの種類</th>
            <th class="admin-table__header"></th>
        </tr>
        <?php
        $i = 0;
        ?>
        @foreach ($contacts as $contact)
        <?php
        $i++;
        ?>
        <tr class="admin-table__row">
            <td class="admin-table__description">{{ $contact->last_name }}&nbsp;{{ $contact->first_name }}</td>
            <td class="admin-table__description">
                @if ($contact->gender == '1')
                {{'男性'}}
                @elseif ($contact->gender == '2')
                {{'女性'}}
                @else
                {{'その他'}}
                @endif
            </td>
            <td class="admin-table__description">{{$contact->email}}</td>
            <td class="admin-table__description">{{$contact->category->content}}</td>

            <!-- モーダル -->
            <td class="modal-button">
                <button type="button" class="modal-button__item" data-toggle="modal" data-target="#testModal<?= $i ?>">詳細</button>
            </td>
            <!-- モーダル本体 -->
            <div class="modal fade" id="testModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="modal-header__danger" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <dl>
                                <div class="modal-layout">
                                    <dt class="modal-body__term">お名前</dt>
                                    <dd class="modal-body__description">{{$contact->last_name}}&nbsp;{{$contact->first_name}}</dd>
                                </div>
                                <div class="modal-layout">
                                    <dt class="modal-body__term">性別</dt>
                                    <dd class="modal-body__description">@if ($contact->gender == '1')
                                        {{'男性'}}
                                        @elseif ($contact->gender == '2')
                                        {{'女性'}}
                                        @else
                                        {{'その他'}}
                                        @endif
                                    </dd>
                                </div>
                                <div class="modal-layout">
                                    <dt class="modal-body__term">メールアドレス</dt>
                                    <dd class="modal-body__description">{{$contact->email}}</dd>
                                </div>
                                <div class="modal-layout">
                                    <dt class="modal-body__term">電話番号</dt>
                                    <dd class="modal-body__description">{{$contact->tel}}</dd>
                                </div>
                                <div class="modal-layout">
                                    <dt class="modal-body__term">住所</dt>
                                    <dd class="modal-body__description">{{$contact->address}}</dd>
                                </div>
                                <div class="modal-layout">
                                    <dt class="modal-body__term">建物名</dt>
                                    <dd class="modal-body__description">{{$contact->building}}</dd>
                                </div>
                                <div class="modal-layout">
                                    <dt class="modal-body__term">お問い合わせの種類</dt>
                                    <dd class="modal-body__description">{{$contact->category->content}}</dd>
                                </div>
                                <div class="modal-layout">
                                    <dt class="modal-body__term">お問い合わせ内容</dt>
                                    <dd class="modal-body__description">{{$contact->detail}}</dd>
                                </div>
                            </dl>
                        </div>
                        <div class="modal-footer">
                            <form class="delete-form" action="/admin" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                                <button class="delete__button" type="submit">削除</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </tr>
        @endforeach
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection