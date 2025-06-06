<div>
    <div class="table-responsive">
        <table class="table align-items-center justify-content-center mb-0">
            <thead>
                <tr>
                    @foreach ($headers as $header)
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 {{ $header['class'] ?? '' }}">
                            {{ $header['label'] }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div>
                                    <img src="{{ $project['logo'] }}" class="avatar avatar-sm rounded-circle me-2">
                                </div>
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">{{ $project['name'] }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">{{ $project['budget'] }}</p>
                        </td>
                        <td>
                            <span class="text-xs font-weight-bold">{{ $project['status'] }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="me-2 text-xs font-weight-bold">{{ $project['completion'] }}%</span>
                                <div class="progress">
                                    <div class="progress-bar {{ $project['bar_class'] }}"
                                        role="progressbar"
                                        aria-valuenow="{{ $project['completion'] }}"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                        style="width: {{ $project['completion'] }}%;">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($headers) }}" class="text-center text-muted py-4">
                            No project data available
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>