@extends('installer::layouts.master')

@section('template_title')
    {{ trans('installer::installer_messages.final.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-flag-checkered fa-fw" aria-hidden="true"></i>
    {{ trans('installer::installer_messages.final.title') }}
@endsection

@section('container')

    @if(!empty(session('message')))
	@if(session('message')['dbOutputLog'])
		<p><strong><small>{{ trans('installer::installer_messages.final.migration') }}</small></strong></p>
		<pre><code>{{ session('message')['dbOutputLog'] }}</code></pre>
	@endif
    @endif

    <div class="buttons">
        <a href="{{ url('/') }}" class="button">{{ trans('installer::installer_messages.final.exit') }}</a>
    </div>

@endsection