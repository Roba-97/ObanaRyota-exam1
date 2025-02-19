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
						<input type="hidden" name="last_name" value="{{ $contact['last_name'] }}"/>
						<input type="hidden" name="first_name" value="{{ $contact['first_name'] }}"/>
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
					<input type="hidden" name="gender" value="{{ $contact['gender'] }}"/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">メールアドレス</th>
					<td class="confirm-table__text">
						{{ $contact['email'] }}
						<input type="hidden" name="email" value="{{ $contact['email'] }}"/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">電話番号</th>
					<td class="confirm-table__text">
						{{ $contact['tel'] }}
						<input type="hidden" name="tel" value="{{ $contact['tel'] }}"/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">住所</th>
					<td class="confirm-table__text">
						{{ $contact['address'] }}
						<input type="hidden" name="address" value="{{ $contact['address'] }}"/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">建物名</th>
					<td class="confirm-table__text">
						{{ $contact['building'] }}
					<input type="hidden" name="building" value="{{ $contact['building'] }}"/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">お問い合わせの種類</th>
					<td class="confirm-table__text">
						{{ $category['content'] }}
						<input type="hidden" name="category_id" value="{{ $contact['category_id'] }}"/>
					</td>
				</tr>
				<tr class="confirm-table__row">
					<th class="confirm-table__header">お問い合わせの内容</th>
					<td class="confirm-table__text confirm-table__text--last">
						{!! nl2br(e($contact['detail'] )) !!}
						<input type="hidden" name="detail" value="{{ $contact['detail'] }}"/>
					</td>
				</tr>
			</table>
			<div class="form__button">
        <button class="form__button-submit" type="submit">送信</button>
				<a class="form__button-fix" href="/back">修正</a>
      </div>
		</form>
	</div>
</div>

@endsection
