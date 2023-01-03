@extends('layouts.app')

@if (Auth::user()->type == "admin")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mx-auto" style="margin: auto">
                <h3>Reports List</h3>
                <br>
            </div>

            @forelse ($reports as $report)
            <div class="card">

                <div class="card-header d-flex justify-content-between" style="border-bottom-width: 0px;">
                    <span class="pl-0" style="margin-top: auto; margin-bottom: auto;">
                        {{$report->created_at}}
                    </span>

                    <span style="margin: auto; text-align: center;">
                        <span class="text-dark font-weight-bold">Status : </span>

                        @if ($report->status == 'unchecked')
                            <span class="text-warning font-weight-bold">{{$report->status}}</span>
                        @else
                            <span class="text-success font-weight-bold">{{$report->status}}</span>
                        @endif
                    </span>
                    <form method="POST" action="/report/update">
                    @csrf
                    <span>
                        @if ($report->user_id == null)
                            <a href="{{'post/'.$report->post_id}}" class="btn btn-outline-dark btn-sm" role="button" style="">Check</a>
                        @elseif ($report->post_id == null)
                        <a href="{{'@'.$report->user->username}}" class="btn btn-outline-dark btn-sm" role="button" style="">Check</a>
                        @endif
                        <input type="hidden" name="report_id" value="{{$report->id}}" />
                        <input type="hidden" name="status" value="validated" />
                        @if ($report->status == 'unchecked')
                            <button type="submit" class="btn btn-success btn-sm">Finish</button>
                        @else
                            <button type="" class="btn btn-success btn-sm" disabled>Finish</button>
                        @endif
                    </span>
                    </form>
                </div>
            <x-cardrow label="report_id" :value="$report->id"/>
            @if ($report->user_id == null)
                <x-cardrow label="type" :value="'post'"/>
                <x-cardrow label="post_id" :value="$report->post_id"/>
                <x-cardrow label="post created_at" :value="$report->post->created_at"/>
            @elseif ($report->post_id == null)
                <x-cardrow label="type" :value="'user'"/>
                <x-cardrow label="user_id" :value="$report->user_id"/>
                <x-cardrow label="user created_at" :value="$report->user->created_at"/>
            @endif

            <x-cardrow label="report description" :value="$report->description"/>
            </div>
            <br>
            @empty
                <p> Tidak ditemukan. </p>
            @endforelse
        </div>
    </div>
</div>
<script>
</script>
@endsection
@else
@section('content')
<div class="container">
    <div class="center">
        <h3>You don't have access to this page.</h3>
    </div>
</div>
@endsection
@endif
