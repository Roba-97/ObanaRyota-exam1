@extends('layouts.authcommon')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('action')
login
@endsection

@section('content')
<div class="content-wrapper">
	<div class="about">
		<div class="about__inner">
			<h2 class="about__text inika-regular">
				Register
			</h2>
		</div>
	</div>

	<div class="register-form">
		<div class="register-form__inner">
			<form  action="/register" method="post">
				@csrf
				<div class="form__group">
					<div class="form__group-title">お名前</div>
					<div class="form__group-input">
						<input type="text" name="name" value="{{ old('name') }}" placeholder="例:山田　太郎"/>
					</div>
					@error('name')
					<div class="form__group-error">{{ $message }}</div>
					@enderror
				</div>
				<div class="form__group">
					<div class="form__group-title">メールアドレス</div>
					<div class="form__group-input">
						<input type="text" name="email" value="{{ old('email') }}" placeholder="例:test@example.com"/>
					</div>
					@error('email')
					<div class="form__group-error">{{ $message }}</div>
					@enderror
				</div>

				<div class="form__group">
					<div class="form__group-title">パスワード</div>
					<div class="form__group-input">
						<input type="password" name="password" placeholder="例:coachtech1106"/>
					</div>
					@error('password')
					<div class="form__group-error">{{ $message }}</div>
					@enderror
				</div>
				<div class="form__button">
					<button class="form__button-submit" type="submit">登録</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
