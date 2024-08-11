@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">

        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Income {{ $income->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/incomes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/incomes/' . $income->id . '/edit') }}" title="Edit Income"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <!-- <form method="POST" action="{{ url('incomes' . '/' . $income->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Income" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $income->id }}</td>
                                    </tr>
                                    <tr><th> Date </th><td> {{ $income->Date }} </td></tr><tr><th> Incomes </th><td> {{ $income->Incomes }} </td></tr><tr><th> Remark </th><td> {{ $income->remark }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
