<?php
	return array(

		'news/([0-9]+)'                   => 'news/view/$1', //actionView в NewsController
		'news'                            => 'news/index', //actionIndex в NewsController

		'product/([0-9]+)'                => 'product/view/$1', //actionView в ProductController

		'catalog'                         => 'catalog/index',  //actionIndex в CatalogController
		'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory в CatalogController
		'category/([0-9]+)'               => 'catalog/category/$1',  //actionCategory в CatalogController

		'cart/add/([0-9]+)'               => 'cart/add/$1', //actionAdd в CartController
		'cart/delete/([0-9]+)'            => 'cart/delete/$1', //actionDelete в CartController
		'cart/addAjax/([0-9]+)'           => 'cart/addAjax/$1', //actionAdd в CartController
		'cart/checkout'                   => 'cart/checkout',
		'cart'                            => 'cart/index', //actionIndex в CartController
		// Пользователь
		'user/register'                   => 'user/register',
		'user/login'                      => 'user/login',
		'user/logout'                     => 'user/logout',
		'user/edit'                       => 'cabinet/edit',
		'cabinet'                         => 'cabinet/index',
		// Управление товарами
		'admin/product/update/([0-9]+)'   => 'adminProduct/update/$1',
		'admin/product/delete/([0-9]+)'   => 'adminProduct/delete/$1',
		'admin/product/create'            => 'adminProduct/create',
		'admin/product'                   => 'adminProduct/index',
		// Управление категориями
		'admin/category/update/([0-9]+)'  => 'adminCategory/update/$1',
		'admin/category/delete/([0-9]+)'  => 'adminCategory/delete/$1',
		'admin/category/create'           => 'adminCategory/create',
		'admin/category'                  => 'adminCategory/index',
		// Управление заказами
		'admin/order/update/([0-9]+)'     => 'adminOrder/update/$1',
		'admin/order/delete/([0-9]+)'     => 'adminOrder/delete/$1',
		'admin/order/view'                => 'adminOrder/view',
		'admin/order'                     => 'adminOrder/index',

		'admin'                           => 'admin/index',

		'contacts'                        => 'site/contact',

		''                                => 'site/index', //actionIndex в SiteController

	);