<?php
namespace jeyroik\extas\components\systems\states\plugins;

use jeyroik\extas\components\systems\Plugin;
use jeyroik\extas\components\systems\states\machines\plugins\PluginInitContextSuccess;
use jeyroik\extas\interfaces\systems\IContext;
use jeyroik\extas\interfaces\systems\IState;
use jeyroik\extas\interfaces\systems\states\IStateMachine;
use jeyroik\extas\interfaces\systems\states\machines\plugins\IPluginNextState;

/**
 * Class PluginNextStateOnFailure
 *
 * @package jeyroik\extas\components\systems\states\plugins
 * @author Funcraft <me@funcraft.ru>
 */
class PluginNextStateOnFailure extends Plugin implements IPluginNextState
{
    const STATE__ON_SUCCESS = 'on_success';
    const STATE__ON_FAILURE = 'on_failure';

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
            $context->readItem(PluginInitContextSuccess::CONTEXT__SUCCESS)->getValue()
                ? static::STATE__ON_SUCCESS
                : static::STATE__ON_FAILURE
        );
    }
}
