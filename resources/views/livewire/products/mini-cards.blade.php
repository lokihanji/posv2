<div class="container-fluid py-4">
    <x-card.card-wrapper>
        <x-card.mini-card
            title="Categories"
            :value="$activeCount"
            :change="'+'.$activePercentage.'%'"
            changeType="success"
            icon="ni ni-tag"
        />

        
        <x-card.mini-card
            title="Items"
            :value="$activeItems"
            :change="'+'.$activePercentageItems.'%'"
            changeType="success"
            icon="ni ni-box-2"
        />

        <x-card.mini-card
            title="Products"
            :value="$activeProducts"
            :change="'+'.$activePercentageProducts.'%'"
            changeType="success"
            icon="ni ni-cart"
        />

        {{-- <x-card.mini-card
            title="Stocks"
            :value="$totalStocks"
            :change="'-'.$activePercentageStocks.'%'"
            changeType="danger"
            icon="ni ni-chart-bar-32"
        /> --}}

        
    </x-card.card-wrapper>
</div>
