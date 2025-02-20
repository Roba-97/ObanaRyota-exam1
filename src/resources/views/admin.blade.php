@extends('layouts.authcommon')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
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
			<div class="admin-search__from-text">
				<input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">
			</div>
			<div class="admin-search__form-select">
				<select name="gender">
					<option value="" disabled hidden {{ request('gender') == '' ? 'selected' : '' }}>性別</option>
					<option value="0" {{ request('gender') == '0' ? 'selected' : '' }}>全て</option>
            		<option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
            		<option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
            		<option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
				</select>
			</div>
			<div class="admin-search__form-select">
				<select name="category_id">
					<option value="" disabled hidden {{ request('category_id') == '' ? 'selected' : '' }}>
						お問い合わせの種類
					</option>
					@foreach($categories as $category)
					<option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    	{{ $category->content }}
                	</option>
					@endforeach
				</select>
			</div>
			<div class="admin-search__form-date">
				<input type="date" name="date" value="{{ request('date') }}">
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
			<form class="admin-links__export-button" action="/admin/export" method="post">
				@csrf
				<input type="hidden" name="keyword" value="{{ request('keyword') }}">
				<input type="hidden" name="gender" value="{{ request('gender') }}">
				<input type="hidden" name="category_id" value="{{ request('category_id') }}">
				<input type="hidden" name="date" value="{{ request('date') }}">
				<button>エクスポート</button>
			</form>
		</div>
		<div class="admin-links__paginate">{{ $contacts->appends(request()->query())->links() }}</div>
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
					<div class="detail-button">
						@livewire('modal', ['contact'=> $contact])
					</div>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

@livewireScripts

@endsection
