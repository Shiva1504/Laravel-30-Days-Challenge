@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <h2>User List</h2>

    @php
        $users = ['Shiva', 'Lakshman', 'Anjali', 'Ravi'];
    @endphp

    @if(count($users) > 0)
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">
                    {{ $loop->iteration }}. {{ $user }}
                    @if($loop->first)
                        <span class="badge bg-success">First</span>
                    @endif
                    @if($loop->last)
                        <span class="badge bg-info">Last</span>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>No users found.</p>
    @endif

    @include('partials.footer')
@endsection