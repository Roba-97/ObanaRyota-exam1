@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

<div class="about">
	<div class="about__inner">
		<h2 class="about__text inika-regular">
			Confirm
		</h2>
	</div>
</div>

<div class="confirm-content">
	<div class="confirm-content__inner">
		<form action="/thanks" method="post">
			@csrf
			<table class="confirm-table inika-regular">
				<tr class="confirm-table__row">
					<th class="confirm-table__header">お名前</th>
					<td class="confirm-table__text">サンプルテキスト</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">性別</th>
					<td class="confirm-table__text">サンプルテキスト</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">メールアドレス</th>
					<td class="confirm-table__text">サンプルテキスト</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">電話番号</th>
					<td class="confirm-table__text">サンプルテキスト</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">住所</th>
					<td class="confirm-table__text">サンプルテキスト</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">建物名</th>
					<td class="confirm-table__text">サンプルテキスト</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">お問い合わせの種類</th>
					<td class="confirm-table__text">サンプルテキスト</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">お問い合わせの内容</th>
					<td class="confirm-table__text">サンプルテキスト</td>
				</tr>
			</table>
			<div class="form__button">
        <button class="form__button-submit" type="submit">送信</button>
				<a class="form__button-fix" href="/">修正</a>
      </div>
		</form>
	</div>
</div>

@endsection
