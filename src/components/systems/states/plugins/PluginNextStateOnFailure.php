<?php
namespace tratabor\components\systems\states\plugins;

use tratabor\components\systems\Plugin;
use tratabor\components\systems\states\machines\plugins\PluginInitContextSuccess;
use tratabor\interfaces\systems\IContext;
use tratabor\interfaces\systems\IState;
use tratabor\interfaces\systems\states\IStateMachine;
use tratabor\interfaces\systems\states\machines\plugins\IPluginNextState;

/**
 * Class PluginNextStateOnFailure
 *
 * @package tratabor\components\systems\states\plugins
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
