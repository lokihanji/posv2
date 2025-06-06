<div>
    <div class="table-responsive">
            <table class="table align-items-center mb-0">
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
                    @forelse ($rows as $row)
                        <tr>
                            @foreach ($row as $cell)
                                <td class="{{ $cell['class'] ?? '' }}">
                                    {!! $cell['content'] !!}
                                </td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($headers) }}" class="text-center text-muted py-4">
                                No data available
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

</div>