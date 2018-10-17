<?php


namespace vendor\core\base;


class View
{
    /**
     * Current route
     * @var array
     */
    public $route = [];

    /**
     * Current View
     * @var string
     */
    public $view;

    /**
     * Current template
     * @var string
     */
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;

        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: TEMPLATE;
        }

        $this->view = $view;
    }

    public function render()
    {
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {
            require $file_view;
        } else {
            echo "Не найден вид <b>$file_view</b>";
        }
        $content = ob_get_clean();

    }


}