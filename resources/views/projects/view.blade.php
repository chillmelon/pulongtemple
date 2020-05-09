@extends('playout')
@section('title')
{{ $project_info->title }}
@endsection
@section('content')
{{ $project_info->content }}
@endsection
@section('total_amount')
{{ $project_info->total_amount }}
@endsection
@section('goal')
{{ $project_info->goal }}
@endsection
@section('progress')
{{ $project_info->total_amount/$project_info->goal*100 }}
@endsection