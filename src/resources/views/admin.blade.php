@extends('layouts.authcommon')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
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
		<form class="admin-search__form" action="/admin/search" method="get">
			@csrf
			<div class="admin-search__from-text">
				<input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" size="20">
			</div>
			<div class="admin-search__form-select">
				<select name="gender" >
					<option value="" disabled selected hidden>性別</option>
					<option value="0">全て</option>
					<option value="1">男性</option>
					<option value="2">女性</option>
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
				<input type="date" name="date">
			</div>
			<div class="admin-search__form-button">
				<button  class="admin-search__form-button--submit" type="submit">検索</button>
			</div>
			<div class="admin-search__form-button">
				<a class="admin-search__form-button--reset" href="/admin">リセット</a>
			</div>
		</form>
	</div>

	<div class="admin-links">		
		<div class="admin-links__export">
			<form class="admin-links__export-button" action=""><button>エクスポート</button></form>
		</div>
		<div class="admin-links__paginate">{{ $contacts->links() }}</div>
	</div>

	<div class="admin-tabler">
		<table class="admin-table__inner">
			<tr class="admin-table__row">
				<th class="admin-table__header">お名前</th>
				<th class="admin-table__header">性別</th>
				<th class="admin-table__header">メールアドレス</th>
				<th class="admin-table__header">お問い合わせの種類</th>
				<th class="admin-table__header"></th>
			</tr>
			@foreach($contacts as $contact)
			<tr class="admin-table__row">
				<td class="admin-table__text">{{ $contact['last_name']."　".$contact['first_name']}}</td>
				<td class="admin-table__text">
					@switch( $contact['gender'] )
						@case(1)
							男性
							@break
						@case(2)
							女性
							@break
						@case(3)
							その他
							@break
						@default
					@endswitch
				</td>
				<td class="admin-table__text">{{ $contact['email'] }}</td>
				<td class="admin-table__text">{{ $contact->category->content }}</td>
				<td class="admin-table__text">
					<form class="detail-button" action="/admin/modal" method="post">
						<button type="submit">詳細</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection
