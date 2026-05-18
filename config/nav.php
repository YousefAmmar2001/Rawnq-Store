<?php

return [
    [
        'icon' => 'fas fa-chart-pie',
        'title' => 'Categories',
        'active' => 'dashboard.categories.*',
        'items' => [
            [
                'icon' => 'fas fa-list',
                'route' => 'dashboard.categories.index',
                'title' => 'Index',
                'active' => 'dashboard.categories.index',
            ],
            [
                'icon' => 'fas fa-plus-square',
                'route' => 'dashboard.categories.create',
                'title' => 'Create',
                'active' => 'dashboard.categories.create',
            ],
            [
                'icon' => 'fas fa-trash-alt',
                'route' => 'dashboard.categories.trash',
                'title' => 'Trash',
                'active' => 'dashboard.categories.trash',
            ],
        ]
    ],
    [
        'icon' => 'fas fa-chart-pie',
        'title' => 'Products',
        'active' => 'dashboard.products.*',
        'items' => [
            [
                'icon' => 'fas fa-list',
                'route' => 'dashboard.categories.index',
                'title' => 'Index',
                'active' => 'dashboard.products.index',
            ],
            [
                'icon' => 'fas fa-plus-square',
                'route' => 'dashboard.categories.create',
                'title' => 'Create',
                'active' => 'dashboard.products.create',
            ],
        ]
    ],
    [
        'icon' => 'fas fa-chart-pie',
        'title' => 'Orders',
        'route' => 'dashboard.categories.create',
        'active' => 'dashboard.orders.*',
    ],
];
