{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('species_id', 'Species_id:') !!}
			{!! Form::text('species_id') !!}
		</li>
		<li>
			{!! Form::label('sexe', 'Sexe:') !!}
			{!! Form::text('sexe') !!}
		</li>
		<li>
			{!! Form::label('sexingMethod', 'SexingMethod:') !!}
			{!! Form::text('sexingMethod') !!}
		</li>
		<li>
			{!! Form::label('Origine', 'Origine:') !!}
			{!! Form::text('Origine') !!}
		</li>
		<li>
			{!! Form::label('idType', 'IdType:') !!}
			{!! Form::text('idType') !!}
		</li>
		<li>
			{!! Form::label('idNum', 'IdNum:') !!}
			{!! Form::text('idNum') !!}
		</li>
		<li>
			{!! Form::label('personal_id', 'Personal_id:') !!}
			{!! Form::text('personal_id') !!}
		</li>
		<li>
			{!! Form::label('breederNum', 'BreederNum:') !!}
			{!! Form::text('breederNum') !!}
		</li>
		<li>
			{!! Form::label('dateOfBirth', 'DateOfBirth:') !!}
			{!! Form::text('dateOfBirth') !!}
		</li>
		<li>
			{!! Form::label('disponibility', 'Disponibility:') !!}
			{!! Form::text('disponibility') !!}
		</li>
		<li>
			{!! Form::label('status', 'Status:') !!}
			{!! Form::text('status') !!}
		</li>
		<li>
			{!! Form::label('father_id', 'Father_id:') !!}
			{!! Form::text('father_id') !!}
		</li>
		<li>
			{!! Form::label('mother_id', 'Mother_id:') !!}
			{!! Form::text('mother_id') !!}
		</li>
		<li>
			{!! Form::label('mutation', 'Mutation:') !!}
			{!! Form::text('mutation') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}