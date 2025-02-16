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
			<div class="form__group form__group--first">
				<div class="form__group-title">
					<span class="form__group-title--label">お名前</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text-two">
						<input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例:山田"/>
						<input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例:太郎"/>
					</div>
				</div>
			</div>
			@if ($errors->has('last_name') || $errors->has('first_name'))
    	<div class="form__error">
        <div class="form__error-void"></div>
				<div class="form__error-massage">
					<div class="form__error-massage--name">
						<span>
						@if ($errors->has('last_name'))
							{{ $errors->first('last_name') }}
						@endif
						</span>
						<span>
						@if ($errors->has('first_name'))
							{{ $errors->first('first_name') }}
						@endif
						</span>
					</div>
				</div>
			</div>
			@endif
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">性別</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--radio">
						<input type="radio" id="male" name="gender" value="1" checked/><label for="male">男性</label>
						<input type="radio" id="female" name="gender" value="2"/><label for="female">女性</label>
						<input type="radio" id="other" name="gender" value="3"/><label for="other">その他</label>
					</div>
				</div>
			</div>
			@error('gender')
			<div class="form__error">
        <div class="form__error-void"></div>
				<div class="form__error-massage">{{ $message }}</div>
			</div>
			@enderror
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">メールアドレス</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text">
						<input type="text" name="email" value="{{ old('email') }}" placeholder="例:test@example.com"/>
					</div>
				</div>
			</div>
			@error('email')
			<div class="form__error">
        <div class="form__error-void"></div>
				<div class="form__error-massage">{{ $message }}</div>
			</div>
			@enderror
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">電話番号</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text-three">
						<input type="tel" name="tel-1" value="{{ old('tel-1') }}" placeholder="080"/><span>-</span>
						<input type="tel" name="tel-2" value="{{ old('tel-2') }}" placeholder="1234"/><span>-</span>
						<input type="tel" name="tel-3" value="{{ old('tel-3') }}" placeholder="5678"/>
					</div>
				</div>
			</div>
			@foreach (['tel-1', 'tel-2', 'tel-3'] as $tel)
				@error($tel)
					<div class="form__error">
        		<div class="form__error-void"></div>
						<div class="form__error-massage">{{ $message }}</div>
					</div>
					@break
				@enderror
			@endforeach
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">住所</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text">
						<input type="text" name="address" value="{{ old('address') }}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3"/>
					</div>
				</div>
			</div>
			@error('address')
			<div class="form__error">
        <div class="form__error-void"></div>
				<div class="form__error-massage">{{ $message }}</div>
			</div>
			@enderror
			<div class="form__group">
				<div class="form__group-title">
					<span class="form__group-title--label">建物名</span>
				</div>
				<div class="form__group-input">
					<div class="form__group-input--text">
						<input type="text" name="building" value="{{ old('building') }}" placeholder="例:千駄ヶ谷マンション101"/>
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
						<select name="category_id">
							<option value="" disabled selected hidden>選択してください</option>
							@foreach($categories as $category)
							<option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			@error('category_id')
			<div class="form__error">
        <div class="form__error-void"></div>
				<div class="form__error-massage">{{ $message }}</div>
			</div>
			@enderror
			<div class="form__group form__group--last">
				<div class="form__group-title">
					<span class="form__group-title--label">お問合せ内容</span>
					<span class="form__group-title--required">※</span>
				</div>
				<div class="form__group-input--last">
					<div class="form__group-input--text">
						<textarea name="detail" cols="30" rows="6" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
					</div>
				</div>
			</div>
			@error('detail')
			<div class="form__error">
        <div class="form__error-void"></div>
				<div class="form__error-massage">{{ $message }}</div>
			</div>
			@enderror
			<div class="form__button">
        <button class="form__button-submit" type="submit">確認画面</button>
      </div>
		</form>
	</div>
</div>

@endsection