@extends('layouts.app')

@section('content')

@push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush
<div class="container">
    @include('layouts.mail_modal')
    <div class="row justify-content-left mb-2">
        <!-- <div class="col-lg-12">
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
        </div> -->
        <div class="col-md-8 mb-4">
            <h2>Email</h2>
            <button class="btn btn-primary mt-4" data-toggle="modal" data-target="#mailModal" id="write">Redactar</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table id='mails' class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Asunto</th>
                        <th>Fecha</th>
                        <th>Remitente</th>
                        <th>Estado</th>
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
    $(document).ready(function() {
        $('#mails').DataTable({
            'serverSide': true,
            'ajax': '{{url('mails')}}',
            'columns': [
                {data: 'id'},
                {data: 'subject'},
                {data: 'created_at'},
                {data: 'sender'},
                {data: 'status'},
                {data: 'btn'}
            ]
        });
    } );
</script>
@endpush