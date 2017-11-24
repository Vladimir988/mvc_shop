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

		'user/register'                   => 'user/register',
		'user/login'                      => 'user/login',
		'user/logout'                     => 'user/logout',

		'user/edit'                       => 'cabinet/edit',
		'cabinet'                         => 'cabinet/index',

		'contacts'                        => 'site/contact',

		''                                => 'site/index', //actionIndex в SiteController

	);