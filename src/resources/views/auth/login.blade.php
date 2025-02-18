@extends('layouts.authcommon')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('action')
register
@endsection

@section('content')
<div class="content-wrapper">
	<div class="about">
		<div class="about__inner">
			<h2 class="about__text inika-regular">
				Login
			</h2>
		</div>
	</div>

	<div class="login-form">
		<div class="login-form__inner">
			<form class="" action="/login" method="post">
				@csrf
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
					<button class="form__button-submit" type="submit">ログイン</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
