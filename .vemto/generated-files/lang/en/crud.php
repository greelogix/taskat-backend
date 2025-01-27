<?php

return [
    'services' => [
        'itemTitle' => 'Service',
        'collectionTitle' => 'Services',
        'inputs' => [
            'title' => [
                'label' => 'Title',
                'placeholder' => 'Title',
            ],
            'description' => [
                'label' => 'Description',
                'placeholder' => 'Description',
            ],
            'image' => [
                'label' => 'Image',
                'placeholder' => 'Image',
            ],
        ],
    ],
    'subServices' => [
        'itemTitle' => 'Sub Service',
        'collectionTitle' => 'Sub Services',
        'inputs' => [
            'service_id' => [
                'label' => 'Service',
                'placeholder' => 'Service id',
            ],
            'name' => [
                'label' => 'Name',
                'placeholder' => 'Name',
            ],
            'description' => [
                'label' => 'Description',
                'placeholder' => 'Description',
            ],
            'image' => [
                'label' => 'Image',
                'placeholder' => 'Image',
            ],
            'status' => [
                'label' => 'Status',
                'placeholder' => 'Status',
            ],
            'price' => [
                'label' => 'Price',
                'placeholder' => 'Price',
            ],
            'has_template' => [
                'label' => 'Has template',
                'placeholder' => 'Has template',
            ],
        ],
    ],
    'userCards' => [
        'inputs' => [
            'user_id' => [
                'label' => 'User id',
                'placeholder' => 'User id',
            ],
            'holder_name' => [
                'label' => 'Holder name',
                'placeholder' => 'Holder name',
            ],
            'card_number' => [
                'label' => 'Card number',
                'placeholder' => 'Card number',
            ],
            'valid_date' => [
                'label' => 'Valid date',
                'placeholder' => 'Valid date',
            ],
            'default' => [
                'label' => 'Default',
                'placeholder' => 'Default',
            ],
        ],
    ],
    'subServiceTemplates' => [
        'inputs' => [
            'sub_service_id' => [
                'label' => 'Sub service',
                'placeholder' => 'Sub service id',
            ],
            'name' => [
                'label' => 'Name',
                'placeholder' => 'Name',
            ],
            'description' => [
                'label' => 'Description',
                'placeholder' => 'Description',
            ],
            'image' => [
                'label' => 'Image',
                'placeholder' => 'Image',
            ],
            'url' => [
                'label' => 'Url',
                'placeholder' => 'Url',
            ],
            'status' => [
                'label' => 'Status',
                'placeholder' => 'Status',
            ],
        ],
        'itemTitle' => 'Sub Service Template',
        'collectionTitle' => 'Sub Service Templates',
    ],
    'allDeliveryDays' => [
        'inputs' => [
            'sub_service_id' => [
                'label' => 'Sub service ',
                'placeholder' => 'Sub service id',
            ],
            'name' => [
                'label' => 'Name',
                'placeholder' => 'Name',
            ],
            'description' => [
                'label' => 'Description',
                'placeholder' => 'Description',
            ],
            'price' => [
                'label' => 'Price',
                'placeholder' => 'Price',
            ],
            'status' => [
                'label' => 'Status',
                'placeholder' => 'Status',
            ],
        ],
        'itemTitle' => 'Delivery Days',
        'collectionTitle' => 'All Delivery Days',
    ],
    'contentCategories' => [
        'itemTitle' => 'Content Category',
        'collectionTitle' => 'Content Categories',
        'inputs' => [
            'name' => [
                'label' => 'Name',
                'placeholder' => 'Name',
            ],
            'decription' => [
                'label' => 'Decription',
                'placeholder' => 'Decription',
            ],
            'status' => [
                'label' => 'Status',
                'placeholder' => 'Status',
            ],
        ],
    ],
    'influencers' => [
        'inputs' => [
            'name' => [
                'label' => 'Name',
                'placeholder' => 'Name',
            ],
            'bio' => [
                'label' => 'Bio',
                'placeholder' => 'Bio',
            ],
            'address' => [
                'label' => 'Address',
                'placeholder' => 'Address',
            ],
            'lat' => [
                'label' => 'Lat',
                'placeholder' => 'Lat',
            ],
            'long' => [
                'label' => 'Long',
                'placeholder' => 'Long',
            ],
            'image' => [
                'label' => 'Image',
                'placeholder' => 'Image',
            ],
        ],
        'itemTitle' => 'Influencer',
        'collectionTitle' => 'Influencers',
    ],
    'iinfluencers' => [
        'inputs' => [
            'name' => [
                'label' => 'Name',
                'placeholder' => 'Name',
            ],
            'bio' => [
                'label' => 'Bio',
                'placeholder' => 'Bio',
            ],
            'address' => [
                'label' => 'Address',
                'placeholder' => 'Address',
            ],
            'image' => [
                'label' => 'Image',
                'placeholder' => 'Image',
            ],
            'lat' => [
                'label' => 'Lat',
                'placeholder' => 'Lat',
            ],
            'long' => [
                'label' => 'Long',
                'placeholder' => 'Long',
            ],
        ],
        'itemTitle' => 'Iinfluencer',
        'collectionTitle' => 'Iinfluencers',
    ],
];
