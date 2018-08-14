@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<ul>
			@foreach($thanas as $thana)
				<li>{{ $thana->name }}</li>
			@endforeach
		</ul>
	</div>
</div>
<form class="col-md-4 col-md-offset-4" method="POST" action="{{ route('thanastore') }}">
{{ csrf_field() }}

<div class="form-group">

    <input type="text"  class="form-control" id="name" name="name" value="{{old('name')}}" required>

</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Publish</button>
</div>


@if (count($errors))
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
</form>
@endsection
