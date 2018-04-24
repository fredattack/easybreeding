{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('maleId', 'MaleId:') !!}
			{!! Form::text('maleId') !!}
		</li>
		<li>
			{!! Form::label('felmaleId', 'FelmaleId:') !!}
			{!! Form::text('felmaleId') !!}
		</li>
		<li>
			{!! Form::label('cage_id', 'Cage_id:') !!}
			{!! Form::text('cage_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}