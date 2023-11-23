<?php
return [
    'module' =>
    [
        [
            'title' => "QL Sản phẩm",
            'icon' => "fa fa-cube",
            'name' => ['product', 'catalogue'],

            'subModule' => [
                [
                    'title' => "QL Sản phẩm",
                    'route' => "product/index"
                ],
                [
                    'title' => "QL thuộc tính",
                    'route' => "catalogue/index"
                ]
            ]
        ],
        [
            'title' => "QL bài viết",
            'icon' => "fa fa-file",
            'name' => ['post'],

            'subModule' => [
                [
                    'title' => "QL nhóm bài viết",
                    'route' => "post/catalogue/index"
                ],
                [
                    'title' => "QL  bài viết",
                    'route' => "post/index"
                ]
            ]
        ],
        [
            'title' => "QL Người dùng",
            'icon' => "fa fa-th-large",
            'name' => ['user', 'permission'],
            'subModule' => [
                [
                    'title' => "QL nhóm thành viên",
                    'route' => "user/catalogue/index"
                ],
                [
                    'title' => "QL thành viên",
                    'route' => "user/index"
                ],
                [
                    'title' => "QL Quyền",
                    'route' => "permission/index"
                ]
            ]
        ],
        [
            'title' => "QL Đơn Hàng",
            'icon' => "fa fa-flask",
            'name' => ['order'],
            'subModule' => [
                [
                    'title' => "QL Đơn Hàng",
                    'route' => "order/index"
                ],
              
               
            ]
        ],
        [
            'title' => "QL Banner",
            'icon' => "fa fa-bar-chart-o",
            'name' => ['banner'],
            'subModule' => [
                [
                    'title' => "QL Banner",
                    'route' => "banner/index"
                ],
              
               
            ]
        ],
        [
            'title' => "QL Subscriber",
            'icon' => "fa fa-desktop",
            'name' => ['subscriber'],
            'subModule' => [
                [
                    'title' => "QL Subscriber",
                    'route' => "subscriber/index"
                ],
              
               
            ]
        ],
        [
            'title' => "QL Mã giảm giá",
            'icon' => "fa fa-diamond",
            'name' => ['coupons'],
            'subModule' => [
                [
                    'title' => "QL Mã giảm giá",
                    'route' => "coupons/index"
                ],
            ]
        ],

       
    ]
];
