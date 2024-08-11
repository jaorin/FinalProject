@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">

        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dormitory {{ $dormitory->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/dormitory') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/dormitory/' . $dormitory->id . '/edit') }}" title="Edit Dormitory"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <!-- <form method="POST" action="{{ url('dormitory' . '/' . $dormitory->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Dormitory" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $dormitory->id }}</td>
                                    </tr>
                                    <tr><th> Namedormi </th><td> {{ $dormitory->Namedormi }} </td></tr><tr><th> Address </th><td> {{ $dormitory->Address }} </td></tr><tr><th> Phone </th><td> {{ $dormitory->Phone }} </td></tr><tr><th> Bankaccount </th><td> {{ $dormitory->Bankaccount }} </td></tr><tr><th> Logobank </th><td> {{ $dormitory->Logobank }} </td></tr><tr><th> Photo </th><td> {{ $dormitory->Photo }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
