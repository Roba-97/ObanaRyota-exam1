@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="about">
	<div class="about__inner">
		<h2 class="about__text inika-regular">
			Contact
		</h2>
	</div>
</div>

<div class="contact-form">
	<div class="contact-form__inner">
		<form class="form inika-regular" action="/confirm" method="post">
			@csrf
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">お名前</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text">
						<input type="text" placeholder="例:テスト太郎"/>
					</div>
				</div>
			</div>
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">性別</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--radio">
						<input type="radio"/><label>男</label>
						<input type="radio"/><label>女</label>
						<input type="radio"/><label>その他</label>
					</div>
				</div>
			</div>
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">メールアドレス</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text">
						<input type="text" placeholder="例:test@example.com"/>
					</div>
				</div>
			</div>
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">電話番号</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text">
						<input type="text" placeholder="090-1234-5678"/>
					</div>
				</div>
			</div>
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">住所</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text">
						<input type="text" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3"/>
					</div>
				</div>
			</div>
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">建物名</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text">
						<input type="text" placeholder="例:千駄ヶ谷マンション101"/>
					</div>
				</div>
			</div>
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">お問合せの種類</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--select">
						<select>
							<option value="" disabled selected hidden>選択してください</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">お問合せの種類</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text">
						<textarea cols="30" rows="6" placeholder="お問い合わせ内容をご記載ください"></textarea>
					</div>
				</div>
			</div>
			<div class="form__button">
        <button class="form__button-submit" type="submit">確認画面</button>
      </div>
		</form>
	</div>
</div>

@endsection