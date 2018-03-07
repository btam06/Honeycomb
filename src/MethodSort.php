<?php
namespace Honeycomb;

/**
 *
 */
class MethodSort
{
    /**
     * [protected description]
     * @var [type]
     */
    protected $args = [];

    /**
     *
     */
    public function __invoke($a, $b)
    {
        $current_direction = $this->getCurrentDirection();
        $current_method    = $this->getCurrentMethod();

        $current_args      = isset($this->args[$current_method])
            ? $this->args[$current_method]
            : [];

        if (
            call_user_func_array([$a, $current_method], $current_args) <
            call_user_func_array([$b, $current_method], $current_args)
        ) {
            $result = $current_direction != 'desc' ? -1 : 1;

        } elseif (
            call_user_func_array([$a, $current_method], $current_args) >
            call_user_func_array([$b, $current_method], $current_args)
        ) {
            $result = $current_direction != 'desc' ? 1 : -1;

        } elseif (
            $this->getNextMethod()
        ) {
            $result = $this($a, $b);
            prev($this->params);

        } else {
            $result = 0;
        }

        return $result;
    }

    /**
     *
     */
    public function setOrder(array $params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     *
     */
    protected function getCurrentMethod()
    {
        return key($this->params);
    }

    /**
     *
     */
    protected function getCurrentDirection()
    {
        return current($this->params);
    }

    /**
     *
     */
    protected function getNextMethod()
    {
        if (next($this->params)) {
            return key($this->params);
        } else {
            return FALSE;
        }
    }
}
