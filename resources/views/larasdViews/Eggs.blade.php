{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('layingDate', 'LayingDate:') !!}
			{!! Form::text('layingDate') !!}
		</li>
		<li>
			{!! Form::label('position', 'Position:') !!}
			{!! Form::text('position') !!}
		</li>
		<li>
			{!! Form::label('type', 'Type:') !!}
			{!! Form::text('type') !!}
		</li>
		<li>
			{!! Form::label('state', 'State:') !!}
			{!! Form::text('state') !!}
		</li>
		<li>
			{!! Form::label('remarque', 'Remarque:') !!}
			{!! Form::text('remarque') !!}
		</li>
		<li>
			{!! Form::label('idHatching', 'IdHatching:') !!}
			{!! Form::text('idHatching') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}