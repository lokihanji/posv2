@props([
    'headers' => [],
    'data' => [],
    'sort' => null,
    'sortDirection' => 'asc',
    'perPage' => 10,
    'currentPage' => 1,
    'total' => 0,
    'rowClass' => '',
    'rowAttributes' => [],
    'customColumns' => [],
    'statusField' => 'status',
    'statusAvailableValue' => 'available',
    'idField' => 'id',
    'emptyMessage' => 'No data available',
    'editingRow' => null
])

<div>
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    @foreach ($headers as $header)
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 {{ $header['class'] ?? '' }}"
                            @if(isset($header['sortable']) && $header['sortable'])
                                wire:click="sortBy('{{ $header['key'] }}')"
                                style="cursor: pointer;"
                            @endif
                        >
                            {{ $header['label'] }}
                            @if(isset($header['sortable']) && $header['sortable'])
                                @if($sort === $header['key'])
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                @else
                                    <i class="fas fa-sort"></i>
                                @endif
                            @endif
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="{{ $rowClass }} {{ $editingRow === $item[$idField] ? 'table-active' : '' }}" 
                        wire:click="editRow({{ $item[$idField] }}); $emit('open-edit-modal')"
                        style="cursor: pointer;"
                        @foreach($rowAttributes as $key => $value)
                            {{ $key }}="{{ $value }}"
                        @endforeach
                    >
                        @foreach ($headers as $header)
                            <td class="{{ $header['cellClass'] ?? '' }}">
                                @if(isset($customColumns[$header['key']]))
                                    {!! $customColumns[$header['key']]($item) !!}
                                @else
                                    @switch($header['type'] ?? 'text')
                                        @case('image')
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ $item[$imageField] }}" class="avatar avatar-sm me-3 rounded-circle">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item[$nameField] }}</h6>
                                                </div>
                                            </div>
                                            @break
                                        @case('status')
                                            @php
                                                $statusConfig = $header['statusConfig'] ?? [
                                                    'available' => ['color' => 'success', 'label' => 'Available'],
                                                    'unavailable' => ['color' => 'secondary', 'label' => 'Unavailable']
                                                ];
                                                
                                                $stock = $item['stock'] ?? 0;
                                                $currentStatus = $item[$statusField] ?? 'unavailable';
                                                
                                                if ($stock < 300 && $currentStatus === 'available') {
                                                    $currentStatus = 'low_stock';
                                                }
                                                
                                                $config = $statusConfig[$currentStatus] ?? $statusConfig['unavailable'];
                                            @endphp
                                            <span class="badge bg-gradient-{{ $config['color'] }}">
                                                {{ $config['label'] }}
                                            </span>
                                            @break
                                        @case('actions')
                                            <button class="btn btn-sm btn-info"
                                                wire:click.stop="editRow({{ $item[$idField] }})"
                                                x-data
                                                x-on:click="$wire.emit('open-edit-modal')"
                                            >
                                                Edit
                                            </button>
                                            @break
                                        @default
                                            <span class="text-sm">{{ $item[$header['key']] }}</span>
                                    @endswitch
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($headers) }}" class="text-center text-muted py-4">
                            {{ $emptyMessage }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($total > $perPage)
        <div class="d-flex justify-content-center mt-4">
            {{ $data->links() }}
        </div>
    @endif
</div>