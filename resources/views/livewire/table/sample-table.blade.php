<div>

    <x-card size="lg"  columns="1" header="Product Table">
        @php
            $headers = [
                ['label' => 'Product'],
                ['label' => 'Sales'],
                ['label' => 'Stock'],
                ['label' => 'Sold'],
                ['label' => 'Status'],
                ['label' => 'Action'],
            ];

            $products = [
                [
                    'name' => 'Wireless Mouse',
                    'image' => asset('assets/img/product-sample/mouse.png'),
                    'sales' => 120,
                    'stock' => 35,
                    'sold'  => 135,
                    'status' => 'available',
                ],
                [
                    'name' => 'Mechanical Keyboard',
                    'image' => asset('assets/img/product-sample/mkeyboard.png'),
                    'sales' => 75,
                    'stock' => 12,
                    'sold'  => 125,
                    'status' => 'available',
                ],
                [
                    'name' => 'USB-C Hub',
                    'image' => asset('assets/img/product-sample/chub.png'),
                    'sales' => 35,
                    'stock' => 60,
                    'sold'  => 115,
                    'status' => 'available',
                ],
                [
                    'name' => 'Gaming Chair',
                    'image' => asset('assets/img/product-sample/gchair.png'),
                    'sales' => 9,
                    'stock' => 4,
                    'sold'  => 150,
                    'status' => 'out of stock',
                ],
            ];
        @endphp

<!-- Sort by 'most_sold', 'least_sold', or 'stock' -->
        <x-table.product-sales-table :headers="$headers" :products="$products" sort="most_sold" />

    </x-card>
    <x-card size="lg"  columns="1" header="Users Table">
        @php
            $headers = [
                ['label' => 'Author'],
                ['label' => 'Function', 'class' => 'ps-2'],
                ['label' => 'Status', 'class' => 'text-center'],
                ['label' => 'Employed', 'class' => 'text-center'],
                ['label' => ''],
            ];

            $rows = [
                [
                    ['content' => '<div class="d-flex px-2 py-1">
                                    <div><img src="assets/img/team-2.jpg" class="avatar avatar-sm me-3"></div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">John Michael</h6>
                                        <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                    </div>
                                </div>'],
                    ['content' => '<p class="text-xs font-weight-bold mb-0">Manager</p><p class="text-xs text-secondary mb-0">Organization</p>'],
                    ['content' => '<span class="badge badge-sm bg-gradient-success">Online</span>', 'class' => 'text-center text-sm'],
                    ['content' => '<span class="text-secondary text-xs font-weight-bold">23/04/18</span>', 'class' => 'text-center'],
                    ['content' => '<a href="#" class="text-secondary font-weight-bold text-xs">Edit</a>'],
                ],
                // Add more rows...
            ];
        @endphp
        <x-table.responsive-table :headers="$headers" :rows="$rows" />

    </x-card>

     <x-card size="lg"  columns="1" header="Ambot Table">
      
        @php
        $headers = [
            ['label' => 'Project'],
            ['label' => 'Budget', 'class' => 'ps-2'],
            ['label' => 'Status', 'class' => 'ps-2'],
            ['label' => 'Completion', 'class' => 'text-center ps-2'],
            ['label' => ''],
        ];

        $projects = [
            [
                'logo' => asset('assets/img/small-logos/logo-spotify.svg'),
                'name' => 'Spotify',
                'budget' => '$2,500',
                'status' => 'working',
                'completion' => 60,
                'bar_class' => 'bg-gradient-info',
            ],
            [
                'logo' => asset('assets/img/small-logos/logo-invision.svg'),
                'name' => 'Invision',
                'budget' => '$5,000',
                'status' => 'done',
                'completion' => 100,
                'bar_class' => 'bg-gradient-success',
            ],
            [
                'logo' => asset('assets/img/small-logos/logo-jira.svg'),
                'name' => 'Jira',
                'budget' => '$3,400',
                'status' => 'canceled',
                'completion' => 30,
                'bar_class' => 'bg-gradient-danger',
            ],
            [
                'logo' => asset('assets/img/small-logos/logo-slack.svg'),
                'name' => 'Slack',
                'budget' => '$1,000',
                'status' => 'canceled',
                'completion' => 0,
                'bar_class' => 'bg-gradient-success',
            ],
            [
                'logo' => asset('assets/img/small-logos/logo-webdev.svg'),
                'name' => 'Webdev',
                'budget' => '$14,000',
                'status' => 'working',
                'completion' => 80,
                'bar_class' => 'bg-gradient-info',
            ],
            [
                'logo' => asset('assets/img/small-logos/logo-xd.svg'),
                'name' => 'Adobe XD',
                'budget' => '$2,300',
                'status' => 'done',
                'completion' => 100,
                'bar_class' => 'bg-gradient-success',
            ],
        ];
        @endphp

        <x-table.project-table :headers="$headers" :projects="$projects" />

    </x-card>
</div>
