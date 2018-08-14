@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<ul>
			<li>{{ $district->name }}
				<ul>
					@foreach($district->thana as $thana)
					<li>{{ $thana->name }}</li>
					@endforeach
				</ul>
			</li>
		</ul>
	</div>
</div>
@endsection