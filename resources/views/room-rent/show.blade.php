@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">RoomRent {{ $roomrent->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/room-rent') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/room-rent/' . $roomrent->id . '/edit') }}" title="Edit RoomRent"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('roomrent' . '/' . $roomrent->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete RoomRent" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $roomrent->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $roomrent->user_id }} </td></tr><tr><th> Room Id </th><td> {{ $roomrent->room_id }} </td></tr><tr><th> End Rent </th><td> {{ $roomrent->end_rent }} </td></tr><tr><th> Rent Note </th><td> {{ $roomrent->rent_note }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
