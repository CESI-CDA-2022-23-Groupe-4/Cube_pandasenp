<?php
namespace App;

class Constants {
    public const navbar_routes = [
        0 => [
            'name' => 'Home',
            'route' => 'app_home',
            'type' => 'link',
            'icon' => 'bi-house',
            'needs_role' => null,
            'shown_connected' => true,
            'subroutes' => [],
        ],
        1 => [
            'name' => 'Login',
            'route' => 'app_login',
            'type' => 'link',
            'icon' => 'bi-box-arrow-in-right',
            'needs_role' => null,
            'shown_connected' => false,
            'subroutes' => [],
        ],
        2 => [
            'name' => 'Register',
            'route' => 'app_register',
            'type' => 'link',
            'icon' => 'bi-person-plus',
            'needs_role' => null,
            'shown_connected' => false,
            'subroutes' => [],
        ],
        3 => [
            'name' => 'Admin',
            'route' => 'app_admin',
            'type' => 'collapse',
            'icon' => 'bi-gear',
            'needs_role' => 'ROLE_ADMIN',
            'shown_connected' => true,
            'subroutes' => [
                // 0 => [
                //     'name' => 'Users',
                //     'route' => 'app_admin_users',
                //     'type' => 'link',
                //     'icon' => 'bi-person',
                //     'needs_role' => 'ROLE_ADMIN',
                //     'shown_connected' => true,
                //     'subroutes' => [],
                // ],
                // 1 => [
                //     'name' => 'Roles',
                //     'route' => 'app_admin_roles',
                //     'type' => 'link',
                //     'icon' => 'bi-person-badge',
                //     'needs_role' => 'ROLE_ADMIN',
                //     'shown_connected' => true,
                //     'subroutes' => [],
                // ],
                // 2 => [
                //     'name' => 'Permissions',
                //     'route' => 'app_admin_permissions',
                //     'type' => 'link',
                //     'icon' => 'bi-shield-lock',
                //     'needs_role' => 'ROLE_ADMIN',
                //     'shown_connected' => true,
                //     'subroutes' => [],
                // ],
            ],
        ],
        4 => [
            'name' => 'Logout',
            'route' => 'app_logout',
            'type' => 'link',
            'icon' => 'bi-box-arrow-right',
            'needs_role' => 'ROLE_USER',
            'shown_connected' => true,
            'subroutes' => [],
        ],
	];
}