<?php

/*
 * This file is part of the hyn/multi-tenant package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://laravel-tenancy.com
 * @see https://github.com/hyn/multi-tenant
 */

namespace UPCEngineering\Traits;

use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Database\Connection;
use Hyn\Tenancy\Traits\AddWebsiteFilterOnCommand;
use Illuminate\Contracts\Events\Dispatcher;

trait MutatesScoutCommands
{
    use AddWebsiteFilterOnCommand;

    /**
     * @var WebsiteRepository
     */
    private $websites;

    /**
     * @var Connection
     */
    private $connection;

    public function __construct()
    {
        parent::__construct();

        $this->setName('tenancy:' . $this->getName());
        $this->specifyParameters();

        $this->websites = app(WebsiteRepository::class);
        $this->connection = app(Connection::class);
    }

    /**
     * Execute the console command.
     *
     * @param Dispatcher $event
     * @return void
     */
    public function handle(Dispatcher $event)
    {
        $this->processHandle(function ($website) use ($event) {
            $this->connection->set($website);
            parent::handle($event);
            $this->connection->purge();
        });
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array_merge([$this->addWebsiteOption()], parent::getOptions());
    }
}
