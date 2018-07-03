<?php
namespace jeyroik\extas\components\systems\states\plugins;

use jeyroik\extas\components\systems\Plugin;
use jeyroik\extas\components\systems\states\machines\plugins\PluginInitContextSuccess;
use jeyroik\extas\interfaces\systems\IContext;
use jeyroik\extas\interfaces\systems\IState;
use jeyroik\extas\interfaces\systems\states\IStateMachine;
use jeyroik\extas\interfaces\systems\states\machines\plugins\IPluginStateRunNext;

/**
 * Class PluginNextStateOnFailure
 *
 * @package jeyroik\extas\components\systems\states\plugins
 * @author Funcraft <me@funcraft.ru>
 */
class PluginStateRunNextOnFailure extends Plugin implements IPluginStateRunNext
{
    const STATE__ON_SUCCESS = 'on_success';
    const STATE__ON_FAILURE = 'on_failure';

    public $preDefinedStage = IStateMachine::STAGE__STATE_RUN_NEXT;

    /**
     * @param IStateMachine $machine
     * @param IState|null $currentState
     * @param IContext|null $context
     *
     * @return string
     */
    public function __invoke(IStateMachine $machine, IState $currentState = null, IContext $context = null)
    {
        return $currentState->getAdditional(
            $context[PluginInitContextSuccess::CONTEXT__SUCCESS]
                ? static::STATE__ON_SUCCESS
                : static::STATE__ON_FAILURE
        );
    }
}
