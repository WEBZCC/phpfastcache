<?php
/**
 *
 * This file is part of phpFastCache.
 *
 * @license MIT License (MIT)
 *
 * For full copyright and license information, please see the docs/CREDITS.txt file.
 *
 * @author Lucas Brucksch <support@hammermaps.de>
 *
 */
declare(strict_types=1);

namespace phpFastCache\Drivers\Zendshm;

use phpFastCache\Core\Item\{ExtendedCacheItemInterface, ItemBaseTrait};
use phpFastCache\Core\Pool\ExtendedCacheItemPoolInterface;
use phpFastCache\Drivers\Zendshm\Driver as ZendSHMDriver;
use phpFastCache\Exceptions\{
  phpFastCacheInvalidArgumentException, phpFastCacheInvalidArgumentTypeException
};

/**
 * Class Item
 * @package phpFastCache\Drivers\Zendshm
 */
class Item implements ExtendedCacheItemInterface
{
    use ItemBaseTrait{
        ItemBaseTrait::__construct as __BaseConstruct;
    }

    /**
     * Item constructor.
     * @param \phpFastCache\Drivers\Zendshm\Driver $driver
     * @param $key
     * @throws phpFastCacheInvalidArgumentException
     */
    public function __construct(ZendSHMDriver $driver, $key)
    {
        $this->__BaseConstruct($driver, $key);
    }

    /**
     * @param ExtendedCacheItemPoolInterface $driver
     * @throws phpFastCacheInvalidArgumentException
     * @return static
     */
    public function setDriver(ExtendedCacheItemPoolInterface $driver)
    {
        if ($driver instanceof ZendSHMDriver) {
            $this->driver = $driver;

            return $this;
        } else {
            throw new phpFastCacheInvalidArgumentException('Invalid driver instance');
        }
    }
}