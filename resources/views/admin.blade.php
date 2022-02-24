@extends('layouts.app')

@section('content')

@push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

<div class="container">
    @include('layouts.user_modal')
    <div class="row justify-content-left mb-2">
        <div class="col-lg-12">
            @if(session()->has('deleted_message'))
                <div class="alert alert-danger">
                    {{ session()->get('deleted_message') }}
                </div>
            @endif
        </div>
        <div class="col-lg-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
        <div class="col-md-8 mb-4">
            <h2>Usuarios</h2>
            <button class="btn btn-primary mt-4" data-toggle="modal" data-target="#registerModal" id="add">Añadir usuario</button>
            <a class="btn btn-success mt-4" href="{{route('home.mails')}}" id="mail">Email</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id='users' class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Cédula</th>
                        <th>Fecha de nacimiento</th>
                        <th>Edad</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
    $("#add").on('click', function(){
        $("#id").val("");
        $("#name").val("");
        $("#id_number").val("").removeAttr("readonly");
        $("#birthday").val("");
        $("#phone").val("");

        $('#country option').each(function() {
            if (this.text !== 'Seleccione un país') {
                this.remove();
            }
        });

        $('#state option').each(function() {
            if (this.text !== '-') {
                this.remove();
            }
        });

        $('#city option').each(function() {
            if (this.text !== '-') {
                this.remove();
            }
        });

        $("#email").val("").removeAttr("readonly");
    })
   
    $(document).ready(function() {
        $('#users').DataTable({
            'serverSide': true,
            'ajax': '{{url('users')}}',
            'columns': [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'phone_number'},
                {data: 'id_number'},
                {data: 'birthday'},
                {data: 'age'},
                {data: 'btn'}
            ]
        });
    } );
    
</script>
@endpush