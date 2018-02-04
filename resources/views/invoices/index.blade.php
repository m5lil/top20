@extends('layouts.crud')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col">
                                <a href="{{ url('/invoices/create') }}" class="btn btn-success btn-sm"
                                   title="Add New Invoice">
                                    <i class="fa fa-plus" aria-hidden="true"></i> إضافة
                                </a>
                            </div>
                            <div class="col">
                                {!! Form::open(['method' => 'GET', 'url' => '/invoices', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..."
                                           value="{{ request('search') }}">
                                    <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Item Id</th>
                                    <th>Client Id</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->item_id }}</td>
                                        <td>{{ $item->client_id }}</td>
                                        <td>
                                            <a href="{{ url('/invoices/' . $item->id) }}" title="View Invoice">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                       aria-hidden="true"></i></button>
                                            </a>
                                            <a href="{{ url('/invoices/' . $item->id . '/edit') }}"
                                               title="Edit Invoice">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"
                                                                                          aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/invoices', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Delete Invoice',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $invoices->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
