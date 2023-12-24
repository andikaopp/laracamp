@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    List Orders Of Camps
                </div>
                <div class="card-body">
                    @include('components.alert')
                    <table class="table">
                        <thead>
                            <tr>
                                <td>User</td>
                                <td>Camp</td>
                                <td>Price</td>
                                <td>Register Data</td>
                                <td>Paid Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($checkouts as $checkout)
                                <tr>
                                    <td>{{$checkout->user->name}}</td>
                                    <td>{{$checkout->camp->title}}</td>
                                    <td>{{$checkout->camp->price}}k</td>
                                    <td>{{$checkout->created_at->format('M d Y')}}</td>
                                    <td>
                                        @if ($checkout->is_paid)
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-warning">Waiting</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$checkout->is_paid)
                                        <form action="{{route('admin.checkout.update', $checkout->id)}}" method="POST">
                                            @csrf
                                            <button class="btn btn-primary btn-sm">Set to Paid</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Camps Registered</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
