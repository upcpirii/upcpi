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

        $this->setName('tenancy:'.$this->getName());
        $this->specifyParameters();

        $this->websites = app(WebsiteRepository::class);
        $this->connection = app(Connection::class);
    }

    /**
     * Execute the console command.
     *
     * @param Dispatcher $event
     *
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
