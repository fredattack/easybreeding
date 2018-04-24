{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('commonName_en', 'CommonName_en:') !!}
			{!! Form::text('commonName_en') !!}
		</li>
		<li>
			{!! Form::label('scientificName', 'ScientificName:') !!}
			{!! Form::text('scientificName') !!}
		</li>
		<li>
			{!! Form::label('Order', 'Order:') !!}
			{!! Form::text('Order') !!}
		</li>
		<li>
			{!! Form::label('Id_famillie', 'Id_famillie:') !!}
			{!! Form::text('Id_famillie') !!}
		</li>
		<li>
			{!! Form::label('subspecies', 'Subspecies:') !!}
			{!! Form::text('subspecies') !!}
		</li>
		<li>
			{!! Form::label('price', 'Price:') !!}
			{!! Form::text('price') !!}
		</li>
		<li>
			{!! Form::label('incubation', 'Incubation:') !!}
			{!! Form::text('incubation') !!}
		</li>
		<li>
			{!! Form::label('fertilityControl', 'FertilityControl:') !!}
			{!! Form::text('fertilityControl') !!}
		</li>
		<li>
			{!! Form::label('girdleDate', 'GirdleDate:') !!}
			{!! Form::text('girdleDate') !!}
		</li>
		<li>
			{!! Form::label('outOfNest', 'OutOfNest:') !!}
			{!! Form::text('outOfNest') !!}
		</li>
		<li>
			{!! Form::label('weaning', 'Weaning:') !!}
			{!! Form::text('weaning') !!}
		</li>
		<li>
			{!! Form::label('sexualMaturity', 'SexualMaturity:') !!}
			{!! Form::text('sexualMaturity') !!}
		</li>
		<li>
			{!! Form::label('spawningInterval', 'SpawningInterval:') !!}
			{!! Form::text('spawningInterval') !!}
		</li>
		<li>
			{!! Form::label('commonName_fr', 'CommonName_fr:') !!}
			{!! Form::text('commonName_fr') !!}
		</li>
		<li>
			{!! Form::label('commonName_nl', 'CommonName_nl:') !!}
			{!! Form::text('commonName_nl') !!}
		</li>
		<li>
			{!! Form::label('commonName_de', 'CommonName_de:') !!}
			{!! Form::text('commonName_de') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}