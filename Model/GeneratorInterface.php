<?php

namespace W4PLEGO\CmsUpgrade\Model;

/**
 * Interface GeneratorInterface
 *
 * @package W4PLEGO\CmsUpgrade\Model
 */
interface GeneratorInterface
{
    /**
     * @return mixed
     */
    public function generate();

    /**
     * @return mixed
     */
    public function getUpgradeFields();

    /**
     * @return mixed
     */
    public function getEntityType();
}
