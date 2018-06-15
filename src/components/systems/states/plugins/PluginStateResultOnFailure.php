<?php
namespace jeyroik\extas\components\systems\states\plugins;

use jeyroik\extas\components\systems\Plugin;
use jeyroik\extas\components\systems\states\machines\plugins\PluginInitContextSuccess;
use jeyroik\extas\interfaces\systems\IContext;
use jeyroik\extas\interfaces\systems\states\IStateMachine;
use jeyroik\extas\interfaces\systems\states\plugins\IPluginStateResult;

/**
 * Class PluginStateResultOnFailure
 *
 * @package jeyroik\extas\components\systems\states\plugins
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
