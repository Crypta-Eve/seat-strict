@extends('web::layouts.grids.4-4-4')

@section('title', trans('strict::strict.configure'))
@section('page_header', trans('strict::strict.configure'))

@push('head')
<link rel="stylesheet" type="text/css" href="https://snoopy.crypta.tech/snoopy/seat-strict-configure.css" />
@endpush

@section('left')
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">{{ trans('strict::strict.strict') }} Settings</h3>
    </div>
    <form method="POST" action="{{ route('strict.savesettings')  }}" class="form-horizontal">

        <div class="card-body">
            {{ csrf_field() }}

            <h5>Plugin Enable</h5>

            <!-- Global Enable -->
            <div class="form-group row">
                <label for="globalenable" class="col-sm-6 control-label">Global Enable</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        @if (setting('crypta_strict_enable', true) == "1")
                        <input class="form-check-input" type="checkbox" name="globalenable" id="globalenable" value="1" checked />
                        @else
                        <input class="form-check-input" type="checkbox" name="globalenable" id="globalenable" value="1" />
                        @endif
                    </div>
                </div>
            </div>

            <h5>What to Remove</h5>

            <!-- Remove Squads -->
            <div class="form-group row">
                <label for="removesquads" class="col-sm-6 control-label">Remove Squads?</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        @if (setting('crypta_strict_remove_squads', true) == "1")
                        <input class="form-check-input" type="checkbox" name="removesquads" id="removesquads" value="1" checked />
                        @else
                        <input class="form-check-input" type="checkbox" name="removesquads" id="removesquads" value="1" />
                        @endif
                    </div>
                </div>
            </div>

            <!-- Remove Mods -->
            <div class="form-group row">
                <label for="removemods" class="col-sm-6 control-label">Remove Moderators?</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        @if (setting('crypta_strict_remove_mods', true) == "1")
                        <input class="form-check-input" type="checkbox" name="removemods" id="removemods" value="1" checked />
                        @else
                        <input class="form-check-input" type="checkbox" name="removemods" id="removemods" value="1" />
                        @endif
                    </div>
                </div>
            </div>

            <!-- Remove Roles -->
            <div class="form-group row">
                <label for="removeperms" class="col-sm-6 control-label">Remove Roles?</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        @if (setting('crypta_strict_remove_perms', true) == "1")
                        <input class="form-check-input" type="checkbox" name="removeperms" id="removeperms" value="1" checked />
                        @else
                        <input class="form-check-input" type="checkbox" name="removeperms" id="removeperms" value="1" />
                        @endif
                    </div>
                </div>
            </div>

            <h5>Reasons for Removal</h5>

            <!-- Invalid Tokens -->
            <div class="form-group row">
                <label for="tokeninvalid" class="col-sm-6 control-label">Invalid Token</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        @if (setting('crypta_strict_reasons_token', true) == "1")
                        <input class="form-check-input" type="checkbox" name="tokeninvalid" id="tokeninvalid" value="1" checked />
                        @else
                        <input class="form-check-input" type="checkbox" name="tokeninvalid" id="tokeninvalid" value="1" />
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input class="btn btn-success float-right" type="submit" value="Update">
        </div>
    </form>
</div>
@stop

@section('center')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Squads Filtering</h3>
    </div>

    <div class="card-body">


        <h5>Squad White/BlackList</h5>

        Coming Soon!

    </div>

    <div class="card-footer text-muted">
        Plugin developed by <a href="{{ route('strict.about') }}"> {!! img('characters', 'portrait', 96057938, 64, ['class' => 'img-circle eve-icon small-icon']) !!} Crypta Electrica</a>. <span class="float-right snoopy" style="color: #fa3333;"><i class="fas fa-signal"></i></span>
    </div>
</div>
@stop

@section('right')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Role Filtering</h3>
    </div>

    <div class="card-body">


        <h5>Role White/BlackList</h5>

        Coming Soon!

    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
@stop



@push('javascript')
@include('web::includes.javascript.id-to-name')
<script type="application/javascript">
    $(function() {

    });
</script>


@endpush
