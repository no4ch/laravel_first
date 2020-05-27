@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <div class="container mt-3">
        @if(!empty($groups))
            <h1>Select your group</h1>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <form action="/home" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="groupFormControlSelect">Groups</label>
                            <select class="form-control" id="groupFormControlSelect" name="group_id">
                                @forelse($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Select group</button>
                        </div>
                    </form>
                    <p></p>
                </div>
            </div>
        @else
            <h1>Groups empty</h1>
        @endif
    </div>
@endsection

{{--<div class="row justify-content-center">--}}
{{--    <div class="col-md-8">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">Dashboard</div>--}}

{{--            <div class="card-body">--}}
{{--                @if (session('status'))--}}
{{--                    <div class="alert alert-success" role="alert">--}}
{{--                        {{ session('status') }}--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                You are logged in!--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
