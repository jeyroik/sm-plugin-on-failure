<?php
namespace jeyroik\extas\components\systems\states\plugins;

use jeyroik\extas\components\systems\Plugin;
use jeyroik\extas\components\systems\states\machines\plugins\PluginInitContextSuccess;
use jeyroik\extas\interfaces\systems\contexts\IContextOnFailure;
use jeyroik\extas\interfaces\systems\IContext;
use jeyroik\extas\interfaces\systems\states\IStateMachine;
use jeyroik\extas\interfaces\systems\states\plugins\IPluginStateRunAfter;

/**
 * Class PluginStateResultOnFailure
 *
 * @package jeyroik\extas\components\systems\states\plugins
 * @author Funcraft <me@funcraft.ru>
 */
class PluginStateRunAfterOnFailure extends Plugin implements IPluginStateRunAfter
{
    public $preDefinedStage = IStateMachine::STAGE__STATE_RUN_AFTER;

    /**
     * @param IStateMachine $machine
     * @param IContext|IContextOnFailure $context
     *
     * @return bool
     */
    public function __invoke(IStateMachine &$machine, IContext $context)
    {
        return $context->isSuccess();
    }
}
