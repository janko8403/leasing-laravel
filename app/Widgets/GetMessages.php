<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Message;

class GetMessages extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];
    public $reloadTimeout = 5;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $messages = Message::orderBy('id', 'DESC')->get();

        return view('widgets.get_messages', [
            'config' => $this->config,
            'messages' => $messages
        ]);
    }
}
