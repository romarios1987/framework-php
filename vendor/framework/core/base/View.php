<?php

namespace framework\base;

class View
{
    protected $route = [];
    protected $view;
    protected $layout;

    /**
     * @var array data
     */
    protected $data = [];

    /**
     * @var array meta data
     */
    protected $meta = [];


    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->meta = $meta;

        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: TEMPLATE;
        }
    }

    public function render($data)
    {
        if (is_array($data)) extract($data);
        debug($data);
        $viewFile = APP . "/views/{$this->route['controller']}/{$this->view}.php";


        // check is_file
        if (is_file($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            throw new \Exception("На найден вид {$viewFile}", 404);
        }

        if (false !== $this->layout) {
            $layoutFile = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layoutFile)) {
                require $layoutFile;
            } else {
                throw new \Exception("На найден шаблон {$file_layout}", 404);
            }
        }

    }

    /**
     * @return string
     */
    public function getMeta()
    {
        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content=" ' . $this->meta['desc'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content=" ' . $this->meta['keywords'] . '">' . PHP_EOL;

        return $output;
    }

}