{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('idZone', 'IdZone:') !!}
			{!! Form::text('idZone') !!}
		</li>
		<li>
			{!! Form::label('idBird', 'IdBird:') !!}
			{!! Form::text('idBird') !!}
		</li>
		<li>
			{!! Form::label('long', 'Long:') !!}
			{!! Form::text('long') !!}
		</li>
		<li>
			{!! Form::label('large', 'Large:') !!}
			{!! Form::text('large') !!}
		</li>
		<li>
			{!! Form::label('hight', 'Hight:') !!}
			{!! Form::text('hight') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}