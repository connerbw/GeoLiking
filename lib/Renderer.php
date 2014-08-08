<?php

namespace Trotch;

abstract class Renderer
{

    /**
     * @var string
     */
    protected $template;

    /**
     * @var int
     */
    protected $status;

    /**
     *
     */
    final function render()
    {
        $this->pre();
        Container::get('App')->render($this->template, $this->data(), $this->status);
        $this->post();
    }

    /**
     * @see render()
     */
    abstract protected function pre();

    /**
     * Data to be passed to \Slim\Slim::render
     *
     * @see render()
     * @return array
     */
    abstract protected function data();

    /**
     * @see render()
     */
    abstract protected function post();

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

}