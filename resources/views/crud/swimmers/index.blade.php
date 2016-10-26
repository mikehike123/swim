@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Swimmers</div>
                    <div class="panel-body">

                        <a href="{{ url('/crud/swimmers/create') }}" class="btn btn-primary btn-xs" title="Add New Swimmer"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> First Name </th><th> Last Name </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($swimmers as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->First_Name }}</td><td>{{ $item->Last_Name }}</td>
                                        <td>
                                            <a href="{{ url('/crud/swimmers/' . $item->id) }}" class="btn btn-success btn-xs" title="View Swimmer"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/crud/swimmers/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Swimmer"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/crud/swimmers', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Swimmer" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Swimmer',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $swimmers->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection