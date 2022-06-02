<?php

namespace Saasify\Cart\Repositories;

use stdClass;

interface CartRepositoryInterface
{
    /**
     * Save shopping cart.
     *
     * @param $id
     * @param $instanceName
     * @param $content
     */
    public function createOrUpdate($id, $instanceName, $content);

    /**
     * Find shopping cart by its identifier and instance name.
     *
     * @param string $id
     * @param string $instanceName
     *
     * @return stdClass|null
     */
    public function findByIdAndInstanceName($id, $instanceName);

    /**
     * Remove shopping cart by its identifier and instance name.
     *
     * @param string $id
     * @param string $instanceName
     */
    public function remove($id, $instanceName);
}
