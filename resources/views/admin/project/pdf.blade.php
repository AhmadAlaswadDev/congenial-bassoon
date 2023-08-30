<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    body {
        border: 2px solid rgba(80, 5, 4, 0.443);
        padding: 15px !important;
    }

    .full-width {
        width: 100% !important;
    }

    .text-center {
        text-align: center !important;
    }

    .text-left {
        text-align: left !important;
    }

    .text-right {
        text-align: right !important;
    }

    .bold {
        font-weight: bold !important;
    }

    .parent-row {
        background-color: lightgray !important;
    }

    .stripped-table thead tr {
        background-color: lightgray !important;
    }

    .text-danger {
        color: red !important;
    }
    ul li{
        list-style: none !important;
    }

    #colored-tfoot tr{
        margin-top: 3% !important;
        color: red !important;
        background-color: lightgray !important;
    }

</style>

<body>
    {{-- Page Title --}}
    <div class="full-width text-center">
        <h2>{!! __('custom.pdf.page_title') !!}</h2>
    </div>
    {{-- Start  Basic Project Info --}}
    <div class="full-width {{ $text_direction }}" style="padding:0px 5px !important;">
        <ul style="list-style-type:none !important;">
            <li>
                <span class="bold">{{ __('custom.Project Name') }} :</span> {{ $project->name }}
            </li>
            <li>
                <span class="bold">{{ __('custom.Project No.') }} :</span> {{ $project->no }}
            </li>
            <li>
                <span class="bold">{{ __('custom.Land') }} :</span> {{ $project->land_area }} &nbsp;
                <span class="bold">{{ __('custom.Number') }} :</span> {{ $project->land_no }}
            </li>
            <li>
                <span class="bold">{{ __('custom.Client') }} :</span> {{ $project->client->name }}
            </li>
        </ul>
    </div>
    {{-- End Basic Project Info --}}

    <div class="full-width {{ $text_direction }}">
        <div class="full-width {{ $text_direction }}">
            <h3>{{ __('custom.pdf.project_details') }}</h4>
        </div>
        <ul style="list-style-type:none !important;">
            <li>
                <span class="bold">{{ __('custom.Budget') }} :</span> {{ $project->budget }}
            </li>
            <li>
                <span class="bold">{{ __('custom.Consultant') }} :</span> {{ $project->consultant->name }}
            </li>
            <li>
                <span class="bold">{{ __('custom.Consultant Total Budget') }} :</span>
                {{ $project->consultant_total_budget }} &nbsp;
            </li>
            <li>
                <span class="bold">{{ __('custom.Client') }} :</span> {{ $project->client->name }}
            </li>
        </ul>
    </div>

    <div class="full-width {{ $text_direction }}">
        <div class="full-width {{ $text_direction }}">
            <h3>{{ __('custom.pdf.project_phases') }}</h4>
        </div>
        <table class="full-width stripped-table {{ $text_direction }}" style="dir:rtl !important;">
            <thead>
                <tr>
                    @if ($text_direction == 'text-right')
                        <th>{{ __('custom.progress_status') }}</th>
                        <th>{{ __('custom.payment_status') }}</th>
                        <th>{{ __('custom.Budget') }}</th>
                        <th>{{ __('custom.Budget Rate') }}</th>
                        <th>{{ __('custom.Title') }}</th>
                    @else
                        <th>{{ __('custom.Title') }}</th>
                        <th>{{ __('custom.Budget Rate') }}</th>
                        <th>{{ __('custom.Budget') }}</th>
                        <th>{{ __('custom.payment_status') }}</th>
                        <th>{{ __('custom.progress_status') }}</th>
                    @endif

                </tr>
            </thead>
            <tbody>
                @foreach ($project->phases as $phase)
                    <tr class=" @if ($phase->subPhases()->count() > 0) parent-row @endif">
                        @if ($text_direction == 'text-right')
                            <td>{{ __('custom.' . $phase->progress_status) }}</td>
                            <td>{{ __('custom.' . $phase->payment_status) }}</td>
                            <td>{{ $phase->budget }}</td>
                            <td>{{ number_format($phase->budget_rate, 2) }}%</td>
                            <td>{{ $phase->title }}</td>
                        @else
                            <td>{{ $phase->title }}</td>
                            <td>{{ number_format($phase->budget_rate, 2) }}%</td>
                            <td>{{ $phase->budget }}</td>
                            <td>{{ __('custom.' . $phase->payment_status) }}</td>
                            <td>{{ __('custom.' . $phase->progress_status) }}</td>
                        @endif
                        {{-- start subphases --}}
                        @foreach ($phase->subPhases()->get() as $sub_phase)
                    <tr class="text-center">
                        @if ($text_direction == 'text-right')
                            <td>{{ __('custom.' . $sub_phase->progress_status) }}</td>
                            <td>{{ __('custom.' . $sub_phase->payment_status) }}</td>
                            <td>{{ $sub_phase->budget }}</td>
                            <td>{{ number_format($sub_phase->budget_rate, 2) }}%</td>
                            <td>{{ $sub_phase->title }}</td>
                        @else
                            <td>{{ $sub_phase->title }}</td>
                            <td>{{ number_format($sub_phase->budget_rate, 2) }}%</td>
                            <td>{{ $sub_phase->budget }}</td>
                            <td>{{ __('custom.' . $sub_phase->payment_status) }}</td>
                            <td>{{ __('custom.' . $sub_phase->progress_status) }}</td>
                    </tr>
                @endif
                @endforeach
                @if ($phase->subPhases()->count() > 0)
                    <tr class="parent-row text-center">
                        @if ($text_direction == 'text-right')
                            <td>
                                {{ $phase->getSubPhasesTotalBudget() }}
                            </td>
                            <td>
                                {{ __('custom.pdf.total') }}
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        @else
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                {{ __('custom.pdf.total') }}
                            </td>
                            <td>
                                {{ $phase->getSubPhasesTotalBudget() }}
                            </td>
                        @endif
                    </tr>
                @endif
                {{-- end subphases --}}
                </tr>
                @endforeach


            </tbody>
            <tfoot id="colored-tfoot" class="text-danger">
                <tr>
                    @if ($text_direction == 'text-right')
                        <td colspan="2">
                            {{ $project->getPhasesTotalBudget() }}
                        </td>
                        <td colspan="2">
                            {{ __('custom.pdf.total') }}
                        </td>
                    @else
                        <td colspan="2">
                            {{ __('custom.pdf.total') }}
                        </td>
                        <td colspan="2">
                            {{ $project->getPhasesTotalBudget() }}
                        </td>
                    @endif
                </tr>

                <tr>
                    @if ($text_direction == 'text-right')
                        <td colspan="2">
                            {{ $project->getTotalPaidPhases() }}
                        </td>
                        <td colspan="2">
                            {{ __('custom.pdf.total_paid') }}
                        </td>
                    @else
                        <td colspan="2">
                            {{ __('custom.pdf.total_paid') }}
                        </td>
                        <td colspan="2">
                            {{ $project->getTotalPaidPhases() }}
                        </td>
                    @endif
                </tr>

                <tr>
                    @if ($text_direction == 'text-right')
                        <td colspan="2">
                            {{ $project->getPhasesTotalBudget() - $project->getTotalPaidPhases() }}
                        </td>
                        <td colspan="2">
                            {{ __('custom.pdf.total_left') }}
                        </td>
                    @else
                        <td colspan="2">
                            {{ __('custom.pdf.total_left') }}
                        </td>
                        <td colspan="2">
                            {{ $project->getPhasesTotalBudget() - $project->getTotalPaidPhases() }}
                        </td>
                    @endif
                </tr>
            </tfoot>
        </table>

    </div>
</body>

</html>
