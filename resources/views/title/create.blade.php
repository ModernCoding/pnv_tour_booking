@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Add a new title"]
  )

@endsection


@section('content')

  @include(
    'title/_form',
    
    [
      'errors'              =>  $errors,
      'action'              =>  URL::action('TitleController@store'),
      'title'               =>  $title
    ]
  )

@endsection