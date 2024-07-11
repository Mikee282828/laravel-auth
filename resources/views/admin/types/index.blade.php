@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="m-0 p-2 text-center text-primary">Lista tipi</h1>
		<ul>
			@foreach ($types as $item)
				<li>
					{{$item->name}}
					<ul>
						<li>
							DESCRIPTION:
							{{$item->description}}
						</li>

						<li>
							ICON: <i class='{{$item->icon}}'></i>
						</li>

						<li>
							<a href="{{ route('admin.types.edit',$item->id)}}">MODIFY</a>
						</li>
					</ul>
				</li>
			@endforeach
		</ul>
	</div>
@endsection
