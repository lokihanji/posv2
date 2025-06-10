@props([
    'title' => '',
    'value' => '',
    'change' => null,
    'changeType' => 'success',
    'icon' => 'ni ni-tag', 'ni ni-cart', 'ni ni-box-2', 'ni ni-chart-bar-32', 'ni ni-world',
    'iconBg' => 'bg-gradient-primary'
])

<div {{ $attributes->merge(['class' => 'col-xl-3 col-sm-6 mb-xl-0 mb-4']) }}>
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $title }}</p>
                        <h5 class="font-weight-bolder mb-0">
                            {{ $value }}
                            @if($change)
                                <span class="text-{{ $changeType }} text-sm font-weight-bolder">{{ $change }}</span>
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape {{ $iconBg }} shadow text-center border-radius-md">
                        <i class="{{ $icon }} text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 