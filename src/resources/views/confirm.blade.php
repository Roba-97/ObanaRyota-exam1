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
					<td class="confirm-table__text">
						{{ $contact['last_name']."　".$contact['first_name']}}
						<input type="text" name="last_name" value="{{ $contact['last_name'] }}" hidden/>
						<input type="text" name="first_name" value="{{ $contact['first_name'] }}" hidden/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">性別</th>
					<td class="confirm-table__text">
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
					<input type="radio" name="gender" value="{{ $contact['gender'] }}" checked hidden/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">メールアドレス</th>
					<td class="confirm-table__text">
						{{ $contact['email'] }}
						<input type="text" name="email" value="{{ $contact['email'] }}" hidden/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">電話番号</th>
					<td class="confirm-table__text">
						{{ $contact['tel'] }}
						<input type="text" name="tel" value="{{ $contact['tel'] }}" hidden/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">住所</th>
					<td class="confirm-table__text">
						{{ $contact['address'] }}
						<input type="text" name="address" value="{{ $contact['address'] }}" hidden/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">建物名</th>
					<td class="confirm-table__text">
						{{ $contact['building'] }}
					<input type="text" name="building" value="{{ $contact['building'] }}" hidden/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">お問い合わせの種類</th>
					<td class="confirm-table__text">
						{{ $category['content'] }}
						<input type="text" name="category_id" value="{{ $contact['category_id'] }}" hidden/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">お問い合わせの内容</th>
					<td class="confirm-table__text">
						{{ $contact['detail'] }}
						<input type="text" name="detail" value="{{ $contact['detail'] }}" hidden/>
					</td>
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
