<?php

/*
 * This file is part of the UPCPI Software package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @version    alpha
 *
 * @author     Bertrand Kintanar <bertrand@imakintanar.com>
 * @license    BSD License (3-clause)
 * @copyright  (c) 2017-2018, UPC Engineering
 *
 * @link       https://bitbucket.org/bkintanar/upcpi
 */

return [

    /*
     * Apache2 is one of the most widely adopted webserver packages available.
     *
     * @see http://httpd.apache.org/docs/
     * @see https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu
     */
    'apache2' => [
        /*
         * Whether the integration with Apache2 is currently active.
         */
        'enabled' => false,

        /*
         * Define the ports of your Apache service.
         */
        'ports' => [
            /*
             * HTTP, non-SSL port.
             *
             * @default 80
             */
            'http' => 80,
            /*
             * HTTPS, SSL port.
             *
             * @default 443
             */
            'https' => 443,
        ],

        /*
         * The generator taking care of hooking into the Apache services and files.
         */
        'generator' => \Hyn\Tenancy\Generators\Webserver\Vhost\ApacheGenerator::class,

        /*
         * The view that holds the vhost configuration template.
         */
        'view' => 'tenancy.generators::webserver.apache.vhost',

        /*
         * Specify the disk you configured in the filesystems.php file where to store
         * the tenant vhost configuration files.
         *
         * @info If not set, will revert to the default filesystem.
         */
        'disk' => null,

        'paths' => [

            /*
             * Location where vhost configuration files can be found.
             */
            'vhost-files' => [
                '/etc/apache2/sites-enabled/',
            ],

            /*
             * Actions to run to work with the Apache2 service.
             */
            'actions' => [
                /*
                 * Action that asserts Apache2 is installed.
                 */
                'exists' => '/etc/init.d/apache2',
                /*
                 * Action to run to test the apache configuration.
                 */
                'test-config' => 'apache2ctl -t',
                /*
                 * Action to run to reload the apache service.
                 */
                'reload' => 'apache2ctl graceful',
            ],
        ],
    ],

    /*
     * Nginx webserver support.
     *
     * @see http://nginx.org
     */
    'nginx' => [
        /*
         * Whether the integration with nginx is currently active.
         */
        'enabled' => false,

        /*
         * The php sock to be used.
         */
        'php-sock' => '127.0.0.1:9000',

        /*
         * Define the ports of your nginx service.
         */
        'ports' => [
            /*
             * HTTP, non-SSL port.
             *
             * @default 80
             */
            'http' => 8080,
            /*
             * HTTPS, SSL port.
             *
             * @default 443
             */
            'https' => 8443,
        ],

        /*
         * The generator taking care of hooking into the nginx services and files.
         */
        'generator' => \Hyn\Tenancy\Generators\Webserver\Vhost\NginxGenerator::class,

        /*
         * The view that holds the vhost configuration template.
         */
        'view' => 'tenancy.generators::webserver.nginx.vhost',

        /*
         * Specify the disk you configured in the filesystems.php file where to store
         * the tenant vhost configuration files.
         *
         * @info If not set, will revert to the default filesystem.
         */
        'disk' => null,

        'paths' => [

            /*
             * Location where vhost configuration files can be found.
             */
            'vhost-files' => [
                '/Users/b8/Sites/_enabled/',
            ],

            /*
             * Actions to run to work with the Nginx service.
             */
            'actions' => [
                /*
                 * Action that asserts nginx is installed.
                 */
                'exists' => 'nginx',
                /*
                 * Action to run to test the nginx configuration.
                 */
                'test-config' => 'nginx -t',
                /*
                 * Action to run to reload the nginx service.
                 */
                'reload' => 'brew services restart nginx',
            ],
        ],
    ],
];
