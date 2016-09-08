@extends('layouts.app')

@section('content')

  {{Form::select('Tipo[]', $bomberos,null,['class' => 'form-control','id'=>'lsbomberos','multiple'=>'multiple'])}}

<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/dropdown.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-multiselect.js"></script>

@endsection
