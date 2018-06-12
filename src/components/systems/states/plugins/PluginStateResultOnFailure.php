<?php
namespace tratabor\components\systems\states\plugins;

use tratabor\components\systems\Plugin;
use tratabor\components\systems\states\machines\plugins\PluginInitContextSuccess;
use tratabor\interfaces\systems\IContext;
use tratabor\interfaces\systems\states\IStateMachine;
use tratabor\interfaces\systems\states\plugins\IPluginStateResult;

/**
 * Class PluginStateResultOnFailure
 *
 * @package tratabor\components\systems\states\plugins
 * @author Funcraft <me@funcraft.ru>
 */
class PluginStateResultOnFailure extends Plugin implements IPluginStateResult
{
    /**
     * @param IStateMachine $machine
     * @param IContext $context
     *
     * @return bool
     */
    public function __invoke(IStateMachine &$machine, IContext $context)
    {
        try {
            $isSuccess = $context->readItem(PluginInitContextSuccess::CONTEXT__SUCCESS)->getValue();
            return $isSuccess;
        } catch (\Exception $e) {
            return true;
        }
    }
}
