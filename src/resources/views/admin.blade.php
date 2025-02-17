@extends('layouts.authcommon')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="about">
	<div class="about__inner">
		<h2 class="about__text inika-regular">
			Admin
		</h2>
	</div>
</div>

<div class="admin-content">
	<div class="admin-search">
		<from class="admin-search__form" action="/admin/search" method="post">
			<div class="admin-search__from-text">
				<input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" size="20">
			</div>
			<div class="admin-search__form-select">
				<select name="gender" >
					<option value="" disabled selected hidden>性別</option>
					<option value="1">男</option>
					<option value="2">女</option>
					<option value="3">その他</option>
				</select>
			</div>
			<div class="admin-search__form-select">
				<select name="category_id" >
					<option value="" disabled selected hidden>お問い合わせの種類</option>
					@foreach($categories as $category)
					<option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="admin-search__form-date">
				<input type="date">
			</div>
			<div class="admin-search__form-button">
				<button class="admin-search__form-button--submit" type="submit">検索</button>
			</div>
			<div class="admin-search__form-button">
				<a class="admin-search__form-button--reset" href="/admin">リセット</a>
			</div>
		</from>
	</div>

	<div class="admin-links"></div>
	<div class="admin-table">
		<table class="admin-table__inner">
			<tr class="admin-table__row">
				<th class="admin-table__header">お名前</th>
				<th class="admin-table__header">性別</th>
				<th class="admin-table__header">メールアドレス</th>
				<th class="admin-table__header">お問い合わせの種類</th>
			</tr>
			<tr class="admin-table__row">
				<td class="admin-table__text">山田太郎</td>
				<td class="admin-table__text">男</td>
				<td class="admin-table__text">サンプルメール</td>
				<td class="admin-table__text">サンプル種類</td>
			</tr>
		</table>
	</div>
</div>
@endsection
