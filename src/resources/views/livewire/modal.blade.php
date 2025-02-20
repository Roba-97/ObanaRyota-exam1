<div>
  <button wire:click="openModal()" type="button">
		詳細
  </button>
	@if($showModal)
	<div class="modal">
		<div class="modal-content">
			<div class="modal-content__close">
				<button wire:click="closeModal()">×</button>
			</div>
			<table class="modal-content__inner">
				<tr class="modal-table__row">
					<th class="modal-table__header">お名前</th>
					<td class="modal-table__text">{{ $contact['last_name']."　".$contact['first_name']}}</td>
				</tr>
				<tr class="modal-table__row">
					<th class="modal-table__header">性別</th>
					<td class="modal-table__text">
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
				</tr>
				<tr class="modal-table__row">
					<th class="modal-table__header">メールアドレス</th>
					<td class="modal-table__text">{{ $contact['email'] }}</td>
				</tr>
				<tr class="modal-table__row">
					<th class="modal-table__header">電話番号</th>
					<td class="modal-table__text">{{ $contact['tel'] }}</td>
				</tr>
				<tr class="modal-table__row">
					<th class="modal-table__header">住所</th>
					<td class="modal-table__text">{{ $contact['address'] }}</td>
				</tr>
				<tr class="modal-table__row">
					<th class="modal-table__header">建物名</th>
					<td class="modal-table__text">{{ $contact['building'] }}</td>
				</tr>
				<tr class="modal-table__row">
					<th class="modal-table__header">お問い合わせの種類</th>
					<td class="modal-table__text">{{ $contact->category->content}}</td>
				</tr>
				<tr class="modal-table__row">
					<th class="modal-table__header modal-table__header--last">お問い合わせの内容</th>
					<td class="modal-table__text modal-table__text--last">{!! nl2br(e($contact['detail'] )) !!}</td>
				</tr>
			</table>
			<div class="modal-content__delete">
				<form action="/admin/delete/{{ $contact['id'] }}" method="post" class="modal-content__delete-button">
					@csrf
					@method('delete')
					<button wire:click="deleteContact({{ $contact['id'] }})">削除</button>
				</form>
			</div>
		</div>
	</div>
	@endif
</div>
