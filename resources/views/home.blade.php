@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <div>
                        用户的角色为：{{ auth()->user()->getRoleNames() }}
                    </div>
                    <div>
                        @can('visit_home')
                            可以访问首页
                        @endcan
                    </div>
                    <div>
                        @can('edit_users')
                            可以修改用户
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
