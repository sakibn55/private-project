@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<ul>
			<li>{{ $divisions->name }}
				<ul>
					@foreach($divisions->district as $district)
					<li>{{ $district->name }}</li>
					@endforeach
				</ul>
			</li>
		</ul>
	</div>
</div>
@endsection