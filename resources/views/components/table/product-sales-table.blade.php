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
            @forelse ($products as $product)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div>
                                <img src="{{ $product['image'] }}" class="avatar avatar-sm me-3 rounded-circle">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $product['name'] }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-sm mb-0">{{ $product['sales'] }}</p>
                    </td>
                    <td>
                        <p class="text-sm mb-0">{{ $product['stock'] }}</p>
                    </td>
                    <td>
                        <p class="text-sm mb-0">{{ $product['sold'] }}</p>
                    </td>
                    <td>
                        <span class="badge bg-gradient-{{ $product['status'] === 'available' ? 'success' : 'secondary' }}">
                            {{ ucfirst($product['status']) }}
                        </span>
                    </td>
                     <td class="align-middle text-center">
                        <button class="btn btn-link text-info" data-bs-toggle="modal" data-bs-target="#editProduct" wire:click="editProduct({{ $product['id'] }})" title="Edit">
                            <i class="fa fa-edit text-xs"></i>
                        </button>
                        <button class="btn btn-link text-danger" data-bs-toggle="modal" data-bs-target="#deleteProduct" title="Delete">
                            <i class="fa fa-trash text-xs"></i>
                        </button>
                       
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) }}" class="text-center text-muted py-4">
                        No product data available
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</div>