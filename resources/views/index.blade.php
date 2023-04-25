@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Tests
        <small>Add New</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
@endsection

@section('main_content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-6">

                <div class="panel panel-default">
                                    <div class="panel-heading">Posts</div>
                                    <div class="panel-body">

                                        <a href="{{ url('/posts/create') }}" class="btn btn-primary btn-xs" title="Add New Post"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                                        <br/>
                                        <br/>
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th><th> Title </th><th> Content </th><th> Category </th><th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($posts as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->title }}</td><td>{{ $item->content }}</td><td>{{ $item->category }}</td>
                                                        <td>
                                                            <a href="{{ url('/admin/posts/' . $item->id) }}" class="btn btn-success btn-xs" title="View Post"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                                            <a href="{{ url('/admin/posts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                                            {!! Form::open([
                                                                'method'=>'DELETE',
                                                                'url' => ['/admin/posts', $item->id],
                                                                'style' => 'display:inline'
                                                            ]) !!}
                                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                                                        'type' => 'submit',
                                                                        'class' => 'btn btn-danger btn-xs',
                                                                        'title' => 'Delete Post',
                                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                                )) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="pagination-wrapper"> {!! $posts->render() !!} </div>
                                        </div>

                                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection