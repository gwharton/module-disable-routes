<?php

namespace Gw\DisableRoutes\Plugin;

use Magento\Framework\App\Route\Config\Reader;

class DisableRoutes
{
    protected $modulesToDisable;

    public function __construct(
        $modulesToDisable = []
    ) {
        $this->modulesToDisable = $modulesToDisable;
    }

    /**
     * @param Reader $subject
     * @param array $result
     * @param string|null $scope
     * @return array
     */
    public function afterRead(Reader $subject, array $result, $scope = null): array
    {
        foreach ($this->modulesToDisable as $module => $disable) {
            if ($disable) {
                unset($result['standard']['routes'][$module]);
            }
        }
        return $result;
    }
}
